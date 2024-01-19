@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Create New Technology</h1>
        <form class="mb-3" action="{{ route('admin.technologies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid
                @enderror" id="name"
                    required name="name" value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <img class="w-25" id="image-preview" src="https://via.placeholder.com/300" alt="image-preview">
                </div>
                <input value="{{ old('image') }}" type="file"
                    class="form-control @error('image') is-invalid
                @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a class="btn btn-warning" href="{{ route('admin.technologies.index') }}">Back</a>
            </div>
        </form>
    </section>
@endsection
