<?php
namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

/**
 * Класс репозиторий для \App\Models\Author
 */
class AuthorRepository extends BaseRepository{

    /**
     * Возвращает коллекцию всех авторов
     * @param string $order
     * 
     * @return Collection
     */
    public static function All(string $orderDir):Collection
    {
       return Author::orderBy('second_name', $orderDir)->get();
    }

}