@extends('admin.layouts.master')

@section('title')
    Langs
@endsection

@section('content')
    <!-- basic table -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">تعديل اللغة</h4>
                <form class="needs-validation" method="POST" action="{{ route('admin.langs.update', $lang->id) }}" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">اسم اللغة</label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="اسم اللغة" value="{{ $lang->name }}">
                            <div class="invalid-feedback">
                                @error('name')
                                    يرجى ادخال اسم اللغة
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">تعديل</button>
                </form>
            </div>
        </div>
    </div>

@endsection
