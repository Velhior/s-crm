@extends('admin.layout')
@section('title')
Редактирование FAQ {{$faq->faq_name}}
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        Редактирование FAQ {{$faq->faq_name}}
    </header>
    <div class="panel-body">
        <div class="position-center">
        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('faqs.update',$faq->id)}}">
            {{ method_field('PUT') }}
                @csrf
            <div class="form-group">
                <label for="faq_name">Вопрос</label>
                <input type="text" name="faq_name" class="form-control" id="faq_name" value="{{$faq->faq_name}}">
            </div>
            <div class="form-group">
                <label for="faq_text">Информация под спойлером</label>
                <textarea type="text" name="faq_text" class="form-control" id="faq_text">{{$faq->faq_text}}</textarea>
            </div>              
            <div class="form-group">
            <label for="faq_category_id">Категория</label>
                <select class="form-control" id="faq_category_id" name="faq_category_id">
                    @foreach ($categories as $category)
                    <option name="faq_category_id" value="{{$category->id}}" @if($category->id == $faq->faq_category_id) selected @endif>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>            
            <button type="submit" class="btn btn-info">Сохранить</button>
        </form>
        </div>

    </div>
</section>
@endsection