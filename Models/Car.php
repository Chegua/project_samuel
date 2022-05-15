<?php
require_once 'DataBase.php';

class Car
{
    //ATRIBUTOS
    private $brand;
    private $model;
    private $year;
    private $color;
    private $status;

    //CONSTRUCTOR
    function __construct($brand = "", $model = "", $year = "", $color = "", $status = "")
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->color = $color;
        $this->status = $status;
    }
    //METODOS
    /*-------------------------------------------------------*/

    public function create()
    {
        $db = DataBase::getInstance();

        $query = $db->prepare("INSERT INTO cars (brand,model,year,color,status) VALUES (:brand,:model,:year,:color,:status)");
        $query->bindParam(':brand', $this->brand);
        $query->bindParam(':model', $this->model);
        $query->bindParam(':year', $this->year);
        $query->bindParam(':color', $this->color);
        $query->bindParam(':status', $this->status);

        $result = $query->execute();

        return $result ? 'exito' : 'fracaso';
    }
    /*-------------------------------------------------------*/

    public function list()
    {
        $db = DataBase::getInstance();

        $sql = "SELECT *FROM cars";
        $result = $db->query($sql);

        if ($result->rowCount() > 0)
            return $result->fetchAll();
        else
            return null;
    }

    /*-------------------------------------------------------*/
    public function update($id)
    {
        $db = Database::getInstance();

        $sql = "UPDATE cars SET brand=:brand,model=:model,year=:year,color=:color,status=:status, WHERE id='$id'";
        $query = $db->prepare($sql);

        $query->bindParam(':brand', $this->brand);
        $query->bindParam(':model', $this->model);
        $query->bindParam(':year', $this->year);
        $query->bindParam(':color', $this->color);
        $query->bindParam(':status', $this->status);

        $result = $query->execute();

        return $result ? 'exito' : 'fracaso';
    }
    /*-------------------------------------------------------*/

    public function delete($id)
    {

        $db = DataBase::getInstance();
        $sql = "DELETE FROM cars WHERE id='" . $id . "'";

        $resultado2 = $db->query($sql);
        if ($resultado2) {
            return 'exito';
        } else {
            return 'fracaso';
        }
        return 'malo';
    }
    /*-------------------------------------------------------*/

    public function find($id)
    {
        $db = Database::getInstance();

        $sql = "SELECT * FROM cars WHERE id= '$id'";

        $resultado = $db->query($sql);

        if ($resultado->rowCount() > 0)
            return $resultado->fetchAll();
        else
            return null;
    }
}
