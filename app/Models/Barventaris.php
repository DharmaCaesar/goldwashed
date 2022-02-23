<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barventaris extends Model
{
    use HasFactory;

    protected $table = 'barventaris';
    protected $guarded = ['id'];
}
