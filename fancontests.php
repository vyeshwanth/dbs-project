<?php

require_once('./config/config.php');
require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');
require_once ('./lib/Game.php');
require_once ('./lib/Contest.php');
$db = new Database($config);
$connection_status = $db->connect();

if(!$connection_status)
{
    die('Connection to database failed');
}
PageBuilder::add_header('BookYourTickets');

$questions = Contest::getQuestions($db->get_connection());
?>
    <form class="container px-0" id="final_form">
        <h4 class="my-3">Questions</h4>
                <?php
                foreach ($questions as $question)
                {
                    PageBuilder::get_question_card($question['Question_id'], $question['Question'],$question['Option 1'],$question['Option 2']
                        ,$question['Option 3'],$question['Option 4']);
                }
                ?>
    </form>
    <div class="form-group row">
        <button type="button" class="btn btn-primary" id="submit-btn">Save</button>
    </div>
<?php
PageBuilder::add_footer();
?>
<script src="js/question.js" type="text/javascript"></script>
