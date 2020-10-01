@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2 class="inner-title">Quản lý sản phẩm</h2>
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
                                <th>description</th>
                                <th>id_type</th>
                                <th>unit_price</th>
                                <th>promotion_price</th>
                                <th>image</th>
                                <th>unit</th>
                                <th>new</th>
                            </tr>
                            </thead>
                            {{--<!--                        --><?php echo "<pre>"; print_r($category); ?>--}}
                            @foreach($product as $p)
                                <tr>
                                    <td><p class="single-item-title">{{$p->id}}</p></td>
                                    <td><p class="single-item-title">{{$p->name}}</td>
                                    <td><p class="single-item-title">{{$p->description}}</td>
                                    <td><p class="single-item-title">{{$p->id_type}}</p></td>
                                    <td><p class="single-item-title">{{$p->unit_price}}</p></td>
                                    <td><p class="single-item-title">{{$p->promotion_price}}</p></td>
                                    <td>
                                        <img src="{{ url('source/image/product/'.$p->image) }}"
                                             alt="" class="img-circle" style="width: 100px;height:100px;">
                                    </td>
                                    <td><p class="single-item-title">{{$p->unit}}</p></td>
                                    <td><p class="single-item-title">{{$p->new}}</p></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="/admin/product/update/edit/ {{$p->id}}">Edit</a>
                                        <form method="POST" action="/admin/product/product/delete/{{$p->id}}"
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
                <a class="btn btn-xs btn-primary" href="/admin/product/product/create">Thêm sản phẩm</a>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection

