@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Item</h2>

    <form action="{{ route('items.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Item Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $item->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ $item->description }}">
        </div>
        <button type="submit" class="btn btn-success">Update Item</button>
    </form>
</div>
@endsection
