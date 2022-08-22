<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable =[
'book_isbn',
'book_title',
'book_author',
'book_image',
'book_descr','book_price','publisherid',
    ];
}
