<?php
class File
{
    public $nombre_archivo ;
    public $tipo_archivo ;
    public $tamano_archivo ;
 
    function GetFile()
    {
        $this-> nombre_archivo = $_FILES['img']['name'];
        $this-> tipo_archivo = $_FILES['img']['type'];
        $this->tamano_archivo = $_FILES['img']['size']; 
    }
    function MakeDirectory($path)
    {         
        if(!file_exists($path))
        {          
            mkdir($path);
        }
    }
    function Delete($path){
        if(file_exists($path.'/'. $this->nombre_archivo)){
            unlink($path.'/'. $this->nombre_archivo);
        }
    }
    function Upload($path,&$msg)
    {
        if (!((strpos($this->tipo_archivo, "gif") || strpos($this->tipo_archivo, "jpeg")) && ($this->tamano_archivo < 100000))) 
        {
            die( "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .gif o .jpg<br><li>se permiten archivos de 100 Kb máximo.</td></tr></table>");
        }
        else
        {
            if (move_uploaded_file($_FILES['img']['tmp_name'],$path.'/'. $this->nombre_archivo))
            {
                   $msg ="El archivo ha sido cargado correctamente.";
            }
            else
            {
                die("Ocurrió algún error al subir el fichero. No pudo guardarse.");                   
            }
        }
    }
}