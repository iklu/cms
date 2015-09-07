
<?php


$diccionario = array(
                     'subtitle'=>array(VIEW_SET_USER=>'Crear un nuevo usuario',
                                       VIEW_GET_USER=>'Buscar usuario',
                                       VIEW_DELETE_USER=>'Eliminar un usuario',
                                       VIEW_EDIT_USER=>'Modificar usuario'
                                       ),
                     'links_menu'=>array('VIEW_SET_USER'=>APP_PATH.MODULO."?event=".VIEW_SET_USER,
                                         'VIEW_GET_USER'=>APP_PATH.MODULO."?event=".VIEW_GET_USER,
                                         'VIEW_DELETE_USER'=>APP_PATH.MODULO."?event=".VIEW_DELETE_USER,
                                         'VIEW_EDIT_USER'=>APP_PATH.MODULO."?event=".VIEW_EDIT_USER,
                                         'VIEW_ALL_USERS'=>APP_PATH.MODULO."?event=".VIEW_ALL_USERS
                                         ),
                     'form_actions'=>array(
                                         'SET'=>"?event=".SET_USER,  
                                         'GET'=>APP_PATH."?event=".GET_USER,
                                         'DELETE'=>APP_PATH."?event=".DELETE_USER,
                                         'EDIT'=>APP_PATH."?event=".EDIT_USER
                                         ),
                     'assets'=>array('ASSET'=>APP_PATH)                    
                      );

//extrae vista
function getTemplate($form) {
         $file='./site_media/html/usuario_'.$form.'.html';
         $template = file_get_contents($file);
         return $template;
         }
         
//datos de modelo tipo: nombre, mensaje, errores ,etc        
function RenderDinamicData($html, $data) {

         foreach($data as $clave=>$valor){
                $html = str_replace('{'.$clave.'}', $valor, $html);
                }
         return $html;
         }
function RenderArrayData($html, $data)
{
	foreach($data as $key=>$value)
	{		
		echo $data[$key]['firstName'];
		 $html = str_replace('{firstName}', $data[$key]['firstName'], $html);
	}
	
}
   
   
//la logica de la vista       
function setView($vista , $data=array()) 
{
         global $diccionario;

         $html = getTemplate('template');
         $html = str_replace('{subtitulo}', $diccionario['subtitle'][$vista], $html);
         $html = str_replace('{formulario}', getTemplate($vista), $html);
         if(array_key_exists('0', $data))
         {     
         	 foreach($data as $key=>$value)
		{	
			
		}   
		
         	foreach($data as $key=>$value)
		{	
			 $html = str_replace('{firstName}', $data[$key]['firstName'], $html);			
		}
         }
         $html = RenderDinamicData($html, $diccionario['form_actions']);
         $html = RenderDinamicData($html, $diccionario['links_menu']);
         $html = RenderDinamicData($html, $diccionario['assets']);
         $html = RenderDinamicData($html,$data); 
         $html = str_replace('{mensaje}', renderMessage($data,$vista) , $html);
         print $html;
      }
      
function renderMessage($data=array(),$view)
{
	if(array_key_exists('firstName',$data) && array_key_exists('lastName', $data) && $view == VIEW_EDIT_USER)
	{
		$message = "Edit user{$data['firstName']}  {$data['lastName']}";
	}
	
	if( $view ==  VIEW_SET_USER)
	{
		$message = "Add new user";
	}
	return $message; 
}      
                                                                                                   
                                                         
?>
