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

    public static function insert_coupon(mysqli $con,string $email_id)
    {
        $sql = "SELECT email_id FROM coupon WHERE email_id='$email_id'";
        $result = $con->query($sql);
        if($result->num_rows == 0)
        {
            $sql1 = "INSERT INTO coupon values('$email_id','1')";
            $con->query($sql1);
            return;
        }
        else if($result->num_rows == 1)
        {
            $sql2 = "UPDATE coupon SET no_coupons = no_coupons+1 WHERE email_id='$email_id'";
            $con->query($sql2);
            return;
        }
    }
}