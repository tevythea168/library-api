<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    protected $fillable = [
        'book_type_name'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
