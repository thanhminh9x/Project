@extends('layouts.master')
@section('content')
    <form method="post" action="/admin/customer/customer/store">
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
            <label for="gender">Gender</label><br>
            <input type="text" name="gender" value="">
        </p>

        <p>
            <label for="email">Email</label><br>
            <input type="text" name="email" value="">
        </p>

        <p>
            <label for="address">Address</label><br>
            <input type="text" name="address" value="">
        </p>

        <p>
            <label for="phone_number">Phone_number</label><br>
            <input type="text" name="phone_number" value="">
        </p>

        <p>
            <label for="note">Note</label><br>
            <input type="text" name="note" value="">
        </p>

        <p>
            <button class="btn btn-xs btn-primary"  type="submit">Submit</button>
        </p>
    </form>
@endsection
