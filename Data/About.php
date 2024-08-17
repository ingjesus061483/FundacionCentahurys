<?php
class About extends DataAccess
{
    public function __construct($server,$user,$password,$dbname)
    {
        $this->AbrirConexion($server,$user,$password,$dbname);
    }
    function GetAll()
    {
        $stmt =  $this->Consultar("SELECT * FROM about");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function GetValueByname($nombre)
    {
        $stmt =  $this->Consultar("SELECT valor FROM about where nombre=?"); 
        $stmt->bindParam(1, $nombre);
        $stmt->execute();
      
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    
    function Store($request)
    {
        $this -> sql="insert into about(nombre,valor) values(?,?)";
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->bindParam(1, $request["nombre"] );
        $stmt->bindParam(2, $request["valor"]);
        $stmt->execute();
    }
    function Find($id)
    {
        $stmt =  $this->Consultar("SELECT * FROM about where id=?");
        $stmt->bindParam(1, $id );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Update($id,$request)    
    {
        
        $this -> sql="update about set nombre=?,valor=? where id=?";
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->bindParam(1, $request["nombre"] );
        $stmt->bindParam(2, $request["valor"]);
        $stmt->bindParam(3, $id);
        $stmt->execute();

    }
    function Delete($id)
    {
        $this -> sql="delete from about where id=?";
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->bindParam(1, $id );
        $stmt->excute();
    }
     

     
}