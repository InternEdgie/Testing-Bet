<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bets extends Model
{
    use HasFactory;
    protected $table = 'bets';
    protected $fillable = [
        'bet_number',
        'bet_amount',
        'bet_type',
        'ticket_id',
    ];
}
