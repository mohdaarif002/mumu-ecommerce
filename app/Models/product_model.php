<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_model extends Model
{
    protected $table='products';

  
    public $timestamps = false;
    use HasFactory;
}
