@extends('admin.layouts.master')

@section('title')
    اضافة صف
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">اضافة صف</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.grades.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        {{-- name --}}
                        <div class="col-md-4 mb-3">
                            <label for="name">اسم الصف</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" autofocus="true" id="name" name="name"
                                placeholder="اسم الصف">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل اسم الصف</strong>
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
