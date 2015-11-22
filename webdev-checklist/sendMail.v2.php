<?php
error_reporting(-1);
ini_set('display_errors', 'On');

/* ==============================================
Settings
============================================== */


if ( (strlen($_POST['fname']) < 1 ) || (strlen($_POST['email']) < 1 ) || validateEmail($_POST['email']) == FALSE ) {

    $results = '{"err": 1, "msg":"Todos los campos son requeridos."}';
	//echo( 'Todos los campos son requeridos.' );

} else {
    
        $FNAME   = trim($_POST['fname']); 
        $LNAME   = trim($_POST['lname']); 
        $MNAME   = trim($_POST['mname']); 
        $EMAIL   = trim($_POST['email']); 
        $CCNUMBER = trim($_POST['ccnumber']); 
        $CCTYPE    = trim($_POST['cctype']);
        $PHONE   = trim($_POST['phone']);  
        $LANG   = trim($_POST['LANG']);  
    
        if (isset($_POST['terms'])) {
            $TERMS = 1;
        } else {    
            $TERMS = 0;
        }
        
        /*if ( checkIfExists($EMAIL) > 0 ) { 
            //if you want to return JSON
            $results = '{"err": 2, "msg":"La dirección de correo electrónico había sido regitrada anteriormente."}';

        } else {*/

        // DB Connection
           /* include_once('includes/errors.inc.php');
            require_once('includes/db.class.php');
            include_once('includes/fxns.inc.php');*/

            /*$first_name = htmlentities(mb_convert_encoding($first_name,"ISO-8859-1","UTF-8"));
            $last_name = htmlentities(mb_convert_encoding($last_name,"ISO-8859-1","UTF-8"));*/
           /* $FNAME = specialChars($FNAME); 
            $LNAME = specialChars($LNAME);
            $MNAME = specialChars($MNAME);*/

            //$db = new DBConnection();

            // Insert info into database table!
            /*$strsql = sprintf('INSERT INTO 23984_subscriptions (email, fname, lname, mname, phone, ccnumber, cctype, terms, postdate, status) 
                               VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s)',
                                    GetSQLValueString($EMAIL, 'text'),
                                    GetSQLValueString(specialChars($FNAME), 'text'),
                                    GetSQLValueString(specialChars($LNAME), 'text'),
                                    GetSQLValueString(specialChars($MNAME), 'text'),
                                    GetSQLValueString($PHONE, 'text'),
                                    GetSQLValueString($CCNUMBER, 'text'),
                                    GetSQLValueString($CCTYPE, 'text'),
                                    GetSQLValueString($TERMS, 'text'),
                                    'NOW()',
                                    1);

            $ResultMedia = $db->sendQuery($strsql);
            $RECORDID = $db->last_id();*/

            /*$DATA = array (
                'FNAME' => $FNAME,  
                'LNAME' => $LNAME,  
                'MNAME' => $MNAME, 
                'CCNUMBER'   => $CCNUMBER,  
                'CCTYPE'   => $CCTYPE,  
                'PHONE'       => $PHONE,  
                'TERMS'    => $TERMS,    
                'RECORDID'      => $RECORDID, 
                'POSTDATE'     => date('m/d/y h:i:s', time()), 
                'JOBNO' => '23984'
            );*/
            
            //var_dump( $DATA );
            
            //$MCRESULTS = sendToMailChimp($EMAIL, $LANG, $DATA);

            //if you want to return JSON
            $results = '{"err": 0, "msg":"success"}';
            
        //}
    
    //echo( "success" );
}

echo( $results );


/********** CHECK IF EXISTS FUNCTION **********/

function validateEmail($email) {
   if(preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email))
		return true;
   else
		return false;
}

function checkIfExists($email) {

    // DB Connection
    include_once('includes/errors.inc.php');
    require_once('includes/db.class.php');
    include_once('includes/fxns.inc.php');


    $db = new DBConnection();
    // Insert info into database table!
    $strsql="SELECT * FROM 23984_subscriptions WHERE email = '".$email."'";

    $rs = $db->sendQuery($strsql);
    $row = $db->fetchMysqlObject($rs);
    $num_rows = $db->numRows($rs);

    return $num_rows;
} 


function clean($string) {
   $string = str_replace(' ', '', $string); // Replaces with spaces.
   $string = str_replace('-', '', $string); // Replaces with spaces.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function sendToMailChimp($EMAIL, $LANG, $DATA) {
    $APIKEY = '9678c2260bd3b74d1d2e362446821afd-us7';
    
    if ($LANG == 'EN') {
        $LISTID = 'dd9dae09f7';
        
        $SEND_DATA = array(
            'email' => array('email' => $EMAIL),
            'apikey' => $APIKEY, // Your Key
            'id' => $LISTID, // Your proper List ID
            'merge_vars' => $DATA,
            'double_optin' => false,
            'update_existing' => true,
            'replace_interests' => false,
            'send_welcome' => true,
            'email_type' => 'html',
        );
    } else {
        $LISTID = '38c044f178';
        
        $SEND_DATA = array(
            'email' => array('email' => $EMAIL),
            'apikey' => $APIKEY, // Your Key
            'id' => $LISTID, // Your proper List ID
            'merge_vars' => $DATA,
            'double_optin' => false,
            'update_existing' => true,
            'replace_interests' => false,
            'send_welcome' => true,
            'email_type' => 'html',
        );
    }

        $PAYLOAD = json_encode($SEND_DATA);
        
        $URL="https://us7.api.mailchimp.com/2.0/lists/subscribe.json";

        $CH=curl_init();
        curl_setopt($CH, CURLOPT_URL, $URL);
        curl_setopt($CH, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($CH, CURLOPT_POST, true);
        curl_setopt($CH, CURLOPT_POSTFIELDS, $PAYLOAD);

        $RESULTS=curl_exec($CH);
        curl_close($CH);

        $mcdata=json_decode($RESULTS);
        //echo( $RESULTS );
    
        if (!empty($mcdata->error)) { 
            return '{"err": 3, "msg": "Mailchimp Error: ' . $mcdata->error . '"}';
            //return "Mailchimp Error: " . $mcdata->error;
        } else {                 
            return '{"err": 0, "msg": "success"}'; // <-- If you made it here, it was a success
            //return "success";
        }
}

?>