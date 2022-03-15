<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjemputan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'penjemputan';

    public function members(){
        return $this -> belongsTo(Members::class, 'member_id');
    }
}
