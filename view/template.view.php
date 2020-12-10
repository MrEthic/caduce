<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="<?php DIR?>/public/css/style_user_management.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
</head>

<body>
    <?= $content ?>

    <dialog class="alert__container" id="Alert">
        <div id="AlertContent">
            <div id="CloseAlert">
                <span id="AlertCross">X</span>
            </div>
            <h1>Error !</h1>
            <p id="AlertMSG"></p>
        </div>
    </dialog>


    <script>

        const alert = document.getElementById("Alert");
        const alert_content = document.getElementById("AlertContent");
        const alert_msg = document.getElementById("AlertMSG");
        function pop_alert(msg, type) {
            alert.style.display = "block";
            if(type == "BAD") {
                alert_content.style.backgroundColor = "red";
            }
            else if (type == "GOOD") {
                alert_content.style.backgroundColor = "green";
            }
            alert_content.style.backgroundColor = "none";
            alert_msg.innerHTML = msg;
        }

        const alert_close = document.getElementById("AlertCross");
        function cl() {
            alert.style.display = "none";
        }
        alert_close.addEventListener("click", cl, false);



    </script>
</body>

</html>