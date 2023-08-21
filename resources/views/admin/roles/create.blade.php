@extends('admin.layouts.master')

@section('title')
    اضافة دور
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">اضافة دور</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.roles.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="mb-3 col-md-4">
                            <label for="validationCustom01">اسم الدور</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" autofocus="true" id="validationCustom01" name="name"
                                placeholder="اسم الدور">
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
