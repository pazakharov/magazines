<?php

namespace App\Actions\Image;

use App\Models\Image;
use Illuminate\Support\Str;

class CreateNewImageAction
{
    /**
     * Создает сущность картинки и возвращает её
     * @param mixed $image
     * 
     * @return [type]
     */
    public static function run($image)
    {
      
        $extension = $image->extension();
        $randName = Str::random(Image::IMAGE_NAME_LENGHTH) .'.'.$extension;
        $path = $image->storePubliclyAs('covers',$randName,'public_uploads');
        
        $imageObj = new Image(['file_name' => $path]);
        $imageObj->save();

        return $imageObj->append('url')->toJson();
    }
}
