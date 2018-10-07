@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div style="margin: 0 50px;">
        @if(isset($pages) && is_object($pages))
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>№ п/п</th>
                    <th>Имя</th>
                    <th>Псевдоним</th>
                    <th>Текст</th>
                    <th>Дата создания</th>
                    <th>Удалить</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pages as $k => $page)
                    <tr>
                        <td>{{ $page->id }}</td>
                        <td>{!! Html::link(route('pagesEdit', $page->id), $page->name) !!}</td>
                        <td>{{ $page->alias }}</td>
                        <td>{{ $page->text }}</td>
                        <td>{{ $page->created_at }}</td>
                        <td>
                            {{ Form::open([
                                            'url' => route('pagesEdit', ['page' => $page->id]),
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

        {!! Html::link(route('pagesAdd'), 'Новая страница') !!}
    </div>
@endsection
