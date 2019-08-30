@extends('admin.layout')
@section('title')
Посты
@endsection
@section('content')

<div class="table-agile-info">
        <a style="margin-bottom:20px;" href="{{route('blogs.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Создать пост
        </a>
        <div class="panel panel-default">
           <div class="panel-heading">
            Посты
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
                   <th>Заголовок</th>
                   <th data-breakpoints="xs sm md" data-title="DOB">Дата создания</th>
                 </tr>
               </thead>
               <tbody>
               @foreach ($posts as $post)
              
                <tr class="respons-table" data-expanded="true" onclick="window.location.href='{{route('blogs.edit',$post->id)}}'; return false">                                        
                    <td>{{$post->id}}</td>                   
                    <td>@if ($post->published == 1) Опубликован @else Не опубликован @endif</td>                
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at->format('d/m/Y')}}</td>                                 
                </tr>
                             
                @endforeach
                  
               </tbody>
             </table>
           </div>
         </div>
       </div>
@endsection