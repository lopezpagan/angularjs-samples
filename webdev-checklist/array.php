<?php 

    $content = "Plataformas / OS|Fonts: Colores / Estilo,Imágenes: Calidad / Retina|Slideshow de Fotos|Integración MVC,DB: Guardar / Acceder Datos||Print Friendly-CSS||Accesos (FTP / DB)|Accesos (FTP / DB)|||";
    
    $arrArea = explode('|', $content);
    for ($area=0; $area < count($arrArea); $area++) {
        $theArea = $arrArea[$area];
        
        if (!empty($theArea)) {                        
            $arrCheck = explode(',', $theArea);
            
            if ( count($arrCheck) > 1) {
                for ($check=0; $check < count($arrCheck); $check++) { 
                    $theCheck = $arrCheck[$check];
                    
                    if (!empty($theCheck)) {              
                        $li .= '<li>' . $arrCheck[$check] . ' <span class="icon" style="color: #6DB8E1;"> <img src="http://devxlab.com/webdev-checklist/assets/img/check.gif"> </span></li>';
                    }
                }
            } else {                
                $li .= '<li>' . $theArea . ' <span class="icon" style="color: #6DB8E1;" data="2"> <img src="http://devxlab.com/webdev-checklist/assets/img/check.gif"> </span></li>';
            }
        }
    }

    echo("<h1>Content:</h1><ul>".$li."</ul>");
?>