<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'endpoint',
        'parameters'
    ];
    private mixed $name;
    private mixed $endpoint;
    private mixed $parameters;
}
