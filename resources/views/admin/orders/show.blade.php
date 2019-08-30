@extends('admin.layout')
@section('title')
Заказ № {{$order->id}}
@endsection
@section('content')
<div class="typo-agile">
    <h2 class="w3ls_head">Заказ № {{$order->id}}</h2>
    <a href="{{route('orders.edit',$order->id)}}" class="btn btn-success">
            Редактировать заказ
    </a>
    <a href="{{route('orders.destroy',$order->id)}}" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form').submit();">
            Удалить заказ
    </a>
    <form action="{{route('orders.destroy',$order->id)}}" method="post" id="delete-form" style="display:none;">
        {{csrf_field()}}
        {{ method_field('DELETE') }}
    </form>
   
                
    <div class="grid_3 grid_5 agileits">        
        <div class="col-md-6">
            <h2 style="text-decoration:underline;">Контактные данные</h3>
            <h4 class="admin-header">Имя</h4>
            <p>{{$order->name}}</p>
            @if(isset($order->last_name))
            <h4 class="admin-header">Фамилия</h4>
            <p>{{$order->last_name}}</p>
            @endif
            @if(isset($order->phone))
            <h4 class="admin-header">Телефон</h4>
            <p>{{$order->phone}}</p>
            @endif
            @if(isset($order->email))
            <h4 class="admin-header">Email</h4>
            <p>{{$order->email}}</p>
            @endif
        </div>         
        <div class="col-md-6">
            <h2 style="text-decoration:underline;">Информация по заказу</h3> 
            @if(isset($order->order_detail))
            <h4 class="admin-header">Детали заказа</h4>
            <p>{{$order->order_detail}}</p>
            @endif
            @if(isset($order->order_comment))
            <h4 class="admin-header">Комментарии менеджера</h4>
            <p>{{$order->order_comment}}</p>
            @endif
            @if(isset($order->order_file))
            <h4 class="admin-header">Дополнительное приложение</h4>            
            <a href="{{asset('images/'.$order->order_file)}}">Скачать</a>
            @endif            
        </div>
        <div class="clearfix"> </div>
    </div>
		
		
@endsection