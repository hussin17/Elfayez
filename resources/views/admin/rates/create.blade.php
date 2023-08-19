@extends('admin.layouts.master')

@section('title')
    اضافة تقييم
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">اضافة تقييم</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.rates.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">اسم التقييم</label>
                            <input type="number" class="form-control @error('rate') is-invalid @enderror"
                                value="{{ old('rate') }}" autofocus="true" id="validationCustom01" name="rate"
                                placeholder="اسم التقييم">
                            @error('rate')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل التقييم</strong>
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
