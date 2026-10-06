<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIGILA AWS Cloud - Panel Unificado</title>
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
        
        /* Sidebar Scrollbar */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }

        .section-header {
            margin-top: 2rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #1e293b;
        }
    </style>
</head>
<body class="h-screen flex overflow-hidden selection:bg-indigo-500/30">

    <!-- Sidebar (Fija) -->
    <aside class="w-72 bg-slate-900 border-r border-slate-800 flex flex-col h-full shrink-0 relative z-20">
        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <div class="w-8 h-8 rounded bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center mr-3 shadow-lg shadow-blue-500/20">
                <i data-lucide="shield" class="text-white w-5 h-5"></i>
            </div>
            <div>
                <h1 class="text-white font-bold text-lg leading-tight">VIGILA</h1>
                <p class="text-xs text-blue-400 font-medium">AWS Cloud</p>
            </div>
        </div>

        <nav class="flex-1 overflow-y-auto py-4 px-3 space-y-1" id="nav-menu">
            <a href="#monitoreo" class="flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 nav-item">
                <i data-lucide="video" class="w-4 h-4"></i><span class="text-sm font-medium">Monitoreo en Vivo</span>
                <span class='ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-semibold bg-red-500/20 text-red-400 border border-red-500/30'>4 LIVE</span>
            </a>
            
            <div class="mt-4 mb-2 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">Infraestructura AWS</div>
            
            <a href="#computo" class="flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 nav-item">
                <i data-lucide="cpu" class="w-4 h-4"></i><span class="text-sm font-medium">Cómputo EC2</span>
                <span class='ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-semibold bg-slate-800 text-slate-300 border border-slate-700'>3 Nodos</span>
            </a>
            
            <a href="#almacenamiento" class="flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 nav-item">
                <i data-lucide="database" class="w-4 h-4"></i><span class="text-sm font-medium">Almacenamiento S3</span>
                <span class='ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-semibold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30'>-72% Costo</span>
            </a>
            
            <a href="#rds" class="flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 nav-item">
                <i data-lucide="server" class="w-4 h-4"></i><span class="text-sm font-medium">RDS Multi-AZ</span>
                <span class='ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-semibold bg-blue-500/20 text-blue-400 border border-blue-500/30'>Multi-AZ OK</span>
            </a>
            
            <a href="#ssm" class="flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 nav-item">
                <i data-lucide="terminal" class="w-4 h-4"></i><span class="text-sm font-medium">Systems Manager</span>
                <span class='ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-semibold bg-amber-500/20 text-amber-400 border border-amber-500/30'>Zero SSH</span>
            </a>
            
            <a href="#tco" class="flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 nav-item">
                <i data-lucide="line-chart" class="w-4 h-4"></i><span class="text-sm font-medium">Costos TCO</span>
            </a>

            <div class="mt-4 mb-2 px-3 text-[10px] font-bold text-slate-500 uppercase tracking-wider">Cumplimiento & Bienestar</div>
            
            <a href="#sst" class="flex items-center gap-3 px-3 py-2.5 rounded-r-lg transition-all duration-200 text-slate-400 hover:bg-slate-800/40 hover:text-slate-200 nav-item">
                <i data-lucide="heart-pulse" class="w-4 h-4"></i><span class="text-sm font-medium">SST & Ergonomía</span>
                <span class='ml-auto text-[10px] px-1.5 py-0.5 rounded-full font-semibold bg-pink-500/20 text-pink-400 border border-pink-500/30'>13:29</span>
            </a>
        </nav>

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

    <!-- Main Content (Scrollable) -->
    <div class="flex-1 flex flex-col min-w-0 bg-slate-900 relative">
        <!-- Decorational background glow -->
        <div class="absolute top-0 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-[100px] pointer-events-none fixed"></div>
        
        <!-- Topbar Fija -->
        <header class="h-16 border-b border-slate-800 flex items-center justify-between px-6 bg-slate-900/90 backdrop-blur-md z-30 sticky top-0">
            <div>
                <h2 class="text-xl font-bold text-white tracking-tight" id="dynamic-title">Panel de Control Unificado VIGILA</h2>
                <p class="text-xs text-slate-400 mt-0.5" id="dynamic-subtitle">Plataforma Cloud Autónoma</p>
            </div>
            
            <div class="flex items-center gap-6">
                <div class="flex items-center gap-2 bg-slate-800/50 rounded-full px-3 py-1.5 border border-slate-700/50">
                    <i data-lucide="zap" class="w-3.5 h-3.5 text-orange-400 fill-orange-400/20"></i>
                    <span class="text-xs font-medium text-slate-300">Simular Carga: <span class="text-white">Normal</span></span>
                </div>
                <div class="flex items-center gap-2 text-xs">
                    <i data-lucide="arrow-down-circle" class="w-4 h-4 text-emerald-400"></i>
                    <span class="text-emerald-400 font-semibold">-$3,495/mes</span>
                </div>
                <div class="flex items-center gap-1.5 px-3 py-1 rounded bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 text-xs font-medium">
                    <i data-lucide="lock" class="w-3.5 h-3.5"></i> VPC Cifrada
                </div>
                <a href="{{ route('home') }}" class="text-slate-400 hover:text-white transition-colors">
                    <i data-lucide="home" class="w-4 h-4"></i>
                </a>
            </div>
        </header>

        <!-- Contenido -->
        <main class="flex-1 overflow-auto p-6 relative z-10 scroll-smooth" id="main-scroll">
            
            <!-- 1. Monitoreo -->
            <section id="monitoreo" class="scroll-mt-24 mb-16">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-white">Centro de Monitoreo de Videovigilancia</h2>
                    <p class="text-slate-400">Transmisión en tiempo real con detección inteligente y almacenamiento en AWS S3</p>
                </div>
                @include('aws.partial_monitoring')
            </section>

            <!-- 2. Cómputo -->
            <section id="computo" class="scroll-mt-24 mb-16">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-white">Optimización de Cómputo: EC2 & Auto Scaling</h2>
                    <p class="text-slate-400">Gestión elástica con procesadores AWS Graviton (ARM64) y Target Tracking</p>
                </div>
                @include('aws.partial_compute')
            </section>

            <!-- 3. Almacenamiento -->
            <section id="almacenamiento" class="scroll-mt-24 mb-16">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-white">Gestión Inteligente de Almacenamiento: Amazon S3</h2>
                    <p class="text-slate-400">Políticas automáticas de ciclo de vida (Standard -> Infrequent Access -> Glacier -> Deep Archive)</p>
                </div>
                @include('aws.partial_storage')
            </section>

            <!-- 4. RDS -->
            <section id="rds" class="scroll-mt-24 mb-16">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-white">Base de Datos Relacional: Amazon RDS & ElastiCache</h2>
                    <p class="text-slate-400">Alta disponibilidad Multi-AZ con failover automático y aceleración Redis</p>
                </div>
                @include('aws.partial_rds')
            </section>

            <!-- 5. SSM -->
            <section id="ssm" class="scroll-mt-24 mb-16">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-white">Seguridad y Gestión Operativa: AWS Systems Manager</h2>
                    <p class="text-slate-400">Terminal interactivo seguro sin puertos SSH abiertos</p>
                </div>
                @include('aws.partial_ssm')
            </section>

            <!-- 6. TCO -->
            <section id="tco" class="scroll-mt-24 mb-16">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-white">Análisis Económico TCO & Sostenibilidad Cloud</h2>
                    <p class="text-slate-400">Comparativa de costos y reducción de huella de carbono</p>
                </div>
                @include('aws.partial_tco')
            </section>

            <!-- 7. SST -->
            <section id="sst" class="scroll-mt-24 mb-16">
                <div class="section-header">
                    <h2 class="text-2xl font-bold text-white">Seguridad y Salud en el Trabajo (SST) & Ergonomía</h2>
                    <p class="text-slate-400">Prevención de fatiga visual y cumplimiento de normas (ISO 9241-5)</p>
                </div>
                @include('aws.partial_sst')
            </section>

        </main>
    </div>

    <script>
        lucide.createIcons();

        // Script para resaltar el menú lateral al hacer scroll
        const mainScroll = document.getElementById('main-scroll');
        const sections = document.querySelectorAll('section');
        const navItems = document.querySelectorAll('.nav-item');

        mainScroll.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (mainScroll.scrollTop >= sectionTop - 100) {
                    current = section.getAttribute('id');
                }
            });

            navItems.forEach(item => {
                item.classList.remove('bg-slate-800/80', 'border-l-2', 'border-blue-500', 'text-white');
                item.classList.add('text-slate-400');
                if (item.getAttribute('href') === `#${current}`) {
                    item.classList.add('bg-slate-800/80', 'border-l-2', 'border-blue-500', 'text-white');
                    item.classList.remove('text-slate-400');
                }
            });
        });
    </script>
</body>
</html>
