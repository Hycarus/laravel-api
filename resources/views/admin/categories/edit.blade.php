@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{ $category->name }}</h1>
        <form action="{{ route('admin.categories.update', $category->slug) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" id="name"
                    required name="name" value="{{ old('name', $category->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a class="btn btn-warning" href="{{ route('admin.categories.index') }}">Back</a>
            </div>
        </form>
    </section>
@endsection
