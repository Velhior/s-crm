@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Связаться с нами</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('contact_post')}}" role="form" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Как к Вам обращаться">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" name="phone" class="form-control" id="phone">
                        </div>
                        <input type="submit" class="btn btn-success" value="Отправить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection