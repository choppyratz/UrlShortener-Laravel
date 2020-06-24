<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['sourceUrl', 'middlewareUrl', 'expiresData'];
    protected $table = 'url';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
