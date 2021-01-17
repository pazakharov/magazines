@extends('layouts.app')
@section('title', 'Авторы')
@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h4 class="top">Авторы</h4>
        <div class="top"><a type="link" class="btn btn-primary" href="{{ route('authors.create') }}">Новый автор</a></div>

    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Фамилия
                    @if ($orderDir == 'asc')
                        <a href="{{ route('authors', ['orderDir' => 'desc']) }}"><i class="fa fa-arrow-down"></i></a>
                    @else
                        <a href="{{ route('authors', ['orderDir' => 'asc']) }}"><i class="fa fa-arrow-up"></i></a>
                    @endif
                </th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <th scope="row">{{ $author->id }}</th>
                    <td>{{ $author->first_name }}</td>
                    <td>{{ $author->middle_name }}</td>
                    <td>{{ $author->second_name }}</td>
                    <td>

                        <button type="button" class="btn btn-outline-success dialogeButton" author-data="{{ $author->id }}"><i
                                class="fa fa-eye"> Журналы</i>
                        </button>
                        <a type="button" class="btn btn-outline-secondary"
                            href="{{ route('authors.edit', ['author' => $author->id]) }}">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <form style="display:contents" action="{{ route('authors.destroy', ['author' => $author->id]) }}"
                            method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </form>
                        <div class="modal" id="modal{{ $author->id }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Журналы автора "{{ $author->fullName }}"</h5>
                                        <button  class = "closeDialoge close"  type="button" author-data="{{ $author->id }}"
                                            aria-label="Close">
                                            <span style="color:black">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                        @foreach($author->magazines as $magazine)
                                        <li>Журнал {{$magazine->title}} от {{$magazine->humanDate}}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('js')
<script type="text/JavaScript" src="{{ asset('js/authors.js') }}"></script>
@endsection