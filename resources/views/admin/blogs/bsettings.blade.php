@extends('admin.layout')
@section('title')
Настройки блога
@endsection
@section('content')
<div class="col-lg-12">
    <section class="panel">
        <div class="row">
            <div class="panel-body">
                <div class="">  
                    <div  class="col-sm-12">
                        <h3>Настройки блога</h3>
                        <hr/>
                        <form action="{{route('bsettings.update',$bsettings->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            {{method_field('PUT')}}
                            <hr>
                            <div class="form-group">
                                    <label for="seo_title_mask">Маска для SEO тайтла</label>
                                    <textarea class="form-control" id="seo_title_mask" placeholder="Скопируйте скрипт в эту область" name="seo_title_mask">{{$bsettings->seo_title_mask}}</textarea>
                            </div>
                            <div class="form-group">
                                    <label for="seo_description_mask">Маска для SEO описания</label>
                                    <textarea class="form-control" id="seo_description_mask" placeholder="Скопируйте скрипт в эту область" name="seo_description_mask">{{$bsettings->seo_description_mask}}</textarea>
                            </div>
        <div class="position-center">
        <button style="margin:20px" type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form> 
    </section>
</div>
@endsection