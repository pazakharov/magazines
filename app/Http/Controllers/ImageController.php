<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Actions\Image\CreateNewImageAction;

class ImageController extends Controller
{
    /**
     * @param ImageRequest $request
     * 
     * @return [type]
     */
    public function upload(ImageRequest $request)
    {
        $image = CreateNewImageAction::run($request->file('image'));
        return  $image;
    }
}
