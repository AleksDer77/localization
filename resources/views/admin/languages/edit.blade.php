@extends('layouts.admin')

@section('admin.title')
    {{ __('Языки') }}
@endsection


@section('admin.content')

    <div class="card">
        <div class="card-body">
            <div class="card-title">
                {{ __('Редактировать') }}
            </div>

            @include('admin.languages.form', [
                'action' => route('admin.languages.update', $language),
                'method' => 'put',
            ])

        </div>
    </div>

@endsection
