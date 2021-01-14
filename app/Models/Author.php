<?php

namespace App\Models;

use App\Models\Magazine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'second_name'
    ];

    public function magazines(){
        return $this->belongsToMany(Magazine::class);
    }
}
