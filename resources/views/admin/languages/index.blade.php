@extends('layouts.admin')

@section('admin.title')
    {{ __('Языки') }}
@endsection

@section('admin.create')
    {{ route('admin.languages.create') }}
@endsection

@section('admin.content')

    @if($languages->isEmpty())
        {{ __('Нет ни одной записи.') }}
    @else
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <td>{{ __('ID') }}</td>
                    <td>{{ __('Название') }}</td>
                    <td>{{ __('Свойства') }}</td>
                    <td>
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($languages as $language)
                    <tr>
                        <td>
                            {{ $language->id }}
                        </td>

                        <td>
                            {{ $language->name }}
                        </td>

                        <td>
                            {{ $language->getStateText() }}
                        </td>

                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.languages.edit', $language) }}" class="text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd"
                                              d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg>

                                </a>
                                <a href="#" class="text-danger"
                                   onclick="event.preventDefault(); document.getElementById('languages-delete-{{$language->id}}').submit()">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                         class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </a>
                            </div>
                            <form action="{{ route('admin.languages.destroy', $language) }}" method="POST"
                                  id="languages-delete-{{$language->id}}">
                                @csrf @method('delete')
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    @endif

@endsection
