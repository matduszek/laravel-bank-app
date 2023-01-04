<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credits extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'amount',
        'earnings',
        'type',
        'length',
        'credit_length'
    ];
}
