@extends('layouts.app')
@section('title', 'Новый журнал')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dpicker/bootstrap-datepicker.css') }}">

@endsection

@section('content')

    <h4 class="top">Добавление нового журнала</h4>
    <div class="form-wrapper-magazine">
        @include('magazines.magazinesCreateForm',['authors' => $authors])
    </div>

@endsection

@section('js')
    <script type="text/JavaScript">
        var selectedAuthors = [
    
    @php
       if(!empty(old('authors'))){
             $array = array_map(fn($item) => '"'.$item.'"',old('authors'));  
             echo implode(',', $array);
        }
    @endphp           
                            ]; 
        var imageUploadUrl = "{{ route('upload') }}";
    </script>
        <script type="text/JavaScript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script type="text/JavaScript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/JavaScript" src="{{ asset('js/bootstrap-datepicker.ru.min.js') }}"></script>
        <script type="text/JavaScript" src="{{ asset('js/magazine-form.js') }}"></script>

    @endsection
