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

            {{-- <ul>
                <li>2 ساعة فيديو تدريبية</li>
                <li>شهادة اتمام الدورة من نوفيل اكاديمي</li>
                <li>شهادة اتمام الدورة من نوفيل اكاديمي</li>
                <li>متابعة أثناء الدورة وبعدها من قبل فريق مختص</li>
            </ul> --}}
            <a href="{{ route('lessons', [$course->id, 1]) }}" class="mt-5 btn btn-danger">انضم الان</a>
        </div>
    </section>
@endsection

