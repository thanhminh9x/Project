@extends('layouts.master')
@section('content')
    <h1>{{ $pageName }}</h1>
    <form method="post" action="/admin/billDetail/update/edit/{{ $billDetail->id }}">
        @method('POST')
        @csrf
        <input type="hidden" name="id" value="{{ $billDetail->id }}">

        <p>
            <label for="id_bill">Id_bill</label><br>
            <input type="text" name="id_bill" value="{{ $billDetail->id_bill }}">
        </p>

        <p>
            <label for="id_product">Id_product</label><br>
            <input type="text" name="id_product" value="{{ $billDetail->id_product }}">
        </p>

        <p>
            <label for="quantity">Quantity</label><br>
            <input type="text" name="quantity" value="{{ $billDetail->quantity }}">
        </p>

        <p>
            <label for="unit_price">Unit_price</label><br>
            <input type="text" name="unit_price" value="{{ $billDetail->unit_price }}">
        </p>

        <p>
            <button class="btn btn-xs btn-primary" type="submit">Submit</button>
        </p>
    </form>
@endsection


