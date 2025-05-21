<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    public $table = 'municipality';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name',
        'icon',
        'img',
        'bg_img',
        'map_img',
        'description',
    ];

    public function attractions()
    {
        return $this->hasMany(Attractions::class, 'municipality_id');
    }
}
