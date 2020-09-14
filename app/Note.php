<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
