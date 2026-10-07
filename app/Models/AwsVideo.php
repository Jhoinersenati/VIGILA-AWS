<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AwsVideo extends Model
{
    protected $fillable = [
        'filename',
        'original_name',
        'path',
        'size_bytes',
        'storage_class',
        'camera_id',
        'recorded_at'
    ];
}
