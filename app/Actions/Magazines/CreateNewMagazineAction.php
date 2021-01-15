<?php

namespace App\Actions\Magazines;

use Carbon\Carbon;
use App\Models\Image;
use App\Models\Magazine;

/**
 * Экшн для добавления нового журнала
 */
class CreateNewMagazineAction
{
    /**
     * @param array $validatedMagazineData
     * 
     * @return bool
     */
    public static function run(array $validatedMagazineData): bool
    {
        $magazine = new Magazine($validatedMagazineData);
        $carbonDate = Carbon::parse($magazine->date);
        $magazine->date = $carbonDate->timestamp;
        $magazine->save();

        if(isset($validatedMagazineData['authors']) && count($validatedMagazineData['authors']) > 0){
            $magazine->authors()->attach($validatedMagazineData['authors']);
        }

        if(isset($validatedMagazineData['image'])){
           $image = Image::find($validatedMagazineData['image']);
           $magazine->image()->save($image);
        }
        
        return true;
    }
}
