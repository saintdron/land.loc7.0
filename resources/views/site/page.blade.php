@extends('layouts.site')

{{--@section('header')
    @include('site.header')
@endsection--}}

@section('content')
    <div class="inner_wrapper read_more">
        <div class="container">
            <h2 class="head">{{ $title }}</h2>
            <hr>
            <div class="inner_section">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
                        {{ Html::image('assets/img/'.$page->images, '', ['class' => 'img-circle delay-03s wow zoomIn']) }}
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
                        <div class="delay-01s fadeInDown wow">
                            {!! $page->text !!}
                        </div>
                    </div>
                </div>
                {!! link_to(route('index'), 'Back', ['class' => 'read_more2']) !!}
            </div>
        </div>
    </div>
@endsection
