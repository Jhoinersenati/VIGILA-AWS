@php
    $analysisSection = $sections->first(fn ($section) => str_contains(mb_strtolower($section->title), 'anali'));
    $techSection = $sections->first(fn ($section) => str_contains(mb_strtolower($section->title), 'tecno'));
@endphp

<aside class="sl-left-column">
    <!-- WIDGET DE ESTADO DEL SISTEMA -->
    <section class="sl-side-card" style="background: white; border: 1px solid #e2e8f0; border-radius: 8px; margin-bottom: 20px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div class="sl-section-title" style="background: var(--aws-dark); color: white; padding: 10px 15px; font-weight: 700; font-size: 13px; letter-spacing: 1px;">
            <i class="bi bi-server"></i> INFRAESTRUCTURA AWS
        </div>
        <div style="padding: 15px;">
            <div style="margin-bottom: 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                <span style="display: block; font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase;">Cómputo (EC2/Beanstalk)</span>
                <span style="display: flex; align-items: center; gap: 6px; font-size: 14px; color: var(--text-dark); font-weight: 600;">
                    <span style="width: 8px; height: 8px; background: #22c55e; border-radius: 50%; display: inline-block;"></span>
                    Online (Auto-Scaling)
                </span>
            </div>
            
            <div style="margin-bottom: 12px; border-bottom: 1px solid #f1f5f9; padding-bottom: 8px;">
                <span style="display: block; font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase;">Base de Datos (RDS Aurora)</span>
                <span style="display: flex; align-items: center; gap: 6px; font-size: 14px; color: var(--text-dark); font-weight: 600;">
                    <span style="width: 8px; height: 8px; background: #22c55e; border-radius: 50%; display: inline-block;"></span>
                    Multi-AZ Activo
                </span>
            </div>

            <div>
                <span style="display: block; font-size: 11px; color: #64748b; font-weight: 600; text-transform: uppercase;">Almacenamiento (S3/Glacier)</span>
                <span style="display: flex; align-items: center; gap: 6px; font-size: 14px; color: var(--text-dark); font-weight: 600;">
                    <span style="width: 8px; height: 8px; background: #3b82f6; border-radius: 50%; display: inline-block;"></span>
                    Sincronizando flujos...
                </span>
            </div>
        </div>
    </section>

    <!-- WIDGET DE MÉTRICAS -->
    <section class="sl-side-card" style="background: white; border: 1px solid #e2e8f0; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <div class="sl-section-title" style="background: var(--aws-blue); color: white; padding: 10px 15px; font-weight: 700; font-size: 13px; letter-spacing: 1px;">
            <i class="bi bi-activity"></i> MÉTRICAS DE RED
        </div>
        <div style="padding: 15px;">
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <span style="font-size: 13px; color: #64748b;">Latencia promedio:</span>
                <span style="font-size: 13px; font-weight: 700; color: var(--text-dark);">12 ms</span>
            </div>
            <div style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                <span style="font-size: 13px; color: #64748b;">Ancho de banda:</span>
                <span style="font-size: 13px; font-weight: 700; color: var(--text-dark);">1.2 GB/s</span>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <span style="font-size: 13px; color: #64748b;">Nivel de Seguridad:</span>
                <span style="font-size: 13px; font-weight: 700; color: #eab308;">Estricto (VPC)</span>
            </div>
            
            <div style="margin-top: 15px; padding-top: 15px; border-top: 1px dashed #cbd5e1; text-align: center;">
                <a href="#" style="font-size: 12px; color: var(--aws-blue); text-decoration: none; font-weight: 600;">
                    <i class="bi bi-shield-check"></i> Políticas IAM Activas
                </a>
            </div>
        </div>
    </section>
</aside>
