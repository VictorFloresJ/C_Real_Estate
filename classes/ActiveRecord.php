<?php

namespace App;

abstract class ActiveRecord
{
    //DB
    protected static $db;
    protected static $column_db = [];
    protected static $table = '';
    
    //Errors
    protected static $errors = [];
    
    public static function setDB($database)
    {
        self::$db = $database;
    }

    public function save(): void
    {
        if ($this->id) {
            $this->update();
        } else {
            $this->create();
        }
    }

    protected function create(): void
    {
        // Sanitize data
        $atributes = $this->sanitizeData();

        // Insert into DB
        $query = " INSERT INTO " . static::$table . " ( ";
        $query .= join(", ", array_keys($atributes));
        $query .= " ) VALUES ( ' ";
        $query .= join("', '", array_values($atributes));
        $query .= " ') ";

        $result = self::$db->query($query);
        if ($result) {
            header('Location: /admin?message=1');
        }
    }

    protected function update(): void
    {
        // Sanitize data
        $atributes = $this->sanitizeData();

        // Update
        $values = [];
        foreach ($atributes as $key => $value) {
            $values[] = "$key = '$value'";
        }

        $query = "UPDATE " . static::$table . " SET ";
        $query .= join(",", $values);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $result = self::$db->query($query);
        if ($result) {
            header('Location: /admin?message=2');
        }
    }

    public function delete(): void
    {
        $this->deleteImage();

        $query = "DELETE FROM " . static::$table . " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
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


    protected function atributes()
    {
        $atributes = [];
        foreach (static::$column_db as $column) {
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
        return static::$errors;
    }

    public function valid()
    {
        static::$errors = [];
        return static::$errors;
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$table;
        $result = self::consultSQL($query);
        return $result;
    }

    public static function getRecords($numberRecords)
    {
        $query = "SELECT * FROM " . static::$table . " LIMIT $numberRecords";
        $result = self::consultSQL($query);
        return $result;
    }

    protected static function consultSQL($query)
    {
        $result = self::$db->query($query);
        $array = [];
        while ($row = $result->fetch_assoc()) {
            $array[] = static::createObject($row);
        }
        $result->free();
        return $array;
    }

    protected static function createObject($row)
    {
        $obj = new static;
        foreach ($row as $key => $value) {
            if (property_exists($obj, $key)) {
                $obj->$key = $value;
            }
        }
        return $obj;
    }

    public static function getRecordById($id)
    {
        $query = "SELECT * FROM " . static::$table . " WHERE id = '$id'";
        $result = self::consultSQL($query);
        return $result[0];
    }

    public function syncRecord($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) $this->$key = $value;
        }
    }
}
