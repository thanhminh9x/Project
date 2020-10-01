@extends('layouts.master')
@section('content')
    <form method="post" action="/admin/billDetail/billDetail/store">
        @method('POST')
        @csrf
        <p>
            <label for="id_bill">Id_bill</label><br>
            <input type="text" name="id_bill" value="">
        </p>

        <p>
            <label for="id_product">Id_product</label><br>
            <input type="text" name="id_product" value="">
        </p>

        <p>
            <label for="quantity">Quantity</label><br>
            <input type="text" name="quantity" value="">
        </p>

        <p>
            <label for="unit_price">Unit_price</label><br>
            <input type="text" name="unit_price" value="">
        </p>

        <p>
            <button class="btn btn-xs btn-primary"  type="submit">Submit</button>
        </p>
    </form>
@endsection

