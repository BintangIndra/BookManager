@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $author->name }}</div>

                <div class="card-body">
                    <p><strong>Biography:</strong> {{ $author->biography }}</p>


                    <a href="{{ route('authors.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection