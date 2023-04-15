<?php

namespace App\Models;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Provider;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider',
        'name',
        'level',
        'duration'
    ];
    private mixed $provider_id;
    private mixed $name;
    private mixed $level;
    private mixed $duration;
}
