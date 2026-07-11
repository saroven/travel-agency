<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login — Airbridge Tours</title>
    
    <!-- Premium Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;850&family=Outfit:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                        display: ['Outfit', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        .login-card {
            background: #090d16;
            border: 1px solid #1e293b;
            box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.5), 
                        0 0 50px -10px rgba(16, 185, 129, 0.08);
        }
        
        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(140px);
            opacity: 0.12;
            z-index: 0;
            pointer-events: none;
        }

        .premium-input {
            background: #030712;
            border: 1px solid #1e293b;
            transition: all 0.2s ease;
        }

        .premium-input:focus {
            border-color: #10b981;
            box-shadow: 0 0 14px -2px rgba(16, 185, 129, 0.25);
            outline: none;
        }
    </style>
</head>
<body class="h-full bg-[#030712] font-sans flex items-center justify-center p-4 relative overflow-hidden text-slate-300">

    <!-- Ambient Glowing Orbs -->
    <div class="glow-orb w-[500px] h-[500px] bg-emerald-500 -top-20 -left-20"></div>
    <div class="glow-orb w-[550px] h-[550px] bg-indigo-600 -bottom-20 -right-20"></div>

    <div class="w-full max-w-md relative z-10">
        {{-- Logo Section --}}
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-3xl flex items-center justify-center mx-auto mb-4 shadow-xl shadow-emerald-500/20">
                <svg class="w-8 h-8 text-white transform rotate-45 -translate-y-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
            </div>
            <h1 class="text-white font-display font-bold text-3xl tracking-tight leading-none">Airbridge</h1>
            <p class="text-emerald-400 text-[10px] font-bold uppercase tracking-widest mt-2">Security Access Portal</p>
        </div>

        {{-- Login Card --}}
        <div class="login-card rounded-[32px] p-8 md:p-10">
            <h2 class="text-white font-display font-bold text-xl mb-1.5">Sign in to workspace</h2>
            <p class="text-slate-400 text-xs mb-6">Enter your administrator credentials below.</p>

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-5 py-3 rounded-2xl text-xs font-semibold mb-5 flex items-center gap-2">
                <span class="w-1.5 h-1.5 bg-red-500 rounded-full flex-shrink-0 animate-ping"></span>
                {{ $errors->first() }}
            </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full premium-input rounded-xl px-5 py-3.5 text-white placeholder-slate-500 text-sm"
                        placeholder="admin@airbridge.com" />
                </div>
                <div>
                    <label class="block text-slate-400 text-xs font-semibold mb-2 ml-1">Secure Password</label>
                    <input type="password" name="password" required
                        class="w-full premium-input rounded-xl px-5 py-3.5 text-white placeholder-slate-500 text-sm"
                        placeholder="••••••••" />
                </div>
                <div class="flex items-center justify-between ml-1 py-1">
                    <label class="flex items-center gap-2.5 cursor-pointer select-none">
                        <input type="checkbox" name="remember" id="remember" class="rounded border-slate-800 bg-[#030712] text-emerald-500 w-4.5 h-4.5 focus:ring-0 focus:ring-offset-0">
                        <span class="text-slate-400 text-xs font-semibold">Keep me signed in</span>
                    </label>
                </div>
                <button type="submit"
                    class="w-full bg-emerald-500 hover:bg-emerald-600 active:scale-98 text-white font-bold text-sm rounded-xl py-3.5 transition-all duration-300 shadow-lg shadow-emerald-500/15 mt-3 cursor-pointer">
                    Unlock Control Panel
                </button>
            </form>
        </div>

        <p class="text-center text-slate-500 text-[11px] font-medium tracking-wide mt-6">
            Default Admin: admin@airbridge.com · Password: password
        </p>
    </div>

</body>
</html>
