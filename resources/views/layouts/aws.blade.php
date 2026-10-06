<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIGILA AWS Cloud - @yield('title')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0f172a; /* Slate 900 */
            color: #e2e8f0; /* Slate 200 */
        }
        .glass-panel {
            background: rgba(30, 41, 59, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(51, 65, 85, 0.8);
            border-radius: 0.75rem;
        }
        .neon-text-green { color: #4ade80; text-shadow: 0 0 10px rgba(74, 222, 128, 0.5); }
        .neon-border-green { border-color: #4ade80; box-shadow: 0 0 10px rgba(74, 222, 128, 0.2); }
        .neon-text-blue { color: #60a5fa; text-shadow: 0 0 10px rgba(96, 165, 250, 0.5); }
        
        /* Sidebar Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }
    </style>
    @yield('styles')
</head>
<body class="h-screen flex overflow-hidden selection:bg-indigo-500/30">

    <!-- Sidebar -->
    <aside class="w-72 bg-slate-900 border-r border-slate-800 flex flex-col h-full shrink-0 relative z-20">
        <!-- Logo Area -->
        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <div class="w-8 h-8 rounded bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mr-3 shadow-lg shadow-blue-500/20">
                <i data-lucide="shield" class="text-white w-5 h-5"></i>
            </div>
            <div>
                <h1 class="text-white font-bold text-lg leading-tight">VIGILA</h1>
                <p class="text-xs text-blue-400 font-medium">AWS Cloud</p>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1">
            {!! renderNavLink(route('aws.monitoring'), 'video', 'Monitoreo en Vivo', '4 LIVE', 'bg-red-500/20 text-red-400 border border-red-500/30', request()->routeIs('aws.monitoring')) !!}
            
            <div class="mt-4 mb-2 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">Infraestructura AWS</div>
            
            {!! renderNavLink(route('aws.compute'), 'cpu', 'Cómputo EC2 (Graviton)', '3 Nodos', 'bg-slate-800 text-slate-300 border border-slate-700', request()->routeIs('aws.compute')) !!}
            
            {!! renderNavLink(route('aws.storage'), 'database', 'Almacenamiento S3 & Ciclo', '-72% Costo', 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30', request()->routeIs('aws.storage')) !!}
            
            {!! renderNavLink(route('aws.rds'), 'server', 'RDS Multi-AZ & Caché', 'Multi-AZ OK', 'bg-blue-500/20 text-blue-400 border border-blue-500/30', request()->routeIs('aws.rds')) !!}
            
            {!! renderNavLink(route('aws.ssm'), 'terminal', 'Systems Manager (SSM)', 'Zero SSH', 'bg-amber-500/20 text-amber-400 border border-amber-500/30', request()->routeIs('aws.ssm')) !!}
            
            {!! renderNavLink(route('aws.tco'), 'line-chart', 'Costos TCO & Sostenibilidad', null, '', request()->routeIs('aws.tco')) !!}

            <div class="mt-4 mb-2 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">Cumplimiento & Bienestar</div>
            
            {!! renderNavLink(route('aws.sst'), 'heart-pulse', 'SST & Ergonomía', '13:29', 'bg-pink-500/20 text-pink-400 border border-pink-500/30', request()->routeIs('aws.sst')) !!}
        </nav>

        <!-- Footer / Well Architected -->
        <div class="p-4 border-t border-slate-800">
            <div class="glass-panel p-3 text-sm">
                <div class="flex items-center gap-2 mb-2">
                    <span class="text-orange-400 font-bold text-xs">aws</span>
                    <span class="font-semibold text-slate-300 text-xs">AWS Well-Architected</span>
                </div>
                <div class="w-full bg-slate-800 rounded-full h-1.5 mb-1.5 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-400 to-green-500 h-1.5 rounded-full" style="width: 98%"></div>
                </div>
                <div class="flex justify-between text-[10px] text-slate-400">
                    <span>Score: 98/100</span>
                    <span class="text-emerald-400">Ahorro: 59.2%</span>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-900 relative">
        <!-- Decorational background glow -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-emerald-500/10 rounded-full blur-[100px] pointer-events-none"></div>

        <!-- Topbar -->
        <header class="h-16 border-b border-slate-800 flex items-center justify-between px-6 bg-slate-900/80 backdrop-blur-md z-10 sticky top-0">
            <div>
                <h2 class="text-xl font-bold text-white tracking-tight">@yield('header_title')</h2>
                <p class="text-xs text-slate-400 mt-0.5">@yield('header_subtitle')</p>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 bg-slate-800/50 rounded-full px-3 py-1.5 border border-slate-700/50">
                    <i data-lucide="zap" class="w-3.5 h-3.5 text-orange-400 fill-orange-400/20"></i>
                    <span class="text-xs font-medium text-slate-300">Simular Carga: <span class="text-white">Normal (Bajo Consumo)</span></span>
                    <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-slate-400"></i>
                </div>
                <div class="flex items-center gap-2 text-xs">
                    <i data-lucide="arrow-down-circle" class="w-4 h-4 text-emerald-400"></i>
                    <span class="text-emerald-400 font-semibold">-$3,495/mes</span>
                </div>
                <div class="flex items-center gap-1.5 px-3 py-1 rounded bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-medium">
                    <i data-lucide="lock" class="w-3.5 h-3.5"></i>
                    VPC Cifrada
                </div>
                <a href="{{ route('home') }}" class="text-slate-400 hover:text-white transition-colors" title="Volver al inicio">
                    <i data-lucide="home" class="w-4 h-4"></i>
                </a>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 overflow-auto p-6 relative z-10">
            @yield('content')
        </main>
    </div>

    <!-- Componente NavLink inline -->
    @php
        function renderNavLink($href, $icon, $title, $badge = null, $badgeColor = '', $active = false) {
            $activeClass = $active ? 'bg-slate-800/80 border-l-2 border-blue-500 text-white' : 'text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 border-l-2 border-transparent';
            $iconColor = $active ? 'text-blue-400' : 'text-slate-500';
            
            $badgeHtml = $badge ? "<span class='ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-semibold $badgeColor'>$badge</span>" : '';
            
            return "<a href='$href' class='flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 group $activeClass'>
                <i data-lucide='$icon' class='w-4 h-4 $iconColor group-hover:text-blue-400 transition-colors'></i>
                <span class='text-sm font-medium'>$title</span>
                $badgeHtml
            </a>";
        }
    @endphp

    <script>
        lucide.createIcons();
    </script>
    @yield('scripts')
</body>
</html>
