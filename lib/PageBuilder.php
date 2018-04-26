<?php

require_once ('Game.php');

class PageBuilder
{
    public static function add_header(string $title, array $css_files = null)
    {
        include (__DIR__ . '/./../templates/header.php');
    }

    public static function get_game_card(int $game_id, string $team1_logo, string $team2_logo)
    {
        include (__DIR__ . '/./../templates/game_card.php');
    }

    public static function add_footer()
    {
        include (__DIR__ . '/./../templates/footer.php');
    }
}