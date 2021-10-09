@php
    $roles = \Spatie\Permission\Models\Role::all();
@endphp

@csrf
<div class="form-group row mb-2 mt-2" style="float: left;">
	<div class="col-sm-10"> <a type="submit" href="{{ route('users.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
	</div>
</div><br><br><br>
<div class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">Nama User</label>
    <div class="col-sm-10">
    <input type="text" required="required" class="form-control form-control-sm @error('name') is-invalid @enderror" required="required" name="name" id="name" value="{{ old('name') ?? $user->name ?? '' }}">
    </div>
</div>

<div class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" required="required" name="email" id="email" value="{{ old('email') ?? $user->email ?? '' }}">
    </div>
</div>
<div class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">Role</label>
     <div class="col-sm-10">
    <select name="role" id="role" class="form-control form-control-sm" required="required" >
        @foreach ($roles as $role)
            @if($user ?? null):
        <option value="{{ $role->name }}" @if ($user->hasRole($role->name))
            selected
        @endif>{{ $role->name }}</option>
            @else
        <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endif
        @endforeach
    </select>
    </div>
</div>
<div class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" required="required" name="password" id="password" autocomplete="off">
    </div>
</div>
<div  class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control form-control-sm @error('confirm-password') is-invalid @enderror" required="required" name="confirm-password" id="confirm-password">
    </div>
</div>
