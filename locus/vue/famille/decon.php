<?php

    session_destroy();
    session_cache_expire();
    session_reset();
    header("Location:index.php");



?>