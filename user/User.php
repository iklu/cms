<?php
require_once("dbAbstract.php");
require_once("Model.php");
require_once("UserInterface.php");

class User  implements UserInterface {
	protected $_username;
	protected $_firstName;
	protected $_lastName;
	protected $_email;
	protected $_password;
	protected $_id;
	protected $_message;
	
	
	
	public function setModel()
	{
		$this->_model=new Model($this);
	}
	
	public function getModel()
	{
		return $this->_model;
	}
     
	public function setUsername($username)
	{
		$this->_username=$username;
	}
	
	public function getUsername()
	{
		return $this->_username;
	}
	
	public function setFirstName($firstName)
	{
		$this->_firstName=$firstName;
	}
	
	public function getFirstName()
	{
		return $this->_firstName;
	}
	
	public function setLastName($lastName)
	{
		$this->_lastName=$lastName;
	}
	
	public function getLastName()
	{
		return $this->_lastName;
	}
	
	public function setEmail($email)
	{
		$this->_email= $email;
	}
	
	public function getEmail()
	{
		return $this->_email;
	}
	
	public function setPassword($password)
	{
		$this->_password=$password;
	}
	
	public function getPassword()
	{
		return $this->_password;
	}
	
	public function setMessage($message)
	{
		$this->_message=$message;
	}
	
	public function getMessage()
	{
		return $this->_message;
	}
	
}                                                           
                              
      
?>
