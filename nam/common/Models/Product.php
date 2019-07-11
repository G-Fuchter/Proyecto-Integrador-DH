<?php
class Product {

    private $id;
    private $name;
    private $price;
    private $description;
    private $diet;

    public function __constructor($id, $name, $price, $description, $diet) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->diet;
    }

    public function getID() {
        return $this->id;
    }

    public function getPrice() {
        return $this->id;
    }

    public function getName() {
        return $this->id;
    }

    public function getDescription() {
        return $this->id;
    }

    public function getDiet() {
        return $this->diet;
    }

}