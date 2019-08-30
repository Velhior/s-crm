@extends('admin.layout')
@section('title')
Статусы
@endsection
@section('content')

<div class="table-agile-info">
        <a style="margin-bottom:20px;" href="{{route('statuses.create')}}" class="btn btn-success">
            <i class="fa fa-plus"></i> Создать новый статус
        </a>
        <div class="panel panel-default">
           <div class="panel-heading">
            Статусы
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
                   <th>Операции</th>                   
                 </tr>
               </thead>
               <tbody>
               @foreach ($statuses as $status)
              
                <tr class="respons-table" data-expanded="true">                                        
                    <td>{{$status->id}}</td>
                    <td><form class="form-horizontal" role="form" method="POST" action="{{route('statuses.update',$status->id)}}">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="input-group m-bot15">
                                <input type="text" class="form-control" name="name" id="name" value="{{$status->name}}">
                                <span class="input-group-btn">
                                <input class="btn btn-success" type="submit" value="Сохранить">
                                </span>
                            </div>
                        </form></td>
                    <td><a href="{{route('statuses.destroy',$status->id)}}" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form-st-{{$status->id}}').submit();">
                            Удалить статус
                    </a>
                <form action="{{route('statuses.destroy',$status->id)}}" method="post" id="delete-form-st-{{$status->id}}" style="display:none;">
                        {{csrf_field()}}
                        {{ method_field('DELETE') }}
                    </form></td>                                                     
                </tr>
                             
                @endforeach
                  
               </tbody>
             </table>
           </div>
         </div>
       </div>
@endsection