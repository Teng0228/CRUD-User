@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')
        @include('users.form', ['user' => $user])
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
