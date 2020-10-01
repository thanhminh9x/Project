@extends('layouts.master')
@section('content')
{{--    <h1>{{ $pageName }}</h1>--}}
    <form id="form-edit" method="POST" role="form" action="/admin/bill/update/edit/{{ $bill->id }}">
        <div class="modal-header">
            <h4 class="modal-title">Cập nhật</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </div>
        @method('PATCH')
        @csrf
{{--        <input type="hidden" name="id" value="{{ $bill->id }}">--}}

        <p>
            <label for="id">id</label><br>
            <input type="text" name="id" value="{{ $bill->id}}">
        </p>

        <p>
            <label for="id_customer">id_customer</label><br>
            <input type="text" name="id_customer" value="{{ $bill->id_customer }}">
        </p>

        <p>
            <label for="date_order">date_order</label><br>
            <input type="text" name="date_order" value="{{ $bill->date_order }}">
        </p>

        <p>
            <label for="total">total</label><br>
            <input type="text" name="total" value="{{ $bill->total }}">
        </p>

        <p>
            <label for="payment">payment</label><br>
            <input type="text" name="payment" value="{{ $bill->payment }}">
        </p>

        <p>
            <label for="note">note</label><br>
            <input type="text" name="note" value="{{ $bill->note }}">
        </p>

        <p>
            <label for="created_at">created_at</label><br>
            <input type="text" name="created_at" value="{{ $bill->created_at }}">
        </p>

        <p>
            <label for="updated_at">updated_at</label><br>
            <input type="text" name="updated_at" value="{{ $bill->updated_at }}">
        </p>

        <p>
            <button class="btn btn-xs btn-primary" type="submit">Submit</button>
        </p>
    </form>
@endsection

