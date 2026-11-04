<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roblock Community - Unbound Gaming Universe</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@600;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            cyan: '#00f2fe',
                            purple: '#7928ca',
                            pink: '#ff0080',
                            dark: '#080c14',
                            card: '#0f172a'
                        }
                    },
                    fontFamily: {
                        display: ['Orbitron', 'sans-serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        .bg-grid-pattern {
            background-image: radial-gradient(rgba(0, 242, 254, 0.1) 1px, transparent 1px);
            background-size: 32px 32px;
        }
    </style>
</head>
<body class="bg-brand-dark text-slate-100 font-sans min-h-screen flex flex-col justify-between selection:bg-brand-cyan selection:text-black relative overflow-x-hidden">

    <!-- Background Glow Effects -->
    <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-full pointer-events-none z-0">
        <div class="absolute top-[-10%] left-[15%] w-[450px] h-[450px] bg-brand-cyan/20 rounded-full blur-[140px]"></div>
        <div class="absolute top-[20%] right-[10%] w-[500px] h-[500px] bg-brand-purple/20 rounded-full blur-[160px]"></div>
    </div>

    <div class="relative z-10 flex flex-col min-h-screen bg-grid-pattern">
        
        <!-- Header / Navbar -->
        <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-brand-purple to-brand-cyan p-[2px] shadow-lg shadow-brand-cyan/20">
                    <div class="w-full h-full bg-brand-dark rounded-[10px] flex items-center justify-center font-display font-black text-xl text-transparent bg-clip-text bg-gradient-to-r from-brand-cyan to-white">
                        R
                    </div>
                </div>
                <span class="font-display font-black text-2xl tracking-wider text-white">ROBLOCK</span>
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-300 hover:text-white transition">Dashboard</a>
                    @else
                        <a href="{{ route('auth.google') }}" class="text-sm font-semibold text-slate-300 hover:text-brand-cyan transition">Sign In</a>
                    @endauth
                </nav>
            @endif
        </header>

        <!-- Session Error Message Alert -->
        @if (session('error'))
            <div class="max-w-md mx-auto w-full px-6 mb-4">
                <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/30 text-red-400 text-sm text-center font-medium">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- Hero Section -->
        <main class="flex-1 flex items-center justify-center px-6 py-12">
            <div class="max-w-4xl w-full text-center space-y-8">
                
                <!-- Community Badge -->
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-900/80 border border-slate-800 backdrop-blur-md text-xs font-semibold text-slate-300 shadow-xl">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                    <span>ROBLOCK ONLINE COMMUNITY V2.0</span>
                </div>

                <!-- Main Heading -->
                <div class="space-y-4">
                    <h1 class="font-display font-black text-4xl sm:text-6xl md:text-7xl tracking-tight text-white leading-none">
                        BUILD. PLAY. <br />
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-cyan via-indigo-400 to-brand-pink">
                            CONQUER TOGETHER.
                        </span>
                    </h1>
                    <p class="max-w-2xl mx-auto text-slate-400 text-base sm:text-lg font-normal">
                        Join thousands of players in the ultimate Roblock gaming ecosystem. Connect with squadmates, jump into private realms, and track your stats seamlessly.
                    </p>
                </div>

                <!-- Auth Action Card -->
                <div class="pt-4 max-w-sm mx-auto">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="w-full inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-gradient-to-r from-brand-cyan to-blue-600 font-bold text-slate-950 hover:brightness-110 transition shadow-lg shadow-brand-cyan/25">
                            Enter Game Dashboard
                        </a>
                    @else
                        <!-- Google Sign In Button -->
                        <a href="{{ route('auth.google') }}" class="group relative w-full inline-flex items-center justify-center gap-3 px-6 py-4 rounded-2xl bg-slate-900/90 border border-slate-700/80 hover:border-brand-cyan/60 transition-all duration-300 shadow-xl backdrop-blur-md overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-r from-brand-cyan/10 to-brand-purple/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                            
                            <!-- Google SVG Logo -->
                            <svg class="w-5 h-5 relative z-10 transition-transform group-hover:scale-110" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z"/>
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z"/>
                            </svg>

                            <span class="font-semibold text-white tracking-wide text-sm relative z-10 group-hover:text-brand-cyan transition-colors">
                                Sign in with Google
                            </span>
                        </a>
                        <p class="mt-3 text-xs text-slate-500">Fast sign in. No extra passwords needed.</p>
                    @endauth
                </div>

                <!-- Feature Highlights -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 pt-12 text-left">
                    <div class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800/80 backdrop-blur-sm">
                        <div class="w-8 h-8 rounded-lg bg-brand-cyan/10 text-brand-cyan flex items-center justify-center font-bold mb-3">⚡</div>
                        <h3 class="font-bold text-white text-sm mb-1">Instant Access</h3>
                        <p class="text-xs text-slate-400">One-click authentication gets you directly into the lobby within seconds.</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800/80 backdrop-blur-sm">
                        <div class="w-8 h-8 rounded-lg bg-brand-purple/10 text-indigo-400 flex items-center justify-center font-bold mb-3">🎮</div>
                        <h3 class="font-bold text-white text-sm mb-1">Custom Servers</h3>
                        <p class="text-xs text-slate-400">Join official community tournaments and customized game rooms.</p>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-900/50 border border-slate-800/80 backdrop-blur-sm">
                        <div class="w-8 h-8 rounded-lg bg-brand-pink/10 text-brand-pink flex items-center justify-center font-bold mb-3">🏆</div>
                        <h3 class="font-bold text-white text-sm mb-1">Live Leaderboards</h3>
                        <p class="text-xs text-slate-400">Track player stats, rank progression, and match victories in real time.</p>
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full max-w-7xl mx-auto px-6 py-6 text-center text-xs text-slate-500 border-t border-slate-800/50">
            <p>&copy; {{ date('Y') }} Roblock Gaming Community. All rights reserved.</p>
        </footer>

    </div>

</body>
</html>