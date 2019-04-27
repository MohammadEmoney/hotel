@extends('layouts.main')

@section('title')
<title>داشبرد | جاذبه ها</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li class="active">جاذبه ها</li>
        </ol>
      </section>
@endsection

@section('content')
<div class="container">
<a href="{{ route('attraction.create') }}" class="btn btn-primary">add</a>
        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>نام فارسی</th>
                <th>نام انگلیسی</th>
                <th>توضیحات</th>
                <th>تصویر</th>
                <th>Latitude</th>
                <th>Longtitude</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($attractions as $attraction)
                    <tr>
                        <td>{{ $attraction->name_fa }}</td>
                        <td>{{ $attraction->name_en }}</td>
                        <td>{{ $attraction->description }}</td>
                        <td>{{ $attraction->image }}</td>
                        <td>{{ $attraction->lat }}</td>
                        <td>{{ $attraction->long }}</td>
                        <td class="pull-left d-flex">
                            <a href="{{ route('attraction.edit', ['id' => $attraction->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('attraction.destroy', ['id' => $attraction->id]) }}" class="delete-form">
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
