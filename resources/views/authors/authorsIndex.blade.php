@extends('layouts.app')
@section('title', 'Авторы')
@section('content')
<div class="d-flex flex-row justify-content-between">
    <h4 class="top">Авторы</h4>
    <div class="top"><a type="link" class="btn btn-primary" href="{{ route('authors.create') }}">Новый автор</a></div>
    
</div>
<table  class="table table-hover" >
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Имя</th>
        <th scope="col">Отчество</th>
        <th scope="col">Фамилия 
            @if($orderDir == 'asc')
            <a href="{{ route('authors',['orderDir' => 'desc']) }}"><i class="fa fa-arrow-down"></i></a>
            @else
            <a href="{{ route('authors',['orderDir' => 'asc']) }}"><i class="fa fa-arrow-up"></i></a>
            @endif
        </th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody >
     @foreach($authors as $author )
        <tr x-data="{ open{{ $author->id }}: false }">
        <th scope="row">{{ $author->id }}</th>
        <td>{{ $author->first_name }}</td>
        <td>{{ $author->middle_name }}</td>
        <td>{{ $author->second_name }}</td>
        <td>
            <div class="btn-group" role="group" aria-label="Управление записями">
            <button type="button" class="btn btn-outline-success"  @click="open{{ $author->id }} = true"><i class="fa fa-eye"> Журналы</i></button>
            <button type="button" class="btn btn-outline-secondary"><i class="fa fa-pencil"></i></button>
            <button type="button" class="btn btn-outline-danger"><i class="fa fa-trash-o"></i></button>
            
            <div x-show="open{{ $author->id }}"  class="extend-modal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content"  x-on:click.away="open{{ $author->id }} = false">
                    <div class="modal-header">
                      <h5 class="modal-title">Журналы Автора</h5>
                      <button @click="open{{ $author->id }} = false" type="button" class="close" aria-label="Close">
                        <span style="color:black">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Журналы</p>
                    </div>
                  </div>
                </div>
              </div>
            
        </td>
        
      </tr>
      
      @endforeach
    </tbody>
  </table>
@endsection

