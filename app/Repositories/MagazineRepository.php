<?php

namespace App\Repositories;

use App\Models\Magazine;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Класс репозиторий для \App\Models\Magazine
 */
class MagazineRepository extends BaseRepository
{

    /**
     * Возвращает коллекцию всех авторов
     * @param string $order
     * 
     * @return Collection
     */
    public static function all(): Collection
    {
        return Magazine::with(['authors','image'])->orderBy('created_at', 'desc')->get();
    }
}
