@extends('layouts.main')

@section('title')
<title>داشبرد | نوع تخت ها</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li><a href="{{ route('bed-type.index') }}">اطلاعات اتاق ها</a></li>
          <li><a href="{{ route('bed-type.index') }}">نوع اتاق ها</a></li>
          <li class="active">نوع تخت ها</li>
        </ol>
      </section>
@endsection

@section('content')
<div class="container">
<a href="{{ route('bed-type.create') }}" class="btn btn-primary">add</a>
        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>شرح</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
                @foreach($bedTypes as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->type }} </td>
                        <td class="pull-left d-flex">
                            <a href="{{ route('bed-type.edit', ['id' => $type->id]) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('bed-type.destroy', ['id' => $type->id]) }}" class="delete-form" method="POST">
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
