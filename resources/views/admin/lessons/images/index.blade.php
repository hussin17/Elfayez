@extends('admin.layouts.master')

@section('title')
    صور الدرس
@endsection

@section('content')
    <!-- basic table -->
    <div class="row">
        <div class="col-12">

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif


            <div class="col-5 align-self-center mb-3">
                <h4 class="page-title">صور درس ({{ $lessonInfo->name }})</h4>
                <div class="d-flex align-items-center">

                </div>

                <div class="form-group">
                    <form action="{{ route('admin.lessons.images.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="lesson_id" value="{{ $lessonInfo->id }}">
                        <input type="file" name="images[]" multiple="multiple" class="input-control"
                            placeholder="أضف صورة">
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </form>
                </div>

            </div>
        </div>

        <div class="row el-element-overlay">
            @foreach ($lessonImages as $image)
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1"> <img width="50" height="50"
                                    src="{{ asset('admin/upload/lessons/images/' . $image->name) }}" alt="user" />
                                <div class="el-overlay">
                                    <ul class="list-style-none el-info">
                                        <li class="el-item">
                                            <a class="btn default btn-outline image-popup-vertical-fit el-link"
                                                href="{{ asset('admin/upload/lessons/images/' . $image->name) }}">
                                                <i class="sl-icon-magnifier"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="el-card-content">

                                <form action="{{ route('admin.lessons.images.destroy', $image->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">حذف</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection
