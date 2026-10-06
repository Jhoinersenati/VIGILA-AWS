@extends('layouts.aws')

@section('title', 'Systems Manager')
@section('header_title', 'Seguridad y Gestión Operativa: AWS Systems Manager')
@section('header_subtitle', 'Terminal interactivo seguro sin puertos SSH (22) abiertos ni direcciones IP públicas')

@section('content')
<div class="grid grid-cols-12 gap-6 h-full min-h-[500px]">
    
    <!-- SSM Terminal -->
    <div class="col-span-12 xl:col-span-7 flex flex-col">
        <div class="glass-panel flex-1 flex flex-col overflow-hidden border-slate-700">
            <!-- Terminal Header -->
            <div class="bg-slate-900 border-b border-slate-700 p-3 flex justify-between items-center">
                <h3 class="flex items-center gap-2 text-sm font-bold text-white">
                    <i data-lucide="terminal" class="text-cyan-400 w-4 h-4"></i>
                    AWS Systems Manager Session Manager (Terminal Seguro)
                </h3>
                <div class="flex items-center gap-3">
                    <span class="flex items-center gap-1 text-[10px] bg-amber-500/20 text-amber-400 border border-amber-500/30 px-2 py-0.5 rounded-full font-bold">
                        <i data-lucide="lock" class="w-3 h-3"></i> No SSH (Port 22 Closed)
                    </span>
                    <div class="flex gap-1.5">
                        <div class="w-3 h-3 rounded-full bg-red-500"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                </div>
            </div>

            <!-- Terminal Body -->
            <div class="bg-[#050505] flex-1 p-4 font-mono text-sm overflow-auto text-slate-300">
                <div class="mb-4 text-emerald-400">
                    <div class="font-bold">AWS Systems Manager Session Manager Connected.</div>
                    <div>Target Instance: i-0a8172c91b49e83 (Graviton3 / Amazon Linux 2023)</div>
                    <div class="text-amber-400 mt-1">Security Audit: Direct SSH Port 22 is DISABLED. Session logged to AWS CloudTrail.</div>
                    <div class="text-slate-400 mt-4">Escribe <span class="text-yellow-300">help</span> o selecciona un comando rápido abajo:</div>
                </div>
                
                <div class="flex items-center gap-2 mt-2">
                    <span class="text-emerald-400 font-bold">sh-5.2$</span>
                    <span class="text-white w-2 h-4 bg-slate-400 inline-block animate-pulse"></span>
                </div>
            </div>

            <!-- Terminal Input / Quick Actions -->
            <div class="bg-slate-900 border-t border-slate-700 p-3 flex items-center gap-3">
                <div class="flex-1 relative">
                    <input type="text" placeholder="Escribe un comando AWS SSM (ej. top, status, patch)" class="w-full bg-slate-800 border border-slate-700 rounded-md py-2 px-3 text-sm text-white focus:outline-none focus:border-cyan-500 font-mono">
                    <button class="absolute right-2 top-1.5 bg-cyan-500 hover:bg-cyan-600 text-white text-xs font-bold px-3 py-1 rounded">Ejecutar</button>
                </div>
            </div>
            
            <div class="bg-slate-900/50 p-2 border-t border-slate-700/50 flex gap-2">
                <span class="text-[10px] text-slate-500 uppercase font-bold self-center mr-2">Comandos Rápidos:</span>
                <button class="text-xs bg-slate-800 hover:bg-slate-700 border border-slate-600 text-slate-300 px-3 py-1 rounded-full transition">Ver Estado Nodos</button>
                <button class="text-xs bg-slate-800 hover:bg-slate-700 border border-slate-600 text-slate-300 px-3 py-1 rounded-full transition">Ejecutar Patch Manager</button>
                <button class="text-xs bg-slate-800 hover:bg-slate-700 border border-slate-600 text-slate-300 px-3 py-1 rounded-full transition">Ver Parameter Store</button>
                <button class="text-xs bg-slate-800 hover:bg-slate-700 border border-slate-600 text-slate-300 px-3 py-1 rounded-full transition">Procesos FFmpeg</button>
            </div>
        </div>
    </div>

    <!-- Seguridad y Cumplimiento -->
    <div class="col-span-12 xl:col-span-5">
        <div class="glass-panel p-6 h-full">
            <div class="flex justify-between items-center mb-6">
                <h3 class="flex items-center gap-2 text-md font-bold text-white">
                    <i data-lucide="shield-check" class="text-emerald-400 w-5 h-5"></i>
                    Postura de Seguridad y Cumplimiento AWS
                </h3>
                <span class="text-[10px] text-emerald-400 font-mono border border-emerald-500/30 px-2 py-1 rounded bg-emerald-500/10">Cero Brechas</span>
            </div>

            <div class="space-y-4">
                <!-- Check 1 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4">
                    <div class="mt-0.5 shrink-0 w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center">
                        <i data-lucide="check" class="text-emerald-400 w-4 h-4"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">Zero Public SSH/RDP Ports (Security Groups 0.0.0.0/0 eliminados)</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Administración 100% realizada a través de AWS Systems Manager sin IP públicas ni bastiones. Riesgo de fuerza bruta SSH erradicado.</p>
                    </div>
                </div>

                <!-- Check 2 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4">
                    <div class="mt-0.5 shrink-0 w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center">
                        <i data-lucide="check" class="text-emerald-400 w-4 h-4"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">Cifrado en Reposo y en Tránsito (AES-256 / TLS 1.3)</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">S3, RDS y volúmenes EBS cifrados obligatoriamente con llaves gestionadas en AWS Key Management Service (KMS).</p>
                    </div>
                </div>

                <!-- Check 3 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4">
                    <div class="mt-0.5 shrink-0 w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center">
                        <i data-lucide="check" class="text-emerald-400 w-4 h-4"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">Roles de Instancia IAM con Principio de Menor Privilegio</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Eliminación de Access Keys estáticas en archivos .env; uso de credenciales temporales rotadas automáticamente para el acceso a S3 y RDS.</p>
                    </div>
                </div>

                <!-- Check 4 -->
                <div class="bg-slate-800/40 border border-emerald-500/20 p-4 rounded-lg flex gap-4">
                    <div class="mt-0.5 shrink-0 w-6 h-6 rounded-full bg-emerald-500/20 flex items-center justify-center">
                        <i data-lucide="check" class="text-emerald-400 w-4 h-4"></i>
                    </div>
                    <div>
                        <h4 class="text-white text-sm font-bold mb-1">AWS WAF & Shield en el Application Load Balancer</h4>
                        <p class="text-[11px] text-slate-400 leading-relaxed">Protección activa contra ataques DDoS, SQL Injection y bots de fuerza bruta en endpoints de video públicos.</p>
                    </div>
                </div>
            </div>

            <!-- AWS Logo Watermark -->
            <div class="absolute bottom-6 right-6 opacity-5 flex items-center gap-2 pointer-events-none">
                <i data-lucide="shield" class="w-24 h-24"></i>
            </div>
        </div>
    </div>
</div>
@endsection
