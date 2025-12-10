<h1>Edit Organiser</h1>

<form action="{{ route('organisers.update', $organiser->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="full_name">Name</label>
        <input type="text" id="full_name" name="full_name" value="{{ old('full_name', $organiser->full_name) }}">
        @error('full_name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email', $organiser->email) }}">
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $organiser->phone) }}">
        @error('phone')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <button type="submit">Update Organiser</button>
    </div>
</form>

<a href="{{ route('organisers.index') }}">Back to Organisers</a>
