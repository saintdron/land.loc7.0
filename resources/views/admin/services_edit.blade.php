@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        {!! Form::open(['url' => route('servicesEdit', $service->id), 'class' => 'form-horizontal']) !!}

        <div class="form-group">
            {!! Form::hidden('id', $service->id) !!}
            {!! Form::label('name', 'Название:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', $service->name, ['class' => 'form-control', 'placeholder' => 'Введите название сервиса']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Текст:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::textarea('text', $service->text, ['class' => 'form-control', 'placeholder' => 'Введите текст']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('old_icon', 'Иконка:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                <span class="fa {{ $service->icon }} service_icon_preview"></span>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('icon', 'Новая иконка:', ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('icon', $service->icon, ['class' => 'form-control', 'placeholder' => 'Введите класс иконки']) !!}
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {!! Form::button('Сохранить', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
            </div>
        </div>

        {!! Form::close() !!}

    </div>
@endsection