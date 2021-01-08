<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");
require_once(DIR . "/utils/validation.php");

/**
 * Class Tchat
 * @package caducee\Controller
 * Handle /tchat routes
 */
class Tchat extends Controller
{

    /**
     * Display the tchat page
     * @throws \caducee\Exception\AccessException
     */
    public function index() : void {
        $this->isLoged();
        if ($_SESSION["ROLE"] == 6) {
            $this->user_index();
        }
        else if ($_SESSION["ROLE"] == 7) {
            //Gest
        }
    }

    /**
     * Tchat page for user
     */
    private function user_index() {
        $this->load_model("Conversation", $_SESSION["hid"]);
        $this->Conversation->id = $_SESSION["NSS"];
        $conv = $this->Conversation->get_one();
        $this->load_model("ConversationMsg", $conv["id_conv"], true);
        if(isset($_POST["msg_content"])) {
            $this->ConversationMsg->new_msg($_POST["msg_content"]);
        }
        $conv_msg = $this->ConversationMsg->get_conv();
        $this->render("tchat", ["conv" => $conv, "msgs" => $conv_msg]);
    }

    /**
     * Handle /t/:uid the tchat page with a user
     * @param string $uid
     * @throws \caducee\Exception\AccessException
     */
    public function t(string $uid) : void {
        $this->gestionaire();
        $this->load_model("Users");
        $id = validate_input($uid, null, "/^[12]\d{12}$/");
        $this->Users->id = $id;
        $user = $this->Users->get_one();
        if (!$user) {
            header("Location: /users");
        }
        $this->load_model("Conversation", $_SESSION["hid"]);
        $this->Conversation->id = $uid;
        $conv = $this->Conversation->get_one();
        $this->load_model("ConversationMsg", $conv["id_conv"], false);
        if(isset($_POST["msg_content"])) {
            $this->ConversationMsg->new_msg($_POST["msg_content"]);
        }
        $conv_msg = $this->ConversationMsg->get_conv();
        $this->render("tchat", ["conv" => $conv, "msgs" => $conv_msg, "user"=>$user]);
    }

}