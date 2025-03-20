@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <!-- Name Input -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>

                        <!-- Description Input -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- Active User Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" id="active" name="active" value="1" class="form-check-input">
                            <label for="active" class="form-check-label">Active User</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection