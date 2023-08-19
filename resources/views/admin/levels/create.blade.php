@extends('admin.layouts.master')

@section('title')
    اضافة مستوى
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">اضافة مستوى</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.levels.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">

                        {{-- name --}}
                        <div class="col-md-4 mb-3">
                            <label for="name">اسم المستوى</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" autofocus="true" id="name" name="name"
                                placeholder="اسم المستوى">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل اسم المستوى</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- courses --}}
                        <div class="col-md-4 mb-3">
                            <label for="course">الكورس</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course" name="course_id"
                                placeholder="الكورس">
                                <option value="">اختر</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                            @error('course_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل الكورس</strong>
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
