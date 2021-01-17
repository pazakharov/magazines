<?php

namespace App\Actions\Magazines;

use App\Models\Image;
use App\Models\Magazine;

class UpdateMagazineAction
{
    /**
     * @param mixed $data
     * 
     * @return [type]
     */
    public static function run(Magazine $magazine, array $validatedMagazineData)
    {
        $magazine->update($validatedMagazineData);
        $image = Image::findOrFail($validatedMagazineData['image']);
        $magazine->image()->save($image);
        $magazine->authors()->sync($validatedMagazineData['authors']);
        //dd($validatedMagazineData, $magazine);
    }
}
