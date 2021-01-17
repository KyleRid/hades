<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    protected $primaryKey = 'option_id';
    public $timestamps = false;
    protected $fillable = ['option_name'];
    //
}
