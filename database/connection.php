<?php

// Database credentials ###CHANGE HERE
$host = 'localhost';
$dbname = 'fit2104_a3_lab4_group10';
$username = 'admin';
$password = 'admin';

// Create a DBH instance
global $dbh;
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

class UserDAO
{
  private $dbh;

  public function __construct()
  {
    global $dbh;
    $this->dbh = $dbh;
  }

  public function insertUser($email, $password, $first_name, $last_name)
  {
    $sql = "
            INSERT INTO User (email, password, first_name, last_name)
            VALUES (:email, :password, :first_name, :last_name)
    ";
    $stmt = $this->dbh->prepare($sql);

    // bind params to placeholders
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);

    $stmt->execute();
  }

  public function deleteUser($id)
  {
    $stmt = $this->dbh->prepare("DELETE FROM User WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function getUsers()
  {
    $sql = "SELECT * FROM User";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute();

    // fetch all users and return dictionary
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $users;
  }

  public function modifyUser($id, $email, $password, $firstname, $lastname)
  {
    // Prepare the SQL statement
    $sql = "
        UPDATE User
        SET email = :email,
            password = :password,
            first_name = :first_name,
            last_name = :last_name
        WHERE id = :id
    ";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':first_name', $firstname);
    $stmt->bindParam(':last_name', $lastname);

    $stmt->execute();
  }
}

// create global user data access object
global $userDao;
$userDao = new UserDAO();
