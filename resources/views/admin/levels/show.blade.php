@extends('admin.layouts.master')

@section('title')
    الكورسات
@endsection

@section('content')
    <!-- basic table -->
    <div class="row el-element-overlay">
        <div class="col-12">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1">
                        <img src="{{ asset("admin/upload/courses/images/$course->main_image") }}" alt="image" />
                        <div class="el-overlay">
                            <ul class="list-style-none el-info">
                                <li class="el-item">
                                    <a class="btn default btn-outline image-popup-vertical-fit el-link"
                                        href="{{ asset("admin/upload/courses/images/$course->main_image") }}">
                                        <i class="sl-icon-magnifier"></i>
                                    </a>
                                </li>
                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);">
                                        <i class="sl-icon-link"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h4 class="m-b-0">{{ $course->name }}</h4>
                        <span class="text-muted">{{ $course->level->name }}</span>

                        <p>{!! $course->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
