<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class TripEvent extends Model
{
    /** @use HasFactory */
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'trip_id',
        'event_type',
        'description',
        'start_time',
        'end_time',
        'expense',
        'point_of_departure',
        'point_of_arrival',
        'priority'
    ];
}
