<?php 
namespace App;

class Seller extends ActiveRecord
{
    protected static $column_db = ["id", "nombre", "apellido", "phone"];
    protected static $table = "sellers";

    public $id;
    public $nombre;
    public $apellido;
    public $phone;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->phone = $args["phone"] ?? "";
    }

    public function valid()
    {
        if (!$this->nombre) {
            self::$errors[] = "You must add a name";
        }
        if (!$this->apellido) {
            self::$errors[] = "You must add a last name";
        }
        if (!$this->phone || strlen($this->phone) > 10) {
            self::$errors[] = "You must add valid phone number";
        }
        return self::$errors;
    }
}
?>