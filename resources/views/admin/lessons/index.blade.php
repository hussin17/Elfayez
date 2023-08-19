@extends('admin.layouts.master')

@section('title')
    الدروس
@endsection

@section('content')
    <!-- basic table -->
    <div class="row">
        <div class="col-12">

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">الدروس</h4>
                    <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary m-2">اضافة درس</a>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>فيديو الدرس</th>
                                    <th>صورة الدرس</th>
                                    <th>الاسم</th>
                                    <th>التخصص</th>
                                    <th>الصف</th>
                                    <th>الكورس</th>
                                    <th>المستوى</th>
                                    {{-- <th>المدرس</th> --}}
                                    <th>الوصف</th>
                                    <th>الوصف</th>
                                    <th>الملحقات</th>
                                    <th>تعديل</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($lessons as $lesson)
                                    <tr>
                                        <td>
                                            {{-- Local --}}
                                            @if ($lesson->video->type === '2')
                                                <video width="320" height="240" controls>
                                                    <source
                                                        src="{{ asset('admin/upload/lessons/videos/' . $lesson->video->name) }}">
                                                </video>
                                            @endif

                                            {{-- Youtube --}}
                                            @if ($lesson->video->type === '1')
                                                @php
                                                    $videoLink = explode('/', $lesson->video->name);
                                                @endphp
                                                <iframe width="280" height="200"
                                                    src="https://www.youtube.com/embed/{{ end($videoLink) }}"
                                                    title="YouTube video player" frameborder="0"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    allowfullscreen>
                                                </iframe>
                                            @endif

                                        </td>
                                        <td>
                                            <img src="{{ asset("admin/upload/lessons/images/$lesson->main_image") }}"
                                                width="50" height="50" alt="">
                                        </td>
                                        <td>{{ $lesson->name }}</td>
                                        <td>{{ $lesson->major->name }}</td>
                                        <td>{{ $lesson->grade->name }}</td>
                                        <td>{{ $lesson->course->name }}</td>
                                        <td>{{ $lesson->level->name }}</td>
                                        {{-- <td>{{ $lesson->instructor->name }}</td> --}}
                                        <td>{!! $lesson->description !!}</td>
                                        <td>
                                            <a href="{{ route('admin.lessons.files.show', $lesson->id) }}" class="btn">
                                                <i class="fas fa-file text-success"></i>
                                            </a>
                                            <a href="{{ route('admin.lessons.images.show', $lesson->id) }}" class="btn">
                                                <i class="fas fa-image text-warning"></i>
                                            </a>
                                        </td>
                                        <td>
                                            {{-- Youtube --}}
                                            @if ($lesson->video->type === '1')
                                                {!! QrCode::size(50)->generate($lesson->video->name) !!}
                                            @endif

                                            {{-- Local Sever  --}}
                                            @if ($lesson->video->type === '2')
                                                {!! QrCode::size(50)->generate(asset('admin/upload/lessons/videos/' . $lesson->video->name)) !!}
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.lessons.edit', $lesson->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="fas fa-trash text-danger border-0"></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
