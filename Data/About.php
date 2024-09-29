<?php
class About extends DataAccess
{
    public function __construct($server,$user,$password,$dbname)
    {
        $this->AbrirConexion($server,$user,$password,$dbname);
        $this->arr=[];
    }
    function GetAll()
    {
        $this->arr=[];
        $stmt =  $this->Consultar("SELECT * FROM about");      
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function GetValueByname($nombre)
    {
        $this->arr=[
            ":nombre"=>$nombre
        ];
        $stmt =  $this->Consultar("SELECT valor FROM about where nombre=:nombre",$this->arr);   
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    function Store($request)
    {
        $this -> sql="insert into about(nombre,valor) values(:nombre,:valor)";
        $this->arr=[
            ":nombre"=>$request["nombre"],
            ":valor"=>$request["valor"]
        ];
        $stmt =  $this->Consultar($this-> sql,$this->arr);            
    }
    function Find($id)
    {
        $this->arr=[
            ":id"=>$id
        ];
        $stmt =  $this->Consultar("SELECT * FROM about where id=:id");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Update($id,$request)    
    {
        
        $this -> sql="update about set nombre=:nombre,valor=:valor where id=:id";
        $this->arr=[
            ":nombre"=>$request["nombre"],
            ":valor"=>$request["valor"],
            ":id"=>$id
        ];
        $stmt =  $this->Consultar($this-> sql);            
    }
    function Delete($id)
    {
        $this -> sql="delete from about where id=:id";
        $this->arr=[
            ":id"=>$id
        ];
        $stmt =  $this->Consultar($this-> sql);        
    }   
}