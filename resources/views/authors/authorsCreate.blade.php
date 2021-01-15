@extends('layouts.app')
@section('title', 'Новый автор')
@section('content')

<h4 class="top">Новый автор</h4>
<div class="form-wrapper">
    @include('authors.authorsCreateForm')
</div>
    
@endsection