<?php
/**
 * Created by PhpStorm.
 * User: piyush
 * Date: 27-04-2018
 * Time: 00:22
 */

class Contest
{
    public static function get_Questions(mysqli $con)
    {
        $Question_bank = array();
        $sql = "SELECT * FROM question  ORDER BY RAND ( )  LIMIT 5;";
        $result = $con->query($sql);

        while($row= $result->fetch_assoc() )
        {
            $Question_bank[] = $row;
        }

        return $Question_bank;
    }
}