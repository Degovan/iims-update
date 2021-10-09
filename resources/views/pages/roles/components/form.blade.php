@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') ?? $role->name ?? '' }}">
    @error('name')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
