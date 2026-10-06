@extends('layouts.aws')

@section('title', 'SST & Ergonomía')
@section('header_title', 'Seguridad y Salud en el Trabajo (SST) & Ergonomía')
@section('header_subtitle', 'Prevención de fatiga visual y cumplimiento de normas ergonómicas (ISO 9241-5)')

@section('content')
<div class="grid grid-cols-12 gap-6 h-full min-h-[500px]">
    
    <!-- Prevención Fatiga -->
    <div class="col-span-12 xl:col-span-6 flex flex-col">
        <div class="glass-panel p-6 flex-1 flex flex-col relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-pink-500/5 to-transparent pointer-events-none"></div>
            
            <div class="flex justify-between items-center mb-8 relative z-10">
                <h3 class="flex items-center gap-2 text-md font-bold text-white">
                    <i data-lucide="eye" class="text-pink-400 w-5 h-5"></i>
                    Prevención de Fatiga Visual y Cognitiva (Regla 20-20-20)
                </h3>
                <span class="text-[10px] text-pink-400 font-mono border border-pink-500/30 px-2 py-1 rounded bg-pink-500/10">Norma ISO 9241-5</span>
            </div>

            <!-- Timer Circle -->
            <div class="flex-1 flex flex-col items-center justify-center relative z-10">
                <div class="relative w-48 h-48 rounded-full border-[6px] border-slate-700 flex items-center justify-center shadow-[0_0_30px_rgba(236,72,153,0.1)] mb-8">
                    <!-- Progress Arc (Simulated with SVG) -->
                    <svg class="absolute inset-0 w-full h-full -rotate-90 transform" viewBox="0 0 100 100">
                        <circle cx="50" cy="50" r="46" fill="none" stroke="#ec4899" stroke-width="8" stroke-dasharray="289" stroke-dashoffset="95" class="transition-all duration-1000" />
                    </svg>
                    
                    <div class="text-center z-10">
                        <div class="text-4xl font-bold text-white tracking-wider font-mono">13:29</div>
                        <div class="text-[10px] text-pink-400 font-bold uppercase tracking-widest mt-1">Próxima Pausa Activa</div>
                    </div>
                </div>

                <!-- Controls -->
                <div class="flex gap-3">
                    <button class="bg-cyan-500 hover:bg-cyan-600 text-slate-900 text-xs font-bold px-4 py-2 rounded-lg flex items-center gap-2 transition shadow-[0_0_15px_rgba(6,182,212,0.3)]">
                        <i data-lucide="play" class="w-4 h-4 fill-slate-900"></i> Iniciar Temporizador
                    </button>
                    <button class="bg-slate-700 hover:bg-slate-600 text-white text-xs font-bold px-4 py-2 rounded-lg flex items-center gap-2 transition border border-slate-600">
                        <i data-lucide="pause" class="w-4 h-4 fill-white"></i> Pausar
                    </button>
                    <button class="bg-slate-700 hover:bg-slate-600 text-white text-xs font-bold px-4 py-2 rounded-lg flex items-center gap-2 transition border border-slate-600">
                        <i data-lucide="rotate-ccw" class="w-4 h-4"></i> Reiniciar
                    </button>
                </div>
            </div>

            <!-- Info Box -->
            <div class="mt-8 bg-slate-800/60 border border-slate-700 p-4 rounded-lg relative z-10">
                <h4 class="text-xs font-bold text-yellow-400 flex items-center gap-2 mb-2">
                    <i data-lucide="help-circle" class="w-4 h-4"></i> ¿En qué consiste la Regla 20-20-20?
                </h4>
                <p class="text-[11px] text-slate-300 leading-relaxed">
                    Cada <strong class="text-white">20 minutos</strong> de observación de pantallas de videovigilancia, el operador debe mirar un objeto ubicado a <strong class="text-white">20 pies (6 metros)</strong> de distancia durante <strong class="text-white">20 segundos</strong> para relajar los músculos oculares.
                </p>
            </div>
        </div>
    </div>

    <!-- Checklist SST -->
    <div class="col-span-12 xl:col-span-6 flex flex-col">
        <div class="glass-panel p-6 flex-1 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h3 class="flex items-center gap-2 text-md font-bold text-white">
                    <i data-lucide="clipboard-check" class="text-emerald-400 w-5 h-5"></i>
                    Lista de Verificación de Seguridad y Salud en el Trabajo
                </h3>
                <span class="text-[10px] text-emerald-400 font-mono">Cumplimiento SST</span>
            </div>

            <div class="flex-1 space-y-4">
                <!-- Check 1 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4 transition hover:bg-slate-800/60">
                    <div class="mt-0.5 shrink-0 w-5 h-5 rounded flex items-center justify-center bg-emerald-500">
                        <i data-lucide="check" class="text-white w-3 h-3"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">Postura de Trabajo Ergonómica:</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Espalda recta con soporte lumbar, codos en ángulo de 90° y pies apoyados en el suelo o en un reposapiés.</p>
                    </div>
                </div>

                <!-- Check 2 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4 transition hover:bg-slate-800/60">
                    <div class="mt-0.5 shrink-0 w-5 h-5 rounded flex items-center justify-center bg-emerald-500">
                        <i data-lucide="check" class="text-white w-3 h-3"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">Alineación y Distancia de Pantallas:</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">El borde superior del monitor debe estar al nivel de los ojos a 50-70 cm de distancia. Uso de múltiples pantallas configurado para minimizar el giro del cuello.</p>
                    </div>
                </div>

                <!-- Check 3 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4 transition hover:bg-slate-800/60">
                    <div class="mt-0.5 shrink-0 w-5 h-5 rounded flex items-center justify-center bg-emerald-500">
                        <i data-lucide="check" class="text-white w-3 h-3"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">Iluminación Ambiental Adecuada:</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Evitar reflejos y brillos directos sobre la superficie de las pantallas de monitoreo. Uso de iluminación indirecta.</p>
                    </div>
                </div>

                <!-- Check 4 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4 transition hover:bg-slate-800/60">
                    <div class="mt-0.5 shrink-0 w-5 h-5 rounded flex items-center justify-center bg-emerald-500">
                        <i data-lucide="check" class="text-white w-3 h-3"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">Gestión del Estrés y "Fatiga por Alertas":</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Filtros de falsos positivos en AWS CloudWatch (IA Detection) implementados para evitar la saturación de alarmas críticas al operador.</p>
                    </div>
                </div>
            </div>

            <!-- Alert Box -->
            <div class="mt-6 bg-cyan-900/30 border-l-4 border-cyan-500 p-4 rounded flex gap-3 items-center">
                <i data-lucide="bell-ring" class="text-cyan-400 w-5 h-5 shrink-0 animate-bounce"></i>
                <p class="text-[11px] text-cyan-100/80">
                    <strong class="text-cyan-300">Notificaciones Ergonómicas Activas:</strong> El sistema alertará visualmente al operador cuando se cumpla el ciclo de trabajo continuo recomendado.
                </p>
            </div>
        </div>
    </div>

</div>
@endsection
