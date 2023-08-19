@extends('admin.layouts.master')

@section('title')
    الكورسات
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
                    <h4 class="card-title">الكورسات</h4>
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary m-2">اضافة كورس</a>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>صورة الكورس</th>
                                    <th>الاسم</th>
                                    <th>السعر</th>
                                    <th>الحالة</th>
                                    <th>التخصص</th>
                                    {{-- <th>المدرس</th> --}}
                                    <th>الوصف</th>
                                    <th>تعديل</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($courses as $course)
                                    <tr>
                                        <td>
                                            <img src="{{ asset("admin/upload/courses/images/$course->main_image") }}" width="50" alt="">
                                        </td>
                                        <td>{{ $course->name }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>{{ $course->status === '1' ? 'مفعل' : 'عير مفعل' }}</td>
                                        <td>{{ $course->major->name }}</td>
                                        {{-- <td>{{ $course->instructor->name }}</td> --}}
                                        <td>{!! $course->description !!}</td>
                                        <td>
                                            {{-- <a href="{{ route('admin.courses.show', $course->id) }}">
                                                <span class="fas fa-eye text-warning"></span>
                                            </a> --}}
                                            <a href="{{ route('admin.courses.edit', $course->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.courses.destroy', $course->id) }}" method="POST" class="d-inline">
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
