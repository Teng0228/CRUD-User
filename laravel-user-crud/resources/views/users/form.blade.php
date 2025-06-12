<div class="mb-3">
    <label>Name</label>
    <input name="name" class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $user->name ?? '') }}">
    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Email</label>
    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
           value="{{ old('email', $user->email ?? '') }}">
    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

<div class="mb-3">
    <label>Phone Number</label>
    <input name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
           value="{{ old('phone_number', $user->phone_number ?? '') }}">
    @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

@if (!isset($user))
    <div class="mb-3">
        <label>Password</label>
        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror">
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
@endif

<div class="mb-3">
    <label>Status</label>
    <select name="status" class="form-select @error('status') is-invalid @enderror">
        <option value="1" {{ old('status', $user->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $user->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
