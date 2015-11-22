<?php
 /*
   * Collect all Details from Angular HTTP Request.
   */ 
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);

    echo($request->txtNombreProyecto);

    /*@$txtNumeroProyecto = $request->txtNumeroProyecto;
    @$txtNombreProyecto = $request->txtNombreProyecto;
    @$txtSitioWeb = $request->txtSitioWeb;
    @$txtVerificadoPor = $request->txtVerificadoPor;*/
    
    //header('Content-Type: application/json');
    //echo( "[{ err: 0, txtNumeroProyecto: '".$txtNumeroProyecto."', txtNombreProyecto: '".$txtNombreProyecto."', txtSitioWeb: '".$txtSitioWeb."', txtVerificadoPor: '".$txtVerificadoPor." }]" ); 
    return;

    //this will go back under "data" of angular call.
    /*
     * You can use $email and $pass for further work. Such as Database calls.
    */    
/* ==============================================
Settings
============================================== */

define("MAILTO" , "tlopez@keysolutionspr.com");
define("SUBJECT" , "VERIFICACION DE WEBSITE");

define("ERROR_MESSAGE" , "{err: 1, msg: 'Ups! There was an error sending your message.  Please try again!'");

/* ==============================================
Email Sender
============================================== */
$sendto_email = "tlopez@kisdigitalpr.com"; //$_POST['sendto_email'];
$sendto_name = "Tony Lopez"; //$_POST['sendto_name'];

$replyto_email = "info@devxlab.com";
$repltyto_name = "DevXlab";

$message = "";
$message .= "Recibiste un mensaje de tu website. "." \r\n\r\n";    
$message .= "Número de Proyecto : " . $_POST['txtNumeroProyecto'] . "\r\n";
$message .= "Nombre de Proyecto : " . $_POST['txtNombreProyecto'] . "\r\n";
$message .= "Enlace del proyecto : " . $_POST['txtSitioWeb'] . "\r\n";
$message .= "Persona acargo el proyecto : " . $_POST['txtVerificadoPor'] . "\r\n";
    /*$arrFav = $_POST['favorites'];
    for ($i=0; $i < count($arrFav); $i++) {
        $favorites .= $arrFav[$i] . ' ';
    }
    $message .= "Favorites Drinks : " . $favorites . "\r\n";*/
$headers = "From: ".$sendto_name." <".$sendto_email.">\r\nReply-To: ".$replyto_name." <".$replyto_email."> ";

if( (strlen($sendto_name) < 1) || (strlen($sendto_email) < 1 ) || (validateEmail($sendto_email) == FALSE) ) {

	echo( ERROR_MESSAGE );

} else {
    
	if( mail( MAILTO ,  SUBJECT , $message, $headers) ) {

    //echo( $RESULTS );

		echo( "{ err: 0, txtNumeroProyecto: '".$txtNumeroProyecto."', txtNombreProyecto: '".$txtNombreProyecto."', txtSitioWeb: '".$txtSitioWeb."', txtVerificadoPor: '".$txtVerificadoPor." }" );

	} else {

		echo( ERROR_MESSAGE );

	}

}

/* ==============================================
Functions
============================================== */
function validateEmail($email) {
   if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
		return TRUE;
   else
		return FALSE;
}

?>