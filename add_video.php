<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\News;

$dir = storage_path('app/public/videos');
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

$videoUrl = 'https://www.w3schools.com/html/mov_bbb.mp4';
$videoPath = $dir . '/sample_camera.mp4';
file_put_contents($videoPath, file_get_contents($videoUrl));

$cam = News::where('title', 'like', '%Estacionamiento%')->first();
if ($cam) {
    $cam->update(['video' => 'videos/sample_camera.mp4']);
    echo "Video attached to " . $cam->title;
}
