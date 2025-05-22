<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'attraction_id',
        'address',
        'no',
        'arrival',
        't_checkout',
        'time',
        'kids',
        'adults',
        'img',
        'user_id',
        
    ];

    public function attraction()
    {
        return $this->belongsTo(Attractions::class, 'attraction_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
