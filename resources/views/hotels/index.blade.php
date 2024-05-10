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
            <tr>
                <th>S.No</th>
                <th>Hotel Name</th>
                <th>Hotel Image</th>
                <th>Hotel Email</th>
                <th>Hotel Address</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($hotels as $hotel)
            <tr>
                <td>{{ $hotel->id }}</td>
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
        <form method="POST" action="{{ route('bookings.store') }}">
            @csrf
            <label>Check In</label>
            <input type="date" name="booking_in_date" class="form-control" placeholder="Check In"><br>
            <label>Check Out</label>
            <input type="date" name="booking_out_date" class="form-control" placeholder="Check Out">
            <button type="submit">Book Now</button>
        </form>
    </main>
    <footer>
        <hr/>
    </footer>
</body>
</html>
