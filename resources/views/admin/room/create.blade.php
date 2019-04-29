@extends('layouts.main')

@section('title')
<title>داشبرد | افزودن اتاق</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          افزودن اتاق
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li ><a href="{{ route('hotel.room.index', ['id'=> $hotel->id]) }}">اتاق ها</a></li>
          <li class="active">افزودن اتاق</li>
        </ol>
      </section>
@endsection

@section('content')
    <section class="content row justify-content-center">
        <div class="col-md-6 col-md-offset-3 shadow py-3 my-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">افزودن اتاق</h3>
                </div>
                <!-- /.box-header -->
                    <!-- form start -->
                    {{-- Error messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="update_profile" class="floating-labels" method="post" action="{{ route('hotel.room.store', ['id' => $hotel->id]) }}" enctype="multipart/form-data">
                        <div class="box-body">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="roomType">نوع اتاق</label>
                                    <select name="roomType_id" class="form-control" id="roomType">
                                        @foreach ($roomTypes as $roomType)
                                            <option value="{{ $roomType->id }}">{{ $roomType->type }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="bedType">نوع تخت</label>
                                    <select name="bedType_id" class="form-control" id="bedType">
                                        @foreach ($bedTypes as $bedType)
                                            <option value="{{ $bedType->id }}">{{ $bedType->type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group m-b-40">
                                <label for="currency">نوع ارز</label>
                                <input type="text" class="form-control" id="currency" name="currency" value="{{ old('currency') }}" required><span class="highlight"></span> <span class="bar"></span>
                            </div>
                            <div class="form-group m-b-40">
                                <label for="price">قیمت</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}" required><span class="highlight"></span> <span class="bar"></span>
                            </div>

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

        });
    </script>
@endsection
