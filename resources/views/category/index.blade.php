@extends('layouts.app')

@section('content')
    <div class="card px-10 mt-5">
        <div class="card-header d-flex justify-between" style="justify-content: space-between; align-items: center">
            <h1>Category List</h1>
            <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
        </div>
        <div class="card-body">
            @if (session('success_store'))
                <div class="alert alert-success" role="alert">
                    {{ session('success_store') }}
                </div>
            @elseif (session('success_update'))
                <div class="alert alert-success" role="alert">
                    {{ session('success_update') }}
                </div>
            @elseif (session('success_delete'))
                <div class="alert alert-success" role="alert">
                    {{ session('success_delete') }}
                </div>
            @endif

            


            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                @if ($category->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            <td class="d-flex space-x-4">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info mr-1">Edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" class="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger ml-1">Delete</button>
                                </form>
                            </td>
                      </tr>
                    @endforeach
                  
                </tbody>
              </table>
              {{ $categories->links() }}
        </div>
    </div>
@endsection