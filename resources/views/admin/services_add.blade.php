@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        {!! Form::open(['url' => route('servicesAdd'), 'class' => 'form-horizontal']) !!}

        <div class="form-group">
            {!! Form::label('name', 'Название:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Введите название сервиса']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('text', 'Текст:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::textarea('text', old('text'), ['class' => 'form-control', 'placeholder' => 'Введите текст']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('icon', 'Иконка:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('icon', old('icon'), ['class' => 'form-control', 'placeholder' => 'Введите класс иконки']) !!}
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
