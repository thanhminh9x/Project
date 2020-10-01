@extends('layouts.master')
@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
                                    <th style="width: 10px">id</th>
                                    <th>id_customer</th>
                                    <th>date_order</th>
                                    <th>total</th>
                                    <th>payment</th>
                                    <th>note</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>

                                </tr>
                            </thead>
                            {{--<!-- --><?php echo "<pre>";
                                        print_r($category); ?>--}}
                            @foreach($bill as $b)
                            <tr>
                                <td>
                                    <p class="single-item-title">{{$b->id}}</p>
                                </td>
                                <td>
                                    <p class="single-item-title">{{$b->id_customer}}
                                </td>
                                <td>
                                    <p class="single-item-title">{{$b->date_order}}</p>
                                </td>
                                <td>
                                    <p class="single-item-title">{{$b->total}}
                                </td>
                                <td>
                                    <p class="single-item-title">{{$b->payment}}</p>
                                </td>
                                <td>
                                    <p class="single-item-title">{{$b->note}}</p>
                                </td>
                                <td>
                                    <p class="single-item-title">{{$b->created_at}}</p>
                                </td>
                                <td>
                                    <p class="single-item-title">{{$b->updated_at}}</p>
                                </td>
                                <td>

                                    <!-- Button to Open the Modal -->
                                    <button type="button" class="btn btn-primary edit" data-toggle="modal" data-target="#edit_payment" data-id="{{$b->id}}" data-id_customer="{{$b->id_customer}}" data-date_order="{{$b->date_order}}" data-total="{{$b->total}}" data-payment="{{$b->payment}}" data-note="{{$b->note}}" data-created_at="{{$b->created_at}}" data-updated_at="{{$b->updated_at}}">Edit
                                    </button>


                                    <form method="POST" action="/admin/bill/bill/delete/{{$b->id}}" onsubmit="return Confirm('Bạn có muốn xóa không')">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm js-delete-confirm" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form action="{{url('import-csv')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept=".xlsx"><br>
                        <input type="submit" value="Import File Excel" name="import_csv" class="btn btn-primary btn-sm">
                    </form>


                    <form action="{{url('export-csv')}}" method="POST">
                        @csrf
                        <input type="submit" value="Export File Excel" name="export_csv" class="btn btn-danger btn-sm">
                    </form>


                </div>
            </div>
            <div class="container-fluid">
                <a class="btn btn-xs btn-primary btn-sm" href="/admin/bill/bill/create">Thêm Hóa Đơn</a>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            </div>
            <!-- /.box-footer-->
        </div>

        <!-- /.box -->
</section>
<!-- /.content -->

<!-- The Modal -->
<div class="modal fade" id="edit_payment">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Sửa hóa đơn</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form  class="form-horizontal" method="POST">
        
                    <div class="form-group">
                        <label for="id_customer">id_customer</label><br>
                        <input type="text" name="id_customer">
                    </div>
                    <div class="form-group">
                        <label for="date_order">date_order</label><br>
                        <input type="text" name="date_order">
                    </div>
                    <div class="form-group">
                        <label for="total">total</label><br>
                        <input type="text" name="total">
                    </div>
                    <div class="form-group">
                        <label for="payment">payment</label><br>
                        <input type="text" name="payment">
                    </div>
                    <div class="form-group">
                        <label for="note">note</label><br>
                        <input type="text" name="note">
                    </div>
                    <div class="form-group">
                        <label for="created_at">created_at</label><br>
                        <input type="text" name="created_at">
                    </div>
                    <div class="form-group">
                        <label for="updated_at">updated_at</label><br>
                        <input type="text" name="updated_at">
                    </div>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn-edit" value="add">Save</button>

            </div>
                                    
        </div>
    </div>
</div>

<!-- script load data edit -->
<script>
    $(document).ready(function() {
        $('.edit').on('click', function() {
            $('#edit_payment').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id')
                var id_customer = button.data('id_customer')
                var date_order = button.data('date_order') // Extract info from data-* attributes
                var total = button.data('total')
                var payment = button.data('payment')
                var note = button.data('note')
                var created_at = button.data('created_at')
                var updated_at = button.data('updated_at')

                // console.log(id_customer)

                var modal = $(this)
                modal.find('input[name="id_customer"]').val(id_customer)
                modal.find('input[name="date_order"]').val(date_order)
                modal.find('input[name="total"]').val(total)
                modal.find('input[name="payment"]').val(payment)
                modal.find('input[name="note"]').val(note)
                modal.find('input[name="created_at"]').val(created_at)
                modal.find('input[name="updated_at"]').val(updated_at)
            });
        });

    });
</script>
<!-- End: script load data edit -->


<!-- <script>
    jQuery(document).ready(function() {
        jQuery('.edit').click(function(e) {
                alert(dasdas);
                $('#edit_payment').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var id = button.data('id')
                    var id_customer = button.data('id_customer')
                    var date_order = button.data('date_order') // Extract info from data-* attributes
                    var total = button.data('total')
                    var payment = button.data('payment')
                    var note = button.data('note')
                    var created_at = button.data('created_at')
                    var updated_at = button.data('updated_at')

                    console.log(id_customer)

                    var modal = $(this)
                    modal.find('input[name="id_customer"]').val(id_customer)
                    modal.find('input[name="date_order"]').val(date_order)
                    modal.find('input[name="total"]').val(total)
                    modal.find('input[name="payment"]').val(payment)
                    modal.find('input[name="note"]').val(note)
                    modal.find('input[name="created_at"]').val(created_at)
                    modal.find('input[name="updated_at"]').val(updated_at)
                });


                var id = $(this).attr("data-id");
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/admin/bill/update') }}",
                    type: 'post',
                    cache: false,
                    dataType: "json",
                    data: {
                        id: jQuery('#id').val(),
                        id_customer: jQuery('#id_customer').val(),
                        date_order: jQuery('#date_order').val(),
                        total: jQuery('#total').val(),
                        payment: jQuery('#payment').val(),
                        note: jQuery('#note').val(),
                        created_at: jQuery('#created_at').val(),
                        updated_at: jQuery('#updated_at').val(),
                    },
                    success: function(data) {

                    },
                    error: function(error) {}
                });

        });
    });
</script> -->

@endsection