<?php

if (!function_exists('starRating')) {
    function starRating($rating)
    {
        $output = '';
        $fullStars = floor($rating);
        $halfStars = ceil($rating - $fullStars);
        $emptyStars = 5 - $fullStars - $halfStars;


        $output .= str_repeat('<span class="star">&#9733;</span>', $fullStars);


        if ($halfStars > 0) {
            $output .= '<span class="star">&#9734;</span>';
        }


        if ($emptyStars > 0) {
            $output .= str_repeat('<span class="star">&#9734;</span>', $emptyStars);
        }

        return $output;
    }
}