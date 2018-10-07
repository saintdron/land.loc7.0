@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div style="margin: 0 50px;">
        @if(isset($portfolio) && is_object($portfolio))
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Изображение</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th>Дата создания</th>
                    <th>Дата изменения</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($portfolio as $k => $item)
                    <tr>
                        <td>{!! Html::image(asset('assets/img/'.$item->images), $item->images, ['class' => 'portfolio_preview']) !!}</td>
                        <td>{!! Html::link(route('portfolioEdit', $item->id), $item->name) !!}</td>
                        <td>{{ strtoupper($item->filter) }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->updated_at }}</td>
                        <td>
                            {{ Form::open([
                                            'url' => route('portfolioEdit', ['page' => $item->id]),
                                            'class' => 'form-horizontal',
                                            'method' => 'POST'
                                        ]) }}
                            {{ method_field('DELETE') }}
                            {{ Form::submit('Удалить', ['class' => 'btn btn-danger']) }}
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        {!! Html::link(route('portfolioAdd'), 'Новая страница') !!}
    </div>
@endsection
