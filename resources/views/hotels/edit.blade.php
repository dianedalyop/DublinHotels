<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Hotel Form - Laravel 8 CRUD Tutorial</title>
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Hotel</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('hotels.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<div class="edit-form">
<form action="{{ route('hotels.update',$hotel->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Hotel Name:</strong>
<input type="text" name="name" value="{{ $hotel->name }}" class="form-control" placeholder="Hotel name">
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
        <strong>Image:</strong>
        <input type="file" name="image" class="form-control">
        @error('image')
            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Hotel Email:</strong>
<input type="email" name="email" class="form-control" placeholder="Hotel Email" value="{{ $hotel->email }}">
@error('email')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Hotel Address:</strong>
<input type="text" name="address" value="{{ $hotel->address }}" class="form-control" placeholder="Hotel Address">
@error('address')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</div>
</body>
</html>