@extends('admin.layout')
@section('title')
FAQ
@endsection
@section('content')

<div class="table-agile-info">
        <a style="margin-bottom:20px;" href="{{route('faqs.create')}}" class="btn btn-success">
                <i class="fa fa-plus"></i> Создать faq
        </a>        
        <div class="panel panel-default">
           <div class="panel-heading">
            FAQ
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
                   <th>Вопрос</th>
                   <th data-breakpoints="xs sm md" data-title="DOB">Дата создания</th>
                 </tr>
               </thead>
               <tbody>
               @foreach ($faqs as $faq)
              
                <tr class="respons-table" data-expanded="true" onclick="window.location.href='{{route('faqs.edit',$faq->id)}}'; return false">                                        
                    <td>{{$faq->id}}</td>                
                    <td>@if(isset ($faq->category->name)){{$faq->category->name}}@endif</td>                    
                    <td>{{$faq->faq_name}}</td>                    
                    <td>{{$faq->created_at->format('d/m/Y')}}</td>                                 
                </tr>
                             
                @endforeach
                  
               </tbody>
             </table>
           </div>
         </div>
       </div>
@endsection