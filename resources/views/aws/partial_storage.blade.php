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
            <h3 class="text-md font-bold text-white mb-4"><i data-lucide="folder" class="text-cyan-400 w-5 h-5 inline"></i> Explorador S3 (Simulado)</h3>
            
            <form action="{{ route('aws.videos.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4 bg-slate-800/50 p-3 rounded border border-slate-700 flex flex-wrap gap-3 items-center">
                @csrf
                <input type="file" name="video" accept="video/*" required class="flex-1 min-w-[150px] text-xs text-slate-300 file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-cyan-500/20 file:text-cyan-400 hover:file:bg-cyan-500/30 cursor-pointer">
                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold px-4 py-2 rounded-full flex items-center gap-2 transition shadow-[0_0_15px_rgba(16,185,129,0.3)]">
                    <i data-lucide="upload-cloud" class="w-4 h-4"></i> Subir Grabación
                </button>
            </form>

            @if(session('success'))
                <div class="bg-emerald-500/20 border border-emerald-500/50 text-emerald-400 px-3 py-2 rounded-lg text-xs mb-4 flex items-center gap-2">
                    <i data-lucide="check-circle" class="w-4 h-4"></i> {{ session('success') }}
                </div>
            @endif

            <div class="flex-1 overflow-auto max-h-[250px] pr-2">
                <table class="w-full text-left text-xs text-slate-300">
                    <thead class="text-slate-500 sticky top-0 bg-slate-900/90 backdrop-blur z-10 text-[10px] uppercase">
                        <tr>
                            <th class="py-2 pb-3 font-bold">Archivo de Video</th>
                            <th class="pb-3 font-bold">Fecha / Hora</th>
                            <th class="pb-3 font-bold">Tamaño</th>
                            <th class="pb-3 font-bold">Clase Storage</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-700/50">
                        @forelse($videos as $video)
                            <tr class="hover:bg-slate-800/50 transition">
                                <td class="py-3 flex items-center gap-2">
                                    <i data-lucide="video" class="w-4 h-4 text-cyan-400"></i>
                                    <span class="truncate max-w-[120px]" title="{{ $video->original_name }}">{{ $video->original_name }}</span>
                                </td>
                                <td class="py-3 text-slate-400">{{ $video->recorded_at ? \Carbon\Carbon::parse($video->recorded_at)->format('d/m/Y H:i') : \Carbon\Carbon::parse($video->created_at)->format('d/m/Y H:i') }}</td>
                                <td class="py-3 text-slate-400">{{ number_format($video->size_bytes / 1048576, 2) }} MB</td>
                                <td class="py-3">
                                    <span class="text-[9px] font-bold text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded border border-emerald-500/30">{{ $video->storage_class }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-8 text-slate-500">
                                    <i data-lucide="inbox" class="w-8 h-8 mx-auto mb-2 opacity-50"></i>
                                    El bucket está vacío. Sube un video de prueba.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
