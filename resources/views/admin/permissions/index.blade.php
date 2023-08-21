@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">

            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">الاذونات</h4>
                    <a href="{{ route('admin.permissions.create') }}" class="m-2 btn btn-primary">اضافة اذن</a>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>الاذن</th>
                                    <th>تعديل</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($permissions as $permissions)
                                    <tr>
                                        <td>{{ $permissions->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.permissions.edit', $permissions->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.permissions.destroy', $permissions->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 fas fa-trash text-danger"></button>
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
