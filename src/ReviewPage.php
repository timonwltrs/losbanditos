<?php

namespace Losbanditos;

class ReviewPage
{
    private $reviews;
    public function __construct()
    {
        $this->reviews=[];
    }

    public function displayReviews()
    {
        foreach ($this->reviews as $review)
        {
            echo $review->getname(). " rated it " . $review->getRating() . " stars and said: ". $review->getComment() . "<br>";
        }
    }
}



