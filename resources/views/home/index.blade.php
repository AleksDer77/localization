@extends('layouts.main')

@section('main.title', 'Главная')

@section('main.content')
    {{ __('Язык по умолчанию: ') }} {{ app()->getLocale() }} <br>
    {{ __('Язык резервный: ') }} {{ app()->getFallbackLocale() }}

@endsection
