<?php

class Game
{
    private $team1_id;
    private $team2_id;
    private $team1_name;
    private $team2_name;
    private $time;
    private $venue_id;
    private $venue_name;
    private $venue_location;

    function __construct($team1_id, $team2_id, $team1_name, $team2_name, $time, $venue_id, $venue_name, $venue_location)
    {
        $this->team1_id = $team1_id;
        $this->team2_id = $team2_id;
        $this->team1_name = $team1_name;
        $this->team2_name = $team2_name;
        $this->time = $time;
        $this->venue_id = $venue_id;
        $this->venue_name = $venue_name;
        $this->venue_location = $venue_location;
    }

    public function getTeam1Id()
    {
        return $this->team1_id;
    }

    public function getTeam2Id()
    {
        return $this->team2_id;
    }

    public function getTeam1Name()
    {
        return $this->team1_name;
    }

    public function getTeam2Name()
    {
        return $this->team2_name;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getVenueId()
    {
        return $this->venue_id;
    }

    public function getVenueName()
    {
        return $this->venue_name;
    }

    public function getVenueLocation()
    {
        return $this->venue_location;
    }



    public static function getAllUpcomingGames(mysqli $con)
    {
        $upcoming_matches = array();

        $sql = 'SELECT game_id, t1.team_name as team1_name, t2.team_name as team2_name, t1.team_logo as team1_logo, t2.team_logo as team2_logo, game.time
                from game, team t1, team t2, venue
                WHERE
                game.team1 = t1.team_id AND
                game.team2 = t2.team_id AND
                game.venue = venue.venue_id AND
                date(time) > CURRENT_DATE()';

        $result = $con->query($sql);

        while ($row =  $result->fetch_assoc())
        {
            $upcoming_matches[] = $row;
        }

        return $upcoming_matches;
    }

    public static function getGame(mysqli $con, int $game_id)
    {
        $team1_id = '';
        $team2_id = '';
        $team1_name = '';
        $team2_name = '';
        $time = '';
        $venue_id = '';
        $venue_name = '';
        $venue_location = '';

        $game_id = $con->real_escape_string($game_id);

        $sql = "SELECT game_id, team1, team2, game.time, t1.team_name as team1_name, t2.team_name as team2_name, venue_id, venue_name, location
                from game, team t1, team t2, venue
                WHERE
                game.team1 = t1.team_id AND
                game.team2 = t2.team_id AND
                game.venue = venue.venue_id AND
                game_id = $game_id";

        $result = $con->query($sql);

        while ($row = $result->fetch_assoc())
        {
            $team1_id = $row['team1'];
            $team2_id = $row['team2'];
            $team1_name = $row['team1_name'];
            $team2_name = $row['team2_name'];
            $time = $row['time'];
            $venue_id = $row['venue_id'];
            $venue_name = $row['venue_name'];
            $venue_location = $row['location'];
        }

        $game = new Game($team1_id, $team2_id, $team1_name, $team2_name, $time, $venue_id, $venue_name, $venue_location);

        return $game;
    }
}