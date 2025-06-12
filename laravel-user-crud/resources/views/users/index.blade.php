@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('users.create') }}" class="btn btn-primary">+ Add User</a>
        <a href="{{ route('users.export') }}" class="btn btn-success">Export to Excel</a>
    </div>

    @if($users->count())
        <form id="bulk-delete-form" method="POST" action="{{ route('users.bulkDelete') }}">
            @csrf
            @method('DELETE')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="select-all"></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td><input type="checkbox" name="ids[]" value="{{ $user->id }}"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                        <td>
                            <span class="badge bg-{{ $user->status ? 'success' : 'secondary' }}">
                                {{ $user->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Delete this user?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mb-3">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete selected users?')">Bulk Delete</button>
            </div>
        </form>

        {{ $users->links() }}
    @else
        <div class="alert alert-info">No users found. <a href="{{ route('users.create') }}">Create the first one</a>.</div>
    @endif
</div>

<script>
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        for (let checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>
@endsection
