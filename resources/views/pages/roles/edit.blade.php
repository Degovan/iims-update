@extends('shared.base')
@section('content')
                    <div class="row">
                        <div class="col-md-5">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h6 class="m-0 font-weight-bold text-primary">Edit Role Form</h6>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                                        @method('PUT')
                                        @include('pages.roles.components.form')
                                        <div class="form-group d-flex justify-content-between">
                                            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
                                                <i class="fas fa-arrow-left"></i> Back
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-save"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
					@endsection