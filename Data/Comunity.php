<?php

class Comunity extends DataAccess
{
    protected File $file;
    public $path;
    public $msg;
    public function __construct($server,$dbname,$user,$password) 
    {
        $this->AbrirConexion($server,$user,$password,$dbname);
        $this->arr=[];
        $this->file=new File();  
    }
    function GetAll()
    {
        $this->arr=[];
        $stmt =  $this->Consultar("SELECT * FROM comunity");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Store($request)
    {        
        $this->file->GetFile();
        $nombre = $this->file->nombre_archivo;
        $tipo=$this-> file->tipo_archivo;
        $descripcion = $request["descripcion"];        
        $fecha=date_format(date_create($request["fecha"]),'Y-m-d');            
        $this->arr=[
            ":nombre"=>$nombre,
            ":tipo"=>$tipo,
            ":descripcion"=>$descripcion,
            ":fecha"=>$fecha
        ];
        $stmt = $this->Consultar("INSERT INTO comunity (nombre, tipo,descripcion,fecha) VALUES (:nombre,:tipo,:descripcion,:fecha)");
        $this->file->MakeDirectory($this->path);
        $this->file->Upload($this->path,$this->msg);
    }
    function Find($id){
        $this->arr=[
            ":id"=>$id
        ];
        $stmt =  $this->Consultar("SELECT * FROM comunity where id=:id");        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Update($id,$request){
        $this->file->GetFile();
        $nombre = $this->file->nombre_archivo;        
        $tipo=$this-> file->tipo_archivo;
        $descripcion = $request["descripcion"];        
        $fecha=date_format(date_create($request["fecha"]),'Y-m-d');            
        $this->arr=[
            ":id"=>$id,
            ":nombre"=>$nombre,
            ":tipo"=>$tipo,
            ":descripcion"=>$descripcion,
            ":fecha"=>$fecha
        ];
        $stmt = $this->Consultar("update comunity set nombre =:nombre, tipo=:tipo,descripcion=:descripcion,fecha=:fecha where id=:id");
        $this->file->MakeDirectory($this->path);
        $this->file->Upload($this->path,$this->msg);

    }
    function Delete($id){
        $this->arr=[
            ":id"=>$id
        ];
        $stmt =  $this->Consultar("delete FROM comunity where id=:id");       
        $this->file->Delete($this->path);
    }
}