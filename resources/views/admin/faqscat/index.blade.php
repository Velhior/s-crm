@extends('admin.layout')
@section('title')
Категории
@endsection
@section('content')

<div class="table-agile-info">
        <a style="margin-bottom:20px;" href="{{route('faqscat.create')}}" class="btn btn-success">
            <i class="fa fa-plus"></i> Создать новую категорию
        </a>
        <div class="panel panel-default">
           <div class="panel-heading">
            Категории
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
                   <th>Категория</th>
                   <th>Операции</th>                   
                 </tr>
               </thead>
               <tbody>
               @foreach ($categories as $category)
              
                <tr class="respons-table" data-expanded="true">                                        
                    <td>{{$category->id}}</td>
                    <td><form class="form-horizontal" role="form" method="POST" action="{{route('faqscat.update',$category->id)}}">
                            {{ method_field('PUT') }}
                            @csrf
                            <div class="input-group m-bot15">
                            <input type="text" class="form-control" name="name" id="name" value="{{$category->name}}">
                                <span class="input-group-btn">
                                <input class="btn btn-success" type="submit" value="Сохранить">
                                </span>
                            </div>
                        </form></td>
                    <td><a href="{{route('faqscat.destroy',$category->id)}}" class="btn btn-danger" onclick="event.preventDefault();document.getElementById('delete-form-st-{{$category->id}}').submit();">
                            Удалить категорию
                    </a>
                <form action="{{route('faqscat.destroy',$category->id)}}" method="post" id="delete-form-st-{{$category->id}}" style="display:none;">
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