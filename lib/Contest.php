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

    public static function ansforque(mysqli $con,int $ques_id)
    {
        $sql = "SELECT Answer FROM question WHERE Question_ID = '$ques_id'";
        $result = $con->query($sql);
        while($row = $result->fetch_assoc())
        {
            return $row['Answer'];
        }
    }

    public static function insertresult(mysqli $con,string $email_id,int $num)
    {
        $sql = "INSERT INTO contest_result values('$email_id','$num')";
        $con->query($sql);
    }
}