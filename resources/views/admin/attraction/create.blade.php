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
                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                                <label for="image">تصاویر</label>
                                <input accept='image/*' onchange='openFile(event)' type="file" class="form-control" id="image" name="image[]" multiple><span class="highlight"></span> <span class="bar"></span>
                                <!-- Trigger the modal with a button -->
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Open Modal</button>
                            </div>

                            <div class="form-group m-b-40">
                                <label for="video">ویدئو</label>
                                <input type="file" class="form-control" id="video" name="video"><span class="highlight"></span> <span class="bar"></span>
                            </div>

                            <div id="googleMap" style="width:100%;height:400px;"></div>
                            <input type="hidden" id="lat" name="lat">
                            <input type="hidden" id="long" name="long">

                            <div class="form-group m-b-40">
                                <label for="description">توضیحات</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ old('description') }}</textarea><span class="highlight"></span> <span class="bar"></span>
                            </div>

                        </div> <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">ذخیره</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-inverse waves-effect waves-light">انصراف</a>
                        </div>
                    </form>

            </div><!-- box-primary -->
        </div><!-- /.row -->
    </section>


    {{-- MOdal ShOW ImAGe --}}
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body">
                <div id="preImg"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

        </div>
          </div>
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

        let openFile = function(event) {
            var preview = document.querySelector('#preImg');
            var files   = document.querySelector('#image').files;

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
                var reader = new FileReader();

                reader.addEventListener("load", function () {
                        var image = new Image();
                        image.height = 100;
                        image.title = file.name;
                        image.src = this.result;
                        preview.appendChild( image );
                    }, false);

                    reader.readAsDataURL(file);
                }

            }

            if (files) {
                [].forEach.call(files, readAndPreview);
            }
        };

        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

        google.maps.event.addListener(map, 'click', function(event) {
            $("#lat").val(event.latLng.lat());
            $("#long").val(event.latLng.lng());
        // alert(event.latLng.lat() + ", " + event.latLng.lng());
        });

        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=myMap"></script>
@endsection

