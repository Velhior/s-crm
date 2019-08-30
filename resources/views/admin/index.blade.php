@extends ('admin.layout')
@section('title')
Административная панель
@endsection
@section('content')
<p style="display:none;"><?= include 'stat.php'; ?></p>
<div class="market-updates">
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-2">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-eye"> </i>
            </div>
             <div class="col-md-8 market-update-left">
             <h4>Посетители онлайн</h4>
            <h3><?= include 'visitors.php'; ?></h3>
            <p>Просматривают сайт</p>
          </div>
          <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-md-8 market-update-left">
            <h4>Уникальных посетителей</h4>
                <h3><?=$kd;?></h3>
                <p>За вчерашний день</p>
            </div>
          <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-6 market-update-gd">
        <div class="market-update-block clr-block-3">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-users"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Всего посещений</h4>
                <h3><?=$allVisitors;?></h3>
                <p>Более точные данные статистики и аналитики смотреть в <a class="backend-link" href="https://metrika.yandex.ru/">Яндекс Метрике</a> и <a class="backend-link" href="https://analytics.google.com/analytics/web/">Google Analytics</a></p>
            </div>
          <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-4">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Заказы</h4>
                <h3>{{$allorders}}</h3>
                <p>Общее кол-во заказов</p>
            </div>
          <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-6 market-update-gd">
            <div class="market-update-block clr-block-2">
                <div class="col-md-4 market-update-right">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </div>
                <div class="col-md-8 market-update-left">
                    <h4>Новые заказы</h4>
                    <h3>{{$cnorders}}</h3>
                <p>Заказы со статусом новый. Перейти в <a href="{{route('orders.index')}}">заказы</a></p>
                </div>
              <div class="clearfix"> </div>
            </div>
        </div>
   <div class="clearfix"> </div>
</div>
@endsection