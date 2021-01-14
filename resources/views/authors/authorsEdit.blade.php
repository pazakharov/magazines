@extends('layouts.app')
@section('title', $author->fullName)
@section('content')

<h4 class="top">Редактирование записи об авторе "{{ $author->fullName }}"</h4>
<div class="form-wrapper">
    @include('authors.authorsEditForm', ['author' => $author])
</div>
    
@endsection