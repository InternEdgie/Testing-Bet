<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tickets extends Model
{
    use HasFactory;

    protected $table = 'tickets';
    protected $fillable = [
        'ticket_id',
        'ticket_draw_time',
    ];
}
