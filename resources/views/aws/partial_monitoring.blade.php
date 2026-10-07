<div class="flex items-center justify-between mb-4">
    <div class="flex items-center gap-4">
        <button class="bg-cyan-500/20 border border-cyan-500/50 text-cyan-400 px-4 py-1.5 rounded-full text-xs font-semibold flex items-center gap-2 shadow-[0_0_10px_rgba(6,182,212,0.2)]">
            <i data-lucide="brain" class="w-3.5 h-3.5"></i> IA Detección: ACTIVADA
        </button>
        <div class="flex items-center gap-2 text-slate-300 text-sm font-medium">
            <div class="w-2.5 h-2.5 rounded-full bg-white animate-pulse"></div>
            Forzar Grabación a S3
        </div>
    </div>
    <div class="flex items-center gap-4 text-xs font-medium text-slate-400">
        <div class="flex items-center gap-1"><i data-lucide="activity" class="w-3.5 h-3.5 text-blue-400"></i> Latencia: <span class="text-white">24 ms</span></div>
        <div class="flex items-center gap-1"><i data-lucide="zap" class="w-3.5 h-3.5 text-orange-400"></i> Throughput: <span class="text-white">14.8 MB/s</span></div>
        <div class="flex items-center gap-1"><i data-lucide="video" class="w-3.5 h-3.5 text-slate-500"></i> Códec: <span class="text-white">H.265 / HEVC</span></div>
    </div>
</div>

