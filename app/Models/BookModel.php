<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table            = 'books';
    protected $primaryKey       = 'id_book';
    protected $useAutoIncrement = true;
    protected $useSoftDeletes   = true; // deleted_at
    protected $allowedFields    = [
        'code_book',
        'isbn_book',
        'title_book',
        'author_book',
        'publisher_book',
        'published_year',
        'description_book',
    ];

    // Dates
    protected $useTimestamps = true; // created_at, updated_at
}
