@extends('layouts.aws')

@section('title', 'Almacenamiento S3')
@section('header_title', 'Gestión Inteligente de Almacenamiento: Amazon S3')
@section('header_subtitle', 'Políticas automáticas de ciclo de vida (Standard -> Infrequent Access -> Glacier -> Deep Archive)')

@section('content')
<div class="grid grid-cols-12 gap-6">
    <!-- Reglas de Ciclo de Vida -->
    <div class="col-span-12 xl:col-span-6 space-y-6">
        <div class="glass-panel p-5 relative overflow-hidden">
            <div class="flex justify-between items-center mb-6 relative z-10">
                <div>
                    <h3 class="flex items-center gap-2 text-lg font-bold text-white">
                        <i data-lucide="layers" class="text-emerald-400 w-5 h-5"></i>
                        Niveles de Almacenamiento S3 <span class="text-sm font-normal text-slate-400">(vigila-recordings-prod)</span>
                    </h3>
                </div>
                <button class="bg-cyan-500/20 hover:bg-cyan-500/30 text-cyan-400 text-xs font-semibold px-4 py-2 rounded border border-cyan-500/50 flex items-center gap-2 transition">
                    <i data-lucide="play" class="w-3.5 h-3.5 fill-cyan-400"></i> Ejecutar Ciclo de Vida
                </button>
            </div>

            <!-- Barra de volumen -->
            <div class="mb-6 relative z-10">
                <div class="flex justify-between text-sm mb-2">
                    <span class="text-slate-300 font-medium">Volumen Total: 29.9 GB <span class="text-slate-500">(Escalable a TBs)</span></span>
                    <span class="text-white font-bold">Costo Mensual: <span class="text-emerald-400">$0.28 USD</span></span>
                </div>
                <div class="h-4 w-full bg-slate-800 rounded-full flex overflow-hidden">
                    <div class="bg-emerald-500 h-full w-[45%]" title="S3 Standard"></div>
                    <div class="bg-blue-500 h-full w-[25%]" title="Standard-IA"></div>
                    <div class="bg-purple-500 h-full w-[20%]" title="Glacier"></div>
                    <div class="bg-pink-500 h-full w-[10%]" title="Deep Archive"></div>
                </div>
                <div class="flex gap-4 mt-3 text-[10px] text-slate-400">
                    <div class="flex items-center gap-1"><div class="w-2 h-2 rounded-full bg-emerald-500"></div> S3 Standard ($0.023/GB)</div>
                    <div class="flex items-center gap-1"><div class="w-2 h-2 rounded-full bg-blue-500"></div> Standard-IA ($0.0125/GB)</div>
                    <div class="flex items-center gap-1"><div class="w-2 h-2 rounded-full bg-purple-500"></div> Glacier Flex ($0.004/GB)</div>
                    <div class="flex items-center gap-1"><div class="w-2 h-2 rounded-full bg-pink-500"></div> Deep Archive ($0.00099/GB)</div>
                </div>
            </div>

            <hr class="border-slate-700/50 mb-6">

            <h4 class="flex items-center gap-2 text-sm font-bold text-white mb-4">
                <i data-lucide="git-merge" class="text-slate-400 w-4 h-4"></i> Flujo Automatizado de Reglas de Ciclo de Vida:
            </h4>

            <div class="space-y-3 relative before:absolute before:inset-0 before:ml-2.5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-emerald-500 before:via-purple-500 before:to-transparent">
                <!-- Paso 1 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-5 h-5 rounded-full border border-white bg-emerald-500 text-white font-bold text-[10px] shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 relative">1</div>
                    <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] p-3 rounded-lg border border-emerald-500/30 bg-emerald-500/10 backdrop-blur">
                        <div class="font-bold text-emerald-400 text-xs mb-1">Día 0 a 30: Amazon S3 Standard</div>
                        <div class="text-[10px] text-slate-300 leading-tight">Acceso instantáneo para monitoreo en vivo y revisión de incidentes recientes.</div>
                    </div>
                </div>
                <!-- Paso 2 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-5 h-5 rounded-full border border-slate-700 bg-blue-500 text-white font-bold text-[10px] shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 relative">2</div>
                    <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] p-3 rounded-lg border border-slate-700 bg-slate-800/50 backdrop-blur">
                        <div class="font-bold text-blue-400 text-xs mb-1">Día 31 a 90: S3 Standard-IA</div>
                        <div class="text-[10px] text-slate-400 leading-tight">Transición automática. Reduce el costo de almacenamiento en un 45%.</div>
                    </div>
                </div>
                <!-- Paso 3 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-5 h-5 rounded-full border border-slate-700 bg-purple-500 text-white font-bold text-[10px] shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 relative">3</div>
                    <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] p-3 rounded-lg border border-slate-700 bg-slate-800/50 backdrop-blur">
                        <div class="font-bold text-purple-400 text-xs mb-1">Día 91 a 365: S3 Glacier Flexible Retrieval</div>
                        <div class="text-[10px] text-slate-400 leading-tight">Archivo histórico para reclamos. 82% de ahorro en GB/mes.</div>
                    </div>
                </div>
                <!-- Paso 4 -->
                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                    <div class="flex items-center justify-center w-5 h-5 rounded-full border border-slate-700 bg-pink-500 text-white font-bold text-[10px] shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 relative">4</div>
                    <div class="w-[calc(100%-2rem)] md:w-[calc(50%-1.5rem)] p-3 rounded-lg border border-slate-700 bg-slate-800/50 backdrop-blur">
                        <div class="font-bold text-pink-400 text-xs mb-1">>365 días: S3 Glacier Deep Archive & Expiración</div>
                        <div class="text-[10px] text-slate-400 leading-tight">Retención legal a $0.00099/GB y posterior eliminación segura.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Explorador de Archivos -->
    <div class="col-span-12 xl:col-span-6">
        <div class="glass-panel p-5 h-full flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h3 class="flex items-center gap-2 text-md font-bold text-white">
                    <i data-lucide="folder" class="text-cyan-400 w-5 h-5"></i>
                    Explorador de Grabaciones de Video
                </h3>
                <button class="text-xs text-slate-300 hover:text-white flex items-center gap-1">
                    <i data-lucide="upload-cloud" class="w-4 h-4"></i> Subir Grabación Demo
                </button>
            </div>

            <div class="flex-1 overflow-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-[10px] uppercase text-slate-500 border-b border-slate-700">
                            <th class="pb-2 font-medium">Archivo de Video</th>
                            <th class="pb-2 font-medium">Antigüedad</th>
                            <th class="pb-2 font-medium">Tamaño</th>
                            <th class="pb-2 font-medium">Nivel de Almacenamiento</th>
                            <th class="pb-2 font-medium text-right">Costo Est. / Mes</th>
                        </tr>
                    </thead>
                    <tbody class="text-xs text-slate-300">
                        <!-- Archivo Reciente -->
                        <tr class="border-b border-slate-700/50 hover:bg-slate-800/30 transition">
                            <td class="py-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="video" class="w-4 h-4 text-emerald-400"></i>
                                    <span class="font-mono text-white">rec_cam01_20261006_0900.mp4</span>
                                </div>
                            </td>
                            <td class="py-3">2 horas<br><span class="text-[10px] text-slate-500">(Hoy)</span></td>
                            <td class="py-3">2.4 GB</td>
                            <td class="py-3"><span class="text-[10px] font-bold text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded">STANDARD</span></td>
                            <td class="py-3 text-right font-mono">$0.055<br>USD</td>
                        </tr>
                        <!-- Archivo Reciente -->
                        <tr class="border-b border-slate-700/50 hover:bg-slate-800/30 transition">
                            <td class="py-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="video" class="w-4 h-4 text-emerald-400"></i>
                                    <span class="font-mono text-white">rec_cam02_20261006_0800.mp4</span>
                                </div>
                            </td>
                            <td class="py-3">3 horas<br><span class="text-[10px] text-slate-500">(Hoy)</span></td>
                            <td class="py-3">3.1 GB</td>
                            <td class="py-3"><span class="text-[10px] font-bold text-emerald-400 bg-emerald-500/10 px-2 py-1 rounded">STANDARD</span></td>
                            <td class="py-3 text-right font-mono">$0.071<br>USD</td>
                        </tr>
                        <!-- Archivo IA -->
                        <tr class="border-b border-slate-700/50 hover:bg-slate-800/30 transition">
                            <td class="py-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="file-video" class="w-4 h-4 text-blue-400"></i>
                                    <span class="font-mono text-white">rec_cam03_20260905_1420.mp4</span>
                                </div>
                            </td>
                            <td class="py-3">31 días<br><span class="text-[10px] text-slate-500">atrás</span></td>
                            <td class="py-3">4.8 GB</td>
                            <td class="py-3"><span class="text-[10px] font-bold text-blue-400 bg-blue-500/10 px-2 py-1 rounded">STANDARD_IA</span></td>
                            <td class="py-3 text-right font-mono">$0.060<br>USD</td>
                        </tr>
                        <!-- Archivo IA -->
                        <tr class="border-b border-slate-700/50 hover:bg-slate-800/30 transition">
                            <td class="py-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="file-video" class="w-4 h-4 text-blue-400"></i>
                                    <span class="font-mono text-white">rec_cam04_20260812_2210.mp4</span>
                                </div>
                            </td>
                            <td class="py-3">55 días<br><span class="text-[10px] text-slate-500">atrás</span></td>
                            <td class="py-3">3.9 GB</td>
                            <td class="py-3"><span class="text-[10px] font-bold text-blue-400 bg-blue-500/10 px-2 py-1 rounded">STANDARD_IA</span></td>
                            <td class="py-3 text-right font-mono">$0.048<br>USD</td>
                        </tr>
                        <!-- Archivo Glacier -->
                        <tr class="border-b border-slate-700/50 hover:bg-slate-800/30 transition">
                            <td class="py-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="archive" class="w-4 h-4 text-purple-400"></i>
                                    <span class="font-mono text-slate-400">rec_cam01_20260610_1100.mp4</span>
                                </div>
                            </td>
                            <td class="py-3">118 días<br><span class="text-[10px] text-slate-500">atrás</span></td>
                            <td class="py-3">5.2 GB</td>
                            <td class="py-3"><span class="text-[10px] font-bold text-purple-400 bg-purple-500/10 px-2 py-1 rounded border border-purple-500/30">GLACIER</span></td>
                            <td class="py-3 text-right font-mono text-purple-400">$0.020<br>USD</td>
                        </tr>
                        <!-- Archivo Glacier -->
                        <tr class="hover:bg-slate-800/30 transition">
                            <td class="py-3">
                                <div class="flex items-center gap-2">
                                    <i data-lucide="archive" class="w-4 h-4 text-purple-400"></i>
                                    <span class="font-mono text-slate-400">rec_cam02_20260401_0800.mp4</span>
                                </div>
                            </td>
                            <td class="py-3">188 días<br><span class="text-[10px] text-slate-500">atrás</span></td>
                            <td class="py-3">6.0 GB</td>
                            <td class="py-3"><span class="text-[10px] font-bold text-purple-400 bg-purple-500/10 px-2 py-1 rounded border border-purple-500/30">GLACIER</span></td>
                            <td class="py-3 text-right font-mono text-purple-400">$0.024<br>USD</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4 p-2 bg-emerald-500/10 border border-emerald-500/30 rounded text-center text-[10px] text-emerald-400 font-mono">
                Cifrado del Bucket: AWS KMS (SSE-KMS - Key: arn:aws:kms:us-east-1:vigila-s3-key)
            </div>
        </div>
    </div>
</div>
@endsection
