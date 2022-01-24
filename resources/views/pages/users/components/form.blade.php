@php
    $roles = \Spatie\Permission\Models\Role::all();
    $image = '/assets/images/users/' . (isset($user) ? $user->photo ?? 'noimage.png' : 'noimage.png');
@endphp

@push('style')
    <style>
        #image-input {
            display: none;
        }

        #image-label {
            width: 6em;
            height: 7em;
            border: 1px dashed #d1d3e2;
            cursor: pointer;
            background-image: url('{{ $image }}');
            background-size: cover;
            background-position: center;
        }
    </style>
@endpush

@csrf
<div class="form-group row mb-2 mt-2" style="float: left;">
	<div class="col-sm-10"> <a type="submit" href="{{ route('users.index') }}" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-circle-left">&nbsp;Kembali</i></a>
	</div>
</div><br><br><br>

<div class="form-group row justify-content-end">
    <label for="inputtext" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
        <label for="image-input" id="image-label">
            <input type="file" name="photo" id="image-input">
        </label>
        <div></div>
        @error('photo')
            <small class="text-danger">{{ $message }}</small>  
        @else
            @isset($user)
                <small>*biarkan foto jika tidak diubah</small>
            @endisset
        @enderror
    </div>
</div>

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
{{-- kalau create required, kalau edit nggak --}}
@if(last(request()->segments()) == 'create')
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
@else
<div class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" id="password" autocomplete="off">
    </div>
</div>
<div  class="form-group row">
    <label for="inputtext" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control form-control-sm @error('confirm-password') is-invalid @enderror" name="confirm-password" id="confirm-password">
    </div>
</div>
@endif
{{-- kalau create required, kalau edit nggak --}}

@push('script')
    <script src="/assets/js/jquery.uploadPreview.min.js"></script>
    <script>
        $.uploadPreview({
            input_field: '#image-input',
            preview_box: '#image-label'
        });
    </script>
@endpush
