@extends('admin.layout')
@section('title')
Основные настройки
@endsection
@section('content')
<div class="col-lg-12">
    <section class="panel">
        <div class="row">
            <div class="panel-body">
                <div class="">  
                    <div  class="col-sm-12">
                        <h3>Настройки сайта</h3>
                        <hr/>
                        <div class="col-xs-2">
                            <!-- required for floating -->
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tabs-left vertical-text">
                                <li class="active"><a href="#home-v" data-toggle="tab">Основные настройки</a></li>
                                <li><a href="#profile-v" data-toggle="tab">Скрипты и аналитика</a></li>
                                <li><a href="#messages-v" data-toggle="tab">Социальные ссылки</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-xs-10">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home-v">
                                        <header class="panel-heading">
                                            Основные настройки сайта
                                        </header>                                       
                                                <form role="form" action="{{route('settings.update',$settings->id)}}" enctype="multipart/form-data" method="POST">
                                                @csrf
                                                {{method_field('PUT')}}
                                                <div class="form-group">
                                                    <img style="max-width:170px;" src="{{asset('images/'.$settings->logo)}}" alt=""><br />
                                                    <label for="logo">Логотип</label>
                                                    <input type="file" id="logo" name="logo">
                                                    <p class="help-block">Логотип компании</p>
                                                </div>    
                                                <div class="form-group">
                                                    <label for="email">Email менеджера (обработка заказов)</label>
                                                    <input type="email" class="form-control" id="email" placeholder="Введите email" name="email" value="{{$settings->email}}">
                                                    <span class="help-block">Почта на которую будут приходить заказы</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Контактный телефон</label>
                                                <input type="tel" class="form-control" id="phone" placeholder="Введите телефон" name="phone" value="{{$settings->phone}}">
                                                <span class="help-block">Телефон, который будет отображаться на сайте</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="contact_email">Контактный Email</label>
                                                    <input type="email" class="form-control" id="contact_email" placeholder="Введите email" name="contact_email" value="{{$settings->contact_email}}">
                                                    <span class="help-block">Email для отображения на сайте</span>
                                                </div>                                       
                                </div>
                                <div class="tab-pane" id="profile-v">                                     
                                            <header class="panel-heading">
                                                Скрипты для вставки
                                            </header>
                                            <div class="form-group">
                                                <label for="contact_map">Скрипт карты для контактов</label>
                                                <textarea class="form-control" id="contact_map" placeholder="Скопируйте скрипт в эту область" name="contact_map">{{$settings->contact_map}}</textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="scripts_head">Скрипт для вставки в head</label>
                                                <textarea class="form-control" id="scripts_head" placeholder="Скопируйте скрипт в эту область" name="scripts_head">{{$settings->scripts_head}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="scripts_footer">Скрипт счетчика для вставки в footer</label>
                                                <textarea class="form-control" id="scripts_footer" placeholder="Скопируйте скрипт в эту область" name="scripts_footer">{{$settings->scripts_footer}}</textarea>
                                            </div>
                                            <header class="panel-heading">
                                                Счетчики для интеграции
                                            </header>
                                            <div class="form-group">
                                                <label for="counter">Скрипт счетчика для вставки на сайт</label>
                                                <textarea class="form-control" id="counter" placeholder="Скопируйте скрипт в эту область" name="counter">{{$settings->counter}}</textarea>
                                            </div>
                                          
                                            <div class="form-group">
                                                <label for="ga_counter">Google Analytics Counter</label>
                                                <input type="email" class="form-control" id="ga_counter" placeholder="Введите идентификатор счетчика" name="ga_counter" value="{{$settings->ga_counter}}">
                                                <span class="help-block">Введите идентификатор счетчика без пробелов в виде - UA-123456-1.</span>
                                            </div>  
                                            <div class="form-group">
                                                <label for="ym_counter">Yandex Метрика</label>
                                                <input type="email" class="form-control" id="ym_counter" placeholder="Введите номер счетчика" name="ym_counter" value="{{$settings->ym_counter}}">
                                                <span class="help-block">Введите номер счетчика без пробелов в виде - 54004536.</span>
                                            </div> 
                                            <div class="form-group">
                                                <label for="tag_manager">Google Tag Manager</label>
                                                <input type="email" class="form-control" id="tag_manager" placeholder="Введите идентификатор GTM" name="tag_manager" value="{{$settings->tag_manager}}">
                                                <span class="help-block">Введите идентификатор тег менеджера без пробелов в виде - GTM-TCPDZ97.</span>
                                            </div>  
                                            <header class="panel-heading">
                                                Коллтрекинг
                                            </header>                                    
                                            <div class="form-group">
                                                <label for="calltouch">Calltouch</label>
                                                <input type="email" class="form-control" id="calltouch" placeholder="Введите идентификатор" name="calltouch" value="{{$settings->calltouch}}">
                                                <span class="help-block">Введите идентификатор счетчика, который можно узнать в личном кабинете сервиса.</span>
                                            </div>
                                            <div class="checkbox">
                                                <label for="calibri">
                                                <input type="checkbox" id="calibri" name="calibri" value="{{$settings->calibri}}" @if($settings->calibri==1) checked @endif>Использование Calibri</label>
                                                <span class="help-block">Включение классов калибри для идентификации телефонных номеров</span>
                                            </div>
                                </div>
                                <div class="tab-pane" id="messages-v">

                                        <header class="panel-heading">
                                            Социальные ссылки
                                        </header>
                                        <div class="form-group">
                                            <label for="social_vk">Ссылка на группу в ВК</label>
                                            <input type="text" class="form-control" id="social_vk" placeholder="Введите social_vk" name="social_vk" value="{{$settings->social_vk}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_fb">Ссылка на группу в Fb</label>
                                            <input type="text" class="form-control" id="social_fb" placeholder="Введите social_fb" name="social_fb" value="{{$settings->social_fb}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_inst">Ссылка на группу в Instagramm</label>
                                            <input type="text" class="form-control" id="social_inst" placeholder="Введите social_inst" name="social_inst" value="{{$settings->social_inst}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_telegramm">Ссылка на канал в телеграмм</label>
                                            <input type="text" class="form-control" id="social_telegramm" placeholder="Введите social_telegramm" name="social_telegramm" value="{{$settings->social_telegramm}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_viber">Ссылка на Viber</label>
                                            <input type="text" class="form-control" id="social_viber" placeholder="Введите social_viber" name="social_viber" value="{{$settings->social_viber}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_youtube">Ссылка на канал в YouTube</label>
                                            <input type="text" class="form-control" id="social_youtube" placeholder="Введите social_youtube" name="social_youtube" value="{{$settings->social_youtube}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_wup">Ссылка на Watsupp</label>
                                            <input type="text" class="form-control" id="social_wup" placeholder="Введите social_wup" name="social_wup" value="{{$settings->social_wup}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_skype">Ссылка на Skype</label>
                                            <input type="text" class="form-control" id="social_skype" placeholder="Введите social_skype" name="social_skype" value="{{$settings->social_skype}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="social_tw">Ссылка на Twitter</label>
                                            <input type="text" class="form-control" id="social_tw" placeholder="Введите social_tw" name="social_tw" value="{{$settings->social_tw}}">
                                        </div>
                                  
                                </div>
                                
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                     
                </div>               
            </div>            
        </div>   
        <div class="position-center">
        <button style="margin:20px" type="submit" class="btn btn-success">Сохранить</button>
        </div>
    </form> 
    </section>
</div>
@endsection