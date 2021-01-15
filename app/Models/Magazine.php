<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->belongsToMany(Author::class,'magazine_author');
    }

    public function getHumanDateAttribute(){
        return Carbon::createFromTimestamp($this->date)->format('d.m.Y');
    }
}
