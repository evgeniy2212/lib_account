<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name', 'description', 'page_count', 'is_available'
    ];

    public function authors()
    {

        return $this->belongsToMany('\App\Author');

    }
}
