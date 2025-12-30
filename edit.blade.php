@extends('layouts.app')

@section('content')
<h3>Edit Lead</h3>

<form action="{{ route('leads.update', $lead) }}" method="POST">
    @csrf
    @method('PUT')
    @include('leads.form')
    <button class="btn btn-success">Update</button>
</form>
@endsection
