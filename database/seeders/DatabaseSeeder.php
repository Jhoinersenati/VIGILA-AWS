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
        \App\Models\User::create([
            'name' => 'Admin VIGILA',
            'email' => 'admin@vigila.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\News::create([
            'title' => 'Cámara 01 - Entrada Principal',
            'summary' => 'Transmisión en vivo desde el acceso principal. Almacenado en Amazon S3. Estado: ACTIVO',
            'content' => 'Monitoreo 24/7',
            'category' => 'Seguridad',
            'published_at' => now(),
            'is_featured' => true
        ]);

        \App\Models\News::create([
            'title' => 'Cámara 02 - Pasillo A',
            'summary' => 'Transmisión en vivo del pasillo de servidores. Estado: ACTIVO',
            'content' => 'Monitoreo interno',
            'category' => 'Interno',
            'published_at' => now()
        ]);
        
        \App\Models\News::create([
            'title' => 'Cámara 03 - Almacén',
            'summary' => 'Cámara de bajo uso, archivando grabaciones a Glacier tras 30 días.',
            'content' => 'Monitoreo de bodega',
            'category' => 'Almacen',
            'published_at' => now()
        ]);
    }
}
