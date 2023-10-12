<?php
namespace App;

class Property extends ActiveRecord
{
    protected static $column_db = ["id", "title", "price", "image", "description", "rooms", "wc", "parking", "created", "sellers_id"];
    protected static $table = 'properties';

    public $id;
    public $title;
    public $price;
    public $image;
    public $description;
    public $rooms;
    public $wc;
    public $parking;
    public $created;
    public $sellers_id;

    public function __construct($args = [])
    {
        $this->id = $args["id"] ?? null;
        $this->title = $args["title"] ?? "";
        $this->price = $args["price"] ?? "";
        $this->image = $args["image"] ?? "";
        $this->description = $args["description"] ?? "";
        $this->rooms = $args["rooms"] ?? "";
        $this->wc = $args["wc"] ?? "";
        $this->parking = $args["parking"] ?? "";
        $this->created = date("Y/m/d");
        $this->sellers_id = $args["sellers_id"] ?? "";
    }

    public function valid()
    {
        if (!$this->title) {
            self::$errors[] = "You must add a title";
        }
        if (!$this->price) {
            self::$errors[] = "You must add a price";
        }
        if (!$this->image) {
            self::$errors[] = "You must add an image";
        }
        if (strlen($this->description) < 50) {
            self::$errors[] = "You must add a valid description (50 or more characters)";
        }
        if (!$this->rooms) {
            self::$errors[] = "You must add the number of rooms";
        }
        if (!$this->wc) {
            self::$errors[] = "You must add the number of wc";
        }
        if (!$this->parking) {
            self::$errors[] = "You must add the number of parking";
        }
        if (!$this->sellers_id) {
            self::$errors[] = "You must select the seller";
        }

        return self::$errors;
    }
}
