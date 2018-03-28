<?php
/**
 * Created by PhpStorm.
 * User: nalof
 * Date: 20.03.2018
 * Time: 4:26
 */
?>
@extends('layouts.app')
@section('content')
    <h1>Вход</h1>
    <form action="/public/auth" method="post">
        <input type="text" name="username">
        <input type="password" name="passwd">
        <input type="submit">
    </form>
@stop
