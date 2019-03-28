<?php
// src/Entity/Canvas.php
namespace App\Entity;

class Canvas
{
    protected $width;
    protected $height;

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight(int $height)
    {
        $this->height = $height;
    }
}
