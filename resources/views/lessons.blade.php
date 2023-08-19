@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/lessons.css') }}" />
@endsection

@section('content')
    <h1 dir="rtl" class="container mt-5 mb-5 courseName">مرحبا بك في كورس {{ $course->name }}</h1>
    <section class="container lessons">
        <div class="main-lesson">
            @if ($lessonVideo->video->type === '2')
                <video controls>
                    <source src="{{ asset('admin/upload/lessons/videos/' . $firstLesson->video->name) }}">
                </video>
            @endif
            @if ($firstLesson->video->type === '1')
                @php
                    $videoLink = explode('/', $firstLesson->video->name);
                @endphp
                <iframe src="https://www.youtube.com/embed/{{ end($videoLink) }}" frameborder="0"></iframe>
            @endif
            <div class="controlles">
                <div class="previous">
                    <i class="fa-solid fa-caret-left"></i>
                    <span>السابق</span>
                </div>
                <div class="lessonName">{{ $lessonVideo->name }}</div>
                <div class="previous">
                    <span>التالي</span>
                    <i class="fa-solid fa-caret-right"></i>
                </div>
            </div>

            <!-- Panel Of Lesson Attachment -->
            <h3>ملحقات الدرس</h3>
            <div class="lesson-attachments">

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="files-tab" data-bs-toggle="tab" data-bs-target="#files"
                            type="button" role="tab" aria-controls="files" aria-selected="true">الملفات</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">الصور</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="files" role="tabpanel" aria-labelledby="files-tab">
                        <table class="table table-primary">
                            <tr>
                                <th>#</th>
                                <th>اسم الملف</th>
                                <th>الوصف</th>
                                <th>تحميل</th>
                            </tr>
                            @php
                                use App\Models\LessonFile;
                                $files = LessonFile::where('lesson_id', $firstLesson->id)->get();
                            @endphp
                            @foreach ($files as $i => $file)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $file->description }}</td>
                                    <td>تنزيل</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="gellary">
                            @foreach ($lessonImages as $image)
                                <div class="card">
                                    <img src="{{ asset("admin/upload/lessons/images/$image->name") }}"
                                        alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="other">
            <ul>
                @foreach ($lessons as $lesson)
                    <li>
                        @if ($lesson->video->type === '2')
                            <video controls width="300" height="180">
                                <source src="{{ asset('admin/upload/lessons/videos/' . $lesson->video->name) }}">
                            </video>
                        @endif
                        @if ($lesson->video->type === '1')
                            @php
                                $videoLink = explode('/', $lesson->video->name);
                            @endphp
                            <iframe src="https://www.youtube.com/embed/{{ end($videoLink) }}" frameborder="0"></iframe>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
