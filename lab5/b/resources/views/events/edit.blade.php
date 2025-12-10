<h1>Edit Event</h1>

<form action="{{ route('events.update', $event->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Event Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $event->name) }}">
        @error('name')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <div>
        <label for="organiser">Organiser</label>
        <select id="organiser" name="organiser">
            <option value="">Select Organiser</option>
            @foreach ($organisers as $organiser)
                <option value="{{ $organiser->id }}"
                    {{ old('organiser', $event->organiser) == $organiser->id ? 'selected' : '' }}>
                    {{ $organiser->name }}
                </option>
            @endforeach
        </select>
        @error('organiser')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <div>
        <label for="type">Type</label>
        <select id="type" name="type">
            <option value="">Select Type</option>
            @foreach(\App\ENUM\Type::cases() as $type)
                <option value="{{ $type->value }}" {{ old('type', $event->type) == $type->value ? 'selected' : '' }}>
                    {{ ucfirst($type->value) }}
                </option>
            @endforeach
        </select>
        @error('type')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <div>
        <label for="date">Date</label>
        <input type="date" id="date" name="date" value="{{ old('date', $event->date) }}">
        @error('date')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">{{ old('description', $event->description) }}</textarea>
        @error('description')<div style="color: red;">{{ $message }}</div>@enderror
    </div>

    <div>
        <button type="submit">Update Event</button>
    </div>
</form>

<a href="{{ route('events.index') }}">Back to Events</a>
