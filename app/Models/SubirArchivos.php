<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubirArchivos extends Model
{
    use HasFactory;

    protected $fillable = ['original_name', 'stored_name', 'path'];
}
