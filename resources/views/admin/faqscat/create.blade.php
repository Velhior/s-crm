@extends('admin.layout')
@section('title')
Новая категория FAQ
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        Новая Категория FAQ
    </header>
    <div class="panel-body">
        <div class="position-center">
        <form class="form-horizontal" role="form" method="post" action="{{route('faqscat.store')}}">
            @csrf
            <div class="input-group m-bot15">
                <input type="text" class="form-control" name="name" id="name" placeholder="Введите новый статус">
                <span class="input-group-btn">
                <input class="btn btn-success" type="submit" value="Сохранить">
                </span>
            </div>
        </form>
        </div>
    </div>
</section>
@endsection