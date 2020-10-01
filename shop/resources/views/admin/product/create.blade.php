@extends('layouts.master')
@section('content')
    <form method="post" action="/admin/product/product/store">
        @method('POST')
        @csrf
        <p>
            <label for="image">Image</label><br>
            <input type="file" name="image" class="form-control">

        </p>

        <p>
            <label for="name">Name</label><br>
            <input type="text" name="name" value="">
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea cols="20" rows="10" name="description"></textarea>
        </p>

        <p>
            <label for="id_type">Id_type</label><br>
            <input type="text" name="id_type" value="">
        </p>

        <p>
            <label for="unit_price">Unit_price</label><br>
            <input type="text" name="unit_price" value="">
        </p>

        <p>
            <label for="promotion_price">Promotion_price</label><br>
            <input type="text" name="promotion_price" value="">
        </p>

        <p>
            <label for="unit">Unit</label><br>
            <input type="text" name="unit" value="">
        </p>

        <p>
            <label for="new">New</label><br>
            <input type="text" name="new" value="">
        </p>

        <p>
            <button class="btn btn-xs btn-primary"  type="submit">Submit</button>
        </p>
    </form>
@endsection
