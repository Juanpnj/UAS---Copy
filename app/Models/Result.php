<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'idalt',
        'alternatif',
        'leavingflow',
        'enteringflow',
        'netflow',
        'rank'
    ];
}
