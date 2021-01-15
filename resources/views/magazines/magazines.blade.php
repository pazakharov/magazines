@extends('layouts.app')

@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h4 class="top">Журналы</h4> <a class="btn btn-primary top" href="{{ route('magazines.create') }}">Добавить
            журнал</a>
    </div>
    <div class="d-flex flex-row flex-wrap">
        @foreach ($magazines as $magazine)
            <div class="card border-primary mb-3 mag">
                <div class="card-header d-flex flex-row justify-content-between">
                    <span class="card-h">{{$magazine->title}}</span>
                    <div class="card-date d-flex text-center">Дата выхода номера:<br/>
                        {{$magazine->humanDate}}</div></div>
                <div class="card-body d-flex flex-row">
                    <img src="mag/1.jpg" alt="">
                    <div class="desc mx-3">

                        <p class="card-text">{{$magazine->description}} </p>
                        <div class="authors">
                            <h5>Авторы</h5>
                            @foreach ($magazine->authors as $author)
                            <span class="rounded-pill bg-secondary">$author->fullname</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="buttons-group m-3 d-flex justify-content-end flex-row">
                   
                <a type="button" class="btn btn-outline-secondary mx-2"
                    href="{{ route('magazines.edit', ['magazine' => $magazine->id]) }}">
                    <i class="fa fa-pencil"></i>
                </a>
                <form style="display:contents" action="{{ route('magazines.destroy', ['magazine' => $magazine->id]) }}"
                    method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="fa fa-trash-o"></i>
                    </button>
                </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection
