<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'members';

    public function transactions(){
        return $this -> hasMany(Transactions::class, 'member_id');
    }
    
    public function penjemputan(){
        return $this-> hasMany(penjemputan::class, 'member_id');
    }
}
