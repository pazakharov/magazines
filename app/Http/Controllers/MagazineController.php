<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Magazine;
use Illuminate\Http\Request;
use App\Repositories\AuthorRepository;
use App\Repositories\MagazineRepository;
use App\Http\Requests\MagazineCreateRequest;
use App\Actions\Magazines\CreateNewMagazineAction;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $magazines = MagazineRepository::all();

        return view('magazines.magazines', compact('magazines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = AuthorRepository::all();
        return view('magazines.magazinesCreate', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MagazineCreateRequest $request)
    {
        $magazineDTO = $request->only(['title', 'date', 'description', 'authors', 'image']);

        try {
            CreateNewMagazineAction::run($magazineDTO);
        } catch (Exception $exception) {
            return redirect('magazines')->with('error', 'Ошибки! добавления журнала' . $magazineDTO['title'] . ' ' . $exception->getMessage());
        }
        return redirect('magazines')->with('success', 'Успешно добавлен журнал: ' . $magazineDTO['title']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function show(Magazine $magazine)
    {
        echo __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazine $magazine)
    {
        echo __METHOD__;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazine $magazine)
    {
        echo __METHOD__;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Magazine $magazine)
    {
        if (isset($magazine->image)) {
            $magazine->image->delete();
        }
        $magazine->authors()->detach();
        $magazine->delete();
        return redirect()->route('magazines.index')
            ->with('success', 'Журнал ' . $magazine->title . ' удален');
    }
}
