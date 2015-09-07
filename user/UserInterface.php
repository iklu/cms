<?php
interface UserInterface
{
	public function setUsername($username);
	
	public function getUsername();
	
	public function setModel();
	
	public function getModel();
	
	public function setFirstname($firstname);
	
	public function getFirstname();
	
	public function setLastname($lastname);
	
	public function getLastname();
	
	public function setPassword($password);
	
	public function getPassword();
}
