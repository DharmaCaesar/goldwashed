<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $table = 'transaction_details';

    public function transactions(){
        return $this -> belongsTo(Transactions::class, 'transaction_id');
    }

    public function packages(){
        return $this -> belongsTo(Packages::class, 'package_id');
    }
}
