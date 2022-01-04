<?php

if (! function_exists('is_nav_active')) {
    function is_nav_active($nav) {
        return request()->is("*{$nav}*") ? "class = active" : '';
    }
}