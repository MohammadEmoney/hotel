@extends('layouts.main')

@section('title')
<title>داشبرد | نوع اتاق</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li class="active">نوع اتاق</li>
        </ol>
      </section>
@endsection

@section('content')
    <div class="container">
        <div class="col-md-6 col-md-offset-3 shadow py-3 my-3">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">افزودن نوع اتاق</h3>
                </div>
                <form class="floating-labels">
                    <div class="box-body">
                        {{ csrf_field() }}
                        <div class="form-group col-md-12 col-xs-12">
                            <label for="currency">نرخ تبدیل برای یک  واحد</label>
                            <select id="currency"  name="currency" class="form-control select2"  style="width: 100%;">
                                <option value="USD">دلار آمریکا</option>
                                <option value="EUR">یورو</option>
                                <option value="TRY">لیر ترکیه</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-xs-12">
                            <input type="number" class="form-control" id="rate" name="rate" required placeholder="نرخ را به تومان وارد کنید"><span class="highlight"></span> <span class="bar"></span>
                        </div>
                    </div> <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="btn" class="add btn btn-success waves-effect waves-light" data-token="{{ csrf_token() }}">افزودن</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-inverse waves-effect waves-light">لغو</a>
                    </div>
                </form>
            </div>
        </div>

        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>شرح</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td> </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $(".add").on('click', (e) => {
                let token = $(this).data("token");
                let currency = $("#currency").val();
                let rate = $("#rate").val();
                console.log(currency);
                $.ajax({
                   url: "{{ route('rate.store') }}",
                   type: 'POST',
                   dataType: "JSON",
                   data: {
                       "_method"    : 'POST',
                       "_token"     : token,
                       "currency"   : currency,
                       "rate"       :rate
                   },
                   success: function(rates){
                       console.log(rates);
                   }
               });
            })
        });
    </script>
@endsection
