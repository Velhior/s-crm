@extends('admin.layout')
@section('title')
Новый заказ
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        Новый заказ
    </header>
    <div class="panel-body">
        <div class="position-center">
        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('orders.store')}}">
                @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Имя Заказчика">
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Фамилия">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" name="phone" class="form-control" id="phone">
            </div>
            <div class="form-group">
            <label for="status">Статус заказа</label>
                <select class="form-control" id="status" name="status">
                    @foreach ($statuses as $status)
                    <option name="status" value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order_detail">Детальная информация по заказу</label>
                <textarea type="text" name="order_detail" class="form-control" id="order_detail"></textarea>
            </div>
            <div class="form-group">
                <label for="order_comment">Комментарий менеджера</label>
                <textarea type="text" name="order_comment" class="form-control" id="order_comment"></textarea>
            </div>
            <div class="form-group">
                <label for="order_file">Дополнительные документы</label>
                <input type="file" id="order_file" name="order_file">
                <p class="help-block">Дополнительные документы: Учетная карточка, договор (будет доступно для просмотра, не использовать для подгрузки нежелательных для общего доступа файлов)</p>
            </div>
            <button type="submit" class="btn btn-info">Сохранить</button>
        </form>
        </div>

    </div>
</section>
@endsection