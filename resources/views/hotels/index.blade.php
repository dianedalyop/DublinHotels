<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dublin Hotels</title>
<!-- initial bootstrap style-->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">

</head>
<body>
<div class="row">
<div class="col-lg-12 margin-tb">

    <header>
<h2>Dublin Hotels</h2>

<nav>
<a href="{{route('hotels.index')}}"class="navitem">Login</a>
<a href="{{ route('register') }}" class="navitem">Register</a>
</nav>
    </header>
<main>

    <?php
    // Path to the image file
    $imagePath = "https://cdn.shopify.com/s/files/1/0581/5887/4822/files/The_Shelbourne_647aac87-8253-43c9-8a5d-3ffb198adb27.jpg?v=1629212985";

    // Output the HTML img tag with PHP
    echo "<img src='$imagePath'  alt='Description of the image' class='mainimg'>";
    ?>

<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('hotels.create') }}"> Create Hotel</a>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Hotel Name</th>
<th>Hotel Email</th>
<th>Hotel Address</th>
<th width="280px">Action</th>
</tr>
@foreach ($hotels as $hotel)
<tr>
<td>{{ $hotel->id }}</td>
<td>{{ $hotel->name }}</td>
<td>{{ $hotel->email }}</td>
<td>{{ $hotel->address }}</td>
<td>
<form action="{{ route('hotels.destroy',$hotel->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('hotels.edit',$hotel->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>
{!! $hotels->links() !!}

</main>
<footer>

</footer>
</body>
</html>