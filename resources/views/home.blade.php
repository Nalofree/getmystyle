@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Личный кабинет</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1> {{$user->name}} </h1>
                    <p>
                        Контактные данные:<br>
                        Email: {{$user->email}}
                    </p>
                    <p>
                        Компания:<br>
                        {{$company->name}}<br>
                        {{$company->description}}
                    </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
