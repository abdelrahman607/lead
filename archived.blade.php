@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Archived Leads</h2>

<table class="min-w-full bg-white rounded shadow">
    @foreach($leads as $lead)
    <tr class="border-t">
        <td class="px-4 py-2">{{ $lead->name }}</td>
        <td class="px-4 py-2">{{ $lead->email }}</td>
        <td class="px-4 py-2">
            <form method="POST" action="{{ route('leads.restore',$lead->id) }}">
                @csrf
                <button class="text-green-600">Restore</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="mt-4">{{ $leads->links() }}</div>
@endsection
