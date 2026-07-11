<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $keys = [
            'contact_phone',
            'contact_email',
            'office_address',
            'office_hours',
            'facebook_url',
            'linkedin_url',
            'instagram_url',
            'milestone_horizons',
            'milestone_concierge',
            'milestone_care',
            'notification_email',
            'notification_phone',
            'slack_webhook_url',
            'telegram_webhook_url',
            'whatsapp_webhook_url',
            'webhooks_enabled',
            'site_name',
            'site_tagline',
        ];

        foreach ($keys as $key) {
            if ($key === 'webhooks_enabled') {
                Setting::setValue($key, $request->has('webhooks_enabled') ? '1' : '0');
            } else {
                Setting::setValue($key, $request->input($key));
            }
        }

        // Handle Site Logo upload
        if ($request->hasFile('site_logo')) {
            $request->validate(['site_logo' => 'image|max:2048']);
            $oldLogo = Setting::getValue('site_logo');
            if ($oldLogo) {
                Storage::disk('public')->delete($oldLogo);
            }
            $logoPath = $request->file('site_logo')->store('branding', 'public');
            Setting::setValue('site_logo', $logoPath);
        }

        // Handle Site Favicon upload
        if ($request->hasFile('site_favicon')) {
            $request->validate(['site_favicon' => 'image|max:1024']);
            $oldFavicon = Setting::getValue('site_favicon');
            if ($oldFavicon) {
                Storage::disk('public')->delete($oldFavicon);
            }
            $faviconPath = $request->file('site_favicon')->store('branding', 'public');
            Setting::setValue('site_favicon', $faviconPath);
        }

        return redirect()->route('admin.settings.index')
            ->with('success', 'Global settings updated successfully.');
    }
}
