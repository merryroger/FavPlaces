<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Picture extends Model
{
    protected $guarded = [];
    protected $fillable = ['id', 'place_id', 'location', 'width', 'height', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function scopePictures($query, $place_id)
    {
        return $query->where('place_id', $place_id)->orderBy('created_at', 'desc');
    }

}
