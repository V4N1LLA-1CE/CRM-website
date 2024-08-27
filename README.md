# FIT2104 Assignment 3 - Web App Development Fundamentals

## Contributors

Name: Austin Sofaer  
Email: asof0006@student.monash.edu  
Id: 33222150

Name: Zamin Nasser  
Email: znas0005@student.monash.edu  
Id: 32250436

## Link To Repo

`https://git.infotech.monash.edu/fit2104/fit2104-2024-s2/group-assignment/Lab04_Group10/project`

## Admin Credentials

```bash
# Username
Nathan.Jims@gmail.com

# Password
Ilovechocolatemint12
```

```bash
# Username
J.Wilson@gmail.com

# Password
Password: TedLasso2012FTW!
```

## Schema + Data Files

- `schema-data.sql`

## Modify `/database/connection.php`

The dbname has been set according to the database created from `schema-data.sql` file. To ensure the connection works, `$username` and `$password` must be modified according to the credentials set on the assessor's machine.

```php
$host = 'localhost';
$dbname = 'fit2104_a3_lab4_group10';
$username = 'admin'; // CHANGE THIS
$password = 'admin'; // CHANGE THIS
```
