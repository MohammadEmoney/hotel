@extends('layouts.main')

@section('title')
<title>داشبرد | اطلاعات اتاق ها</title>
@endsection

@section('page-navigation')
<section class="content-header">
        <h1>
          داشبرد
          <small>کنترل پنل</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> خانه</a></li>
          <li class="active">اطلاعات اتاق ها</li>
        </ol>
      </section>
@endsection

@section('content')
<div class="container">
    <a href="{{ route('hotel.room.create', ['id' => $hotel->id]) }}" class="btn btn-primary">add</a>
        <table id="product-table" class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>شرح</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->name_fa }} | {{ $room->city->name_fa }} - {{ $room->area->name_fa }}</td>
                        <td class="pull-left d-flex">
                            <a href="{{ route('hotel.room.edit', [
                                'hotel-id' => $hotel->id,
                                'room-id' => $room->id
                                ]) }}" class="table-btn btn btn-warning">Edit</a>
                            <form action="{{ route('hotel.room.destroy', ['id' => $room->id]) }}" class="delete-form">
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
