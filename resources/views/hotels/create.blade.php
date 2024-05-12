<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Hotel App</title>
<link rel="stylesheet" type="text/css" href="resources\css\styles.css">
<style>
    /* Define the basic style for both filled and empty stars */
    .star {
        font-size: 1.2rem; /* Adjust the size as needed */
        color: #ffc107; /* Color of filled stars */
    }

    /* Style for empty stars */
    .star.empty {
        color: #e4e5e9; /* Color of empty stars */
    }
</style>
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Hotel</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('hotels.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="row">

<div class="form-group">
<strong>Hotel Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Hotel Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="form-group">
    <label for="rating">Rating:</label>
    <input type="number" name="rating" class="form-control" placeholder="Enter rating (1-5)" min="1" max="5">
    @error('rating')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
    @enderror
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control" id="image" name="image">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Hotel Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Hotel Email">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Hotel Address:</strong>
<input type="text" name="address" class="form-control" placeholder="Hotel Address">
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>