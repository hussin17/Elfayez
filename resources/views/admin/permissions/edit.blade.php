@extends('admin.layouts.master')

@section('title')
    تعديل ذن
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تعديل اذن</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.permissions.update', $permission) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="mb-3 col-md-4">
                            <label for="validationCustom01">اسم الذن</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $permission->name }}" autofocus="autofocus" id="validationCustom01" name="name"
                                placeholder="اسم الاذن">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل الاذن</strong>
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
