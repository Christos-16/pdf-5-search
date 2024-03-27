@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">PDF Search</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="filename" placeholder="Enter filename" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>

            @if($fileNotFound)
                <div class="alert alert-danger">
                    {{ $fileNotFound }}
                </div>
            @elseif($error)
                <div class="alert alert-danger mt-4 text-center">
                    {{ $error }}
                </div>
            @endif
            @if(isset($foundFile) && $foundFile)
                <div class="text-center mt-4">
                    <a href="{{ asset($foundFile) }}" target="_blank" class="btn btn-success">Open PDF</a>
                    <p>File name: {{ $filename }}</p>
                    <p>Number of pages: {{ $numPages }}</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
