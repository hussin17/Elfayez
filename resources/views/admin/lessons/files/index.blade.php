@extends('admin.layouts.master')

@section('title')
    ملفات الدرس
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
                    <h4 class="card-title">ملفات درس ({{$lessonInfo->name}})</h4>
                    <a href="{{ url('/admin-area/lessons/files/create', $lessonInfo->id) }}" class="btn btn-primary m-2">اضافة ملف</a>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>الملف</th>
                                    <th>الدرس التابع</th>
                                    <th>وصف الملف</th>
                                    <th>تعديل</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($lessonFiles as $file)
                                    <tr>
                                        <td>
                                            {{-- <a href="{{ route('admin.lessons.downlaodFile', $file->src) }}">{{ $file->name }}</a> --}}
                                            {{ $file->name }}
                                        </td>
                                        <td>{{ $file->lesson->name }}</td>
                                        <td>{!! $file->description !!}</td>
                                        <td>
                                            <a href="{{ route('admin.lessons.files.edit', $file->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.lessons.files.destroy', $file->id) }}" method="POST" class="d-inline">
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
