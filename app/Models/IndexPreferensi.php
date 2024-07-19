<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndexPreferensi extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'ida',
        'idb',
        'ipref'
    ];
}
