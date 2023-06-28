<?php

 namespace Losbanditos;

class Review
{
    private string $name;
    private int $rating;
    private string $comment;

    public function __construct(string $name, int $rating, string $comment)
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
        return $this->comment;
    }
}
