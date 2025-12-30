@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Leads</h3>
    <a href="{{ route('leads.create') }}" class="btn btn-primary">Add Lead</a>
</div>
<form method="GET" class="mb-4 flex gap-2">
    <input type="text" name="search" value="{{ request('search') }}"
           placeholder="Search by name or email"
           class="border rounded px-3 py-2 w-full md:w-1/3">

    <button class="bg-indigo-600 text-white px-4 py-2 rounded">
        Search
    </button>
</form>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Deltet</th>
        </tr>
    </thead>
    <tbody>
        @foreach($leads as $lead)
        <tr>
      <th scope="row">{{ $lead->name }}</th>

            <td>{{ $lead->email }}</td>
            <td>{{ $lead->phone }}</td>
            <td>{{ ucfirst($lead->status) }}</td>
            <td>
                <a href="{{ route('leads.edit', $lead) }}" class="btn btn-sm btn-warning">Edit</a>



            </td>
            <td>
<a href="#"
   onclick="if(confirm('Delete this lead?')){ document.getElementById('delete-{{ $lead->id }}').submit(); }"
   class="text-red-600 hover:underline">
   Delete
</a>

<form id="delete-{{ $lead->id }}" action="{{ route('leads.destroy', $lead->id) }}" method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4">
    {{ $leads->withQueryString()->links() }}
</div>



@endsection
