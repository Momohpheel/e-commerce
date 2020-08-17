@extends('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
        <form action="add-item" method="POST">
            @csrf
        <h3>Add New Products</h3>
        <label>Product Name: </label>
        <input type="text" name="name" class="form-control" placeholder="Name of Product">
        <label>Type: </label>
        <select name="type" class="form-control" placeholder="Type of Product">
            <option>Select...</option>
            <option>Gadgets</option>
            <option>Home Applicances</option>
            <option>Men's Fashion</option>
            <option>Women's Fashion</option>

        </select>
        <label>Product Description: </label>
        <input type="text" name="description" class="form-control" placeholder="Description of Product">
        <label>Product Image: </label>
        <input type="file" name="image" class="form-control" placeholder="Product Image">
        <label>Product Price: </label>
        <input type="number" name="price" class="form-control" placeholder="N0000">
        <br>
        <input type="submit" value="Add Item" class="btn btn-information btn-lg">
    </form>
    </div>
    <div class="col-sm-4">
    </div>
</div>

</div>

@endsection
