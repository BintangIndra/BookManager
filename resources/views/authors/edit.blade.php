@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Author</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('authors.update', $author->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="biography">Biography</label>
                            <textarea class="form-control" id="biography" name="biography" rows="3">{{ $author->biography }}</textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('authors.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection