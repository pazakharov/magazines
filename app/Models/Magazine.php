<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Magazine extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date'
    ];

    public function authors(){
        return $this->belongsToMany(Author::class);
    }
}
