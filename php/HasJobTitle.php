<?php

trait HasJobTitle
{
    protected $title;

    public function setTitle($title, $extra = null)
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }
}