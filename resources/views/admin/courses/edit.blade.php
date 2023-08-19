@extends('admin.layouts.master')

@section('title')
    تعديل كورس
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تعديل كورس</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.courses.update', $course->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        {{-- main_image --}}
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">صورة الكورس</label>
                            <input type="file" class="form-control @error('main_image') is-invalid @enderror"
                                value="{{ $course->main_image }}" autofocus="true" id="validationCustom01" name="main_image"
                                placeholder="صورة الكورس">
                            @error('main_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل صورة الكورس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- name --}}
                        <div class="col-md-4 mb-3">
                            <label for="name">اسم الكورس</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $course->name }}" autofocus="true" id="name" name="name"
                                placeholder="الكورس">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل اسم الكورس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- price --}}
                        <div class="col-md-4 mb-3">
                            <label for="price">سعر الكورس</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror"
                                value="{{ $course->price }}" autofocus="true" id="price" name="price"
                                placeholder="الكورس">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل سعر الكورس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="col-md-4 mb-3">
                            <label for="status">حالة الكورس</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status"
                                placeholder="حالة الكورس">
                                <option value="{{$course->status}}">{{$course->status?'مفعل':'غير مفعل'}}</option>
                                <option value="1">مفعل</option>
                                <option value="0">غير مفعل</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل حالة الكورس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- courses --}}
                        <div class="col-md-4 mb-3">
                            <label for="course">تخصص الكورس</label>
                            <select class="form-control @error('major_id') is-invalid @enderror" id="major_id"
                                name="major_id" placeholder="تخصص الكورس">
                                <option value="{{ $course->major->id }}">{{$course->major->name}}</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل تخصص الكورس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Level --}}
                        <div class="col-md-4 mb-3">

                        </div>
                    </div>

                    <div class="bg-light p-3">
                        <h4 class="card-title">تعديل تخصص</h4>
                        <textarea name="description" class="ckeditor">{{ $course->description }}</textarea>
                    </div>

                    <button class="btn btn-primary" type="submit">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
