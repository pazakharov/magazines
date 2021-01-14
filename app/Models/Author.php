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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function magazines(){
        return $this->belongsToMany(Magazine::class);
    }

    public function getFullNameAttribute():string
    {
        return $this->second_name.' '.$this->first_name.' '.$this->middle_name;
    }


}
