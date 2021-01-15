<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Author;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date'
    ];
    
    /**
     * Связь с авторами
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function authors(){
        return $this->belongsToMany(Author::class,'magazine_author');
    }

    /**
     * Дата для вывода
     * @return string
     */
    public function getHumanDateAttribute(){
        return Carbon::createFromTimestamp($this->date)->format('d.m.Y');
    }

    
    /**
     * Связь с картинкой
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
