<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Placetype extends Model
{
    protected $guarded = ['id', 'name'];
    protected $fillable = [];
    public $timestamps = false;
}
