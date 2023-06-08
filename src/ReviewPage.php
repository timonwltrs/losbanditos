<?php

namespace Losbanditos;

class ReviewPage
{
    private $reviews;
    public function construct()
    {
        $this->reviews=[];
    }

    public function addReview($name, $rating,$comment)
    {
        $review= new Review($name, $rating, $comment);
        $this->reviews[] = $review;
    }

    public function displayReviews()
    {
        foreach ($this->reviews as $review)
        {
            echo $review->getname(). " rated it " . $review->getRating() . " stars and said: ". $review->getComment() . "<br>";
        }
    }
}



