<?php


namespace Hillel\Src\Models;


abstract class Model
{

    public static function find($id)
    {
        $sql = "SELECT * FROM user WHERE id = " . $id;
        return $sql;
    }

    public function property()
    {
        $data = get_object_vars($this);
        $property1 = array_keys($data);
        $property2 = array_map(function ($item)
        {
            return ':' . $item;
        }, $property1);
        return $property = [$property1,$property2];
    }

    public function create()
    {
        $property = static::property();
        $sql = "INSERT INTO user (". implode(',', $property[0]) .") VALUES (". implode(',', $property[1]) .")";
        return $sql;
    }

    public function update()
    {
        $sql = "UPDATE user SET name = '".$this->name."', email = '".$this->email."' WHERE id = ".$this->id;
        return $sql;
    }

    public function delete()
    {
        $sql = "DELETE FROM user WHERE id = ".$this->id;
        return $sql;
    }

    public function save()
    {
        if (static::find($this->id) != 0) {
            return $this->update();
        }
        return $this->create();
    }
}

final class User extends Model
{
    public $id;
    public $name;
    public $email;
}