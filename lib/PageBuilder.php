<?php

class PageBuilder
{
    public static function add_header(string $title)
    {
        include (__DIR__ . '/./../templates/header.php');
    }

    public static function add_footer()
    {
        include (__DIR__ . '/./../templates/footer.php');
    }
}