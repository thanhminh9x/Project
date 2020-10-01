@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2 class="inner-title">Quản lý khách hàng</h2>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>name</th>
                                <th>gender</th>
                                <th>email</th>
                                <th>address</th>
                                <th>phone_number</th>
                                <th>note</th>
                            </tr>
                            </thead>
                            {{--<!--                        --><?php echo "<pre>"; print_r($category); ?>--}}
                            @foreach($customer as $cus)
                                <tr>
                                    <td><p class="single-item-title">{{$cus->id}}</p></td>
                                    <td><p class="single-item-title">{{$cus->name}}</td>
                                    <td><p class="single-item-title">{{$cus->gender}}</td>
                                    <td><p class="single-item-title">{{$cus->email}}</p></td>
                                    <td><p class="single-item-title">{{$cus->address}}</p></td>
                                    <td><p class="single-item-title">{{$cus->phone_number}}</p></td>
                                    <td><p class="single-item-title">{{$cus->note}}</p></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="/admin/customer/update/edit/ {{$cus->id}}">Edit</a>
                                        <form method="POST" action="/admin/customer/customer/delete/{{$cus->id}}"
                                              onsubmit="return ConfirmDelete( this )">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-xs btn-danger js-delete-confirm" type="submit">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
                <a class="btn btn-xs btn-primary" href="/admin/customer/customer/create">Thêm Khách Hàng</a>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection

