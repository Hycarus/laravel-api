@extends('layouts.app')
@section('content')
    <section class="container">
        <h1>Edit {{ $project->title }}</h1>
        <form action="{{ route('admin.projects.update', $project->slug) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid
                @enderror" id="title"
                    required name="title" value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Description</label>
                <textarea rows="6" class="form-control @error('body') is-invalid
                @enderror" id="body"
                    name="body">{{ old('body', $project->body) }}</textarea>
                @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <div class="mb-2">
                    <img class="w-25" id="image-preview" src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}">
                </div>
                <input type="file" class="form-control @error('image') is-invalid
                @enderror"
                    id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <h5>Techologies</h5>
            @foreach ($technologies as $item)
                <div class="d-inline-block m-3 @error('technologies') is-invalid @enderror">
                    @if ($errors->any())
                        <input type="checkbox" name="technologies[]" value="{{ $item->id }}"
                            @if (isset($technologies) && in_array($item->id, old('technologies', $project->technologies))) checked @endif>
                    @else
                        <input type="checkbox" name="technologies[]" value="{{ $item->id }}"
                            @if (isset($technologies) && $project->technologies->contains($item->id)) checked @endif>
                    @endif
                    <img class="square" src="{{ $item->image }}" alt="{{ $item->name }}">
                </div>
            @endforeach
            <div class="mb-3">
                <label for="category_id" class="form-label">Select Category</label>
                <select class="form-control @error('category_id') is-invalid
                @enderror" name="category_id"
                    id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
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
