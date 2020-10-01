@extends('layouts.master')
@section('content')
    <h1>{{ $pageName }}</h1>
    <form method="post" action="/admin/customer/update/edit/{{ $customer->id }}">
        @method('PATCH')
        @csrf
        <input type="hidden" name="id" value="{{ $customer->id }}">

        <p>
            <label for="name">Name</label><br>
            <input type="text" name="name" value="{{ $customer->name }}">
        </p>

        <p>
            <label for="gender">Gender</label><br>
            <input type="text" name="gender" value="{{ $customer->gender }}">
        </p>

        <p>
            <label for="email">Email</label><br>
            <input type="text" name="email" value="{{ $customer->email }}">
        </p>

        <p>
            <label for="address">Address</label><br>
            <input type="text" name="address" value="{{ $customer->address }}">
        </p>

        <p>
            <label for="phone_number">Phone_number</label><br>
            <input type="text" name="phone_number" value="{{ $customer->phone_number }}">
        </p>

        <p>
            <label for="note">Note</label><br>
            <input type="text" name="note" value="{{ $customer->note }}">
        </p>

        <p>
            <button class="btn btn-xs btn-primary" type="submit">Submit</button>
        </p>
    </form>
@endsection
