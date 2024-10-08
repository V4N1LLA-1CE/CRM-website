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

  public function deleteAssociatedData($org_id)
  {
    $stmt = $this->dbh->prepare("DELETE FROM Contact_Us WHERE org_id = :id");
    $stmt->bindParam(':id', $org_id);
    $stmt->execute();
  }
}

global $contactDao;
$contactDao = new ContactDao();


class ContractorDao
{
  private $dbh;

  public function __construct()
  {
    global $dbh;
    $this->dbh = $dbh;
  }

  public function getContractors()
  {
    $stmt = $this->dbh->prepare("SELECT * FROM Contractor");
    $stmt->execute();

    $contractors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $contractors;
  }

  public function deleteContractor($id)
  {
    $stmt = $this->dbh->prepare("DELETE FROM Contractor WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function modifyContractor($id, $firstname, $lastname, $specialisation, $email, $phone, $address)
  {
    // SQL query to update the contractor details
    $sql = "UPDATE Contractor 
            SET first_name = :firstname, 
                last_name = :lastname, 
                specialisation = :specialisation, 
                email = :email, 
                phone_number = :phone, 
                address = :address 
            WHERE id = :id";

    // Prepare the SQL statement
    $stmt = $this->dbh->prepare($sql);

    // Bind the parameters to the SQL query
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':specialisation', $specialisation);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':id', $id);

    // Execute the statement
    $stmt->execute();
  }

  public function insertContractor($firstname, $lastname, $specialisation, $email, $phone, $address)
  {
    // create sql statement/query
    $sql = "INSERT INTO Contractor (first_name, last_name, specialisation, email, phone_number, address) 
            VALUES (:firstname, :lastname, :specialisation, :email, :phone, :address)";

    // prepare statement
    $stmt = $this->dbh->prepare($sql);

    // Bind the parameters to the SQL query
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':specialisation', $specialisation);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':address', $address);

    // Execute the statement
    $stmt->execute();
  }
}

global $contractorDao;
$contractorDao = new ContractorDao();


// create project data access class
class ProjectDao
{
  private $dbh;
  public function __construct()
  {
    global $dbh;
    $this->dbh = $dbh;
  }

  public function getProjects()
  {
    $sql = "SELECT * FROM Project";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute();

    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $projects;
  }

  public function deleteAssociatedProject($org_id)
  {
    $sql = "DELETE FROM Project WHERE org_id = :org_id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':org_id', $org_id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function deleteContractorData($id)
  {
    // find projects that have contractor_id of $id and set these contractor_id fields to NULL
    $sql = "UPDATE Project SET contractor_id = NULL WHERE contractor_id = :id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function deleteProject($id)
  {
    $stmt = $this->dbh->prepare("DELETE FROM Project WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  public function insertProject($name, $desc, $technique, $dueDate, $pmt, $org_id, $contractor_id)
  {
    $sql = "
        INSERT INTO Project (name, `desc`, technique_required, due_date, pmt_link, org_id, contractor_id)
        VALUES (:name, :desc, :technique, :due_date, :pmt, :org_id, :contractor_id)
    ";
    $stmt = $this->dbh->prepare($sql);

    // Bind the parameters to the SQL query
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':technique', $technique);
    $stmt->bindParam(':due_date', $dueDate);
    $stmt->bindParam(':pmt', $pmt);

    // accept for null values
    $stmt->bindParam(':org_id', $org_id, PDO::PARAM_INT | PDO::PARAM_NULL);
    $stmt->bindParam(':contractor_id', $contractor_id, PDO::PARAM_INT | PDO::PARAM_NULL);

    // Execute the statement
    $stmt->execute();
  }

  public function modify($id, $name, $desc, $technique, $due, $pmt, $org, $contractor)
  {
    // Prepare the SQL query to update the Project table
    $sql = "UPDATE Project 
            SET name = :name, 
                `desc` = :desc, 
                technique_required = :technique, 
                due_date = :due, 
                pmt_link = :pmt, 
                org_id = :org, 
                contractor_id = :contractor 
            WHERE id = :id";

    // prepare statement
    $stmt = $this->dbh->prepare($sql);

    // Bind the parameters to the SQL query
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':desc', $desc, PDO::PARAM_STR);
    $stmt->bindParam(':technique', $technique, PDO::PARAM_STR);
    $stmt->bindParam(':due', $due);
    $stmt->bindParam(':pmt', $pmt, PDO::PARAM_STR);
    $stmt->bindParam(':org', $org, PDO::PARAM_INT);
    $stmt->bindParam(':contractor', $contractor, PDO::PARAM_INT);

    // execute query
    $stmt->execute();
  }
}

global $projectDao;
$projectDao = new ProjectDao();
