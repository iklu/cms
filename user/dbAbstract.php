
<?php
abstract class DBAbstractModel {
         private static $db_host = 'localhost';
         private static $db_user = 'root';
         private static $db_pass = 'parola';
         protected $db_name = 'test';
         protected $query;
         protected $rows = array();
         private $conn;
         public $mensaje = 'hola';
         
         abstract protected function findAllUsers();
         abstract protected function findUserDb($user);
         abstract protected function saveUserDb();
         abstract protected function updateUserDb();
         abstract protected function removeUserDb();
         
         private function open_connection(){
                 $this->conn = new mysqli (self::$db_host, self::$db_user, self::$db_pass, $this->db_name);
                 }
         private function close_connection() {
                 $this->conn->close();
                 }
                 
         protected function execute_single_query() {
                 if($_POST) {
                   $this->open_connection();
                   $this->conn->query($this->query);
                   $this->close_connection();
                   }else{ 
                   $this->mensaje = 'Metodo nepermitido';
                   }
                  }
                           
         protected function get_results_from_query()  {
                   $this->open_connection();
                   $result = $this->conn->query($this->query);                   
                   $this->rows = $result->fetch_assoc();
                   $result->close();
                   $this->close_connection();
                   return $this->rows;
                   
                   }
          
          protected function get_all_results_from_query()
          {
          	 $this->open_connection();
                 $result = $this->conn->query($this->query);        
                          
                 while( $this->rows = $result->fetch_assoc())
                 {
                 	$results[]=$this->rows;
                 }
                   $result->close();
                   $this->close_connection();
                   return $results;
                   
                   }
          
          }         
                       
?>
