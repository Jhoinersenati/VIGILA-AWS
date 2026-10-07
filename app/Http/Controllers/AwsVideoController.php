<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AwsVideo;

class AwsVideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime|max:51200', // max 50MB
        ]);

        $file = $request->file('video');
        $originalName = $file->getClientOriginalName();
        $filename = time() . '_' . $originalName;
        $size = $file->getSize();
        
        // Simular storage en S3 pero guardar local en storage/app/public/aws_sim
        $path = $file->storeAs('aws_sim', $filename, 'public');

        AwsVideo::create([
            'filename' => $filename,
            'original_name' => $originalName,
            'path' => $path,
            'size_bytes' => $size,
            'storage_class' => 'STANDARD',
            'camera_id' => 'CAM-0' . rand(1, 5),
            'recorded_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Grabación subida exitosamente a AWS S3 (Simulado).');
    }
}
