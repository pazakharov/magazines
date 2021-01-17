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
        $magazine->load('image');
        $magazine->image->imageable()->dissociate()->save();
       
        if(isset($validatedMagazineData['image'])){
            $image = Image::findOrFail($validatedMagazineData['image']);
            $magazine->image()->save($image);
         }
        $magazine->authors()->sync($validatedMagazineData['authors']);
    }
}
