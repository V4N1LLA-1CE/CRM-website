# Monash University - Web App Development Project

This is a full stack CRM administrative website that I built for a university project. This project is built using using PHP, MySQL and bootstrap. The database schema visual can be found in `database/schema.png`

## How to view the project

### Prerequisites
- `PHP` installed
- `MySQL` or `MariaDb` installed and set up with credentials
- `Apache httpd` installed and setup (<strong>OPTIONAL</strong>)

### How to setup

 1. Import database into `MySQL` from `database/schema-data.sql`
 2.  Modify `/database/connection.php`

The dbname has been set according to the database created from `schema-data.sql` file. To ensure the connection works, `$username` and `$password` must be modified according to the credentials set on the assessor's machine.

```php
$host = 'localhost';
$dbname = 'fit2104_a3_lab4_group10';
$username = 'admin'; // CHANGE THIS
$password = 'admin'; // CHANGE THIS
```

3. You can either:
- Use Apache HTTPD server
- Use built-in PHP server by running the following command in project root folder: <br>`php -S localhost:8080`<br>Then you can navigate to `http://localhost:8080` to view the project

## Admin Credentials

Once set up, use these credentials provided for logging into the system, more admin accounts can be created once logged in.
```bash
# Username
Nathan.Jims@gmail.com

# Password
Ilovechocolatemint12
```
