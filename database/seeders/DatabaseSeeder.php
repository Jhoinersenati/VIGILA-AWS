<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. USUARIOS
        \App\Models\User::create([
            'name' => 'Admin VIGILA',
            'email' => 'admin@vigila.com',
            'password' => bcrypt('password')
        ]);
        \App\Models\User::create([
            'name' => 'Operador AWS',
            'email' => 'operador@vigila.com',
            'password' => bcrypt('password')
        ]);

        // 2. ZONAS (Secciones)
        $zonaExterior = \App\Models\Section::create([
            'title' => 'Exteriores',
            'show_in_nav' => true
        ]);
        $zonaInterior = \App\Models\Section::create([
            'title' => 'Interiores',
            'show_in_nav' => true
        ]);

        // 3. CÁMARAS (Noticias)
        \App\Models\News::create([
            'title' => 'Cámara 01 - Estacionamiento Norte',
            'summary' => 'Monitoreo 24/7 de entrada de vehículos. Flujo enviado directo a almacenamiento de AWS S3.',
            'content' => 'Resolución: 1080p | Frame rate: 30fps | Conectada a la red privada (VPC) para mayor seguridad.',
            'category' => 'Perimetral',
            'section_id' => $zonaExterior->id,
            'image' => 'cameras/parking.png',
            'video' => 'videos/sample_camera.mp4',
            'published_at' => now(),
            'is_featured' => true
        ]);

        \App\Models\News::create([
            'title' => 'Cámara 02 - Pasillo de Servidores',
            'summary' => 'Vigilancia de acceso restringido al Data Center. Análisis con IA para detección de intrusos.',
            'content' => 'Conexión cifrada a la base de datos Aurora. Acceso solo con tarjeta RFID.',
            'category' => 'Seguridad Crítica',
            'section_id' => $zonaInterior->id,
            'image' => 'cameras/servers.png',
            'published_at' => now()
        ]);

        \App\Models\News::create([
            'title' => 'Cámara 03 - Recepción Principal',
            'summary' => 'Cámara de registro de visitantes y control de aforo.',
            'content' => 'Los videos de esta cámara rotan hacia S3 Glacier después de 30 días automáticamente por Lifecycle Policies.',
            'category' => 'Atención',
            'section_id' => $zonaInterior->id,
            'image' => 'cameras/reception.png',
            'published_at' => now()
        ]);

        // 4. INFRAESTRUCTURA (Advertisements)
        \App\Models\Advertisement::create([
            'title' => 'Amazon S3 - Bucket de Grabaciones',
            'description' => 'Almacenamiento Standard: 850 GB utilizados. Política de retención activada.',
            'link' => '#',
            'image' => 'cameras/s3.png',
            'is_active' => true
        ]);
        \App\Models\Advertisement::create([
            'title' => 'Base de Datos Aurora RDS',
            'description' => 'Multi-AZ activado. Réplicas de lectura funcionando al 15% de CPU.',
            'link' => '#',
            'image' => 'cameras/rds.png',
            'is_active' => true
        ]);
    }
}
