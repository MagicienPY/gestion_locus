<?php
if(isset($_POST['btn'])){


    session_destroy();
    session_cache_expire();
    session_reset();
    header("Location:index.php");

}

?>