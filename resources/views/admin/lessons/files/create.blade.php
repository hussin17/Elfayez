@extends('admin.layouts.master')

@section('title')
    اضافة ملف
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        @if (Session::has('Error'))
            <div class="alert alert-danger">{{ Session::get('Error') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">اضافة ملف ({{$file->lesson->name}})</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.lessons.files.store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        {{-- LessonID --}}
                        <input type="hidden" name="lesson_id" id="" value="{{ $lesson_id }}">
                        {{-- file --}}
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">الملف</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                value="{{ old('file') }}" autofocus="true" id="validationCustom01" name="file"
                                placeholder="الملف">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل الملف</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- name --}}
                        <div class="col-md-4 mb-3">
                            <label for="name">اسم الملف</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                autofocus="true" id="name" name="name"
                                placeholder="اسم الملف">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل اسم الملف</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="bg-light p-3">
                        <h4 class="card-title">اضافة وصف</h4>
                        <textarea name="description" class="ckeditor"></textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
