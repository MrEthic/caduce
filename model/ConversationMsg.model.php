<?php

namespace caducee\Model;

require_once(DIR . "/model/Model.php");


class ConversationMsg extends Model
{

    private int $cid;
    private int $is_answer;

    public function __construct(int $cid, bool $is_user)
    {
        $this->is_answer = $is_user ? 0 : 1;
        $this->cid = $cid;
        $this->table = "conv_message";
        $this->id_column = "id_message";
        $this->get_connection();
    }

    public function get_conv()
    {
        $sql = "SELECT * FROM conv_message WHERE id_conversation=:cid ORDER BY sent_datetime DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(["cid" => $this->cid]);
        return $stmt->fetchAll();
    }

    // UPDATE user u INNER JOIN conversation c ON u.NSS=c.id_user SET u.notify=1 WHERE c.id_conv=5;
    public function new_msg(string $msg)
    {

            $sql = "INSERT INTO conv_message(id_conversation, content, is_answer) VALUES (:cid, :msg, :isa)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(["cid" => $this->cid, "msg" => $msg, "isa" => $this->is_answer]);
    }

}