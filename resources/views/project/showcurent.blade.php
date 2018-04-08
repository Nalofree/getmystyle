@extends('layouts.app')

@section('content')
    <div class="container">
        {{--<div class="row">--}}
            {{--<div class="col-md-2 logo"><img src="http://placehold.it/170x170" alt="" width="100%"></div>--}}
            {{--<div class="col-md-10 projectmenu">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<li>--}}
                        {{--<div class="btn btn-lg btn-default">Оплата</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<ul class="nav navbar-nav navbar-right">--}}
                    {{--<li>--}}
                        {{--<div class="btn btn-lg btn-default">Выйти</div>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-md-2 project-sidebar">
                <img src="http://placehold.it/170x170" alt="" width="100%" class="img-circle">
                <h3>{{ $company->name }}</h3>
                <p>{{ $company->description }}</p>
                <p>{{ $user->position }}</p>
                <a class="btn btn-lg btn-default" href="{{ url('/profile',['id'=>$user->id,]) }}">Изменить информацию</a>
            </div>
            <div class="col-md-10 project-content">
                <h4>Этапы</h4>
                <div class="row">
                    <div>
                        <div class="col-md-3">1</div>
                        <div class="col-md-3">2</div>
                        <div class="col-md-3">3</div>
                        <div class="col-md-3">4</div>
                    </div>
                    <div>
                        <div class="col-md-3">|</div>
                        <div class="col-md-3">|</div>
                        <div class="col-md-3">|</div>
                        <div class="col-md-3">|</div>
                    </div>
                </div>
                <div class="row">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h2>Этап 1</h2>
                </div>
                <div class="row">
                    <a href="/addrequest" class="btn-primary btn btn-lg">
                        Добавить опрос
                    </a>
                </div>
            </div>
        </div>
        {{--<div class="row">--}}
            {{--<div class="col-md-8 col-md-offset-2">--}}

                {{--<div class="panel panel-default">--}}
                    {{--@if (session()->has('message'))--}}
                        {{--<div class="alert alert-success">{{ session('message') }}</div>--}}
                    {{--@endif--}}
                    {{--<div class="panel-heading">Личный кабинет</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--@if (session('status'))--}}
                            {{--<div class="alert alert-success">--}}
                                {{--{{ session('status') }}--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--@if ($project != null)--}}
                            {{--<h1>Настроить проект {{$project->name}}</h1>--}}
                        {{--@endif--}}
                            {{--<h3>{{$project->name}}</h3>--}}
                            {{--<p>{{$project->description}}</p>--}}
                            {{--<hr>--}}
                            {{--<p>Опросов пока нет</p>--}}
                            {{--<a href="{{url('/add/gform', ['id'=>$project->id,])}}" class="btn btn-success" disabled>Добавить</a>--}}
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
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
