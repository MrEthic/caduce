<?php

function alert($msg) {
    echo sprintf("<script>calert('%s')</script>", $msg);
}