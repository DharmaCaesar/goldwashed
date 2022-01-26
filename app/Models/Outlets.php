<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlets extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'outlets';

    public function user (){
        return $this -> hasMany(User::class, 'outlet_id');
    }

    public function packages (){
        return $this -> hasMany(Packages::class, 'outlet_id');
    }

    public function transactions(){
        return $this -> hasMany(Transactions::class, 'outlet_id');
    }
}
