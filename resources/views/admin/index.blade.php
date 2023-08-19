@extends('admin.layouts.master')

@section('content')
    <div class="card-group">
        <!-- grades -->
        <a href="{{ route('admin.grades.index') }}" class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg btn-info">
                            <i class="ti-wallet text-white"></i>
                        </span>
                    </div>
                    <div>
                        الصف الدراسي
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{ DB::table('grades')->count() }}</h2>
                    </div>
                </div>
            </div>
        </a>

        <!-- Majors -->
        <a href="{{ route('admin.majors.index') }}" class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg btn-info">
                            <i class="ti-wallet text-white"></i>
                        </span>
                    </div>
                    <div>
                        التخصصات
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{ DB::table('majors')->count() }}</h2>
                    </div>
                </div>
            </div>
        </a>

        <!-- Courses -->
        <a href="{{ route('admin.courses.index') }}" class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-danger">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        الكورسات
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{ DB::table('courses')->count() }}</h2>
                    </div>
                </div>
            </div>
        </a>

        <!-- Levels -->
        <a href="{{ route('admin.levels.index') }}" class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-info">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        المستويات
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{ DB::table('levels')->count() }}</h2>
                    </div>
                </div>
            </div>
        </a>

        <!-- Lessons -->
        <a href="{{ route('admin.lessons.index') }}" class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="m-r-10">
                        <span class="btn btn-circle btn-lg bg-warning">
                            <i class="ti-clipboard text-white"></i>
                        </span>
                    </div>
                    <div>
                        الدروس
                    </div>
                    <div class="ml-auto">
                        <h2 class="m-b-0 font-light">{{ DB::table('lessons')->count() }}</h2>
                    </div>
                </div>
            </div>
        </a>

    </div>
@endsection
