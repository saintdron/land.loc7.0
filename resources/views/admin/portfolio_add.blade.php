@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        {!! Form::open(['url' => route('portfolioAdd'), 'class' => 'form-horizontal', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Название:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Введите название работы']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('filter', 'Категория:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="combo-select col-sm-8">
                <select name="filter" class="form-control">
                    <optgroup label="На сайте">
                        @foreach($filters as $filter)
                            <option value="{{ $filter }}" {{ (old('filter') === $filter) ? 'selected' : '' }}>{{ $filter }}</option>
                        @endforeach
                    </optgroup>
                    <optgroup label="Своя">
                        <option class="editable" value="Новая категория">Новая категория</option>
                    </optgroup>
                </select>
                <input class="form-control" style="display: none;">
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('images', 'Изображение:',['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::file('images', ['class' => 'filestyle', 'data-buttonText' => 'Выберите изображение', 'data-buttonName' => "btn-primary", 'data-placeholder' => "Файла нет"]) !!}
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
