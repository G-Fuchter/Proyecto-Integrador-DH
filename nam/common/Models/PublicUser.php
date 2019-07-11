<?php

/**
 * User Class for public information
 */
class PublicUser {

    protected $id;
    protected $name;

    function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getID() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }


}