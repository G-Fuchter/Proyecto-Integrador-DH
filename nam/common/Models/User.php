<?php
include_once("./common/Models/PublicUser.php");

class User extends PublicUser {

    protected $email;
    protected $surname;
    protected $password;
    protected $address;
    protected $diet;
    protected $country;

    function __construct($id, $name, $surname, $email, $password, $address, $diet, $country) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->address = $address;
        $this->setDiet($diet);
        $this->country = $country;
    }

    private function setDiet(string $diet){
        if($diet == 'Vegan' || $diet == 'Vegetarian' || $diet == "Gluten Free" || $diet == "Normal"){
            $this->diet = $diet;
        }else{
            $this->diet = null;
        }
    }

    public function getEmail () {
        return $this->email;
    }

    public function getSurname () {
        return $this->surname;
    }

    public function getAddress () {
        return $this->address;
    }

    public function getPassword () {
        return $this->password;
    }

    public function getDiet () {
        return $this->diet;
    }

    public function getCountry () {
        return $this->country;
    }

}