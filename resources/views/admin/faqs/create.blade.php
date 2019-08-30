@extends('admin.layout')
@section('title')
Новый faq
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        Новый faq
    </header>
    <div class="panel-body">
        <div class="position-center">
        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('faqs.store')}}">
                @csrf
            <div class="form-group">
                <label for="faq_name">Вопрос</label>
                <input type="text" name="faq_name" class="form-control" id="faq_name" placeholder="Имя Заказчика">
            </div>
            <div class="form-group">
                <label for="faq_text">Информация под спойлером</label>
                <textarea type="text" name="faq_text" class="form-control" id="faq_text"></textarea>
            </div>           
            <div class="form-group">
            <label for="category">Категория</label>
                <select class="form-control" id="category" name="category">
                    @foreach ($categories as $category)
                    <option name="category" value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>           
            <button type="submit" class="btn btn-info">Сохранить</button>
        </form>
        </div>

    </div>
</section>
@endsection