<?php 
namespace App\Actions\Authors;

use App\Models\Author;

/**
 * Экшн для добавления нового автора
 */
class AddNewAuthorAction {
    /**
     * @param array $validatedAuthorData
     * 
     * @return bool
     */
    public static function run(array $validatedAuthorData):bool{
        $author = new Author($validatedAuthorData);
       return $author->save();
        
    }
}
