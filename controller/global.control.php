<?php 

function user_management() {
    require_once(DIR."/model/DBUsers.class.php");
    if (isset($_GET["filter"])) {
        $users = Users::with_filter($_GET["filter"])->get();
    }
    else {
        $users = Users::all()->get();
    }

    require_once(DIR."/view/userManagement.view.php");
}

$gateways = [
    "users" => "user_management",
];

if (isset($_GET["action"])) {
    if (array_key_exists($_GET["action"], $gateways)) {
        $gateways[$_GET["action"]]();
    }
    else {
        // 404 page not found
    }
}
else {
    // Render acceuil
}



?>