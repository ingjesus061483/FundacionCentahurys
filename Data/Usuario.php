<?php
class Usuario extends DataAccess
{
    public function __construct($server,$user,$password,$dbname)
    {
        $this->AbrirConexion($server,$user,$password,$dbname);
    }
    function GetAll()
    {
        $stmt =  $this->Consultar("SELECT * FROM user");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);    
    }
    function Store($request)
    {
        $this -> sql="insert into user(nombre,  apellido,  direccion,  telefono,  email,  user, password  ) values(?,?,?,?,?,?,?)";
        $pwd=trim( md5( $request["password"]));
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->bindParam(1, $request["nombre"] );
        $stmt->bindParam(2, $request["apellido"]);
        $stmt->bindParam(3, $request["direccion"]);
        $stmt->bindParam(4, $request["telefono"]);
        $stmt->bindParam(5, $request["email"]);
        $stmt->bindParam(6, $request["user"]);
        $stmt->bindParam(7,$pwd);
        $stmt->execute();
    }
    function Find($id)
    {
        $stmt =  $this->Consultar("SELECT * FROM user where id=?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Update($id,$request)
    {
      $pwd=  trim( md5( $request["password"]));
        $this -> sql="update user set nombre=?,  apellido=?,  direccion=?,  telefono=?,  email=?,  user=?, password=?  where id=?";
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->bindParam(1, $request["nombre"] );
        $stmt->bindParam(2, $request["apellido"]);
        $stmt->bindParam(3, $request["direccion"]);
        $stmt->bindParam(4, $request["telefono"]);
        $stmt->bindParam(5, $request["email"]);
        $stmt->bindParam(6, $request["user"]);
        $stmt->bindParam(7,$pwd);
        $stmt->bindParam(8,$id);
        $stmt->execute();
    }
    function Delete($id)
    {
        $stmt =  $this->Consultar("delete FROM user where id=$id");
        $stmt->execute(); 
    }
    function GetUser($user)
    {
        $stmt =  $this->Consultar("SELECT * FROM user where user=?");        
        $stmt->bindParam(1,$user);        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function login($request)
    {        
        $pwd= md5( $request["password"]);
        $stmt =  $this->Consultar("SELECT * FROM user where user=? and password=?");        
        $stmt->bindParam(1,$request["user"]);
        $stmt->bindParam(2,$pwd);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}