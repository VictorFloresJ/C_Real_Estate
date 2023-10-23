<?php 
namespace Model;

class Admin extends ActiveRecord
{
    protected static $column_db = ['id', 'email', 'password'];
    protected static $table = 'users';

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function valid()
    {
        if (!$this->email) {
            self::$errors[] = "You must add an email";
        }
        if (!$this->password) {
            self::$errors[] = "You must add a password";
        }
        return self::$errors;
    }

    public function userExists()
    {
        $query = "SELECT * FROM " . self::$table . " WHERE email = '$this->email' LIMIT 1";
        $result = self::$db->query($query);
        if ($result->num_rows === 0) {
            self::$errors[] = 'User doesnt exists';
        }
        return $result;
    }

    public function checkPassword($result)
    {
        $user = $result->fetch_object();
        $isAuth = password_verify($this->password, $user->password);
        if (!$isAuth) {
            self::$errors[] = 'Incorrect password';
        }
        return $isAuth;
    }

    public function auth()
    {
        session_start();
        $_SESSION["user"] = $this->email;
        $_SESSION["login"] = true;
        header("Location: /admin");
    }
}
