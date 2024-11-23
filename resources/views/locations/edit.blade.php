@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Location</h2>

    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Location Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $location->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $location->description }}">
        </div>
        <button type="submit" class="btn btn-success">Update Location</button>
    </form>
</div>
@endsection
