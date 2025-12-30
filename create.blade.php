@extends('layouts.app')

@section('title', 'Add Lead')

@section('content')
<div class="bg-white shadow rounded-xl p-6 max-w-3xl mx-auto">

    <h2 class="text-2xl font-bold text-slate-800 mb-6">Add New Lead</h2>

    <form action="{{ route('leads.store') }}" method="POST" class="space-y-6">
        @csrf

        @include('leads.form') 

        <div class="flex justify-end">
            <button type="submit"
                class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-indigo-600 transition">
                Save Lead
            </button>
        </div>
    </form>

</div>
@endsection
