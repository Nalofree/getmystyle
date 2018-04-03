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
                            <h1>Редактировать данные {{ $project->name }}</h1>
                            <form action="{{ url('/projects/save/'.$project->id) }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Название проекта</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Название" @if ($project != null)value="{{ $project->name }}"@endif required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание проекта</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Описние" required>@if ($project != null){{ $project->description }}@endif</textarea>
                                </div>
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
