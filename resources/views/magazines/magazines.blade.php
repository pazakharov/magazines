@extends('layouts.app')

@section('content')
<h4 class="">Журналы</h4>
<div class="d-flex flex-row flex-wrap">
                   
    <div class="card border-primary mb-3 mag">
        <div class="card-header d-flex flex-row justify-content-between"><span class="card-h">За
                рулем</span><span class="card-date">Май 2020</span></div>
        <div class="card-body d-flex flex-row">
            <img src="mag/1.jpg" alt="">
            <div class="desc mx-3">

                <p class="card-text">Классный журнал про машины </p>
                <div class="authors">
                    <h5>Авторы</h5>
                    <span  class="rounded-pill bg-secondary">Тюрин М.Ю</span>
                    <span  class="rounded-pill bg-secondary">Коровкин М.Ю</span>
                    <span  class="rounded-pill bg-secondary">Жабов М.Ю</span>
                    <span class="rounded-pill bg-secondary">Калинов М.Ю</span>
                    <span class="rounded-pill bg-secondary">Ладов М.Ю</span>
                    <span class="rounded-pill bg-secondary">Тюрин М.Ю</span>
                    <span class="rounded-pill bg-secondary">Коровкин М.Ю</span>
                    <span class="rounded-pill bg-secondary">Жабов М.Ю</span>
                    <span class="rounded-pill bg-secondary">Калинов М.Ю</span>
                    <span class="rounded-pill bg-secondary">Ладов М.Ю</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

