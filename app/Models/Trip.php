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
        'user_id',              // add
        'destination',
        'start_date',
        'end_date',
        'description',
        'cost',
        'image_path',
        'number_of_people'

    ];

    protected $rules = [
        'title' => 'required|string|max:255',
        'destination' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date'
    ];

    protected $guarded = [
        'id'
    ];

    protected function casts()
    {
        return [
            'start_date' => 'datetime',
            'end_date' => 'datetime',
        ];
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
