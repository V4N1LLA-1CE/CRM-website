<?php

// Database credentials ###CHANGE HERE
$host = 'localhost';
$dbname = 'fit2104_a3_lab4_group10';
$username = 'admin';
$password = 'admin';

// Create a DBH instance
global $dbh;
$dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

// Create User Data Access Object
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

// Organisation DAO
class OrgDAO
{
  private $dbh;
  public function __construct()
  {
    global $dbh;
    $this->dbh = $dbh;
  }

  public function getOrgs()
  {
    $sql = "SELECT * FROM Organisation";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute();

    // fetch all users and return dictionary
    $orgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $orgs;
  }

  public function insertOrg($name, $site, $desc, $industry)
  {
    // NOTE: apparently desc is reserved keyword for descending in sql, so backticks are needed so sql treats it as a field
    $sql = "
            INSERT INTO Organisation (name, website, `desc`, industry)
            VALUES (:name, :site, :desc, :industry)
    ";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':site', $site);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':industry', $industry);

    $stmt->execute();
  }

  public function deleteOrg($id)
  {
    // delete contact-us messages and projects
    // Delete associated contact-us messages
    $contactStmt = $this->dbh->prepare("DELETE FROM Contact_Us WHERE org_id = :id");
    $contactStmt->bindParam(':id', $id);
    $contactStmt->execute();

    // delete org
    $stmt = $this->dbh->prepare("DELETE FROM Organisation WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function modifyOrg($id, $name, $site, $desc, $industry)
  {
    // Prepare the SQL statement
    $sql = "
        UPDATE Organisation 
        SET name = :name,
            website = :website,
            `desc` = :desc,
            industry = :industry
        WHERE id = :id
    ";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':website', $site);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':industry', $industry);

    $stmt->execute();
  }
}

// create global orgDAO
global $orgDao;
$orgDao = new OrgDAO();


// create contact us DAO
class ContactDao
{

  private $dbh;

  public function __construct()
  {
    global $dbh;
    $this->dbh = $dbh;
  }

  public function getContacts()
  {
    $sql = "SELECT * FROM Contact_Us";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute();

    // fetch all users and return dictionary
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contacts;
  }

  public function insertContacts($fname, $lname, $phone, $message, $replied = false)
  {
    $sql = "
            INSERT INTO Contact_Us (first_name, last_name, phone_number, message, replied)
            VALUES (:first_name, :last_name, :phone, :message, :replied)
    ";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':first_name', $fname);
    $stmt->bindParam(':last_name', $lname);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':replied', $replied, PDO::PARAM_BOOL);

    $stmt->execute();
  }

  public function deleteContact($id)
  {
    $stmt = $this->dbh->prepare("DELETE FROM Contact_Us WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function modifyRepliedAndOrg($id, $replied, $org)
  {
    $id = intval($id);

    // if no org_id selected, only update replied
    if ($org === NULL) {
      $sql = "UPDATE Contact_Us 
              SET replied = :val
              WHERE id = :id
              ";
      $stmt = $this->dbh->prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':val', $replied, PDO::PARAM_BOOL);
      $stmt->execute();
    } else {
      $sql = "UPDATE Contact_Us
              SET replied = :val,
                  org_id = :org_id
              WHERE id = :id
              ";
      $stmt = $this->dbh->prepare($sql);
      $orgId = intval($org);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':val', $replied, PDO::PARAM_BOOL);
      $stmt->bindParam(':org_id', $orgId);
      $stmt->execute();
    }
  }
}

global $contactDao;
$contactDao = new ContactDao();
