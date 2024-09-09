<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anket extends Model
{
    protected $table = 'anket';
    protected $guarded = [];  
    use HasFactory;
}
