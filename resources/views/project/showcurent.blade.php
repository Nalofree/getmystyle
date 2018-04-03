@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div class="panel panel-default">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div class="panel-heading">Личный кабинет</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if ($project != null)
                            <h1>Настроить проект {{$project->name}}</h1>
                        @endif
                            <h3>{{$project->name}}</h3>
                            <p>{{$project->description}}</p>
                            <hr>
                            <p>Опросов пока нет</p>
                            <a href="{{url('/add/gform', ['id'=>$project->id,])}}" class="btn btn-success" disabled>Добавить</a>
                        {{--<form action="{{ url('/project/add') }}" method="post">--}}
                            {{--{{ csrf_field() }}--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="name">Название компании</label>--}}
                                {{--<input name="name" type="text" class="form-control" id="name" placeholder="Название" @if ($project != null)value="{{ $project->name }}"@endif required>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="description">Описание компании</label>--}}
                                {{--<textarea name="description" class="form-control" id="description" placeholder="Описние" required>@if ($project != null){{ $project->description }}@endif</textarea>--}}
                            {{--</div>--}}
                            {{--<button type="submit" class="btn btn-success">Добавить</button>--}}
                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
