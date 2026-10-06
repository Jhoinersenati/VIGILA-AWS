<div class="grid grid-cols-12 gap-6">
    <!-- Topología y Nodos -->
    <div class="col-span-12 lg:col-span-7 space-y-6">
        <div class="glass-panel p-5">
            <div class="flex justify-between items-start mb-6">
                <div>
                    <h3 class="flex items-center gap-2 text-lg font-bold text-white">
                        <i data-lucide="layers" class="text-emerald-400 w-5 h-5"></i>
                        Topología del Auto Scaling Group (VIGILA-ASG-Prod)
                    </h3>
                    <p class="text-xs text-slate-400 mt-1">Target Tracking: 65% CPU</p>
                </div>
                <div class="flex gap-6 text-sm">
                    <div>
                        <div class="text-slate-400 text-xs">Instancias Activas</div>
                        <div class="font-bold text-white text-xl">3</div>
                    </div>
                    <div>
                        <div class="text-slate-400 text-xs">Capacidad Min/Max</div>
                        <div class="font-bold text-white text-xl">2 / 12</div>
                    </div>
                    <div>
                        <div class="text-slate-400 text-xs">Tipo de Chip</div>
                        <div class="font-bold text-cyan-400 text-lg leading-tight">AWS<br>Graviton3</div>
                    </div>
                </div>
            </div>

            <!-- Nodos -->
            <div class="space-y-4">
                <!-- Nodo 1 -->
                <div class="bg-slate-800/50 border border-slate-700 p-4 rounded-lg flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="font-mono text-sm font-bold text-white">i-0a8172c9...</span>
                            <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 text-[10px] px-2 py-0.5 rounded-full">us-east-1a</span>
                        </div>
                        <div class="text-xs text-cyan-400 font-medium mb-3">c7g.large (Video Ingestion Worker)</div>
                        <div class="w-full bg-slate-900 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-orange-400 h-1.5 rounded-full" style="width: 38%"></div>
                        </div>
                        <div class="flex justify-between mt-1 text-[10px] text-slate-400">
                            <span>CPU: 38%</span>
                            <span>$0.051/h</span>
                        </div>
                    </div>
                    <div class="ml-6 flex items-center justify-center p-3 bg-slate-900 rounded-full border border-slate-700">
                        <i data-lucide="cpu" class="w-6 h-6 text-emerald-400"></i>
                    </div>
                </div>
                <!-- Nodo 2 -->
                <div class="bg-slate-800/50 border border-slate-700 p-4 rounded-lg flex items-center justify-between">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <span class="font-mono text-sm font-bold text-white">i-0f94318c...</span>
                            <span class="bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 text-[10px] px-2 py-0.5 rounded-full">us-east-1b</span>
                        </div>
                        <div class="text-xs text-cyan-400 font-medium mb-3">c7g.large (FFmpeg Transcoder)</div>
                        <div class="w-full bg-slate-900 rounded-full h-1.5 overflow-hidden">
                            <div class="bg-orange-400 h-1.5 rounded-full" style="width: 44%"></div>
                        </div>
                        <div class="flex justify-between mt-1 text-[10px] text-slate-400">
                            <span>CPU: 44%</span>
                            <span>$0.051/h</span>
                        </div>
                    </div>
                    <div class="ml-6 flex items-center justify-center p-3 bg-slate-900 rounded-full border border-slate-700">
                        <i data-lucide="cpu" class="w-6 h-6 text-emerald-400"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gráficos y Detalles -->
    <div class="col-span-12 lg:col-span-5 space-y-6">
        <div class="glass-panel p-5">
            <h3 class="flex items-center justify-between text-sm font-bold text-white mb-4">
                <span class="flex items-center gap-2"><i data-lucide="bar-chart-2" class="text-cyan-400 w-4 h-4"></i> Consumo CPU (%)</span>
                <span class="text-cyan-400 text-xs">43%</span>
            </h3>
            <div class="h-48 border-b border-l border-slate-700 relative">
                <!-- Fake Graph SVG -->
                <svg class="w-full h-full absolute inset-0 z-10" preserveAspectRatio="none" viewBox="0 0 100 100">
                    <polyline fill="none" stroke="#22d3ee" stroke-width="2" points="0,60 10,62 20,58 30,60 40,59 50,57 60,58 70,59 80,58 90,61 100,60"/>
                    <polyline fill="rgba(34, 211, 238, 0.1)" stroke="none" points="0,100 0,60 10,62 20,58 30,60 40,59 50,57 60,58 70,59 80,58 90,61 100,60 100,100"/>
                </svg>
            </div>
        </div>
    </div>
</div>
