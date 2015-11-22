<?php
error_reporting(0); //off
//error_reporting(-1); //on
 

/* ==============================================
Settings
============================================== */

define("MAILFROM" , "KIS DIGITAL <tlopez@kisdigitalpr.com>");
define("MAILREPLY" , "KIS DIGITAL <digital@kisdigitalpr.com>");
define("MAILBCC" , "LEAD DEVELOPER <tlopez@kisdigitalpr.com>");
define("SUBJECT" , "VERIFICACION DE WEBSITE");

define("ERROR_MESSAGE1" , "{err: 1, msg: '¡El email es inválido!'}");
define("ERROR_MESSAGE2" , "{err: 1, msg: '¡Ups! Hubo un problema.  ¡Favor de intentar nuevamente!'}");

/* ==============================================
Email Sender
============================================== */
//print_r($_GET);

$sendto_email = trim($_GET['txtEmail']);
//$sendto_name = $_GET['txtVerificadoPor']; 
    
    $arrArea = explode('|', $_GET['content']);
    for ($area=0; $area < count($arrArea); $area++) {
        $theArea = $arrArea[$area];
        
        if (!empty($theArea)) {                        
            $arrCheck = explode(',', $theArea);
            
            if ( count($arrCheck) > 1) {
                for ($check=0; $check < count($arrCheck); $check++) { 
                    $theCheck = $arrCheck[$check];
                    
                    if (!empty($theCheck)) {              
                        $li .= '<li>' . $arrCheck[$check] . ' <span class="icon" style="color: #6DB8E1;"><img src="http://devxlab.com/webdev-checklist/assets/img/check.gif"></span></li>';
                    } else {
                        $li .= ' ';
                    }
                }
            } else {                
                $li .= '<li>' . $theArea . ' <span class="icon" style="color: #6DB8E1;"><img src="http://devxlab.com/webdev-checklist/assets/img/check.gif"></span></li>';
            }
        } 
        
    }



