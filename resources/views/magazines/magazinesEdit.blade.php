@extends('layouts.app')
@section('title', 'Редактирование журнала')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/dpicker/bootstrap-datepicker.css') }}">

@endsection

@section('content')

    <h4 class="top">Редактирование журнала {{ $magazine->title }}</h4>
    <div class="form-wrapper-magazine">
        @include('magazines.magazinesEditForm',['authors' => $authors, 'magazine' => $magazine])
    </div>

@endsection

@section('js')
    <script type="text/JavaScript">
        let selectedAuthors = [
    
    @php
       
       if($magazine->authors->count() > 0){
             $array = array_map(fn($item) => '"'.$item['id'].'"',$magazine->authors->toArray());  
             echo implode(',', $array);
        }
    @endphp           
                            ]; 
        const imageUploadUrl = "{{ route('upload') }}";
    </script>
        <script type="text/JavaScript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script type="text/JavaScript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
        <script type="text/JavaScript" src="{{ asset('js/bootstrap-datepicker.ru.min.js') }}"></script>
        <script type="text/JavaScript" src="{{ asset('js/magazine-form.js') }}"></script>

    @endsection
