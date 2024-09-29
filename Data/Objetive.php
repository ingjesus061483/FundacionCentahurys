<?php
class Objetive extends DataAccess
{    
    public function __construct($server,$dbname,$user,$password) 
    {
        $this->AbrirConexion($server,$user,$password,$dbname);
        $this->arr=[];
    }
    function GetObjectiveByType( int $type)
    {
        $this->arr=[":tipo"=>$type];
        $stmt =  $this->Consultar("SELECT id,descripcion FROM objetive where tipo_id=:tipo");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
 
    
    function GetAll()
    {
        $this->arr=[];
        $this -> sql="SELECT obj.id,obj.descripcion,objt.nombre as tipo  
              FROM objetive as obj join objetive_Type as objt
              ON objt.id=obj.tipo_id ";
        $stmt =  $this->Consultar($this-> sql);        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Store($request)
    {
        $this->arr=[
            ":descripcion"=>$request["descripcion"],
            ":tipo_id"=>$request["tipo_id"]
        ];
        $this -> sql="insert into objetive(descripcion,tipo_id) values(:descripcion,:tipo_id)";
        $stmt =  $this->Consultar($this-> sql);              
    }
    function Find($id)
    {
        $this->arr=[
            ":id"=>$id,
        ];
        $this -> sql="SELECT * FROM objetive Where id=:id";        
        $stmt =  $this->Consultar($this-> sql);        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }    
    function Update($id,$request)
    {        
        $this->arr=[
            ":descripcion"=>$request["descripcion"],
            ":tipo_id"=>$request["tipo_id"],
            ":id"=>$id
        ];
        $this -> sql="update objetive set descripcion=:descripcion,tipo_id=:tipo_id where id=:id";
        $stmt =  $this->Consultar($this-> sql);        
    }
    function Delete($id)
    {
        $this -> sql="delete from objetive  where id=:id";        
        $this->arr=[":id"=>$id];
        $stmt =  $this->Consultar($this-> sql);                
    }
}