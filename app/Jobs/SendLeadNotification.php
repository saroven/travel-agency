<?php

namespace App\Jobs;

use App\Models\Lead;
use App\Models\Setting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendLeadNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    public function handle(): void
    {
        $lead = $this->lead;
        
        // 1. Mail Notification
        $email = Setting::getValue('notification_email');
        if ($email) {
            try {
                $subject = "🔔 New Lead: " . $lead->name . " [" . ucwords(str_replace('_', ' ', $lead->type)) . "]";
                $body = "New client inquiry received:\n\n" .
                        "Name: {$lead->name}\n" .
                        "Phone: {$lead->phone}\n" .
                        "Email: {$lead->email}\n" .
                        "Type: " . ucwords(str_replace('_', ' ', $lead->type)) . "\n" .
                        "Destination: " . ($lead->destination ?? 'N/A') . "\n" .
                        "Plan Details: {$lead->plan_details}\n\n" .
                        "Manage this lead at: " . url('/admin/leads/' . $lead->id);

                Mail::raw($body, function ($message) use ($email, $subject) {
                    $message->to($email)->subject($subject);
                });

                Log::info("Lead Mail notification sent to {$email} for Lead ID: {$lead->id}");
            } catch (\Exception $e) {
                Log::error("Lead Mail notification failed: " . $e->getMessage());
            }
        }

        // 2. Slack Webhook
        $slackUrl = Setting::getValue('slack_webhook_url');
        if ($slackUrl) {
            try {
                Http::post($slackUrl, [
                    'text' => "🔔 *New Lead Submission on Airbridge!* \n\n" .
                              "*Name:* {$lead->name}\n" .
                              "*Phone:* {$lead->phone}\n" .
                              "*Email:* " . ($lead->email ?? 'N/A') . "\n" .
                              "*Channel:* " . ucwords(str_replace('_', ' ', $lead->type)) . "\n" .
                              "*Destination:* " . ($lead->destination ?? 'N/A') . "\n" .
                              "*Details:* {$lead->plan_details}\n" .
                              "*Dashboard URL:* " . url('/admin/leads/' . $lead->id)
                ]);
                Log::info("Lead Slack notification sent for Lead ID: {$lead->id}");
            } catch (\Exception $e) {
                Log::error("Lead Slack notification failed: " . $e->getMessage());
            }
        }

        // 3. Telegram Webhook
        $telegramUrl = Setting::getValue('telegram_webhook_url');
        if ($telegramUrl) {
            try {
                Http::post($telegramUrl, [
                    'text' => "🔔 New Lead Submission on Airbridge!\n\n" .
                              "Name: {$lead->name}\n" .
                              "Phone: {$lead->phone}\n" .
                              "Email: " . ($lead->email ?? 'N/A') . "\n" .
                              "Channel: " . ucwords(str_replace('_', ' ', $lead->type)) . "\n" .
                              "Destination: " . ($lead->destination ?? 'N/A') . "\n" .
                              "Details: {$lead->plan_details}\n" .
                              "Dashboard URL: " . url('/admin/leads/' . $lead->id)
                ]);
                Log::info("Lead Telegram notification sent for Lead ID: {$lead->id}");
            } catch (\Exception $e) {
                Log::error("Lead Telegram notification failed: " . $e->getMessage());
            }
        }
    }
}
