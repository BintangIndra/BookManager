@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Authors</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('authors.create') }}" class="btn btn-primary">Add Author</a>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Biography</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author)
                            <tr>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->biography }}</td>
                                <td>
                                    <a href="{{ route('authors.show', $author->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this author?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection