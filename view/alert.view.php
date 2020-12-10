<?php

function pop_alert(string $msg, string $type = "") : void
{
    echo "<script>pop_alert('". $msg . "', '" . $type . "')</script>";
}