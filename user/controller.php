<?php
require_once('constants.php');
require_once('User.php');
require_once('view.php');
require_once('Model.php');


function handler()
{	

	$requestedAction = $_SERVER['REQUEST_URI'];
	$actions = array(SET_USER, GET_USER, DELETE_USER, EDIT_USER, VIEW_SET_USER, 
                             VIEW_GET_USER, VIEW_DELETE_USER, VIEW_EDIT_USER,VIEW_ALL_USERS);
                             
              
                             
	if($requestedAction == APP_PATH.HOME_PAGE)
	{
		$event =HOME_PAGE;
	}	
                             
	if(isset($_GET['event']) && in_array($_GET['event'], $actions))
	{        	
        	$event =$_GET['event'];  
	}
	else
	{   
       		foreach($actions as $action)
		{
                	if(APP_PATH.MODULO."/".$action == $requestedAction)
			{     
                   		$event=$action;                               
                	}                    
         	}
        }
  	
  	if(!isset($event))
  	{ 
  		$event=INVALID_REQUEST;	
  	}    
         $user_data = getHelperUserData();
         
         $modelo = setModelEvent($event, $user_data);
}
  

  

         
    function getHelperUserData($user_data=array()) { 
             if($_POST) {             
                if(array_key_exists('user', $_POST)) {                
                $user_data['user'] = $_POST['user'];
                  } 
                  
               if(array_key_exists('firstName', $_POST)) {
                  $user_data['firstName'] = $_POST['firstName'];
                  }  
                                  
               if(array_key_exists('lastName', $_POST)) {
                  $user_data['lastName'] = $_POST['lastName'];
                  }
               
               if(array_key_exists('password', $_POST)) {
                  $user_data['password']  = $_POST['password'];
                  }  
              return $user_data;
            }else if($_GET['user']) {
                  if(array_key_exists('user', $_GET)) {
                     $user_data = $_GET['user'];
                    // return $user_data;
                    }
                 }
                      
              } 
              
              

   
   function setModelEvent($event, $user_data){   	
         $user  = new User();     
         $user->setModel();
        
         switch ($event) {
         	case HOME_PAGE:
         			$user->setMessage('home page');
         			$data = array(
                             				'mensaje'=>$user->getMessage(),
                             		);
         			 setView(VIEW_HOME_PAGE , $data);
         			 break;
         	case VIEW_ALL_USERS:
         			$data = $user->getModel()->findAllUsers();         	
         			print_r($data);		
         			setView(VIEW_ALL_USERS, $data);
         			break;
                case SET_USER:              
                       
		             $user->setUsername($user_data['user']);
		             $user->setFirstName($user_data['firstName']);
		             $user->setLastName($user_data['lastName']);
		             $user->setPassword($user_data['password']);                    
		             
		             $user->getModel()->saveUserDb();
		             
		             
		             $data = array('mensaje'=>$user->getMessage());
		             setView(VIEW_SET_USER , $data);
		             break;
                case GET_USER:  
                		$findUser = $user->getModel()->findUserDb($user->setUsername($user_data['user']));                  
                     		if(!$findUser)
                     		{
                     		 	$user->setMessage("not found");
                     		  	$data = array(
                             				'mensaje'=>$user->getMessage(),
                             		);
                             
                     			setView(VIEW_GET_USER, $data);
                     			break;
                     		}		   
                                  
		             $data = array(
		                     'firstName'=>$user->getFirstName(),
		                     'lastName'=>$user->getLastName(),
		                     'user'=>$user->getUsername(),
		                     );
		                     
		             setView(VIEW_EDIT_USER, $data);
		             break;
                case DELETE_USER:                     
                     $user->delete($user_data);
                     $data = array('mensaje'=>$user->mensaje);
                     setView(VIEW_DELETE_USER, $data);
                     break;
                case EDIT_USER:  
                     $user->getModel()->findUserDb($user->setUsername($user_data['user']));   
                     $user->setFirstName($user_data['firstName']);
                     $user->setLastName($user_data['lastName']);
                     $user->setPassword($user_data['password']);
                     
                     $user->getModel()->saveUserDb();
                     $user->getMessage();$user->setMessage("not found");
                     
                                        
                   
                     $data = array('mensaje'=>$user->mensaje);
                     setView(VIEW_GET_USER, $data);
                     break;  
               case INVALID_REQUEST:
               	     $user->setMessage("invalid request");
               	     $data = array('mensaje'=>$user->getMessage());
               	     setView(VIEW_ERROR_PAGE, $data);    
               	     break;  
                   default:                    
                      setView($event);
                }
       }
       
       

        
 
                                                                            
                                
                     
                            
?>
