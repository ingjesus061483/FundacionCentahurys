<?php

class Comunity extends DataAccess{
    private $nombre_archivo;
    private $tipo_archivo;
    private $tamano_archivo;
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
    function MakeDirectory($url)
    {         
        if(!file_exists($url))
        {
           
            mkdir($url);
        }
    }
    function UploadFile($url,&$msg)
    {
        if (!((strpos($this->tipo_archivo, "gif") || strpos($this->tipo_archivo, "jpeg")) && ($this->tamano_archivo < 100000))) 
        {
            die( "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>");
        }
        else
        {
            if (move_uploaded_file($_FILES['img']['tmp_name'],$url.'/'. $this->nombre_archivo))
            {
                   $msg ="El archivo ha sido cargado correctamente.";
            }
            else
            {
                die("Ocurrió algún error al subir el fichero. No pudo guardarse.");                   
            }
        }
    }
    function getFile()
    {
        $this-> nombre_archivo = $_FILES['img']['name'];
        $this-> tipo_archivo = $_FILES['img']['type'];
        $this->tamano_archivo = $_FILES['img']['size'];

    }
    function GetAll()
    {
        $stmt =  $this->Consultar("SELECT * FROM Comunity");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    function Store($request)
    {
        // Prepare
        $stmt = $this->Consultar("INSERT INTO Comunity (nombre, tipo,descripcion,fecha) VALUES (?,?,?,?)");
        // Bind
        $nombre = $this->nombre_archivo;
        $tipo=$this->tipo_archivo;
        $descripcion = $request["descripcion"];        
        $fecha=date_format(date_create($request["fecha"]),'Y-m-d');    
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $tipo);
        $stmt->bindParam(3, $descripcion);
        $stmt->bindParam(4, $fecha);
        
        // Excecute
        $stmt->execute();
    }
    function Find($id){

    }
    function Update($id,$request){

    }
    function Delete($id){

    }
}