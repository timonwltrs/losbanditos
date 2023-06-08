<?php

 namespace Losbanditos;

class Review
{
    private $name;
    private $rating;
    private $comment;

    public function __construct($name, $rating, $comment)
    {
        $this->name = $name;
        $this->rating = $rating;
        $this->comment = $comment;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRating()
    {
        return $this->rating;
    }

    public function getComment()
    {
        return $this->rating;
    }
}

$reviewPage = new ReviewPage();

