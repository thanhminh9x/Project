@extends('layouts.master')
@section('content')
    <h1>{{ $pageName }}</h1>
    <form method="post" action="/admin/product/update/edit/{{ $product->id }}">
        @method('PATCH')
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <p>
            <label for="image">Image</label><br>
            <input type="file" name="image" value="{{ $product->image }}">
        </p>

        <p>
            <label for="name">Name</label><br>
            <input type="text" name="name" value="{{ $product->name }}">
        </p>

        <p>
            <label for="description">Description</label><br>
            <textarea cols="50" rows="5" name="description">{{ $product->description }}</textarea>
        </p>

        <p>
            <label for="id_type">Id_type</label><br>
            <input type="text" name="id_type" value="{{ $product->id_type }}">
        </p>

        <p>
            <label for="unit_price">Unit_price</label><br>
            <input type="text" name="unit_price" value="{{ $product->unit_price }}">
        </p>

        <p>
            <label for="promotion_price">Promotion_price</label><br>
            <input type="text" name="promotion_price" value="{{ $product->promotion_price }}">
        </p>

        <p>
            <label for="unit">Unit</label><br>
            <input type="text" name="unit" value="{{ $product->unit }}">
        </p>

        <p>
            <label for="new">New</label><br>
            <input type="text" name="new" value="{{ $product->new}}">
        </p>


        <p>
            <button class="btn btn-xs btn-primary" type="submit">Submit</button>
        </p>
    </form>
@endsection
