@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/courses.css')}}" />
@endsection

@section('content')

    <section class="container course-details">
        <img src="{{asset("admin/upload/courses/images/$course->main_image")}}" alt="" class="img-fluid w-30">
        <div class="details">

            <h2>تفاصيل الكورس</h2>

            {!! $course->description !!}

            <a href="{{ route('lessons', [$course->id, 0]) }}" class="mt-5 btn btn-danger">انضم الان</a>
        </div>
    </section>
@endsection

