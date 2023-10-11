<?php
namespace App;

class Property
{
    //DB
    protected static $db;
    protected static $column_db = ["id", "title", "price", "image", "description", "rooms", "wc", "parking", "created", "sellers_id"];

    //Errors
    protected static $errors = [];

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

    public function save(): void
    {
        if ($this->id) {
            $this->update();
        } else {
            $this->create();
        }
    }

    protected function create() : void
    {
        // Sanitize data
        $atributes = $this->sanitizeData();

        // Insert into DB
        $query = " INSERT INTO properties ( ";
        $query .= join(", ", array_keys($atributes));
        $query .= " ) VALUES ( ' ";
        $query .= join("', '", array_values($atributes));
        $query .= " ') ";

        $result = self::$db->query($query);
        if ($result) {
            header('Location: /admin?message=1');
        }
    }
    
    protected function update() : void
    {
        // Sanitize data
        $atributes = $this->sanitizeData();
        
        // Update
        $values = [];
        foreach ($atributes as $key => $value) {
            $values[] = "$key = '$value'";
        }

        $query = "UPDATE properties SET ";
        $query .= join(",", $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";
        
        $result = self::$db->query($query);
        if ($result) {
            header('Location: /admin?message=2');
        }
    }

    public function delete() : void
    {
        $this->deleteImage();

        $query = "DELETE FROM properties WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $result = self::$db->query($query);
        if ($result) {
            header("Location: /admin?message=3");
        }
    }

    public function setImage($image)
    {
        //Delete previous image
        if ($this->id) {
            $this->deleteImage();
        }
        
        if ($image) {
            $this->image = $image;
        }
    }

    protected function deleteImage() 
    {
        // Delete image of current property
        $imageExists = file_exists(FOLDER_IMAGES . $this->image);
        if ($imageExists) {
            unlink(FOLDER_IMAGES . $this->image);
        }
    }

    public static function setDB($database)
    {
        self::$db = $database;
    }

    protected function atributes()
    {
        $atributes = [];
        foreach (self::$column_db as $column) {
            if ($column === "id") continue;
            $atributes[$column] = $this->$column;
        }
        return $atributes;
    }

    protected function sanitizeData()
    {
        $atributes = $this->atributes();
        $sanitized = [];

        foreach ($atributes as $key => $value) {
            $sanitized[$key] = self::$db->escape_string($value);
        }

        return $sanitized;
    }

    public static function getErrors()
    {
        return self::$errors;
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

    public static function all()
    {
        $query = "SELECT * FROM properties";
        $result = self::consultSQL($query);
        return $result;
    }

    public static function getProperties($numberProperties)
    {
        $query = "SELECT * FROM properties LIMIT $numberProperties";
        $result = self::consultSQL($query);
        return $result;
    }

    protected static function consultSQL($query)
    {
        $result = self::$db->query($query);
        $array = [];
        while ($row = $result->fetch_assoc()) {
            $array[] = self::createObject($row);
        }
        $result->free();
        return $array;
    }

    protected static function createObject($row)
    {
        $obj = new self;
        foreach ($row as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    public static function getPropertyById($id)
    {
        $query = "SELECT * FROM properties WHERE id = '$id'";
        $result = self::consultSQL($query);
        return $result[0];
    }

    public function syncProperty($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) $this->$key = $value;
        }
    }
}
