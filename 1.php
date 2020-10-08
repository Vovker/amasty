<?php

class First
{
    protected $message = 'A';
    public function getClassname()
    {
        echo "First"."\n";
    }
    public function getLetter()
    {
        echo $this->message."\n";
    }
}

class Second extends First
{
    protected $message = 'B';
    public function getClassname()
    {
        echo "Second"."\n";
    }
}


$first = new First();
$second = new Second();
 $first->getClassname();
 $second->getClassname();

 $first->getLetter();
 $second->getLetter();