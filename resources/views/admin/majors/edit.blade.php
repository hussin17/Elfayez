@extends('admin.layouts.master')

@section('title')
    تعديل تخصص
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تعديل تخصص</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.majors.update', $major->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">اسم التخصص</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $major->name }}" autofocus="autofocus" id="validationCustom01" name="name"
                                placeholder="اسم التخصص">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل التخصص</strong>
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
