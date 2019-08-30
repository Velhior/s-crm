@extends('admin.layout')
@section('title')
Редактирование заказа №{{$order->id}}
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        Редактирование заказа №{{$order->id}}
    </header>
    <div class="panel-body">
        <div class="position-center">
        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('orders.update',$order->id)}}">
            {{ method_field('PUT') }}
                @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$order->name}}">
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{$order->last_name}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{$order->email}}">
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="tel" name="phone" class="form-control" id="phone" value="{{$order->phone}}">
            </div>
            <div class="form-group">
            <label for="status_id">Статус заказа</label>
                <select class="form-control" id="status_id" name="status_id">
                    @foreach ($statuses as $status)
                    <option name="status_id" value="{{$status->id}}" @if($status->id == $order->status_id) selected @endif>{{$status->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="order_detail">Детальная информация по заказу</label>
                <textarea type="text" name="order_detail" class="form-control" id="order_detail">{{$order->order_detail}}</textarea>
            </div>
            <div class="form-group">
                <label for="order_comment">Комментарий менеджера</label>
                <textarea type="text" name="order_comment" class="form-control" id="order_comment">{{$order->order_comment}}</textarea>
            </div>
            <div class="form-group">
                <label for="order_file">Дополнительные документы</label>
                <br />
                @if(isset($order->order_file))
                <a href="{{asset('images/'.$order->order_file)}}">Скачать</a>
                @endif
                <input type="file" id="order_file" name="order_file" value="{{$order->order_file}}">
                <p class="help-block">Дополнительные документы: Учетная карточка, договор (будет доступно для просмотра, не использовать для подгрузки нежелательных для общего доступа файлов)</p>
            </div>
            <button type="submit" class="btn btn-info">Сохранить</button>
        </form>
        </div>

    </div>
</section>
@endsection