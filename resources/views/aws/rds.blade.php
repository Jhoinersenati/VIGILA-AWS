@extends('layouts.aws')

@section('title', 'Amazon RDS')
@section('header_title', 'Base de Datos Relacional: Amazon RDS & ElastiCache')
@section('header_subtitle', 'Alta disponibilidad Multi-AZ con failover automático y aceleración Redis')

@section('content')
<div class="grid grid-cols-12 gap-6">
    <!-- Arquitectura RDS -->
    <div class="col-span-12 lg:col-span-7 space-y-6">
        <div class="glass-panel p-5 relative overflow-hidden h-full flex flex-col">
            <div class="flex justify-between items-center mb-8 relative z-10">
                <h3 class="flex items-center gap-2 text-lg font-bold text-white">
                    <i data-lucide="database" class="text-emerald-400 w-5 h-5"></i>
                    Topología Amazon RDS PostgreSQL (Multi-AZ)
                </h3>
                <button class="bg-red-500/10 hover:bg-red-500/20 text-red-400 text-xs font-semibold px-3 py-1.5 rounded border border-red-500/30 flex items-center gap-2 transition shadow-[0_0_10px_rgba(239,68,68,0.1)]">
                    <i data-lucide="alert-triangle" class="w-3.5 h-3.5"></i> Simular Caída Primaria (Failover)
                </button>
            </div>

            <!-- Diagrama Multi-AZ -->
            <div class="flex-1 flex items-center justify-center gap-8 relative z-10 px-4">
                
                <!-- PRIMARY DB -->
                <div class="w-64 bg-slate-800/80 border-2 border-emerald-500 rounded-xl p-4 shadow-[0_0_30px_rgba(16,185,129,0.15)] relative">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-emerald-500 text-slate-900 text-[10px] font-bold px-3 py-0.5 rounded-full uppercase tracking-wider">
                        Primary (Writer)
                    </div>
                    
                    <div class="flex justify-center my-4">
                        <div class="w-16 h-16 bg-cyan-400/20 rounded-lg border-2 border-cyan-400 flex flex-col items-center justify-center gap-1 shadow-[0_0_15px_rgba(34,211,238,0.2)]">
                            <div class="w-8 h-2 bg-cyan-400 rounded-sm"></div>
                            <div class="w-8 h-2 bg-cyan-400 rounded-sm"></div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-3">
                        <h4 class="text-white font-bold text-sm font-mono">vigila-db-instance-1</h4>
                        <div class="flex items-center justify-center gap-1 text-[10px] text-slate-400 mt-1">
                            <i data-lucide="map-pin" class="w-3 h-3"></i> AZ: us-east-1a
                        </div>
                    </div>
                    
                    <div class="bg-slate-900 rounded p-2 text-center text-[10px] text-slate-400 mb-4">
                        <div>IOPS: 3,000 (gp3)</div>
                        <div>Conexiones: 142</div>
                    </div>
                    
                    <div class="bg-emerald-500/20 border border-emerald-500/50 text-emerald-400 text-xs font-bold py-1.5 text-center rounded">
                        OPERATIVO
                    </div>
                </div>

                <!-- Flechas Sincronización -->
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full h-0.5 bg-blue-500/50 relative flex items-center">
                        <div class="absolute inset-0 bg-blue-400 animate-pulse"></div>
                        <div class="w-full h-full bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMCIgaGVpZ2h0PSIyIj48cmVjdCB3aWR0aD0iNSIgaGVpZ2h0PSIyIiBmaWxsPSIjMDY4YmI5Ii8+PC9zdmc+')] animate-[slide_1s_linear_infinite]"></div>
                    </div>
                    <div class="flex items-center gap-1 text-[10px] text-blue-400 font-medium bg-slate-900 px-2 py-0.5 rounded-full border border-blue-500/30 mt-2">
                        <i data-lucide="refresh-cw" class="w-3 h-3 animate-spin-slow"></i> Replicación Sincrónica
                    </div>
                </div>

                <!-- STANDBY DB -->
                <div class="w-64 bg-slate-800/50 border border-slate-600 rounded-xl p-4 relative opacity-80">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-slate-600 text-white text-[10px] font-bold px-3 py-0.5 rounded-full uppercase tracking-wider">
                        Standby (Reader)
                    </div>
                    
                    <div class="flex justify-center my-4">
                        <div class="w-16 h-16 bg-slate-700/50 rounded-lg border border-cyan-400/50 flex flex-col items-center justify-center gap-1">
                            <div class="w-8 h-2 bg-cyan-400/50 rounded-sm"></div>
                            <div class="w-8 h-2 bg-cyan-400/50 rounded-sm"></div>
                        </div>
                    </div>
                    
                    <div class="text-center mb-3">
                        <h4 class="text-white font-bold text-sm font-mono">vigila-db-instance-2</h4>
                        <div class="flex items-center justify-center gap-1 text-[10px] text-slate-400 mt-1">
                            <i data-lucide="map-pin" class="w-3 h-3"></i> AZ: us-east-1b
                        </div>
                    </div>
                    
                    <div class="bg-slate-900 rounded p-2 text-center text-[10px] text-slate-400 mb-4">
                        <div>Replication Lag: 0.0 ms</div>
                        <div>Consultas Panel: 980 qps</div>
                    </div>
                    
                    <div class="bg-blue-500/20 border border-blue-500/50 text-blue-400 text-xs font-bold py-1.5 text-center rounded">
                        STANDBY SYNC
                    </div>
                </div>

            </div>

            <!-- ElastiCache Info Box -->
            <div class="mt-8 bg-gradient-to-r from-orange-500/20 to-transparent border-l-2 border-orange-500 p-4 rounded-r-lg relative z-10 flex gap-4 items-center">
                <div class="w-10 h-10 rounded-full bg-orange-500/20 flex items-center justify-center shrink-0">
                    <i data-lucide="zap" class="text-orange-400 w-5 h-5"></i>
                </div>
                <div>
                    <h4 class="text-sm font-bold text-white mb-1">Aceleración con Amazon ElastiCache (Redis)</h4>
                    <p class="text-[10px] text-slate-300">Almacenamiento en caché de telemetría de cámaras y estados de sesión de usuarios web.</p>
                    <div class="flex gap-6 mt-2 text-xs">
                        <div><span class="text-slate-400">Cache Hit Ratio:</span> <span class="font-bold text-emerald-400">94.2%</span></div>
                        <div><span class="text-slate-400">Consultas Ahorradas a RDS:</span> <span class="font-bold text-cyan-400">~1.2M / día</span></div>
                        <div><span class="text-slate-400">Latencia de Lectura:</span> <span class="font-bold text-emerald-400">< 1.5 ms</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Metricas -->
    <div class="col-span-12 lg:col-span-5 space-y-6">
        <!-- Latency Chart -->
        <div class="glass-panel p-5">
            <h3 class="flex items-center justify-between text-sm font-bold text-white mb-6">
                <span class="flex items-center gap-2"><i data-lucide="line-chart" class="text-cyan-400 w-4 h-4"></i> Rendimiento & Latencia de Consultas (ms)</span>
                <span class="text-[10px] text-slate-400 border border-slate-700 px-2 py-1 rounded">PostgreSQL 16.2</span>
            </h3>
            
            <div class="flex gap-4 mb-4 text-[10px] justify-center">
                <div class="flex items-center gap-1"><div class="w-3 h-3 bg-emerald-400 rounded-sm"></div> <span class="text-slate-300">Latencia con ElastiCache (ms)</span></div>
                <div class="flex items-center gap-1"><div class="w-3 h-3 bg-pink-500/70 rounded-sm"></div> <span class="text-slate-300">Latencia sin Caché (RDS Directo ms)</span></div>
            </div>

            <div class="h-40 border-b border-l border-slate-700 relative flex items-end justify-between px-2 pt-2">
                <!-- Y-axis -->
                <div class="absolute -left-6 top-0 bottom-0 flex flex-col justify-between text-[10px] text-slate-500">
                    <span>35</span><span>30</span><span>25</span><span>20</span><span>15</span><span>10</span><span>5</span><span>0</span>
                </div>
                
                <!-- Bars (Simulated) -->
                @php $vals = [12, 18, 14, 25, 30, 28, 15, 12, 10]; @endphp
                @foreach($vals as $val)
                <div class="flex flex-col justify-end items-center gap-1 w-[8%] h-full group">
                    <div class="w-full bg-pink-500/60 rounded-t" style="height: {{ $val * 3 }}%;"></div>
                    <div class="w-full bg-emerald-400 rounded-t absolute bottom-0" style="height: 5%;"></div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-between text-[9px] text-slate-500 mt-2 px-2">
                <span>00:00</span><span>04:00</span><span>08:00</span><span>12:00</span><span>16:00</span><span>20:00</span><span>Ahora</span>
            </div>
        </div>

        <!-- RDS Event Log -->
        <div class="glass-panel p-0 overflow-hidden flex flex-col">
            <div class="bg-slate-900 border-b border-slate-700 p-2 px-4 text-xs font-bold text-slate-300 flex items-center gap-2">
                <i data-lucide="terminal-square" class="w-4 h-4"></i> RDS Events & Replication Log
            </div>
            <div class="p-4 bg-[#0a0a0a] font-mono text-[10px] text-slate-300 flex-1 overflow-auto space-y-2 h-[200px]">
                <div class="text-emerald-400">[{{ now()->format('Y-m-d H:i:s') }}] Multi-AZ synchronization verified. Status: In-sync.</div>
                <div class="text-emerald-400">[{{ now()->subMinutes(2)->format('Y-m-d H:i:s') }}] ElastiCache Redis cluster healthy. Memory usage: 22%.</div>
                <div class="text-slate-400">[{{ now()->subMinutes(15)->format('Y-m-d H:i:s') }}] Automated daily snapshot created successfully: s3-backup-vigila-db-001.</div>
                <div class="text-slate-400">[{{ now()->subHours(2)->format('Y-m-d H:i:s') }}] minor version upgrade available for PostgreSQL.</div>
                <div class="text-cyan-400">[{{ now()->subHours(5)->format('Y-m-d H:i:s') }}] Read Replica autoscaling policy checked. CPU at 35%, no scaling needed.</div>
            </div>
        </div>
    </div>
</div>
@endsection
