<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Repositories\AuthorRepository;
use App\Http\Requests\AuthorCreateRequest;
use App\Actions\Authors\CreateNewAuthorAction;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderDir = $request->query('orderDir', 'asc');
        $authors = AuthorRepository::all($orderDir);
        return view('authors.authorsIndex', compact('authors', 'orderDir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.authorsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorCreateRequest $request)
    {
        $authorDTO = $request->except('_token');
        CreateNewAuthorAction::run($authorDTO);
        return redirect('authors')->with('success', 'Успешно добавлен автор: ' . implode(' ', $authorDTO));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.authorsEdit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorCreateRequest $request, Author $author)
    {
        $author->update($request->all());
        return redirect()->route('authors')
        ->with('success', 'Запись об авторе '.$author->fullName.' обновлена');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors')
        ->with('success', 'Автор '.$author->fullName.' удален');
    }
}
