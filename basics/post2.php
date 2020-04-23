<?php
if (isset($_POST['submit'])) {
    var_dump(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
}

?>


<form action="" method="post">
    <input type="text" name="username">
    <input type="submit" value="enter" name="submit">
</form> 