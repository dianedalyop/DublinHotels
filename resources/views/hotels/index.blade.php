<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dublin Hotels</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <header>
        <h2>Dublin Hotels</h2>
        <nav>
            <a href="{{ route('login') }}" class="navitem">Login</a>
            <a href="{{ route('register') }}" class="navitem">Register</a>
        </nav>
    </header>
    <main>
        <div class="img1">
          
            <?php
    // Path to the image file
    $imagePath = "https://images.unsplash.com/photo-1549918864-48ac978761a4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";

    // Output the HTML img tag with PHP
    echo "<img src='$imagePath'  alt='Description of the image' class='mainimg'>";
    ?>
        </div>
        <div class="pull-right mb-2">
            <a class="btn btn-success" href="{{ route('hotels.create') }}"> Create Hotel</a>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table table-bordered">
           
            @foreach ($hotels as $hotel)
            <tr>
               
                <td>{{ $hotel->name }}</td>
                <td>
                    <img src="{{ asset($hotel->image) }}" alt="Hotel Image">
                </td>
                <td>{{ $hotel->email }}</td>
                <td>{{ $hotel->address }}</td>
                <td>
                    @if (Auth::check() && Auth::user()->can('update', $hotel))
                    <a class="btn btn-primary" href="{{ route('hotels.edit', $hotel->id) }}">Edit</a>
                    @endif
                    @if (Auth::check() && Auth::user()->can('delete', $hotel))
                    <form action="{{ route('hotels.destroy', $hotel->id) }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
        {!! $hotels->links() !!}
        <br>
        <div class="booking_div">
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <label>Check In</label>
            <input type="date" name="booking_in_date" class="form-control" placeholder="Check In"><br>
            <label>Check Out</label>
            <input type="date" name="booking_out_date" class="form-control" placeholder="Check Out">
            <button type="submit">Book Now</button>
        </form>
        </div>
    </main>
    <footer>
        <hr/>
    </footer>
</body>
</html>
