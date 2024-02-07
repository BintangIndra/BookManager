@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Books</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
                    </div>
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>ISBN</th>
                                <th>Description</th>
                                <th>Published Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                            <tr>
                                <td>{{ $book->title }}</td>
                                <td>
                                    <ul>
                                        @foreach ($book->authors as $author)
                                            <li>{{ $author->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $book->isbn }}</td>
                                <td>{{ $book->description }}</td>
                                <td>{{ $book->published_date }}</td>
                                <td>
                                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
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