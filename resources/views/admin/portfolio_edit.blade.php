@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div class="wrapper container-fluid">
        {!! Form::open(['url' => route('portfolioEdit', $portfolio->id), 'class' => 'form-horizontal', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::hidden('id', $portfolio->id) !!}
            {!! Form::label('name', 'Название:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-8">
                {!! Form::text('name', $portfolio->name, ['class' => 'form-control', 'placeholder' => 'Введите название работы']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('filter', 'Категория:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="combo-select col-sm-8">
                <select name="filter" class="form-control">
                    <optgroup label="На сайте">
                        @foreach($filters as $filter)
                            <option value="{{ $filter }}" {{ ($portfolio->filter === $filter) ? 'selected' : '' }}>{{ $filter }}</option>
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
            {!! Form::label('old_images', 'Изображение:', ['class' => 'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Html::image('assets/img/'.$portfolio->images, '', ['class' => 'img-circle img-responsive', 'width' => '150px']) !!}
                {!! Form::hidden('old_images', $portfolio->images) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('images', 'Новое изображение:', ['class'=>'col-sm-2 control-label']) !!}
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