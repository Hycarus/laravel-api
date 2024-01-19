@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Create New Category</h1>
        <form class="mb-3" action="{{ route('admin.categories.store') }}" method="POST">
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
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a class="btn btn-warning" href="{{ route('admin.categories.index') }}">Back</a>
            </div>
        </form>
    </section>
@endsection
