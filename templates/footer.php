<?php

if(!isset($_SESSION['user']))
{
    include (__DIR__ . '/login_modal.html');
    include (__DIR__ . '/signup_modal.html');
}
?>
<html>
<body>
<script src="node_modules/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="node_modules/popper.js/dist/popper.min.js" type="text/javascript"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/user.js" type="text/javascript"></script>
</body>
</html>