<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $primaryKey = 'id_account';

    protected $fillable = [
        'type',
        'currency',
        'id_user',
        'balance',
        'account_number'
    ];

}
