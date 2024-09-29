<?php
abstract class DataAccess
{
    protected $con;      
    protected $sql;
    protected $arr;
    protected PDOStatement $stmt;
    abstract function GetAll();
    abstract function Store($request);    
    abstract function Find($id);    
    abstract function Update($id,$request);    
    abstract function Delete($id);
    protected function Consultar($str):PDOStatement
    {
        $stmt=$this->con ->prepare($str); 
        if(count($this->arr)>0){
            $stmt->execute($this->arr);
        }
        else{
            $stmt->execute();
        }        
        return $stmt;    
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

