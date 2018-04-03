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
                        @if ($projects != null)
                            <h1>Ваши проекты</h1>
                            @foreach($projects as $project)
                                <div class="row">
                                    <div class="col-md-2">
                                        <p>{{ $project->id }} </p>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>{{ $project->name }} </h4>
                                        <p>{{ $project->description }} </p>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ url('/projects/edit', ['id'=>$project->id,]) }}" class="btn btn-primary">Редактировать</a>
                                        <a href="{{ url('/projects/showcurrent', ['id'=>$project->id,]) }}" class="btn btn-primary">Настроить</a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                            <form action="{{ url('/projects/add') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Название компании</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Название" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание компании</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="Описние" required></textarea>
                                </div>
                                    <button type="submit" class="btn btn-success">Добавить</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
