<?php

namespace App\services;

use App\Services\DatabaseService;



class AuthService

{
    public $username;
    public $email;
    public $password;
    public $repeatpassword;

    public function emptydetails($username, $email, $password, $repeatpassword)
    {

        if (empty($username) || empty($email) || empty($password) || empty($repeatpassword)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    public function passwordCheck($password, $repeatpassword)
    {
        if ($password !== $repeatpassword) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
    public function userExist($username, $email)
    {
        $pdo = DatabaseService::connectDatabase();
        $query = "SELECT * FROM `register` WHERE username=:username OR email=:email";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":blood", $blood);
        $reslt = $stmt->fetch();
        if (empty($reslt)) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
        print_r($reslt);
    }
    function createUser($username, $email, $password)
    {

        $passcode = password_hash($password, PASSWORD_DEFAULT);
        $pdo =  DatabaseService::connectDatabase();
        $query = "INSERT INTO  `register` SET username=:username, email=:email, password=:password";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(":username", $username);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":password", $passcode);
        if ($stmt->execute()) {
            header("./login");
        } else {
            print_r($stmt->errorInfo());
        }
    }
    public function loginUser($password, $email)
    {
        $pdo = DatabaseService::connectDatabase();
        $query = "SELECT `password` FROM `register` WHERE email = :email";
        $stmt =  $pdo->prepare($query);
        $stmt->bindparam(":email", $email);
        $stmt->execute();
        $pass = $stmt->fetch();
        $hash = $pass['password'];
        if (password_verify($password, $hash)) {
            header('Location: ./dashboard');
        } else {
            echo 'Invalid password.';
        }
    }
    public function getDetails($email)
    {
        $pdo = DatabaseService::connectDatabase();
        $query = "SELECT * FROM `register` WHERE  email=:email";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(":email", $email);
        $stmt->execute();
        $reslt = $stmt->fetchAll();
        return $reslt;
    }
    public function completeDetails($email, $firstname, $lastname, $age, $country, $state, $city, $blood, $genotype, $weight, $illness, $disability, $diabetes, $phone, $pregnancy, $firstPregnant)
    {
        $pdo = DatabaseService::connectDatabase();
        $query = "INSERT INTO `register` WHERE  email=:email SET
         firstname=:firstname, 
         lastname=:lastname, 
         age = :age,
         country=:country, 
         state=:state,
         city=:city, 
         blood=:blood
         genotype = :genotype
         weight = :weight
         illness = :illness
         disability = :disability
         diabetes = :diabetes
         phone = :phone
         pregnanvy = :pregnancy
         firstPregnant = :firstPregnant";
        $stmt = $pdo->prepare($query);
        $stmt->bindparam(":email", $email);
        $stmt->bindparam(":firstname", $firstname);
        $stmt->bindparam(":lastnwme", $lastname);
        $stmt->bindparam(":age", $age);
        $stmt->bindparam(":country", $country);
        $stmt->bindparam(":state", $state);
        $stmt->bindparam(":city", $city);
        $stmt->bindparam(":genotype", $genotype);
        $stmt->bindparam(":weight", $weight);
        $stmt->bindparam(":illness", $illness);
        $stmt->bindparam(":disability", $disability);
        $stmt->bindparam(":diabetes", $diabetes);
        $stmt->bindparam(":phone", $phone);
        $stmt->bindparam(":pregnancy", $pregnancy);
        $stmt->bindparam(":firstpregnant", $firstPregnant);
        $stmt->bindparam(":blood", $blood);
        $stmt->execute();
        if ($stmt->execute()) {
            $result = true;
        } else {
            $result = false;
        }
        return $result;
    }
}
