@extends('admin.layout')
@section('title')
Редактирование FAQ {{$faq->faq_name}}
@endsection
@section('content')
<section class="panel">
    <pre style="height:100%;">
    <?php print_r($faq); ?>
    <?php // print_r($categories); ?>
    </pre>
</section>
@endsection