<?php
class Objetive extends DataAccess
{    
    public function __construct($server,$dbname,$user,$password) 
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
    function GetObjectiveByType( int $type)
    {
        $stmt =  $this->Consultar("SELECT id,descripcion FROM objetive where tipo_id=? ");
        $stmt->bindParam(1, $type);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
 
    
    function GetAll()
    {
        $this -> sql="SELECT obj.id,obj.descripcion,objt.nombre as tipo  
              FROM objetive as obj join objetive_Type as objt
              ON objt.id=obj.tipo_id ";
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Store($request)
    {
        $this -> sql="insert into objetive(descripcion,tipo_id) values(?,?)";
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->bindParam(1, $request["descripcion"] );
        $stmt->bindParam(2, $request["tipo_id"]);
        $stmt->execute();
      
    }
    function Find($id)
    {
        $this -> sql="SELECT * FROM objetive Where id=?";        
        $stmt =  $this->Consultar($this-> sql);                
        $stmt->bindParam(1, $id );
        $stmt->execute();        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }    
    function Update($id,$request)
    {
        $this -> sql="update objetive set descripcion=?,tipo_id=? where id=?";
        $stmt =  $this->Consultar($this-> sql);        
        $stmt->bindParam(1, $request["descripcion"] );
        $stmt->bindParam(2, $request["tipo_id"]);
        $stmt->bindParam(3,$id);
        $stmt->execute();

    }
    function Delete($id)
    {
        $this -> sql="delete from objetive  where id=?";        
        $stmt =  $this->Consultar($this-> sql);                
        $stmt->bindParam(1, $id );
        $stmt->execute();  
    }
}