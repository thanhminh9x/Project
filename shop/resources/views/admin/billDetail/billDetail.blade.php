@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2 class="inner-title">Quản lý hóa đơn</h2>
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
                                <th>id_bill</th>
                                <th>id_product</th>
                                <th>quantity</th>
                                <th>unit_price</th>
                            </tr>
                            </thead>
                            {{--<!--                        --><?php echo "<pre>"; print_r($category); ?>--}}
                            @foreach($billDetail as $bi)
                                <tr>
                                    <td><p class="single-item-title">{{$bi->id}}</p></td>
                                    <td><p class="single-item-title">{{$bi->id_bill}}</td>
                                    <td><p class="single-item-title">{{$bi->id_product}}</td>
                                    <td><p class="single-item-title">{{$bi->quantity}}</p></td>
                                    <td><p class="single-item-title">{{$bi->unit_price}}</p></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="/admin/billDetail/update/edit/ {{$bi->id}}">Edit</a>
                                        <form method="POST" action="/admin/billDetail/billDetail/delete/{{$bi->id}}"
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
                <a class="btn btn-xs btn-primary" href="/admin/billDetail/billDetail/create">Thêm Chi Tiết Hóa Đơn</a>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection



