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
    public static function all(string $orderDir = 'asc'):Collection
    {
       return Author::with('magazines')->orderBy('second_name', $orderDir)->get();
    }

}