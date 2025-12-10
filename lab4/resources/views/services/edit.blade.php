@extends('layouts.app')

@section('content')
    <h1>{{ isset($service) ? 'Ажурирај сервисирање' : 'Додади сервисирање' }}</h1>

    <form action="{{ isset($service) ? route('services.update', $service->id) : route('services.store') }}" method="POST">
        @csrf
        @if(isset($service))
            @method('PUT')
        @endif

        <label>Механичар:</label>
        <input type="text" name="mechanic_name" value="{{ $service->mechanic_name ?? '' }}" required><br>

        <label>Клиент:</label>
        <input type="text" name="client_name" value="{{ $service->client_name ?? '' }}" required><br>

        <label>Марка:</label>
        <input type="text" name="car_brand" value="{{ $service->car_brand ?? '' }}" required><br>

        <label>Модел:</label>
        <input type="text" name="car_model" value="{{ $service->car_model ?? '' }}" required><br>

        <label>Табличка:</label>
        <input type="text" name="license_plate" value="{{ $service->license_plate ?? '' }}" required><br>

        <label>Опис:</label>
        <textarea name="description" required>{{ $service->description ?? '' }}</textarea><br>

        <label>Цена:</label>
        <input type="number" step="0.01" name="price" value="{{ $service->price ?? '' }}" required><br>

        <label>Датум на прием:</label>
        <input type="date" name="received_at" value="{{ $service->received_at ?? '' }}" required><br>

        <label>Датум на завршување:</label>
        <input type="date" name="finished_at" value="{{ $service->finished_at ?? '' }}"><br>

        <button type="submit">{{ isset($service) ? 'Ажурирај' : 'Додади' }}</button>
    </form>
@endsection
