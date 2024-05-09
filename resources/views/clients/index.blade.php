@extends('layouts.app')

@section('content')
    <a href="{{ route('clients.create') }}" class="btn bg-success text-light p-2 m-2">Create</a>
    <table class="table-auto w-full bg-white shadow-md rounded-lg">
        <thead class="bg-gray-50">
        <tr>
            <th class="px-4 py-2 text-left"> # </th>
            <th class="px-4 py-2 text-left"> Name </th>
            <th class="px-4 py-2 text-left"> Solde </th>
            <th class="px-4 py-2 text-left"> Total de virements </th>
            <th class="px-4 py-2 text-left">Actions</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($clients as $client)
            <tr>
                <td class="px-4 py-2">{{ $client->id }}</td>
                <td class="px-4 py-2">{{ $client->user->name }}</td>
                <td class="px-4 py-2">{{$client->solde}}</td>
                <td class="px-4 py-2">{{ count($client->virements()->get()) }}</td>
                <td class="px-4 py-2 flex gap-4">
                    <a class="btn btn-outline-primary" href="{{ route('clients.show', ['client' => $client->id]) }}">
                        Show
                    </a>
                    <a class="btn btn-outline-warning" href="{{ route('clients.edit', ['client' => $client->id]) }}">
                        Edit
                    </a>
                    <form method="post" action="{{ route('clients.destroy', ['client' => $client->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
