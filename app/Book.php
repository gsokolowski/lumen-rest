<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title',
        'author',
        'isbn'
    ];


    // scope scopePublished()
    public function scopePublished($query) {
        $query->where( 'published_at', '<=', Carbon::now() );
    }

    // scope scopeUnpublished()
    public function scopeUnpublished($query) {
        $query->where( 'published_at', '>', Carbon::now() );
    }

    // mutator used for article/create form
    public function setPublishedAtAttribute($date) {
        //$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
        $this->attributes['published_at'] = Carbon::parse($date);
    }
}
