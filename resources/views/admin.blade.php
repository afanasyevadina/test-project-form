@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="d-sm-flex justify-content-between align-items-center">
            <h1 class="mb-4">All responses</h1>
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Download
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('export-json') }}" target="_blank">JSON</a>
                    <a class="dropdown-item" href="{{ route('export-csv') }}" target="_blank">CSV</a>
                </div>
            </div>
        </div>
        @forelse($applications as $application)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-auto">
                            <div class="h1 text-primary fade-50">#{{ $application->id }}</div>
                        </div>
                        <div class="col">
                            <div class="h5 mb-2">{{ $application->name }}</div>
                            <div class="mb-3 text-muted">{{ $application->phone }}</div>
                            <div>{!! nl2br(htmlspecialchars($application->message)) !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <div class="mb-4">
                    Nothing yet
                </div>
                <a href="/" class="btn btn-lg btn-success">Be the first!</a>
            </div>
        @endforelse
        {{ $applications->links() }}
    </div>
@endsection
