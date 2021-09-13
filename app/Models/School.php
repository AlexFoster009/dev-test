<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $casts = [
        'domains' => 'array',
        'web_pages' => 'array'
    ];

    protected $guarded = [];


}
