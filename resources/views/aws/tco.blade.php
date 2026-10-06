@extends('layouts.aws')

@section('title', 'Costos TCO & Sostenibilidad')
@section('header_title', 'Análisis Económico TCO & Sostenibilidad Cloud')
@section('header_subtitle', 'Comparativa de costos antes vs. después, dimensionamiento y reducción de huella de carbono')

@section('content')
<div class="grid grid-cols-12 gap-6 h-full min-h-[500px]">
    
    <!-- TCO Calculator -->
    <div class="col-span-12 xl:col-span-6 flex flex-col">
        <div class="glass-panel p-6 flex-1 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h3 class="flex items-center gap-2 text-md font-bold text-white">
                    <i data-lucide="calculator" class="text-cyan-400 w-5 h-5"></i>
                    Calculadora de Ahorro TCO & Dimensionamiento
                </h3>
                <span class="text-[10px] text-emerald-400 font-mono border border-emerald-500/30 px-2 py-1 rounded bg-emerald-500/10">Ahorro: ~59.2%</span>
            </div>

            <!-- Sliders -->
            <div class="space-y-6 mb-8">
                <div>
                    <div class="flex justify-between text-sm mb-2 text-slate-300 font-bold">
                        <span class="flex items-center gap-2"><i data-lucide="video" class="w-4 h-4 text-slate-400"></i> Número de Cámaras Conectadas:</span>
                        <span class="text-cyan-400">50 Cámaras</span>
                    </div>
                    <input type="range" min="10" max="500" value="50" class="w-full h-1.5 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-cyan-400">
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-2 text-slate-300 font-bold">
                        <span class="flex items-center gap-2"><i data-lucide="clock" class="w-4 h-4 text-slate-400"></i> Retención de Grabaciones:</span>
                        <span class="text-cyan-400">90 Días</span>
                    </div>
                    <input type="range" min="30" max="365" value="90" class="w-full h-1.5 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-cyan-400">
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-2 text-slate-300 font-bold">
                        <span class="flex items-center gap-2"><i data-lucide="monitor" class="w-4 h-4 text-slate-400"></i> Resolución de Video:</span>
                        <span class="text-cyan-400">1080p Full HD (30 FPS)</span>
                    </div>
                    <input type="range" min="1" max="3" value="2" class="w-full h-1.5 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-cyan-400">
                </div>
            </div>

            <!-- Comparative Cards -->
            <div class="grid grid-cols-2 gap-4 flex-1">
                <!-- Antes -->
                <div class="border border-slate-700 bg-slate-800/50 p-4 rounded-lg flex flex-col justify-between relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-pink-500"></div>
                    <div>
                        <h4 class="text-[10px] font-bold text-pink-400 uppercase tracking-wider mb-2">Arquitectura Anterior <span class="text-slate-400 lowercase">(x86 On-Demand)</span></h4>
                        <div class="text-2xl font-bold text-white mb-3">$4,814.00 <span class="text-sm text-slate-500 font-normal">/mes</span></div>
                        <p class="text-[11px] text-slate-400 leading-tight">EC2 x86 sin auto-scaling, S3 Standard sin ciclo de vida, base de datos sobredimensionada.</p>
                    </div>
                </div>

                <!-- Después -->
                <div class="border border-emerald-500/50 bg-emerald-900/20 p-4 rounded-lg flex flex-col justify-between relative overflow-hidden shadow-[0_0_15px_rgba(16,185,129,0.1)]">
                    <div class="absolute top-0 left-0 w-full h-1 bg-emerald-500"></div>
                    <div>
                        <h4 class="text-[10px] font-bold text-emerald-400 uppercase tracking-wider mb-2">Arquitectura VIGILA AWS <span class="text-white lowercase">(Propuesta)</span></h4>
                        <div class="text-2xl font-bold text-emerald-400 mb-3">$2,026.80 <span class="text-sm text-emerald-600 font-normal">/mes</span></div>
                        <p class="text-[11px] text-emerald-200/70 leading-tight">Graviton3 + Auto Scaling + S3 Lifecycle + ElastiCache + Savings Plans.</p>
                    </div>
                </div>
            </div>

            <!-- Total Savings Box -->
            <div class="mt-4 bg-gradient-to-r from-yellow-500/20 to-transparent border border-yellow-500/30 p-4 rounded-lg flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-yellow-500/20 flex items-center justify-center border border-yellow-500/50 shadow-[0_0_15px_rgba(234,179,8,0.3)]">
                    <i data-lucide="award" class="text-yellow-400 w-6 h-6"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white">Ahorro Anual Proyectado para VIGILA:</h4>
                    <div class="text-2xl font-bold text-yellow-400 drop-shadow-md">$33,446.40 USD / año</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sustainability -->
    <div class="col-span-12 xl:col-span-6 flex flex-col">
        <div class="glass-panel p-6 flex-1 flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h3 class="flex items-center gap-2 text-md font-bold text-white">
                    <i data-lucide="leaf" class="text-emerald-400 w-5 h-5"></i>
                    Pilar de Sostenibilidad AWS (Huella de Carbono)
                </h3>
                <span class="text-[10px] text-emerald-400 font-mono">AWS Green Cloud</span>
            </div>

            <div class="flex gap-4 mb-8">
                <!-- Card 1 -->
                <div class="flex-1 bg-slate-800/40 border border-slate-700 p-4 rounded-lg flex gap-3 items-start">
                    <i data-lucide="zap" class="w-6 h-6 text-orange-400 shrink-0"></i>
                    <div>
                        <h4 class="text-[10px] font-bold text-slate-400 uppercase">Reducción de Consumo Energético</h4>
                        <div class="text-xl font-bold text-white my-1">-60% kWh</div>
                        <p class="text-[10px] text-slate-500 leading-tight">Por uso de chips AWS Graviton basados en arquitectura ARM eficiente.</p>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="flex-1 bg-slate-800/40 border border-slate-700 p-4 rounded-lg flex gap-3 items-start">
                    <i data-lucide="cloud-rain" class="w-6 h-6 text-emerald-400 shrink-0"></i>
                    <div>
                        <h4 class="text-[10px] font-bold text-slate-400 uppercase">Reducción Estimada de CO2</h4>
                        <div class="text-xl font-bold text-emerald-400 my-1">1,840 kg CO2 / año</div>
                        <p class="text-[10px] text-slate-500 leading-tight">Equivalente a plantar 85 árboles anualmente.</p>
                    </div>
                </div>
            </div>

            <!-- Bar Chart Comparativa -->
            <div class="flex-1 border border-slate-700 bg-slate-900/50 rounded-lg p-4 flex flex-col">
                <div class="flex justify-end gap-4 mb-4 text-[10px] text-slate-300">
                    <div class="flex items-center gap-1"><div class="w-3 h-3 bg-pink-500"></div> Antes (Arquitectura Inicial)</div>
                    <div class="flex items-center gap-1"><div class="w-3 h-3 bg-emerald-500"></div> Después (Propuesta VIGILA AWS)</div>
                </div>

                <div class="flex-1 relative flex items-end justify-around pt-6 pb-6 px-4">
                    <!-- Y-axis marks -->
                    <div class="absolute left-2 top-0 bottom-6 flex flex-col justify-between text-[9px] text-slate-500">
                        <span>5,000</span><span>4,000</span><span>3,000</span><span>2,000</span><span>1,000</span><span>0</span>
                    </div>

                    <!-- Grids -->
                    <div class="absolute left-10 right-4 top-[10%] border-t border-slate-700/50"></div>
                    <div class="absolute left-10 right-4 top-[30%] border-t border-slate-700/50"></div>
                    <div class="absolute left-10 right-4 top-[50%] border-t border-slate-700/50"></div>
                    <div class="absolute left-10 right-4 top-[70%] border-t border-slate-700/50"></div>
                    <div class="absolute left-10 right-4 top-[90%] border-t border-slate-700"></div>

                    <!-- Data Pairs -->
                    <!-- Cómputo -->
                    <div class="flex items-end gap-1 z-10 w-16 justify-center h-[90%]">
                        <div class="w-6 bg-pink-500 rounded-t" style="height: 65%;"></div>
                        <div class="w-6 bg-emerald-500 rounded-t" style="height: 25%;"></div>
                    </div>
                    <!-- Almacenamiento -->
                    <div class="flex items-end gap-1 z-10 w-16 justify-center h-[90%]">
                        <div class="w-6 bg-pink-500 rounded-t" style="height: 20%;"></div>
                        <div class="w-6 bg-emerald-500 rounded-t" style="height: 5%;"></div>
                    </div>
                    <!-- RDS -->
                    <div class="flex items-end gap-1 z-10 w-16 justify-center h-[90%]">
                        <div class="w-6 bg-pink-500 rounded-t" style="height: 15%;"></div>
                        <div class="w-6 bg-emerald-500 rounded-t" style="height: 8%;"></div>
                    </div>
                    <!-- Total -->
                    <div class="flex items-end gap-1 z-10 w-16 justify-center h-[90%]">
                        <div class="w-6 bg-pink-500 rounded-t" style="height: 100%;"></div>
                        <div class="w-6 bg-emerald-500 rounded-t" style="height: 38%;"></div>
                    </div>
                </div>

                <!-- X-axis Labels -->
                <div class="flex justify-around pl-6 text-[10px] text-slate-400 font-bold">
                    <div class="w-16 text-center">Cómputo EC2</div>
                    <div class="w-16 text-center">Almacenamiento S3</div>
                    <div class="w-16 text-center">Base de Datos RDS</div>
                    <div class="w-16 text-center">Total Mensual</div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
