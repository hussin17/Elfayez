@extends('admin.layouts.master')

@section('title')
    تعديل ملف
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تعديل ملف</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.lessons.files.update', $lessonFile->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">

                        {{-- name --}}
                        <div class="col-md-4 mb-3">
                            <label for="name">اسم الملف</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $lessonFile->name }}" autofocus="true" id="name" name="name"
                                placeholder="الملف">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل اسم الملف</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="bg-light p-3">
                        <h4 class="card-title">تعديل تخصص</h4>
                        <textarea name="description" class="ckeditor">{{ $lessonFile->description }}</textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
