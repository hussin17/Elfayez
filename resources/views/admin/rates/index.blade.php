@extends('admin.layouts.master')

@section('title')
    التقييمات
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
                    <h4 class="card-title">التقييمات</h4>
                    <a href="{{ route('admin.rates.create') }}" class="btn btn-primary m-2">اضافة تقييم</a>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>التقييم</th>
                                    <th>تعديل</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($rates as $rate)
                                    <tr>
                                        <td>{{ $rate->rate }}</td>
                                        <td>
                                            <a href="{{ route('admin.rates.edit', $rate->id) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.rates.destroy', $rate->id) }}" method="POST" class="d-inline">
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
