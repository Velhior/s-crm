@extends('admin.layout')
@section('title')
Новый статус заказа
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        Новый статус
    </header>
    <div class="panel-body">
        <div class="position-center">
        <form class="form-horizontal" role="form" method="post" action="{{route('statuses.store')}}">
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