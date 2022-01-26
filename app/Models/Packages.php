<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'packages';

    public function outlets(){
        return $this -> belongsTo(Outlets::class, 'outlet_id');
    }

    public function transaction_details(){
        return $this -> hasMany(TransactionDetails::class, 'package_id');
    }
}
