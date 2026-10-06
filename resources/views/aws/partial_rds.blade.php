<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 lg:col-span-7 space-y-6">
        <div class="glass-panel p-5">
            <h3 class="flex items-center gap-2 text-lg font-bold text-white mb-8">
                <i data-lucide="database" class="text-emerald-400 w-5 h-5"></i> Amazon RDS PostgreSQL (Multi-AZ)
            </h3>
            <div class="flex items-center justify-center gap-8 relative px-4">
                <!-- PRIMARY DB -->
                <div class="w-64 bg-slate-800/80 border-2 border-emerald-500 rounded-xl p-4 text-center">
                    <h4 class="text-white font-bold text-sm font-mono">vigila-db-instance-1 (Primary)</h4>
                    <div class="bg-emerald-500/20 text-emerald-400 text-xs font-bold py-1.5 rounded mt-4">OPERATIVO</div>
                </div>
                <!-- STANDBY DB -->
                <div class="w-64 bg-slate-800/50 border border-slate-600 rounded-xl p-4 text-center opacity-80">
                    <h4 class="text-white font-bold text-sm font-mono">vigila-db-instance-2 (Standby)</h4>
                    <div class="bg-blue-500/20 text-blue-400 text-xs font-bold py-1.5 rounded mt-4">STANDBY SYNC</div>
                </div>
            </div>
            <div class="mt-8 bg-gradient-to-r from-orange-500/20 to-transparent border-l-2 border-orange-500 p-4 rounded-r-lg">
                <h4 class="text-sm font-bold text-white mb-1">Aceleración ElastiCache (Redis)</h4>
                <div class="flex gap-6 mt-2 text-xs">
                    <div>Cache Hit Ratio: <span class="font-bold text-emerald-400">94.2%</span></div>
                    <div>Latencia: <span class="font-bold text-emerald-400">< 1.5 ms</span></div>
                </div>
            </div>
        </div>
    </div>
</div>
