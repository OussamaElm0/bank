@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $client->name }}</div>

                    <div class="card-body">
                        <p><strong>ID:</strong> {{ $client->id }}</p>
                        <p><strong>Name:</strong> {{ $client->user->name }}</p>
                        <p><strong>Total virements:</strong> {{ count($client->virements()->get()) }}</p>

                        <a href="{{ route('clients.edit', ['client' => $client->id]) }}" class="btn btn-primary">Edit</a>

                        <!-- Delete Form -->
                        <form action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="POST"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button client="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this client?')"
                                    style="color: #1a202c">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
