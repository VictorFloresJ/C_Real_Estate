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
}
?>