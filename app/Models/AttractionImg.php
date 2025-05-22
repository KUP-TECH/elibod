<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttractionImg extends Model
{
    protected $table = 'attraction_img';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'attractions_id',
        'img',
    ];

    public function attraction()
    {
        return $this->belongsTo(Attractions::class, 'attractions_id', 'id');
    }
}
