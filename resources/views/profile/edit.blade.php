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

                        <h1>Редактировать данные {{ $user->name }}</h1>
                            <form action="{{ url('/profile/save') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name">Редактировать имя и фамилию</label>
                                    <input name="name" type="text" class="form-control" id="name" placeholder="Имя Фамилия" value="{{ $user->name }}" required>
                                </div>
                                <input type="hidden" value="{{ $user->id }}" name="id">
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
