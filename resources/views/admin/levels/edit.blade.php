@extends('admin.layouts.master')

@section('title')
    تعديل مستوى
@endsection

@section('content')
    <div class="col-12">

        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تعديل مستوى</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.levels.update', $level->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-row">

                        {{-- name --}}
                        <div class="col-md-4 mb-3">
                            <label for="name">اسم المستوى</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                value="{{ $level->name }}" autofocus="true" id="name" name="name"
                                placeholder="المستوى">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>ادخل اسم المستوى</strong>
                                </span>
                            @enderror
                        </div>


                        {{-- levels --}}
                        <div class="col-md-4 mb-3">
                            <label for="level">الكورس</label>
                            <select class="form-control @error('course_id') is-invalid @enderror" id="course_id"
                                name="course_id" placeholder="الكورس">
                                <option value="{{ $level->course->id }}">{{$level->course->name}}</option>
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
