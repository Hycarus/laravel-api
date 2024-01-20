@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Create New Project</h1>

        <form class="mb-3" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid
                @enderror" id="title"
                    required name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Description</label>
                <textarea rows="6" class="form-control @error('body') is-invalid
                @enderror" id="body"
                    name="body">{{ old('body') }}</textarea>
                @error('body')
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
            <h5>Techologies</h5>
            @foreach ($technologies as $item)
                <div class="d-inline-block m-3">
                    <input class="@error('technologies') is-invalid
                    @enderror" type="checkbox"
                        name="technologies[]" value="{{ $item->id }}"
                        {{ in_array($item->id, old('technologies', [])), old('technologies', []) ? 'checked' : '' }}>
                    <img class="square" src="{{ $item->image }}" alt="{{ $item->name }}">
                </div>
                @error('technologies')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            @endforeach
            <div class="mb-3">
                <label for="category_id" class="form-label">Select Category</label>
                <select class="form-control @error('category_id') is-invalid
                @enderror" name="category_id"
                    id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="url">Url:</label>
                <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" id="url">
                @error('url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a class="btn btn-warning" href="{{ route('admin.projects.index') }}">Back</a>
            </div>
        </form>
    </section>
@endsection
