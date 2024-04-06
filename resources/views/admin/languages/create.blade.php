@extends('layouts.admin')

@section('admin.title')
    {{ __('Языки') }}
@endsection


@section('admin.content')

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                {{ __('Создать язык') }}
            </div>

            @include('admin.languages.form', [
                'action' => route('admin.languages.store'),
                'method' => 'post',
            ])

        </div>
    </div>

@endsection
