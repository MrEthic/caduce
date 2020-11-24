<?php
require_once(DIR . "/model/DBUtils.class.php");

class DBEntity {

    private $content;

    public function get() {
        return $this->content;
    }

    protected static function all($entity_name) {
        $content = DBUtils::all($entity_name);
        $instance = new self();
        $instance->fill($content);
        return $instance;
    }

    protected static function from_sql($sql, $params, $all = true) {
        $content = DBUtils::execute_query($sql, $params, $all);
        $instance = new self();
        $instance->fill($content);
        return $instance;
    }

    private function fill($content) {
        $this->content = $content;
    }


}




?>