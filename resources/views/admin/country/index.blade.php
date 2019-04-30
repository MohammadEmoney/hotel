@extends('layouts.main')

@section('title')
<title>داشبرد | کشورها</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li class="active">کشورها</li>
        </ol>
      </section>
@endsection

@section('content')
<div class="container">
<a href="{{ route('country.create') }}" class="btn btn-primary">add</a>
        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>نام فارسی</th>
                <th>نام انگلیسی</th>
                <th>توضیحات</th>
                <th>Latitude</th>
                <th>Longtitude</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($countries as $country)
                    <tr>
                        <td>{{ $country->name_fa }}</td>
                        <td>{{ $country->name_en }}</td>
                        <td>{{ $country->description }}</td>
                        <td>{{ $country->lat }}</td>
                        <td>{{ $country->long }}</td>
                        <td class="pull-left d-flex">
                        <a href="{{ route('country.edit', ['id' => $country->id]) }}" class="table-btn btn btn-warning">Edit</a>
                            <form action="{{ route('country.destroy', ['id' => $country->id]) }}" class="delete-form">
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
