<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Trip extends Model
{
    /** @use HasFactory<\Database\Factories\TripFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'user_id',
        'destination',
        'start_date',
        'end_date',
        'description',
        'cost',
        'image_path',
        'number_of_people'

    ];
}
