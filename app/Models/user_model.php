<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_model extends Model
{
    protected $table='users';

  
    public $timestamps = false;
    use HasFactory;
}
