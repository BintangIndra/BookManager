<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'isbn', 'description', 'published_date'];

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}