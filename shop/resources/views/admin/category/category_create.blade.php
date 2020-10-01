@extends('layouts.master')
@section('content')
<form method="post" action="/admin/category/category/store">
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
        <button class="btn btn-xs btn-primary"  type="submit">Submit</button>
    </p>
</form>
@endsection
