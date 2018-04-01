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
                        @if ($company != null)
                            <h1>Редактировать данные {{ $company->name }}</h1>
                            <form action="{{ url('/company/save') }}" method="post">
                        @else
                            <h1>Добавить новую компанию</h1>
                            <form action="{{ url('/company/add') }}" method="post">
                        @endif
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">Название компании</label>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Название" @if ($company != null)value="{{ $company->name }}"@endif required>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание компании</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Описние" required>
                                    @if ($company != null){{ $company->description }}@endif
                                </textarea>
                            </div>
                            @if ($company != null)
                                <button type="submit" class="btn btn-success">Сохранить</button>
                            @else
                                <button type="submit" class="btn btn-success">Добавить</button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
