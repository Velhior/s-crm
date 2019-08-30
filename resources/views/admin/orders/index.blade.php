@extends('admin.layout')
@section('title')
Заказы
@endsection
@section('content')

<div class="table-agile-info">
        <a style="margin-bottom:20px;" href="{{route('orders.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Создать заказ
        </a>
        <a style="margin-bottom:20px;" href="{{route('export')}}" class="btn btn-info">
            <i class="fa fa-arrow-down"></i> Выгрузить заказы в EXCEL
        </a>
        <a style="margin-bottom:20px;" href="{{route('import.orders')}}" class="btn btn-info">
          <i class="fa fa-arrow-up"></i> Импорт заказов
        </a>
        <div class="panel panel-default">
           <div class="panel-heading">
            Заказы
           </div>
           <div>
             <table class="table" ui-jq="footable" ui-options="{
               &quot;paging&quot;: {
                 &quot;enabled&quot;: true
               },
               &quot;filtering&quot;: {
                 &quot;enabled&quot;: true
               },
               &quot;sorting&quot;: {
                 &quot;enabled&quot;: true
               }}">
               <thead>
                 <tr>
                   <th data-breakpoints="xs">id</th>
                   <th>Статус</th>
                   <th>Имя</th>
                   <th>Фамилия</th>
                   <th data-breakpoints="xs">Телефон</th>
                   <th data-breakpoints="xs sm md">Email</th>
                   <th data-breakpoints="xs sm md" data-title="DOB">Дата создания</th>
                 </tr>
               </thead>
               <tbody>
               @foreach ($orders as $order)
              
                <tr class="respons-table" data-expanded="true" onclick="window.location.href='{{route('orders.show',$order->id)}}'; return false">                                        
                    <td>{{$order->id}}</td>
                    @if ($order->status->id == 1)
                    <td style="color:black;background-color:#FCB322;">{{$order->status->name}}</td>
                    @elseif (($order->status->id == 2))
                    <td style="color:black;background-color:#4fc1be;">{{$order->status->name}}</td>
                    @elseif (($order->status->id == 3))
                    <td style="color:black;background-color:#27c24c;">{{$order->status->name}}</td>
                    @elseif (($order->status->id == 4))
                    <td style="color:black;background-color:#ff6c60;">{{$order->status->name}}</td>
                    @endif
                    <td>{{$order->name}}</td>
                    <td>{{$order->last_name}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->created_at->format('d/m/Y')}}</td>                                 
                </tr>
                             
                @endforeach
                  
               </tbody>
             </table>
           </div>
         </div>
       </div>
@endsection