@extends('admin.layouts.app')
@section('title', 'Admin Profile')
@section('page-title', 'Admin Profile')
@section('page-subtitle', 'Manage your account name, email address, and secure password')

@section('content')
<div class="w-full max-w-2xl">
    @if($errors->any())
    <div class="glass-panel border-red-500/20 bg-red-950/20 text-red-400 px-5 py-4 rounded-2xl text-xs font-semibold mb-6 flex flex-col gap-1.5">
        @foreach($errors->all() as $error)
        <div class="flex items-center gap-2">
            <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0"></span>
            <span>{{ $error }}</span>
        </div>
        @endforeach
    </div>
    @endif

    <div class="glass-panel rounded-[32px] p-6 md:p-8">
        <h3 class="text-white font-display font-bold text-base tracking-tight mb-6 pb-3 border-b border-white/5 flex items-center gap-2">
            <span>👤</span> Account Credentials
        </h3>

        <form method="POST" action="{{ route('admin.profile.update') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Administrator Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required autocomplete="name"
                    class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
            </div>

            <!-- Email -->
            <div>
                <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Email Address</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="email"
                    class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
            </div>

            <div class="border-t border-white/5 pt-6 mt-4">
                <h4 class="text-white font-display font-semibold text-sm mb-4">Change Secure Password</h4>
                <p class="text-slate-500 text-xs mb-5">Leave blank if you do not wish to change your current password.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">New Password</label>
                        <input type="password" name="password" autocomplete="new-password" placeholder="••••••••"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                    <div>
                        <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Confirm New Password</label>
                        <input type="password" name="password_confirmation" autocomplete="new-password" placeholder="••••••••"
                            class="w-full bg-slate-900 border border-slate-800 rounded-xl px-5 py-3 text-white text-sm focus:outline-none focus:border-emerald-500 transition-all" />
                    </div>
                </div>
            </div>

            <div class="border-t border-white/5 pt-6 flex items-center justify-end">
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm px-8 py-3.5 rounded-xl transition-all shadow-lg shadow-emerald-500/10 cursor-pointer">
                    Save Profile Settings
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
