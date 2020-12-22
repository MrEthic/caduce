<?php

namespace caducee\Controller;

require_once(DIR . "/controllers/Controller.php");

class Tchat extends Controller
{

    public function index() : void {
        $this->isLoged();
        if ($_SESSION["ROLE"] == 6) {
            $this->user_index();
        }
        else if ($_SESSION["ROLE"] == 7) {
            //Gest
        }
    }

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

    public function t(string $uid) : void {
        $this->gestionaire();
        $this->load_model("Users");
        $this->Users->id = $uid;
        if (!$this->Users->get_one()) {
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
        $this->render("tchat", ["conv" => $conv, "msgs" => $conv_msg]);
    }

}