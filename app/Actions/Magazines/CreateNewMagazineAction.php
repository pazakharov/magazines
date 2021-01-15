<?php

namespace App\Actions\Magazines;

use Carbon\Carbon;
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
        return $magazine->save();
    }
}
