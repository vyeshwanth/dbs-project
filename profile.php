<?php
require_once ('./lib/User.php');
require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');

if(!isset($_SESSION))
{
    session_start();
}

PageBuilder::add_header('profile');


?>

<div class="mx-auto col-sm-8">
    <form class="my-auto">
        <div class="alert alert-danger" id="update-alert" style="display: none"></div>
        <div class="alert alert-success" id="update-success" style="display: none"></div>
        <div class="alert alert-danger" id="delete-alert" style="display: none"></div>
        <div class="form-group row">
            <label for="Input" class="col-sm-3 col-form-label">Email id</label>
            <div>
                <input type="email" name ="email_id" class="form-control" id="Input" placeholder="name@example.com" autocomplete="email" value="<?php echo $_SESSION['user']->get_emailid()?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="Input1" class="col-sm-3 col-form-label" >First name</label>
            <div>
                <input type="email" name = "first_name" class="form-control" id="Input1" value="<?php echo $_SESSION['user']->get_firstname()?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="Input2" class="col-sm-3 col-form-label">Last name</label>
            <div>
                <input type="email"  name = "last_name" class="form-control" id="Input2" value="<?php echo $_SESSION['user']->get_lastname()?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword1" class="col-sm-3 col-form-label">Old Password</label>
            <div>
                <input type="password"  name = "oldpsw" class="form-control" id="inputPassword1" placeholder="type password" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword2" class="col-sm-3 col-form-label">New Password</label>
            <div>
                <input type="password"  name = "newpsw" class="form-control" id="inputPassword2" placeholder="type password" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <button type="button" class="btn btn-primary" id="save-btn">Save</button>
        </div>
    </form>
</div>

<br>
<div>
    <button type="button" class="btn btn-danger" style="margin-left: 100px;" id="delete-user-btn">Delete User</button>
</div>

<?php
PageBuilder::add_footer();
?>
<script src="js/profile.js" type="text/javascript"></script>
