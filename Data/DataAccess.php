<?php
abstract class DataAccess
{
    protected $con;      
    protected $sql;
    abstract function GetAll();
    abstract function Store($request);    
    abstract function Find($id);    
    abstract function Update($id,$request);    
    abstract function Delete($id);
    protected function Consultar($str)
    {
        return $this->con ->prepare($str);    
    }
    protected function AbrirConexion($server,$user,$password,$dbname)
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
   
}

