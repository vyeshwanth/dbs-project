<?php
/**
 * Created by PhpStorm.
 * User: HariVallabha
 * Date: 24-Apr-18
 * Time: 12:22 AM
 */

require_once ('./lib/Database.php');
require_once ('./lib/PageBuilder.php');

PageBuilder::add_header('profile');
?>

<div class="mx-auto col-sm-8" style="height: 1000px;">
    <form class="my-auto" style="height: auto">
        <div id="name-data"></div>
        <div class="form-group row">
            <label for="Input" class="col-sm-3 col-form-label">Email id</label>
            <div>
                <input type="email" name ="email_id" class="form-control" id="Input" placeholder="name@example.com" autocomplete="email">
            </div>
        </div>
        <div class="form-group row">
            <label for="Input1" class="col-sm-3 col-form-label">First name</label>
            <div>
                <input type="email" class="form-control" id="Input1">
            </div>
        </div>
        <div class="form-group row">
            <label for="Input2" class="col-sm-3 col-form-label">Last name</label>
            <div>
                <input type="email" class="form-control" id="Input2">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword1" class="col-sm-3 col-form-label">Old Password</label>
            <div>
                <input type="password" class="form-control" id="inputPassword1" placeholder="type password" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword2" class="col-sm-3 col-form-label">New Password</label>
            <div>
                <input type="password" class="form-control" id="inputPassword2" placeholder="type password" autocomplete="off">
            </div>
        </div>
        <div>
            <button type="button" class="btn btn-primary" id="save-btn">save</button
        </div>
    </form>
</div>

<?php
PageBuilder::add_footer();
?>
<script src="js/profile.js" type="text/javascript"></script>
