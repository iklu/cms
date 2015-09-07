<?php 
/**
* Model class for executing query
*/
class Model extends DBAbstractModel
{
	protected $_user;
	
	public function __construct(User $user)
	{
		$this->db_name = 'test';
		$this->_user=$user;
	}
	
	/**
	* Get the user from the User class
	*/
	public function getUser()
	{
		return $this->_user;
	}
	
	public function findAllUsers()
	{
		$this->query = "SELECT * FROM users";
                $users  = $this->get_all_results_from_query();
              	return $users;
	}
	
	
	public function saveUserDb()
	{		
		if(!$this->findUserDb($this->getUser()->getUsername()))
		{
			$this->query = "INSERT INTO users (firstName, lastName, user , password) VALUES  ('".$this->getUser()->getFirstname()."', 
																			 '".$this->getUser()->getLastname()."',
																			 '".$this->getUser()->getUsername()."',
																			 '".$this->getUser()->getPassword()."')";
		        $this->execute_single_query();       
		        $this->getUser()->setMessage("user ADDED ".$this->getUser()->getUsername()."  con exito y vigor");
		}
		else
		{
			$this->getUser()->setMessage("user NOT ADDED agregado ".$this->getUser()->getUsername()."  con exito y vigor");
		}		
	}
	
	public function updateUserDb()
	{
		foreach($user_data as $campo=>$valor)
      		{
                	$this->query = " UPDATE users  SET ".$campo." = '".$valor."'  WHERE user = '".$user_data['user']."' ";
            		$this->execute_single_query(); 
                }           
            	$this->mensaje = 'user modificado';      
	}
	
	public function removeUserDb()
	{
		$this->query = "DELETE FROM users WHERE user='".$user_data['user']."'";
                $this->execute_single_query();
	}
	
	public function findUserDb($findUser)
	{		
	
		$this->query ="SELECT * FROM users WHERE user='".$this->getUser()->getUsername()."'";                  
               	$this->get_results_from_query();
               	 if(count($this->rows['user'])>=1)
               	 { 	
               	 	$this->getUser()->setUsername($this->rows['user']);
               	 	$this->getUser()->setFirstName($this->rows['firstName']);
               	 	$this->getUser()->setLastName($this->rows['lastName']);
               	 	$this->getUser()->setPassword($this->rows['password']); 
               	 	return true; 
               	 } 
		return false;
	}

      
      

   
    #metodo destructor 
          function  __destruct()     {
                    unset($this);
                    }
         
              
}
