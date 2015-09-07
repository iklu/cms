Extrae rezultados de base de datos<br><br>
<?php
class BaseDeDatos{
      private $conexion;
      private $servidor;
      private $usuario;
      private $password;
      private $puerto;
      private $database;
      private $valor;
      public $tipo;
      
      public function __construct($servidor, $usuario, $password , $database, $puerto , $tipo='mysql'){
             $this->servidor=$servidor;
             $this->usuario=$usuario;
             $this->password=$password;
             $this->database=$database;
             $this->puerto=(int)$puerto;
             $this->tipo=trim(strtolower($tipo));
             
             if($this->tipo == 'mysql') {
                $this->conexion = mysql_connect($this->servidor, $this->usuario , $this->password);
                mysql_select_db($this->database);
                }
             } 
               
      public function setQuery($query){
             if($this->tipo == 'mysql'){
             $query = mysql_real_escape_string($query);             
             return $this->idConsulta = mysql_query($query);
                }
             }
             
      public function queryToArray(){
             if($this->tipo=='mysql'){
             return mysql_fetch_assoc($this->idConsulta);
                 }
             } 
                       
      public function __destruct(){
             if($this->tipo=='mysql'){
        //     mysql_close($this->conexion);            
                  }            
             }  
               
        }
        
        
        $dbconnect = new BaseDeDatos('localhost', 'dragoi' , 'parola', 'dbdragoi', '2539', 'mysql');        
        $dbconnect -> setQuery("SELECT * FROM usr");       
        $dbconnect -> __destruct();
        
        
        echo "<pre>";        
          print_r($dbconnect->queryToArray());
       echo " </pre> ";    
      //evrika
     
      // $row=$dbconnect->queryToArray();
  // echo   $row['usuario'];
      
      
      
       
      while($row=$dbconnect->queryToArray()){
           echo $row['usuario']."<br>";  
        }
        
        
      
?>