<div class="grid grid-cols-2 gap-4 h-[500px]">
    <!-- Cam 1 -->
    <div class="glass-panel relative overflow-hidden group flex flex-col">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PGRlZnM+PHBhdHRlcm4gaWQ9ImciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBoNDBWMHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAyKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2cpIi8+PC9zdmc+')] z-0"></div>
        <div class="p-3 flex justify-between items-center z-10 border-b border-slate-700/50 bg-slate-900/50">
            <div class="flex items-center gap-2">
                <span class="bg-red-500/20 text-red-500 border border-red-500/50 text-[10px] px-1.5 py-0.5 rounded font-bold">REC</span>
                <span class="text-sm font-semibold text-white">CAM 01 - Entrada Principal</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="neon-text-green text-xs font-bold font-mono">30 FPS</span>
                <i data-lucide="maximize" class="w-3.5 h-3.5 text-slate-400 cursor-pointer hover:text-white"></i>
            </div>
        </div>
        <div class="flex-1 relative z-10 flex items-center justify-center p-4">
            <div class="absolute top-2 left-2 text-xs font-mono text-white/70">{{ now()->format('H:i:s') }}.5</div>
            <div class="absolute top-2 right-2 bg-red-500 text-white text-[10px] px-2 py-1 rounded-full flex items-center gap-1 font-bold animate-pulse shadow-[0_0_10px_rgba(239,68,68,0.5)]">
                <i data-lucide="user" class="w-3 h-3"></i> Movimiento Detectado
            </div>
            <!-- Simulación de cámara -->
            <div class="w-full h-full border border-cyan-500/30 rounded flex items-center justify-center relative overflow-hidden bg-black">
                
                <!-- Video Real CCTV de Fondo (YouTube Autoplay) -->
                <div class="absolute inset-0 z-0 opacity-50 grayscale pointer-events-none">
                    <!-- Se escala al 150% para ocultar los bordes negros y el logo de YouTube -->
                    <iframe class="w-[150%] h-[150%] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" 
                            src="https://www.youtube.com/embed/u3FjeC9Wvj4?autoplay=1&mute=1&controls=0&loop=1&playlist=u3FjeC9Wvj4&showinfo=0&modestbranding=1&rel=0" 
                            frameborder="0" allow="autoplay; encrypted-media">
                    </iframe>
                </div>

                <style>
                    @keyframes scan-laser {
                        0% { top: -5%; opacity: 0; }
                        15% { opacity: 1; }
                        85% { opacity: 1; }
                        100% { top: 105%; opacity: 0; }
                    }
                </style>
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-48 border-2 border-cyan-400 shadow-[0_0_15px_rgba(34,211,238,0.3)] bg-cyan-400/20 flex flex-col items-center justify-start pt-1 overflow-hidden z-10 backdrop-blur-[1px]">
                    <div class="absolute top-0 left-0 bg-cyan-400 text-slate-900 text-[10px] font-bold px-1 mb-1 z-20">PERSON 99%</div>
                    
                    <!-- Láser de Escaneo IA -->
                    <div class="absolute left-0 right-0 h-[2px] bg-cyan-300 shadow-[0_0_10px_3px_rgba(34,211,238,0.8)] z-20 animate-[scan-laser_2s_ease-in-out_infinite]"></div>

                    <!-- Wireframe simulación -->
                    <div class="w-16 h-16 rounded-full border border-cyan-400/70 mb-2 mt-4 z-10 opacity-80"></div>
                    <div class="w-20 h-24 border border-cyan-400/70 rounded-t-lg z-10 opacity-80"></div>
                </div>
            </div>
        </div>
        <div class="p-2 border-t border-slate-700/50 bg-slate-900/50 flex justify-between items-center z-10 text-[10px] text-slate-400 font-mono">
            <span class="flex items-center gap-1"><div class="w-1.5 h-1.5 rounded-full bg-emerald-400"></div> Graviton Node #1</span>
            <span class="flex items-center gap-1"><i data-lucide="cloud" class="w-3 h-3 text-cyan-400"></i> S3 Standard</span>
        </div>
    </div>

    <!-- Cam 2 -->
    <div class="glass-panel relative overflow-hidden group flex flex-col">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCI+PGRlZnM+PHBhdHRlcm4gaWQ9ImciIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIgcGF0dGVyblVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PHBhdGggZD0iTTAgNDBoNDBWMHoiIGZpbGw9Im5vbmUiIHN0cm9rZT0icmdiYSgyNTUsMjU1LDI1NSwwLjAyKSIgc3Ryb2tlLXdpZHRoPSIxIi8+PC9wYXR0ZXJuPjwvZGVmcz48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2cpIi8+PC9zdmc+')] z-0"></div>
        <div class="p-3 flex justify-between items-center z-10 border-b border-slate-700/50 bg-slate-900/50">
            <div class="flex items-center gap-2">
                <span class="bg-red-500/20 text-red-500 border border-red-500/50 text-[10px] px-1.5 py-0.5 rounded font-bold">REC</span>
                <span class="text-sm font-semibold text-white">CAM 02 - Data Center</span>
            </div>
            <div class="flex items-center gap-2">
                <span class="neon-text-green text-xs font-bold font-mono">30 FPS</span>
                <i data-lucide="maximize" class="w-3.5 h-3.5 text-slate-400 cursor-pointer hover:text-white"></i>
            </div>
        </div>
        <div class="flex-1 relative z-10 flex items-center justify-center p-4">
            <div class="absolute top-2 left-2 text-xs font-mono text-white/70">{{ now()->format('H:i:s') }}.5</div>
            <div class="absolute top-2 right-2 bg-emerald-500/20 text-emerald-400 border border-emerald-500/50 text-[10px] px-2 py-1 rounded-full flex items-center gap-1 font-bold">
                <i data-lucide="check-circle" class="w-3 h-3"></i> Zona Segura
            </div>
            <!-- Simulación Data Center -->
            <div class="w-full h-full flex items-center justify-center gap-8 relative">
                @for($i=0; $i<4; $i++)
                <div class="w-16 h-40 bg-slate-800 border-2 {{ $i > 0 ? 'border-emerald-500 shadow-[0_0_15px_rgba(16,185,129,0.2)] bg-emerald-900/20' : 'border-slate-700' }} rounded flex flex-col justify-around py-2 items-center relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-white/5 to-transparent bg-[length:100%_200%] animate-[scan_3s_ease-in-out_infinite]"></div>
                    @for($j=0; $j<6; $j++)
                        <div class="w-12 h-2 flex gap-1">
                            <div class="h-full w-full {{ $i > 0 ? 'bg-emerald-400' : 'bg-slate-600' }} rounded-sm"></div>
                            <div class="h-full w-full {{ $i > 0 ? 'bg-emerald-400' : 'bg-slate-600' }} rounded-sm"></div>
                        </div>
                    @endfor
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
