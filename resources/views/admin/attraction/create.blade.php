@extends('layouts.main')

@section('title')
<title>داشبرد | افزودن جاذبه</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          افزودن جاذبه
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li ><a href="{{ route('attraction.index') }}">جاذبه ها</a></li>
          <li class="active">افزودن جاذبه</li>
        </ol>
      </section>
@endsection

@section('content')
    <section class="content row justify-content-center">
        <div class="col-md-6 col-md-offset-3 shadow py-3 my-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">افزودن جاذبه</h3>
                </div>
                <!-- /.box-header -->
                    <!-- form start -->
                    <form id="update_profile" class="floating-labels" method="post" action="{{ route('attraction.store') }}" enctype="multipart/form-data">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group m-b-40">
                                <label for="name_fa">نام فارسی</label>
                                <input type="text" class="form-control" id="name_fa" name="name_fa" value="{{ old('name_fa') }}" required><span class="highlight"></span> <span class="bar"></span>
                            </div>
                            <div class="form-group m-b-40">
                                <label for="name_en">نام انگلیسی</label>
                                <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name_en') }}" required><span class="highlight"></span> <span class="bar"></span>
                            </div>

                            <div class="form-group m-b-40">
                                <label for="slug">slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" required><span class="highlight"></span> <span class="bar"></span>
                            </div>

                            <div class="form-group m-b-40">
                                <label for="description">توضیحات</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea><span class="highlight"></span> <span class="bar"></span>
                            </div>

                        </div> <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">دخیره</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-inverse waves-effect waves-light">انصراف</a>
                        </div>
                    </form>

            </div><!-- box-primary -->
        </div><!-- /.row -->
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#name_en').on('keyup', () => {
                $value =  $('#name_en').val();
                $slug = $value.replace(/\s/gm, '-');
                $('#slug').val($slug);
            });
        });
    </script>
@endsection

