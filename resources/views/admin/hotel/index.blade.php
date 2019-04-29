@extends('layouts.main')

@section('title')
<title>داشبرد | هتل ها</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li class="active">هتل ها</li>
        </ol>
      </section>
@endsection

@section('content')
<div class="container">
<a href="{{ route('hotel.create') }}" class="btn btn-primary">add</a>
        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>شرح</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
                @foreach($hotels as $hotel)
                    <tr>
                        <td>{{ $hotel->id }}</td>
                        <td>{{ $hotel->name_fa }} | {{ $hotel->city->name_fa }} - {{ $hotel->area->name_fa }}</td>
                        <td class="pull-left d-flex">
                            <a href="{{ route('hotel.edit', ['id' => $hotel->id]) }}" class="btn btn-warning">Edit</a>
                            <a href="{{ route('hotel.room.index', ['id' => $hotel->id]) }}" class="btn btn-success">اطلاعات اتاق ها</a>
                            <form action="{{ route('hotel.destroy', ['id' => $hotel->id]) }}" class="delete-form">
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
