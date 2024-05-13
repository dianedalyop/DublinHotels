<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dublin Hotels</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <style>
       
       .star.empty {
            color: #030408; 
        }
        .star {
            font-size: 1.2rem; 
            color: brown; 
        }

    
        
    </style>
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
    
    $imagePath = "https://images.unsplash.com/photo-1549918864-48ac978761a4?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D";

    
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
                    @for ($i = 0; $i < $hotel->rating; $i++)
                        <span class="star">★</span>
                    @endfor
                    @for ($i = $hotel->rating; $i < 5; $i++)
                        <span class="star empty">★</span>
                    @endfor
                </td>
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
        <div class="footerimages">
<?php
            $imagePath101 = "https://d1csarkz8obe9u.cloudfront.net/posterpreviews/vip-hotel-logo-design-template-eb72f8981df652fe0be27a9a517ae471_screen.jpg?ts=1660122446";
            $imagePath2 ="https://images.wondershare.com/mockitt/examples/professional-look.jpg";
            $imagePath3 ="https://uploads.turbologo.com/uploads/design/hq_preview_image/3394630/draw_svg20210520-10997-w0pjol.svg.png";
            $imagePath4 ="https://img.freepik.com/free-vector/editable-hotel-logo-vector-business-corporate-identity-with-hidden-hotel-text_53876-111556.jpg";
            $imagePath5 ="https://www.logopeople.in/wp-content/uploads/2022/05/hotel-logo-design-inspiration-1.jpg";
            $imagePath6 ="https://inkbotdesign.com/wp-content/uploads/2023/05/Hilton-Hotel-Logos-Inspiration-1024x640.png";
            $imagePath7 ="https://cdn.sanity.io/images/kts928pd/production/b00e2d30865932fc1c1d86658c7208810fe7911a-731x731.png";
            $imagePath8 ="https://static.rfstat.com/renderforest/images/v2/landing-pics/logo_landing/hotel/hotel_logos_3.png";
    
            echo "<img src='$imagePath101'  alt='Description of the image' class='footimg'>";
            echo "<img src='$imagePath2'  alt='Description of the image' class='footimg'>";
            echo "<img src='$imagePath3'  alt='Description of the image' class='footimg'>";
            echo "<img src='$imagePath4'  alt='Description of the image' class='footimg'>";
            echo "<img src='$imagePath5'  alt='Description of the image' class='footimg'>";
            echo "<img src='$imagePath6'  alt='Description of the image' class='footimg'>";
            echo "<img src='$imagePath7'  alt='Description of the image' class='footimg'>";
            echo "<img src='$imagePath8'  alt='Description of the image' class='footimg'>";
?>
        </div>
        <hr/>

        <div class="copy_content">
            <p>&copy; 2024 DublinHotelsProject  diane michael alAzeem . All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
