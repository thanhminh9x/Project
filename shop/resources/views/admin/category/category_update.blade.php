@extends('layouts.master')
@section('content')
<h1>{{ $pageName }}</h1>
<form method="post" action="/admin/category/category_update/edit/{{ $category->id }}">
    @method('PATCH')
    @csrf
    <input type="hidden" name="id" value="{{ $category->id }}">
    <p>
        <label for="image">Image</label><br>
        <input type="file" name="image" value="{{ $category->image }}">
    </p>

    <p>
        <label for="name">Name</label><br>
        <input type="text" name="name" value="{{ $category->name }}">
    </p>

    <p>
        <label for="description">Description</label><br>
        <textarea cols="50" rows="5" name="description">{{ $category->description }}</textarea>
    </p>

    <p>
        <button class="btn btn-xs btn-primary" type="submit">Submit</button>
    </p>
</form>
@endsection
