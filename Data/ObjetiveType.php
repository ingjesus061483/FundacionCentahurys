<?php
class ObjetiveType extends DataAccess
{   
    public function __construct($server,$dbname,$user,$password) 
    {
       $this->AbrirConexion($server,$user,$password,$dbname);
       $this->arr=[];
    }
 
    function GetAll()
    {
        $this->arr=[];
        $stmt =  $this->Consultar("SELECT * FROM objetive_type");  
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