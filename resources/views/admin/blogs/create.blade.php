@extends('admin.layout')
@section('title')
Новый пост
@endsection
@section('content')
<section class="panel">
    <header class="panel-heading">
        Новый пост
    </header>
    <div class="panel-body">
        <div class="position-center">
        <form role="form" enctype="multipart/form-data" method="POST" action="{{route('blogs.store')}}">
                @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Заголовок поста">
            </div>
            <div class="form-group">
                <label for="slug">ЧПУ</label>
                <input type="text" name="slug" class="form-control" id="slug" placeholder="желаемое чпу">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="published" id="published"> Опубликовать
                </label>
            </div>
            <div class="form-group">
                <label for="seo_title">SEO заголовок</label>
                <textarea type="text" name="seo_title" class="form-control" id="seo_title" placeholder="Фамилия"></textarea>
            </div>
            <div class="form-group">
                <label for="seo_description">SEO описание</label>
                <textarea type="text" name="seo_description" class="form-control" id="seo_description" placeholder="seo_description"></textarea>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" name="description" class="form-control" id="description"></textarea>
            </div>            
            <div class="form-group">
                <label for="content">Контент</label>
                <textarea type="text" name="content" class="form-control" id="content"></textarea>
            </div>
            <div class="form-group">
                <label for="blog_image">Картинка для Поста</label>
                <input type="file" id="blog_image" name="blog_image">
                <p class="help-block">Картинка</p>
            </div>
            <button type="submit" class="btn btn-info">Сохранить</button>
        </form>
        </div>

    </div>
</section>
@endsection
@section('footer-scripts')
<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<script src="{{ asset('js/slug-modify.js') }}"></script>
<script>
  $(function($) {
    $.fn.prepopulate = function(dependencies, maxLength) {
        /*
            Depends on convert.js
            Populates a selected field with the values of the dependent fields,
            URLifies and shortens the string.
            dependencies - array of dependent fields id's
            maxLength - maximum length of the URLify'd string
        */
        return this.each(function() {
            var field = $(this);

            field.data('_changed', false);
            field.change(function() {
                field.data('_changed', true);
            });

            var populate = function () {
                // Bail if the fields value has changed
                if (field.data('_changed') == true) return;

                var values = [];
                $.each(dependencies, function(i, field) {
                  if ($(field).val().length > 0) {
                      values.push($(field).val());
                  }
                })
                field.val(TranslitmeConvert(values.join(' '), maxLength));
            };

            $(dependencies.join(',')).keyup(populate).change(populate).focus(populate);
        });
    };
  });
  </script>
  <script type="text/javascript">
  $(function($) {
    var field;
    field = {
        id: '#slug',
        dependency_ids: [],
        dependency_list: [],
        maxLength: 3000
    };
    field['dependency_ids'].push('#title');
    field['dependency_list'].push('cyrillic');
    //$('#field-translit').addClass('prepopulated_field');
    $(field.id).data('dependency_list', field['dependency_list']).prepopulate(field['dependency_ids'], field.maxLength);
  });
  </script>
@endsection