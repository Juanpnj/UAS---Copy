<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionBobot extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'idkrit',
        'idalt',
        'bobot'

        
    ];
}
