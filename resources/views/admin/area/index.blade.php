@extends('layouts.main')

@section('title')
<title>داشبرد | محله ها</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li class="active">محله ها</li>
        </ol>
      </section>
@endsection

@section('content')
<div class="container">
<a href="{{ route('area.create') }}" class="btn btn-primary">add</a>
        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>نام فارسی</th>
                <th>نام انگلیسی</th>
                <th>توضیحات</th>
                <th>شهر</th>
                <th>Latitude</th>
                <th>Longtitude</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($areas as $area)
                    <tr>
                        <td>{{ $area->name_fa }}</td>
                        <td>{{ $area->name_en }}</td>
                        <td>{{ $area->description }}</td>
                        <td>{{ $area->city->name_fa }}</td>
                        <td>{{ $area->lat }}</td>
                        <td>{{ $area->long }}</td>
                        <td class="pull-left d-flex">
                            <a href="{{ route('area.edit', ['id' => $area->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('area.destroy', ['id' => $area->id]) }}" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <a type="submit" class="btn btn-danger ml-2">Delete</a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
