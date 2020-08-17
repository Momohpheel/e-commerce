@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form action="/super" method="POST">
            @csrf
        <h3>Register as a Seller</h3>
        <br>
        <label>Business Name </label>
        <input type="text" name="business_name" class="form-control" placeholder="Name of Product">
        <label>Office Address </label>
        <input type="text" name="address" class="form-control" placeholder="Type of Product">
        <label>Home/Office Contact</label>
        <input type="text" name="contact" class="form-control" placeholder="Description of Product">
        {{-- <label>Product Image: </label>
        <input type="file" name="image" class="form-control" placeholder="Product Image">
        <label>Product Price: </label>
        <input type="number" name="price" class="form-control" placeholder="N0000"> --}}
        <br>
        <input type="submit" value="Verify" class="btn btn-information btn-lg">
    </form>
    </div>
    <div class="col-sm-4">
    </div>
</div>

</div>

@endsection
