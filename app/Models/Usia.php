<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usia extends Model
{
    use HasFactory;

    protected $table = 'usia';
    protected $fillable = [
        'usia',
        'skor',
    ];
}
