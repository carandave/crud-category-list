@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-secondary text-light">
                    <h4 class="mb-0">Edit Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Name Input -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Category Name</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ $category->name }}" required>
                        </div>

                        <!-- Description Input -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                        </div>

                        <!-- Active Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="active" name="status" class="form-check-input" value="1" {{ $category->status ? 'checked' : '' }}>
                            <label for="active" class="form-check-label">Active</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Update Category</button>

                        <!-- Back Button -->
                        <a href="{{ route('category.index') }}" class="btn btn-secondary mt-2 w-100">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
