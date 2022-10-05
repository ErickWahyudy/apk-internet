<?php
    session_start();
    session_destroy();
    echo "<script>location='member.php'</script>";
    // echo "<script>window.location=history.go(-1);</script>";

?>

<!-- -->