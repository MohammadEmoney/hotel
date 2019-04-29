@extends('layouts.main')

@section('title')
<title>داشبرد | افزودن نوع اتاق</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          افزودن نوع اتاق
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li ><a href="{{ route('room-type.index') }}">نوع اتاق ها</a></li>
          <li class="active">افزودن نوع اتاق</li>
        </ol>
      </section>
@endsection

@section('content')
    <section class="content row justify-content-center">
        <div class="col-md-6 col-md-offset-3 shadow py-3 my-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">افزودن نوع اتاق</h3>
                </div>
                <!-- /.box-header -->
                    <!-- form start -->
                    {{-- Erorr messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="update_profile" class="floating-labels" method="post" action="{{ route('room-type.store') }}" enctype="multipart/form-data">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="form-group m-b-40">
                                <label for="type">نوع اتاق</label>
                                <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}" required><span class="highlight"></span> <span class="bar"></span>
                            </div>
                            {{-- <div class="form-group m-b-40">
                                <label for="name_en">نوع تخت ها</label>
                                <div>
                                    @foreach($bed_types as $bed_type)
                                        <input type="checkbox" class="custom-control-input" id="{{ $bed_type->id }}" value="{{ $bed_type->id }}">
                                        <label class="custom-control-label" name="capacity[]" for="{{ $bed_type->id }}">{{ $bed_type->type }}</label>
                                    @endforeach
                                </div>
                            </div> --}}

                        </div> <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">افزودن</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-inverse waves-effect waves-light">لغو</a>
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
