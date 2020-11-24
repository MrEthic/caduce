<?php 

function user_management() {
    require_once(DIR."/model/DBUsers.class.php");
    if (isset($_GET["filter"])) {
        $users = Users::with_filter($_GET["filter"])->get();
    }
    else if (isset($_GET["type"])) {
        $params = ["Genre" => $_GET["sex"],
        "Nom" => $_GET["nom"],
        "Prénom" => $_GET["prenom"],
        "Mail" => $_GET["mail"],
        "Tel" => $_GET["tel"],
        "dateA" => $_GET["from_date"],
        "dateB" => $_GET["to_date"]];

        $filters = [];
        foreach($params as $in_db => $val) {
            if ($val !== "") {
                $filters[$in_db] = $val;
            }
        }
        $users = Users::with_complexe_filter($filters, $_GET["type"])->get();
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