@extends('layouts.master')
@section('content')
    <form method="post" action="/admin/bill/bill/store">
        @method('POST')
        @csrf
        <p>
            <label for="id">Id</label><br>
            <input type="text" name="id" value="">
        </p>

        <p>
            <label for="id_customer">Id_customer</label><br>
            <input type="text" name="id_customer" value="">
        </p>

        <p>
            <label for="date_order">Date_order</label><br>
            <input type="text" name="date_order" value="">
        </p>

        <p>
            <label for="total">Total</label><br>
            <input type="text" name="total" value="">
        </p>

        <p>
            <label for="payment">Payment</label><br>
            <input type="text" name="payment" value="">
        </p>

         <p>
            <label for="note">Note</label><br>
            <input type="text" name="note" value="">
        </p>

        <p>
            <label for="created_at">Created_at</label><br>
            <input type="text" name="created_at" value="">
        </p>

        <p>
            <label for="updated_at">Updated_at</label><br>
            <input type="text" name="updated_at" value="">
        </p>

        <p>
            <button class="btn btn-xs btn-primary"  type="submit">Submit</button>
        </p>
    </form>
@endsection

