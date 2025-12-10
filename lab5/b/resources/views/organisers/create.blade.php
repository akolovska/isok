<h1>Create New Organiser</h1>

<form action="{{ route('organisers.store') }}" method="POST">
    @csrf

    <div>
        <label for="full_name">Name</label>
        <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}">
        @error('full_name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="phone">Phone</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
        @error('phone')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <button type="submit">Create Organiser</button>
    </div>
</form>

<a href="{{ route('organisers.index') }}">Back to Organisers</a>
