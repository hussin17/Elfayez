@extends('admin.layouts.master')

@section('title')
    Majors
@endsection

@section('content')
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">كافة اللغات</h4>
                    <div class="btn btn-primary" data-toggle="modal" data-target="#addLang">اضافة لغة جديدة</div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>اللغه</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($langs as $i => $lang)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $lang->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.langs.edit', $lang->id) }}" class="text-info" data-id="{{ $lang->id }}"
                                                data-name="{{ $lang->name }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.langs.destroy', $lang->id) }}" method="post" data-confirm-delete="true" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-danger border-0 bg-transparent">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>اللقة</th>
                                    <th>#</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Add Lang Modal --}}
    <div class="modal fade" id="addLang" tabindex="-1" role="dialog" aria-labelledby="addLang" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.langs.store') }}" method="post">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="addLang">أضافة لغة جديدة</h5>
                        <button type="button" class="close border-0" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <input type="text" class="form-control" name="name" placeholder="أدخل اللغة" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
