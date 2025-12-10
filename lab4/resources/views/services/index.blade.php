@extends('layouts.app')

@section('content')
    <h1>Сервисирања</h1>

    <a href="{{ route('services.create') }}">Додади сервисирање</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Механичар</th>
            <th>Клиент</th>
            <th>Марка</th>
            <th>Модел</th>
            <th>Табличка</th>
            <th>Опис</th>
            <th>Цена</th>
            <th>Датум на прием</th>
            <th>Датум на завршување</th>
            <th>Акции</th>
        </tr>
        @foreach($services as $service)
            <tr>
                <td>{{ $service->mechanic }}</td>
                <td>{{ $service->client }}</td>
                <td>{{ $service->model }}</td>
                <td>{{ $service->registration }}</td>
                <td>{{ $service->description }}</td>
                <td>{{ $service->price }}</td>
                <td>{{ $service->begin }}</td>
                <td>{{ $service->end ?? '-' }}</td>
                <td>
                    <a href="{{ route('services.edit', $service->id) }}">Ажурирај</a>
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Бриши</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <p>Вкупно сервисирања: {{ $totalServices }}</p>
    <p>Вкупна заработка: {{ $totalEarnings }}</p>

@endsection
