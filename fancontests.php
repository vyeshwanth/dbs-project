<?php

require_once('./config/config.php');
require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');
require_once ('./lib/User.php');
require_once ('./lib/Game.php');
require_once ('./lib/Contest.php');

if(!isset($_SESSION))
{
    session_start();
}

$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    die('Connection to database failed');
}


PageBuilder::add_header('BookYourTickets');

if(!isset($_SESSION['user']))
{
    PageBuilder::add_footer();
    die('Please login to access fan contest');
}

$questions = Contest::get_Questions($db->get_connection());
?>
    <div class="alert alert-success" id="success" style="display: none"></div>
    <div class="alert alert-success" id="coupon" style="display: none"></div>
    <form class="container px-0" id="final_form">
        <h4 class="my-3">Questions</h4>
                <?php
                foreach ($questions as $question)
                {
                    PageBuilder::get_question_card($question['Question_ID'], $question['Question'],$question['Option 1'],$question['Option 2']
                        ,$question['Option 3'],$question['Option 4']);
                }
                ?>
    </form>
        <button type="button" class="btn btn-primary mx-auto" style="display: block" id="submit-btn">Save</button>
<?php
PageBuilder::add_footer();
?>
<script src="js/question.js" type="text/javascript"></script>
