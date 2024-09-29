<?php
class Contacto extends DataAccess
{
    public function __construct($server,$user,$password,$dbname)
    {
        $this->arr=[];
        $this->AbrirConexion($server,$user,$password,$dbname);
    }
    function GetAll()
    {
        $this->arr=[];
        $stmt =  $this->Consultar("SELECT * FROM contact"); 
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function GetValueByname($nombre)
    {
        $this->arr=[":nombre"=>$nombre];
        $stmt =  $this->Consultar("SELECT valor FROM contact where nombre=:nombre");    
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    function Store($request)
    {
         $this-> arr=[
            ":nombre"=>$request["nombre"] ,            
            ":valor" =>$request["valor"]
        ];
        $this -> sql="insert into contact(nombre,valor) values(:nombre,:valor)";
        $stmt =  $this->Consultar($this-> sql);                
    }
    function Find($id)
    {
        $this-> arr=[
            ":id"=>$id ,
        ];            
        $stmt =  $this->Consultar("SELECT * FROM contact where id=:id");     
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Update($id,$request)    
    {
        $this-> arr=[
            ":nombre"=>$request["nombre"] ,            
            ":valor" =>$request["valor"],
            ":id"=>$id
        ];        
        $this -> sql="update contact set nombre=:nombre,valor=:valor where id=:id";
        $stmt =  $this->Consultar($this-> sql);                
    }
    function Delete($id)
    {
        $this-> arr=[
            ":id"=>$id ,
        ];                   
        $this -> sql="delete from contact where id=:id";
        $stmt =  $this->Consultar($this-> sql);        
    }
     

     
}