<?php
include_once("common/Models/User.php");
include_once("common/serverlogic/database-service.php");

class DBService
{

    private $dsn = "mysql:dbname=nam;host=127.0.0.1;port=3306";
    private $user = "root";
    private $pass = "";
    private static $instance;
    private $database;

    private function __construct()
    {
        $this->database = new PDO($this->dsn, $this->user, $this->pass);
        // throw exceptions, when SQL error is caused
        $this->database->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        // prevent emulation of prepared statements
        $this->database->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
    }

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function saveUser(User $user)
    {
        $statement = $this->database->prepare('INSERT INTO users (name, surname, email, address, password, country, diet) VALUES (:name, :surname, :email, :address, :password, :country, :diet)');
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $statement->bindParam(':name', $user->getName(), PDO::PARAM_STR);
        $statement->bindParam(':surname', $user->getSurname(), PDO::PARAM_STR);
        $statement->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':address', $user->getAddress(), PDO::PARAM_STR);
        $statement->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $statement->bindParam(':country', $user->getCountry(), PDO::PARAM_STR);
        $statement->bindParam(':diet', $user->getDiet(), PDO::PARAM_STR);
        $success = $statement->execute();
        if ($success) {
            LoggerService::log("User saved " . $user->getEmail());
        } else {
            LoggerService::log("User not saved " . $user->getEmail());
        }
    }

    public function getUserWithEmail(string $email)
    {
        $statement = $this->database->prepare('SELECT * FROM users WHERE email=:email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $result["PASSWORD"] = substr( $result["PASSWORD"], 0, 60 ); //utf8_encode($hash)
        $result["PASSWORD"] = utf8_encode($result["PASSWORD"]);
        if(!empty($result)){
            $user = new User($result["ID"], $result["NAME"], $result["SURNAME"], $result["EMAIL"], $result["PASSWORD"], $result["ADDRESS"], $result["DIET"], $result["COUNTRY"]);
            return $user;
        }
    }

    public function doesThisUserExists(string $email)
    {
        $statement = $this->database->prepare('SELECT * FROM users WHERE email=:email');
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }
}
