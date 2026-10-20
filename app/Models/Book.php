<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'book_title',
        'book_type_id',
        'publish_date',
        'num_of_pages',
        'num_of_copies',
        'edition',
        'publisher',
        'book_source',
        'remark'
    ];

    public function bookType()
    {
        return $this->belongsTo(BookType::class);
    }

    public function authors()
    {
        return $this->belongsToMany(
            Author::class,
            'book_authors'
        );
    }
}
