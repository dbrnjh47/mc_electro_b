<?php

namespace App\Http\Services;

class BreadcrumbService
{
    public $breadcrumbs = [];

    public function add($text, $href = null, $move_to_start = 0)
    {
        $this->breadcrumbs[] = [
            "href" => $href,
            "text" => $text,
        ];
        if($move_to_start == 1)
        {
            $last_element = array_pop( $this->breadcrumbs);
            array_unshift($this->breadcrumbs, $last_element);
        }
    }

    public function get()
    {
        return $this->breadcrumbs;
    }
}
