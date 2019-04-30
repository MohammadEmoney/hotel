@extends('layouts.main')

@section('title')
<title>داشبرد | شهرها</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li class="active">شهرها</li>
        </ol>
      </section>
@endsection

@section('content')
<div class="container">
<a href="{{ route('city.create') }}" class="btn btn-primary">add</a>
        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>نام فارسی</th>
                <th>نام انگلیسی</th>
                <th>توضیحات</th>
                <th>کشور</th>
                <th>Latitude</th>
                <th>Longtitude</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{ $city->name_fa }}</td>
                        <td>{{ $city->name_en }}</td>
                        <td>{{ $city->description }}</td>
                        <td>{{ $city->country->name_fa }}</td>
                        <td>{{ $city->lat }}</td>
                        <td>{{ $city->long }}</td>
                        <td class="pull-left d-flex">
                            <a href="{{ route('city.edit', ['id' => $city->id]) }}" class="table-btn btn btn-warning">Edit</a>
                            <form action="{{ route('city.destroy', ['id' => $city->id]) }}" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="table-btn btn btn-danger ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
