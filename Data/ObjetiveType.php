<?php
class ObjetiveType extends DataAccess
{   
    public function __construct($server,$dbname,$user,$password) 
    {
        try 
        {            
            $dsn = "mysql:host=$server;dbname=$dbname";
            $this->con = new PDO($dsn, $user,$password);
        }
        catch (PDOException $e)
        {
            echo $e->getMessage();
            exit();
        }        
    }
 
    function GetAll()
    {
        $stmt =  $this->Consultar("SELECT * FROM objetive_type");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Store($request)
    {

    }
    function Find($id)
    {

    }
    function Update($id,$request)
    {

    }    
    function Delete($id)
    {

    }
}