@extends('admin.layouts.master')

@section('title')
    تعديل دور
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تعديل دور</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.roles.update', $role) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="mb-3 col-md-4">
                            <label for="validationCustom01">اسم الدور</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $role->name }}" autofocus="autofocus" id="validationCustom01" name="name"
                                placeholder="اسم الدور">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل الدور</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        {{-- Role Permissions --}}
                        <div class="mb-3 col-md-4">
                            <label for="validationCustom01">الاوذونات</label>
                            @if ($role->permissions)
                                <select name="" id="">
                                    @foreach ($role->permissions as $role_permission)
                                        <span>{{ $role_permission->name }}</span>
                                    @endforeach
                                </select>
                            @endif
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل الدور</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    

                    <button class="btn btn-primary" type="submit">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
