@extends('admin.layouts.master')

@section('title')
    اضافة درس
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
                <h4 class="card-title">اضافة درس</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.lessons.update', $lesson->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        {{-- main_image --}}
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">صورة الدرس</label>
                            <input type="file" class="form-control @error('main_image') is-invalid @enderror"
                                value="{{ session()->flash('main_image', $lesson->main_image) }}" autofocus="true" id="validationCustom01" name="main_image"
                                placeholder="صورة الدرس">
                            @error('main_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل صورة الدرس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- name --}}
                        <div class="col-md-4 mb-3">
                            <label for="name">اسم الدرس</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $lesson->name }}" autofocus="true" id="name" name="name"
                                placeholder="اسم الدرس">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل اسم الدرس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Majors --}}
                        <div class="col-md-4 mb-3">
                            <label for="major">تخصص الدرس</label>
                            <select class="form-control @error('major_id') is-invalid @enderror" id="major"
                                name="major_id" placeholder="تخصص الدرس" value="{{ $lesson->major->id }}">
                                <option value="{{ $lesson->major->id }}">{{ $lesson->major->name }}</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                            @error('major_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل تخصص الدرس</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- grades --}}
                        <div class="col-md-4 mb-3">
                            <label for="grade">الصف الدراسي</label>
                            <select class="form-control @error('grade_id') is-invalid @enderror" id="grade"
                                name="grade_id" placeholder="الصف الدراسي" value="{{ $lesson->grade->id }}">
                                <option value="{{ $lesson->grade->id }}">{{ $lesson->grade->name }}</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                            @error('grade_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل الصف الدراسي</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- courses --}}
                        <div class="col-md-4 mb-3">
                            <label for="course_id">الكورس</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id"
                                name="course_id" placeholder="الكورس" value="{{ $lesson->course->id }}">
                                <option value="{{ $lesson->course->id }}">{{$lesson->course->name}}</option>
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

                        {{-- Levels --}}
                        <div class="col-md-4 mb-3">
                            <label for="level">المستوى</label>
                            <select class="form-control @error('level_id') is-invalid @enderror" id="level"
                                name="level_id" placeholder="المستوى" value="{{ $lesson->level->id }}">
                                <option value="{{ $lesson->level->id }}">{{$lesson->level->name}}</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </select>
                            @error('level_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل المستوى</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="bg-light p-3">
                        <h4 class="card-title">اضافة وصف</h4>
                        <textarea name="description" class="ckeditor">{{ $lesson->description }}</textarea>
                    </div>

                    {{-- Videos And Files And Images --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title m-b-40">ملحقات الدرس</h4>
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">

                                        <li class="nav-item">
                                            <a class="nav-link" id="videos-tab" data-toggle="tab" href="#videos5"
                                                role="tab" aria-controls="videos5" aria-expanded="true">
                                                <span class="hidden-sm-up">
                                                    <i class="fas fa-video"></i>
                                                </span>
                                                <span class="hidden-xs-down">الفيديوهات</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content tabcontent-border p-20" id="myTabContent">

                                        <div class="tab-pane fade" id="videos5" role="tabpanel"
                                            aria-labelledby="videos-tab">

                                            <div class="form-group">
                                                <label for="youtube">من اليوتيوب</label>
                                                <input type="text" class="form-control" name="youtube" id="youtube"
                                                    placeholder="ادخل رابط الفيديو" value={{ $lesson->video->type === '1' ? $lesson->video->name : null }}>
                                            </div>

                                            <div class="form-group">
                                                <label for="video">من الجهاز</label>
                                                <input type="file" class="form-control" name="video"
                                                    value="" id="video">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">حفظ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
