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
                <th>Name fa</th>
                <th>Nam en</th>
                <th>description</th>
                <th>lat</th>
                <th>long</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <td>name fa</td>
                    <td>name en</td>
                    <td>description</td>
                    <td>lat</td>
                    <td>long</td>
                    <td class="pull-left d-flex">
                        <a href="#" class="btn btn-warning">Edit</a>
                        <form action="#" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <a type="submit" class="btn btn-danger ml-2">Delete</a>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
