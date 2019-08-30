@extends('admin.layout')
@section('title')
Загрузка заказов
@endsection
@section('content')
<section class="panel">
    
        <header class="panel-heading">
            Импорт заказов
        </header>
        <div class="position-center">
        <div class="panel-body">          
            <div class="col-md-6">
                <form role="form" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group"> 
                        <label for="file">Выбрать файл</label>       
                        <input type="file" name="file">
                        <p class="help-block">Только для загрузки заказов</p>
                    </div>    
                    

                    <button class="btn btn-success">Импорт</button>

                    

                </form>
            </div>
            <div class="col-md-6">
                <a class="btn btn-warning" href="{{ route('export') }}">Экспорт заказов</a>
            </div>
            </div>

        </div>
    </div>
</section>
@endsection
   
