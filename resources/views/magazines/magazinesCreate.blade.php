@extends('layouts.app')
@section('title', 'Новый журнал')

@section('css')
<link rel="stylesheet" href="{{asset('css/dpicker/bootstrap-datepicker.css')}}">

@endsection

@section('content')

<h4 class="top">Добавление нового журнала</h4>
<div class="form-wrapper-magazine">
    @include('magazines.magazinesCreateForm')
</div>
    
@endsection

@section('js')
<script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.ru.min.js')}}"></script>
<script>
    $('#date-picker').datepicker({
    format: "dd.mm.yyyy",
    language: "ru",
    daysOfWeekHighlighted: "0,6"
});
</script>  
@endsection