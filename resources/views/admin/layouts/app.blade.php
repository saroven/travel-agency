<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Admin') — Airbridge Admin</title>
    
    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            glow: 'rgba(16, 185, 129, 0.15)',
                            primary: '#10b981',
                            dark: '#030712',
                            panel: '#090d16',
                            border: 'rgba(255,255,255,0.05)'
                        }
                    }
                }
            }
        }
    </script>

    <!-- Custom Premium Styles -->
    <style>
        /* Smooth Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }
        ::-webkit-scrollbar-track {
            background: #030712;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 99px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #10b981;
        }

        /* Glassmorphic Cards & Panels */
        .glass-panel {
            background: rgba(9, 13, 22, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.04);
            box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.3);
        }
        
        .glass-panel-glow {
            box-shadow: 0 0 40px -10px rgba(16, 185, 129, 0.06);
        }

        /* Ultra Sleek Sidebar Link Styling */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: 16px;
            color: #64748b;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid transparent;
        }
        
        .sidebar-link:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.02);
            border-color: rgba(255, 255, 255, 0.04);
            transform: translateX(4px);
        }

        .sidebar-link.active {
            color: #10b981;
            background: rgba(16, 185, 129, 0.06);
            border-color: rgba(16, 185, 129, 0.15);
            box-shadow: 0 4px 20px -5px rgba(16, 185, 129, 0.1);
        }

        /* Inputs & Textareas */
        .form-input-premium {
            background: rgba(3, 7, 18, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            color: #f8fafc;
            padding: 12px 18px;
            font-size: 0.875rem;
            transition: all 0.25s ease;
        }
        
        .form-input-premium:focus {
            outline: none;
            border-color: #10b981;
            box-shadow: 0 0 16px -2px rgba(16, 185, 129, 0.2);
            background: rgba(3, 7, 18, 0.85);
        }

        /* Status Badge Glows */
        .badge-glow-new {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.2);
            color: #34d399;
        }
        
        .badge-glow-contacted {
            background: rgba(59, 130, 246, 0.1);
            border: 1px solid rgba(59, 130, 246, 0.2);
            color: #60a5fa;
        }

        .badge-glow-in_progress {
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.2);
            color: #fbbf24;
        }

        .badge-glow-completed {
            background: rgba(148, 163, 184, 0.1);
            border: 1px solid rgba(148, 163, 184, 0.2);
            color: #cbd5e1;
        }

        .badge-glow-cancelled {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #f87171;
        }

        /* Ambient Glowing Background Blobs */
        .ambient-blob-1 {
            position: absolute;
            top: -15%;
            right: -10%;
            width: 50vw;
            height: 50vw;
            background: radial-gradient(circle, rgba(16, 185, 129, 0.05) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }

        .ambient-blob-2 {
            position: absolute;
            bottom: -20%;
            left: -10%;
            width: 55vw;
            height: 55vw;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.04) 0%, transparent 65%);
            pointer-events: none;
            z-index: 0;
        }
    </style>
    @stack('styles')
