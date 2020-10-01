@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h2 class="inner-title">Quản lý danh mục sản phẩm</h2>
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
                                <th style="width: 397px">description</th>
                                <th>image</th>
                                <th>tools</th>
                            </tr>
                            </thead>
                            {{--<!--                        --><?php echo "<pre>"; print_r($category); ?>--}}
                            @foreach($category as $c)
                                <tr>
                                    <td><p class="single-item-title">{{$c->id}}</p></td>
                                    <td><p class="single-item-title">{{$c->name}}</td>
                                    <td><p class="single-item-title">{{$c->description}}</td>
                                    <td>
                                        <img src="{{ url('source/image/product/'.$c->image) }}"
                                             alt="" class="img-circle" style="width: 100px;height:100px;">
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="/admin/category/category_update/edit/ {{$c->id}}">Edit</a>
                                        <form method="POST" action="/admin/category/category/delete/{{$c->id}}"
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
                <a class="btn btn-xs btn-primary" href="/admin/category/category/create">Thêm sản phẩm</a>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
