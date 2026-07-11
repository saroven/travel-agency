@extends('admin.layouts.app')
@section('title', 'Global Settings')
@section('page-title', 'Global Settings')
@section('page-subtitle', 'Manage corporate contacts, milestones, and brand parameters')

@section('content')
<div class="w-full">
    @if(session('success'))
    <div class="glass-panel border-emerald-500/20 bg-emerald-950/20 text-emerald-400 px-5 py-4 rounded-2xl text-xs font-semibold mb-6">
        {{ session('success') }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
            
            {{-- Branding Parameters --}}
            <div class="glass-panel rounded-[32px] p-6 md:p-8">
                <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5 flex items-center gap-2">
                    <span>🎨</span> Brand & Platform Identity
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Site Name</label>
                        <input type="text" name="site_name" value="{{ old('site_name', $settings['site_name'] ?? 'Airbridge') }}" required placeholder="Airbridge"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Site Tagline</label>
                        <input type="text" name="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? 'Tours & Travel') }}" required placeholder="Tours & Travel"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Custom Brand Logo (Replaces fallback A-vector)</label>
                        @if(!empty($settings['site_logo']))
                        <div class="h-12 w-auto max-w-[200px] mb-3 bg-slate-950 p-2 rounded-xl border border-white/5 flex items-center justify-start">
                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" class="h-full object-contain" />
                        </div>
                        @endif
                        <input type="file" name="site_logo" accept="image/*"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-400 text-sm focus:outline-none file:mr-3 file:text-xs file:bg-emerald-500 file:text-white file:border-0 file:rounded-xl file:px-4 file:py-2 file:font-bold cursor-pointer" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Site Favicon (.png / .ico / .svg)</label>
                        @if(!empty($settings['site_favicon']))
                        <div class="h-12 w-12 mb-3 bg-slate-950 p-2 rounded-xl border border-white/5 flex items-center justify-center">
                            <img src="{{ asset('storage/' . $settings['site_favicon']) }}" class="h-8 w-8 object-contain" />
                        </div>
                        @endif
                        <input type="file" name="site_favicon" accept="image/*"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-4 py-2.5 text-slate-400 text-sm focus:outline-none file:mr-3 file:text-xs file:bg-emerald-500 file:text-white file:border-0 file:rounded-xl file:px-4 file:py-2 file:font-bold cursor-pointer" />
                    </div>
                </div>
            </div>

            {{-- Contact Details --}}
            <div class="glass-panel rounded-[32px] p-6 md:p-8">
                <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5 flex items-center gap-2">
                    <span>📞</span> Corporate Contact Information
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Helpline Phone Number</label>
                        <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required placeholder="+880 1711 223344"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Support Email Address</label>
                        <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required placeholder="info@airbridgebd.com"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Office Operations Hours</label>
                        <input type="text" name="office_hours" value="{{ old('office_hours', $settings['office_hours'] ?? '') }}" required placeholder="Sat - Thu (10:00 AM - 07:00 PM)"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Corporate Physical Address</label>
                        <textarea name="office_address" rows="3" required placeholder="Suite 4B, Level 4, Navana Tower, Gulshan 1, Dhaka"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 resize-none transition-all">{{ old('office_address', $settings['office_address'] ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            {{-- Branding Milestones --}}
            <div class="glass-panel rounded-[32px] p-6 md:p-8">
                <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5 flex items-center gap-2">
                    <span>📈</span> Branding & Milestones Counter
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Global Horizons</label>
                        <input type="text" name="milestone_horizons" value="{{ old('milestone_horizons', $settings['milestone_horizons'] ?? '') }}" required placeholder="20+"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Flight Concierge</label>
                        <input type="text" name="milestone_concierge" value="{{ old('milestone_concierge', $settings['milestone_concierge'] ?? '') }}" required placeholder="24/7"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Guided Care</label>
                        <input type="text" name="milestone_care" value="{{ old('milestone_care', $settings['milestone_care'] ?? '') }}" required placeholder="100%"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                </div>
            </div>

            {{-- Social Media Integration --}}
            <div class="glass-panel rounded-[32px] p-6 md:p-8">
                <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5 flex items-center gap-2">
                    <span>🌐</span> Social Networks Links
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Facebook Profile URL</label>
                        <input type="url" name="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" placeholder="https://facebook.com/..."
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">LinkedIn Page URL</label>
                        <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $settings['linkedin_url'] ?? '') }}" placeholder="https://linkedin.com/..."
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Instagram URL</label>
                        <input type="url" name="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" placeholder="https://instagram.com/..."
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                </div>
            </div>

            {{-- Lead Notification Channels (Spans full width on LG screens) --}}
            <div class="glass-panel rounded-[32px] p-6 md:p-8 lg:col-span-2">
                <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5 flex items-center gap-2">
                    <span>🔔</span> Lead Notification Channels
                </h3>
                
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Alert Email Address</label>
                        <input type="email" name="notification_email" value="{{ old('notification_email', $settings['notification_email'] ?? '') }}" placeholder="alerts@airbridgebd.com"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                        <p class="text-[10px] text-slate-500 mt-2 font-medium">New lead inquiry summaries will be mailed immediately to this address.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Slack Webhook URL</label>
                            <input type="url" name="slack_webhook_url" value="{{ old('slack_webhook_url', $settings['slack_webhook_url'] ?? '') }}" placeholder="https://hooks.slack.com/services/..."
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                            <p class="text-[10px] text-slate-500 mt-2 font-medium">Optional. Integrate Slack channel notifications for real-time lead updates.</p>
                        </div>
                        <div>
                            <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Telegram Webhook URL</label>
                            <input type="url" name="telegram_webhook_url" value="{{ old('telegram_webhook_url', $settings['telegram_webhook_url'] ?? '') }}" placeholder="https://api.telegram.org/bot<token>/sendMessage?chat_id=<id>"
                                class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                            <p class="text-[10px] text-slate-500 mt-2 font-medium">Optional. Send client inquiry alerts directly to a Telegram group or channel chat.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm px-8 py-4 rounded-2xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">
            Save Settings Parameters
        </button>
    </form>
</div>
@endsection