</head>
<body class="h-full bg-[#030712] font-sans text-slate-300 relative overflow-hidden">

    <!-- Ambient Lighting Effects -->
    <div class="ambient-blob-1"></div>
    <div class="ambient-blob-2"></div>

    <div class="flex h-full min-h-screen relative z-10">

        {{-- ── Sidebar Menu ─────────────────────────── --}}
        <aside class="w-64 bg-[#090d16]/90 backdrop-blur-2xl border-r border-white/5 flex flex-col fixed top-0 left-0 h-full z-40">
            <!-- Brand Identity logo -->
            <div class="px-6 py-6 border-b border-white/5 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg shadow-emerald-500/20">
                        <svg class="w-5 h-5 text-white transform rotate-45 -translate-y-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-white font-display font-bold text-lg leading-none tracking-tight">Airbridge</span>
                        <span class="block text-emerald-400 text-[10px] font-bold uppercase tracking-widest mt-0.5">Control Panel</span>
                    </div>
                </div>
            </div>

            <!-- Scrollable Navigation Area -->
            <nav class="flex-1 px-4 py-6 space-y-7 overflow-y-auto">
                <div>
                    <p class="text-slate-500 text-[10px] uppercase tracking-widest font-bold px-3 mb-3">Overview</p>
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                        Dashboard
                    </a>
                </div>

                <div>
                    <p class="text-slate-500 text-[10px] uppercase tracking-widest font-bold px-3 mb-3">Content Catalog</p>
                    <div class="space-y-1.5">
                        <a href="{{ route('admin.packages.index') }}" class="sidebar-link {{ request()->routeIs('admin.packages*') ? 'active' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Tour Packages
                        </a>
                        <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Bespoke Services
                        </a>
                        <a href="{{ route('admin.visa.index') }}" class="sidebar-link {{ request()->routeIs('admin.visa*') ? 'active' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            Visa Desk Rules
                        </a>
                        <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
                            Client Testimonials
                        </a>
                    </div>
                </div>

                <div>
                    <p class="text-slate-500 text-[10px] uppercase tracking-widest font-bold px-3 mb-3">Relations Desk</p>
                    <a href="{{ route('admin.leads.index') }}" class="sidebar-link {{ request()->routeIs('admin.leads*') ? 'active' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                        Inquiries & Leads
                    </a>
                </div>

                <div>
                    <p class="text-slate-500 text-[10px] uppercase tracking-widest font-bold px-3 mb-3">System Setup</p>
                    <div class="space-y-1.5">
                        <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                            Global Settings
                        </a>
                        <a href="{{ route('admin.profile.index') }}" class="sidebar-link {{ request()->routeIs('admin.profile*') ? 'active' : '' }}">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            Admin Profile
                        </a>
                    </div>
                </div>
            </nav>

            <!-- Bottom Account Status & Logout Section -->
            <div class="p-4 border-t border-white/5 bg-[#030712]/30">
                <div class="flex items-center gap-3 px-3 py-2.5 rounded-2xl bg-white/[0.01] border border-white/5 mb-3">
                    <div class="w-9 h-9 bg-emerald-500/10 border border-emerald-500/20 rounded-full flex items-center justify-center text-emerald-400 font-bold text-sm">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="min-w-0 flex-1">
                        <p class="text-white text-xs font-bold truncate leading-tight">{{ auth()->user()->name }}</p>
                        <p class="text-slate-500 text-[10px] truncate leading-none mt-1">Administrator</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-2.5 rounded-xl text-red-400 hover:bg-red-500/10 text-sm font-semibold transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                        Log Out
                    </button>
                </form>
            </div>
        </aside>

        {{-- ── Main Layout Workspace ──────────────── --}}
        <main class="flex-1 ml-64 flex flex-col min-h-screen max-w-[calc(100vw-256px)] overflow-x-hidden">
            <!-- Header bar -->
            <header class="bg-[#030712]/40 backdrop-blur-md border-b border-white/5 px-8 py-5 flex items-center justify-between sticky top-0 z-30">
                <div>
                    <h1 class="text-white font-display font-bold text-2xl tracking-tight">@yield('page-title', 'Dashboard')</h1>
                    <p class="text-slate-400 text-xs mt-0.5 font-medium">@yield('page-subtitle', 'Welcome back to Airbridge Admin')</p>
                </div>
                <div>
                    <a href="{{ url('/') }}" target="_blank" class="px-4 py-2 bg-white/[0.04] hover:bg-white/[0.08] border border-white/10 text-white rounded-xl text-xs font-bold flex items-center gap-2 transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                        View Live Site
                    </a>
                </div>
            </header>

            <!-- Notifications / Feedbacks -->
            @if(session('success'))
            <div class="mx-8 mt-5 glass-panel border-emerald-500/20 bg-emerald-950/20 text-emerald-400 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center gap-3 shadow-lg shadow-emerald-950/20 animate-pulse">
                <span class="w-5 h-5 bg-emerald-500/20 rounded-full flex items-center justify-center text-xs flex-shrink-0">✓</span>
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="mx-8 mt-5 glass-panel border-red-500/20 bg-red-950/20 text-red-400 px-5 py-4 rounded-2xl text-sm font-semibold flex items-center gap-3 shadow-lg shadow-red-950/20">
                <span class="w-5 h-5 bg-red-500/20 rounded-full flex items-center justify-center text-xs flex-shrink-0">✕</span>
                {{ session('error') }}
            </div>
            @endif

            <!-- Main view container -->
            <div class="flex-1 p-8 overflow-y-auto">
                @yield('content')
            </div>
        </main>
    </div>
    
    @stack('scripts')
</body>
</html>
