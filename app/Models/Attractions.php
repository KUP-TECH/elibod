<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attractions extends Model
{
    
    public $table = 'attractions';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'municipality_id',
        'attraction_name',
        'location',
        'about',
        'img',
        'bg_img',
        'map_img',
    ];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class, 'municipality_id');
    }
}
