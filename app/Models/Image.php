<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    const IMAGE_NAME_LENGHTH = 25;

    public $fillable = [
        'file_name'
    ];

    /**
     * Возвращает связь с родительским объектом.
     */
    public function imageable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return url('uploads/' . $this->file_name);
    }
}
