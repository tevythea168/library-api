<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = [
        'author_name',
        'gender',
        'dob',
        'pob',
        'address',
        'phone',
        'email',
        'photo'
    ];

    public function books()
    {
        return $this->belongsToMany(
            Book::class,
            'book_authors'
        );
    }
}
