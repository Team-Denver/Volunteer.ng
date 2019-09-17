<?php
// 'user' object
class User
{

    // database connection and table name
    private $conn;
    private $table_name = "hng_users";

    // object properties
    public $user_id;
    public $fullname;
    public $username;
    public $email;
    public $password;
    public $phone;
    public $user_location;
    public $stack;

    // constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // create new user record
    function create()
    {

        // insert query
        $query = "INSERT INTO " . $this->table_name . "
            SET
                fullname = :fullname,
                email = :email,
                username = :username,
                password = :password,
                phone = :phone,
                user_location = :user_location,
                stack = :stack";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->fullname = htmlspecialchars(strip_tags($this->fullname));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->user_location = htmlspecialchars(strip_tags($this->user_location));
        $this->stack = htmlspecialchars(strip_tags($this->stack));

        // bind the values
        $stmt->bindParam(':fullname', $this->fullname);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':user_location', $this->user_location);
        $stmt->bindParam(':stack', $this->stack);

        // execute the query, also check if query was successful
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // check if given email exist in the database
    function emailExists()
    {

        // query to check if email exists
        $query = "SELECT user_id, fullname, username, email, phone, user_location, stack
            FROM " . $this->table_name . "
            WHERE email = ?
            OR username = ?
            LIMIT 0,1";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->username = htmlspecialchars(strip_tags($this->username));

        // bind given email value
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->username);

        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if ($num > 0) {

            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->user_id = $row['user_id'];
            $this->fullname = $row['fullname'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->phone = $row['phone'];
            $this->user_location = $row['user_location'];
            $this->stack = $row['stack'];

            // return true because email exists in the database
            return true;
        }

        // return false if email does not exist in the database
        return false;
    }

    // check if given email exist in the database
    function loginUser()
    {

        // query to check if email exists
        $query = "SELECT user_id, fullname, username, email, phone, user_location, stack
            FROM " . $this->table_name . "
            WHERE email = ?
            OR username = ?
            AND password = ?
            LIMIT 0,1";

        // prepare the query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // bind given email & password value
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->username);
        $stmt->bindParam(3, $this->password);

        // execute the query
        $stmt->execute();

        // get number of rows
        $num = $stmt->rowCount();

        // if email exists, assign values to object properties for easy access and use for php sessions
        if ($num > 0) {

            // get record details / values
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // assign values to object properties
            $this->user_id = $row['user_id'];
            $this->fullname = $row['fullname'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->password = $row['password'];
            $this->phone = $row['phone'];
            $this->user_location = $row['user_location'];
            $this->stack = $row['stack'];

            // return true because email & password exists in the database
            return true;
        }

        // return false if email & password does not exist in the database
        return false;
    }
}
