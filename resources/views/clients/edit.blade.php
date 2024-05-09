@extends('layouts.app')

@section('content')
    <div class="container m-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit client</div>

                    <div class="card-body">
                        <form action="{{ route('clients.update', ['client' => $client->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name"
                                       class="form-control rounded" value="{{ old('name', $client->user->name) }}">
                            </div>

                            <!-- Solde -->
                            <div class="form-group">
                                <label for="name">Solde</label>
                                <input type="number" name="solde" id="solde" min="0"
                                       class="form-control rounded" value="{{ old('solde', $client->solde) }}">
                            </div>

                            <!-- Submit Button -->
                            <button client="submit" class="btn btn-primary text-dark m-2 rounded">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
