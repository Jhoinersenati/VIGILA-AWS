<div class="grid grid-cols-12 gap-6">
    <!-- Reglas de Ciclo de Vida -->
    <div class="col-span-12 xl:col-span-6 space-y-6">
        <div class="glass-panel p-5 relative overflow-hidden">
            <div class="flex justify-between items-center mb-6 relative z-10">
                <div>
                    <h3 class="flex items-center gap-2 text-lg font-bold text-white">
                        <i data-lucide="layers" class="text-emerald-400 w-5 h-5"></i>
                        Niveles de Almacenamiento S3
                    </h3>
                </div>
            </div>

            <!-- Barra de volumen -->
            <div class="mb-6 relative z-10">
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-slate-300 font-medium">Volumen Total: 29.9 GB</span>
                    <span class="text-white font-bold">Costo: <span class="text-emerald-400">$0.28 USD</span></span>
                </div>
                <div class="h-4 w-full bg-slate-800 rounded-full flex overflow-hidden">
                    <div class="bg-emerald-500 h-full w-[45%]" title="S3 Standard"></div>
                    <div class="bg-blue-500 h-full w-[25%]" title="Standard-IA"></div>
                    <div class="bg-purple-500 h-full w-[20%]" title="Glacier"></div>
                    <div class="bg-pink-500 h-full w-[10%]" title="Deep Archive"></div>
                </div>
            </div>

            <hr class="border-slate-700/50 mb-6">
            <div class="space-y-3 relative before:absolute before:inset-0 before:ml-2.5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-emerald-500 before:via-purple-500 before:to-transparent">
                <!-- Paso 1 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-5 h-5 rounded-full border border-white bg-emerald-500 text-white font-bold text-[10px] shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 relative">1</div>
                    <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] p-3 rounded-lg border border-emerald-500/30 bg-emerald-500/10 backdrop-blur">
                        <div class="font-bold text-emerald-400 text-xs mb-1">Día 0 a 30: S3 Standard</div>
                    </div>
                </div>
                <!-- Paso 2 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-5 h-5 rounded-full border border-slate-700 bg-blue-500 text-white font-bold text-[10px] shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 relative">2</div>
                    <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] p-3 rounded-lg border border-slate-700 bg-slate-800/50 backdrop-blur">
                        <div class="font-bold text-blue-400 text-xs mb-1">Día 31 a 90: S3 Standard-IA</div>
                    </div>
                </div>
                <!-- Paso 3 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-5 h-5 rounded-full border border-slate-700 bg-purple-500 text-white font-bold text-[10px] shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 relative">3</div>
                    <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] p-3 rounded-lg border border-slate-700 bg-slate-800/50 backdrop-blur">
                        <div class="font-bold text-purple-400 text-xs mb-1">Día 91 a 365: Glacier Flexible Retrieval</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 xl:col-span-6">
        <div class="glass-panel p-5 h-full flex flex-col">
            <h3 class="text-md font-bold text-white mb-4"><i data-lucide="folder" class="text-cyan-400 w-5 h-5 inline"></i> Explorador</h3>
            <table class="w-full text-left text-xs text-slate-300">
                <tr class="border-b border-slate-700/50">
                    <td class="py-3">rec_cam01_20261006.mp4</td>
                    <td>2.4 GB</td>
                    <td><span class="text-[10px] font-bold text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded">STANDARD</span></td>
                </tr>
                <tr class="border-b border-slate-700/50">
                    <td class="py-3">rec_cam02_20260401.mp4</td>
                    <td>6.0 GB</td>
                    <td><span class="text-[10px] font-bold text-purple-400 bg-purple-500/10 px-2 py-1 rounded border border-purple-500/30">GLACIER</span></td>
                </tr>
            </table>
        </div>
    </div>
</div>