$html = '<!doctype html><html style="background-color: #EAE9E6;color: #666666;font-family: Arial, Helvetica, sans-serif;font-size: 16px;"><head><meta charset="UTF-8"><title>' . $_GET['txtNombreProyecto'] . '</title></head><style>html,body{background-color: #EAE9E6; color: #666666; font-family:Arial, Helvetica, sans-serif; font-size: 16px;}a, a:visited, a:active, tel, email{color: #6DB8E1; text-decoration: none;}a:hover{color: #6DB8E1; text-decoration: underline;}ul li>span.icon{color: #6DB8E1;}.main{background-color: #ffffff; width: 480px; margin: auto; border: 1px solid #dddddd; border-radius: 7px; -webkit-border-radius: 7px; -moz-border-radius: 7px;}.inner-main{padding: 20px;}.header{margin-bottom: 30px; height: 63px;}.header img{width: 100%; max-width: 430px;}.hero{height: 180px; margin-bottom: 20px;}.hero img{width: 100%; max-width: 430px;}.body{margin-bottom: 30px;}.title{color: #444444; font-size: 24px; font-weight: bold; padding-bottom: 20px;}.bodytext{text-align: justify;}.footer{font-size: 12px; font-style: italic;}</style><body style="background-color: #EAE9E6;color: #666666;font-family: Arial, Helvetica, sans-serif;font-size: 16px;"><div class="main" style="background-color: #ffffff;width: 480px;margin: auto;border: 1px solid #dddddd;border-radius: 7px;-webkit-border-radius: 7px;-moz-border-radius: 7px;"><div class="inner-main" style="padding: 20px;"><div class="hero" style="height: 180px;margin-bottom: 20px;"><img src="http://devxlab.com/webdev-checklist/email.jpg" width="430" height="180" alt="HERO " style="width: 100%;max-width: 430px;"></div><div class="body" style="margin-bottom: 30px;"><div class="title" style="color: #444444;font-size: 24px;font-weight: bold;padding-bottom: 20px;" align="left">Reporte de las Pruebas Realizadas</div><div class="bodytext" style="text-align: justify;"><table width="440" border="0" cellspacing="0" cellpadding="5"><tr><td width="144" align="left"><span class="bodytext1"># Job:</span></td><td width="276" align="left">' . $_GET['txtNumeroProyecto'] . '</td></tr><tr><td align="left">Proyecto:</td><td align="left">' . $_GET['txtNombreProyecto'] . '</td></tr><tr><td>Sitio web:</td><td>' . $_GET['txtSitioWeb'] . '</td></tr><tr><td align="left">Verificado por:</td><td align="left">' . $_GET['txtVerificadoPor'] . '</td></tr><tr><td align="left">Email:</td><td align="left">' . $_GET['txtEmail'] . '</td></tr>';
if (!empty($_GET['txtPruebasBasicas']) && $_GET['txtPruebasBasicas'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Pruebas Básicas:</strong> ' . $_GET['txtPruebasBasicas'] . '</td></tr>';
}
if (!empty($_GET['txtDisenoGrafico']) && $_GET['txtDisenoGrafico'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Diseño Gráfico:</strong> ' . $_GET['txtDisenoGrafico'] . '</td></tr>';
}
if (!empty($_GET['txtFuncionalidad']) && $_GET['txtFuncionalidad'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Funcionalidad:</strong> ' . $_GET['txtFuncionalidad'] . '</td></tr>';
}
if (!empty($_GET['txtBackEnd']) && $_GET['txtBackEnd'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Pruebas Básicas:</strong> ' . $_GET['txtBackEnd'] . '</td></tr>';
}
if (!empty($_GET['txtAnaliticos']) && $_GET['txtAnaliticos'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Analíticos:</strong> ' . $_GET['txtAnaliticos'] . '</td></tr>';
}
if (!empty($_GET['txtUsabilidad']) && $_GET['txtUsabilidad'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Usabilidad:</strong> ' . $_GET['txtUsabilidad'] . '</td></tr>';
}
if (!empty($_GET['txtSEO']) && $_GET['txtSEO'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>SEO:</strong> ' . $_GET['txtSEO'] . '</td></tr>';
}
if (!empty($_GET['txtSeguridad']) && $_GET['txtSeguridad'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Seguridad:</strong> ' . $_GET['txtSeguridad'] . '</td></tr>';
}
if (!empty($_GET['txtMovil']) && $_GET['txtMovil'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Móvil:</strong> ' . $_GET['txtMovil'] . '</td></tr>';
}
if (!empty($_GET['txtOptimizacion']) && $_GET['txtOptimizacion'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Optimización:</strong> ' . $_GET['txtOptimizacion'] . '</td></tr>';
}
if (!empty($_GET['txtSocialMedia']) && $_GET['txtSocialMedia'] != 'undefined'){
    $html .= '<tr><td colspan="2"><strong>Social Media:</strong> ' . $_GET['txtSocialMedia'] . '</td></tr>';
}
    $html .= '<tr><td colspan="2">&nbsp;</td></tr><tr><td colspan="2" align="left">Listado de pruebas realizadas:</td></tr><tr><td colspan="2" align="left"><ul>' . $li . '</ul></td></tr></table></div></div><div class="footer" style="font-size: 12px;font-style: italic;">Entra a <a href="http://devxlab.com/webdev-checklist" target="_blank" style="color: #6DB8E1;text-decoration: none;">http://devxlab.com/webdev-checklist</a> para crear tu reporte.</div></div></div></body></html>';

//$message .= "Pruebas realizadas: \r\n" . $checkbox . "\r\n";
$headers  = "From: ".MAILFROM."\r\n";
$headers .= "Reply-To: ".MAILREPLY."\r\n";
$headers  = "Bcc: ".MAILBCC."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

if( strlen($sendto_email) < 1 || (validateEmail($sendto_email) == FALSE) ) {

	 header('Content-Type: application/json');
        echo( $_GET['callback'].'(['.ERROR_MESSAGE1.'"]);' );;

} else {
    
	if( mail( $sendto_email,  SUBJECT , $html, $headers) ) {

		$RS = "{ err: 0, 'txtNumeroProyecto': '".$txtNumeroProyecto."', txtNombreProyecto: '".$txtNombreProyecto."', txtSitioWeb: '".$txtSitioWeb."', txtVerificadoPor: '".$txtVerificadoPor."' }";

	
        header('Content-Type: application/json');
        echo( $_GET['callback'].'(['.$RS.']);' );

	} else {
        header('Content-Type: application/json');
        echo( $_GET['callback'].'(['.ERROR_MESSAGE2.']);' );
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