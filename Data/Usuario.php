<?php
class Usuario extends DataAccess
{
    public function __construct($server,$user,$password,$dbname)
    {
        $this->arr=[];
        $this->AbrirConexion($server,$user,$password,$dbname);
    }
    function GetAll()
    {
        $this->arr=[];
        $stmt =  $this->Consultar("SELECT * FROM user");  
        return $stmt->fetchAll(PDO::FETCH_OBJ);    
    }
    function Store($request)
    {
        $this -> sql="insert into user(nombre,apellido,direccion,telefono,email,user,password)values(
        :nombre,:apellido,:direccion,:telefono,:email,:user,:password)";
        $pwd=$this->GetPassword($request["password"]);
        $this->arr=[
            ":nombre"=>$request["nombre"],
            ":apellido"=>$request["apellido"],
            ":direccion"=>$request["direccion"],
            ":telefono"=>$request["telefono"],
            ":email"=>$request["email"],
            ":user"=>$request["user"],
            ":password"=>$pwd];
        $stmt =  $this->Consultar($this-> sql);        
    }
    function Find($id)
    {
        $this->arr=[":id"=>$id];
        print_r($this->arr);
        $stmt =  $this->Consultar("SELECT * FROM user where id=:id");
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    private function GetPassword($pwd)
    {
        return md5(trim( $pwd));
    }


    function Update($id,$request)
    {
        $pwd=$this->GetPassword($request["password"]);            
        $this->arr=[
            ":id"=>$id,
            ":nombre"=>$request["nombre"],
            ":apellido"=>$request["apellido"],
            ":direccion"=>$request["direccion"],
            ":telefono"=>$request["telefono"],
            ":email"=>$request["email"],
            ":user"=>$request["user"],
            ":password"=>$pwd];
        $this -> sql="update user set nombre=:nombre,apellido=:apellido,direccion=:direccion,
                      telefono=:telefono,email=:email,user=:user,password=:password  where id=:id";
        $stmt =  $this->Consultar($this-> sql);        
    }
    function Delete($id)
    {
        $this->arr=[":id"=>$id];
        $stmt =  $this->Consultar("delete FROM user where id=:id");        
    }
    function GetUser($user)
    {
        $this->arr=[":user"=>$user];
        $stmt =  $this->Consultar("SELECT * FROM user where user=:user");                
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function login($request)
    {        
        $pwd=$this->GetPassword($request["password"]);
        $this->arr=[":user"=>$request["user"],":password"=>$pwd];
        $stmt =  $this->Consultar("SELECT * FROM user where user=:user and password=:password");        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}