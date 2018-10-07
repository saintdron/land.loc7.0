@extends('layouts.admin')

@section('header')
    @include('admin.header')
@endsection

@section('content')
    <div style="margin: 0 50px;">
        @if(isset($services) && is_object($services))
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Иконка</th>
                    <th>Название</th>
                    <th>Текст</th>
                    <th>Дата создания</th>
                </tr>
                </thead>
                <tbody>
                @foreach($services as $k => $service)
                    <tr>
                        <td><span class="fa {{ $service->icon }} service_icon_preview"></span></td>
                        <td>{!! Html::link(route('servicesEdit', $service->id), $service->name) !!}</td>
                        <td>{{ $service->text }}</td>
                        <td>{{ $service->created_at }}</td>
                        <td>
                            {{ Form::open([
                                            'url' => route('servicesEdit', ['page' => $service->id]),
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

        {!! Html::link(route('servicesAdd'), 'Новая страница') !!}
    </div>
@endsection
