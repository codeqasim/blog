<?php
echo '<!DOCTYPE html> <html> <head> <meta charset="UTF-8" /> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="shortcut icon" href="../assets/img/favicon.png">';
ini_set('max_execution_time', 300);
function _error() {
$args = func_get_args();
if(count($args) > 1) {
$title = $args[0];
$message = $args[1];
} else {
switch ($args[0]) {
case 'DB_ERROR':
$title = "Database Error";
$message = "
<div class='text-left'>
    <h1>"."Error establishing a database connection"."</h1>
    <p>"."This either means that the username and password information in your config.php file is incorrect or we can't contact the database server at localhost. This could mean your host's database server is down."."</p>
    <ul>
        <li>"."Are you sure you have the correct username and password?"."</li>
        <li>"."Are you sure that you have typed the correct hostname?"."</li>
        <li>"."Are you sure that the database server is running?"."</li>
    </ul>
    <p><a style='width: 100%;'' class='fs-submit' href=".baseDomain()."install >Try Again </a></p>
</div>
";
break;
case 'SQL_ERROR':
$title = __("Database Error");
$message = "
<p>".__("An error occurred while writing to database. Please try again later")."</p>
";
break;
case 'SQL_ERROR_THROWEN':
throw new Exception(__("An error occurred while writing to database. Please try again later"));
break;
case '404':
header('HTTP/1.0 404 Not Found');
$title = __("404 Not Found");
$message = "
<p>".__("The requested URL was not found on this server. That's all we know")."</p>
";
break;
case '400':
header('HTTP/1.0 400 Bad Request');
exit;
case '403':
header('HTTP/1.0 403 Access Denied');
exit;
default:
$title = __("Error");
$message = "
<p>".__("There is some thing went wrong")."</p>
";
break;
}
}
echo '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>'.$title.'</title>
        <style type="text/css">
            html {
            background: #f1f1f1;
            }
            body {
            color: #555;
            font-family: "Open Sans", Arial,sans-serif;
            margin: 0;
            padding: 0;
            }
            .error-title {
            background: #ce3426;
            color: #fff;
            text-align: center;
            font-size: 34px;
            font-weight: 100;
            line-height: 50px;
            padding: 60px 0;
            }
            .error-message {
            margin: 1em auto;
            padding: 1em 2em;
            max-width: 600px;
            font-size: 1em;
            line-height: 1.8em;
            text-align: center;
            }
            .error-message .code,
            .error-message p {
            margin-top: 0;
            margin-bottom: 1.3em;
            }
            .error-message .code {
            font-family: Consolas, Monaco, monospace;
            background: rgba(0, 0, 0, 0.7);
            padding: 10px;
            color: rgba(255, 255, 255, 0.7);
            word-break: break-all;
            border-radius: 2px;
            }
            h1 {
            font-size: 1.2em;
            }
            ul li {
            margin-bottom: 1em;
            font-size: 0.9em;
            }
            a {
            color: #ce3426;
            text-decoration: none;
            }
            a:hover {
            text-decoration: underline;
            }
            .button {
            background: #f7f7f7;
            border: 1px solid #cccccc;
            color: #555;
            display: inline-block;
            text-decoration: none;
            margin: 0;
            padding: 5px 10px;
            cursor: pointer;
            -webkit-border-radius: 3px;
            -webkit-appearance: none;
            border-radius: 3px;
            white-space: nowrap;
            -webkit-box-sizing: border-box;
            -moz-box-sizing:    border-box;
            box-sizing:         border-box;
            -webkit-box-shadow: inset 0 1px 0 #fff, 0 1px 0 rgba(0,0,0,.08);
            box-shadow: inset 0 1px 0 #fff, 0 1px 0 rgba(0,0,0,.08);
            vertical-align: top;
            }
            .button.button-large {
            height: 29px;
            line-height: 28px;
            padding: 0 12px;
            }
            .button:hover,
            .button:focus {
            background: #fafafa;
            border-color: #999;
            color: #222;
            text-decoration: none;
            }
            .button:focus  {
            -webkit-box-shadow: 1px 1px 1px rgba(0,0,0,.2);
            box-shadow: 1px 1px 1px rgba(0,0,0,.2);
            }
            .button:active {
            background: #eee;
            border-color: #999;
            color: #333;
            -webkit-box-shadow: inset 0 2px 5px -3px rgba( 0, 0, 0, 0.5 );
            box-shadow: inset 0 2px 5px -3px rgba( 0, 0, 0, 0.5 );
            }
            .text-left {
            text-align: left;
            }
            .text-center {
            text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="error-title">'.$title.'</div>
        <div class="error-message">'.$message.'</div>
    </body>
</html>
';
exit;
}
/**
* Check for the required extensions to run
*
* Dies if requirements are not met.
*
* @return void
*/
function _check_requirements() {
$required_mysql_version = 5.0;
$required_php_version = 7;
/* check php version */
$php_version = phpversion();
if(version_compare( $required_php_version, $php_version, '>')) {
_error("Installation Error", sprintf('
<p class="text-center">Your server is running PHP version %1$s but blog %2$s requires at least %3$s.</p>
', $php_version, '7', $required_php_version));
}
/* check if mysqli enabled */
if(!extension_loaded('mysqli')) {
$ext = "mysqli";
include "check.php";
}

/* check if curl enabled */
if(!extension_loaded('curl')) {
$ext = "cURL";
include "check.php";
}

/* check if mbstring enabled */
if(!function_exists('mb_internal_encoding')) {
$ext = "mb_internal_encoding() mbstring";
include "check.php";
}

if(!is_writable('../uploads')) {
_error("Installation Error", '
<p class="text-center">"uploads" folder must be writable.');
}

if(!is_writable('../config.php')) {
_error("Installation Error", '
<p class="text-center">"config.php" file must be writable.');
}

$maxUpload = (int)(ini_get('upload_max_filesize'));
if($maxUpload < 2) {
_error("Installation Error", '
<p class="text-center">upload_max_filesize must be greater than or equal to 2MB.');
    }
    $maxPost = (int)(ini_get('post_max_size'));
    if($maxPost < 8) {
    _error("Installation Error", '
    <p class="text-center">post_max_size must be greater than or equal to 8MB.');
    }
    }
    /**
    * _redirect
    *
    * @param string $url
    * @return void
    */
    function _redirect($url = null) {
    if($url) {
    header('Location: '.$url);
    }
    exit;
    }
    /* ------------------------------- */
    /* Security */
    /* ------------------------------- */
    /**
    * secure
    *
    * @param string $value
    * @param string $type
    * @param string $quoted
    * @return string
    */
    function secure($value, $type = "", $quoted = true) {
    if($value !== 'null') {
    $value = sanitize($value);
    $value = safe_sql($value, $type, $quoted);
    } else {
    $value = 'null';
    }
    return $value;
    }
    /**
    * sanitize
    *
    * @param string $value
    * @return string
    */
    function sanitize($value) {
    return htmlentities($value, ENT_QUOTES, 'utf-8');
    }
    /**
    * safe_sql
    *
    * @param string $value
    * @param string $type
    * @param string $quoted
    * @return string
    */
    function safe_sql($value, $type = "", $quoted = true) {
    global $db;
    $value = $db->real_escape_string($value);
    switch ($type) {
    case 'int':
    $value = ($quoted)? "'".intval($value)."'" : intval($value);
    break;
    case 'search':
    if($quoted) {
    $value = (!empty($value)) ? "'%".$value."%'" : "''";
    } else {
    $value = (!empty($value)) ? "'%%".$value."%%'" : "''";
    }
    break;
    default:
    $value = (!empty($value)) ? "'".$value."'" : "''";
    break;
    }
    return $value;
    }
    /**
    * is_empty
    *
    * @param string $value
    * @return boolean
    */
    function is_empty($value) {
    if(strlen(trim(preg_replace('/\xc2\xa0/',' ',$value))) == 0) {
    return true;
    }else {
    return false;
    }
    }
    /**
    * valid_email
    *
    * @param string $email
    * @return boolean
    */
    function valid_email($email) {
    if(preg_match("/^[0-9a-z]+(([\.\-_])[0-9a-z]+)*@[0-9a-z]+(([\.\-])[0-9a-z-]+)*\.[a-z]{2,4}$/i", $email)) {
    return true;
    }else {
    return false;
    }
    }
    /**
    * valid_username
    *
    * @param string $string
    * @return boolean
    */
    function valid_username($string) {
    if(strtolower($string) != 'admin' && strlen($string) >= 3 && preg_match('/^[a-zA-Z0-9]+([_|.]?[a-zA-Z0-9])*$/', $string)) {
    return true;
    }else {
    return false;
    }
    }
    function baseDomain(){
    if (isset($_SERVER['HTTP_HOST'])) {
    $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
    $hostname = $_SERVER['HTTP_HOST'];
    $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
    $tmplt = "%s://%s%s";
    $end = $dir;
    $base_url = sprintf( $tmplt, $http, $hostname, $end );
    }
    else $base_url = 'http://localhost/';
    return str_replace("/install","",$base_url);
    }

    function write_config($data) {
    // Config path
    $template_path  = 'config.php';
    $output_path    = '../config.php';
    // Open the file
    $database_file = file_get_contents($template_path);
    $new  = str_replace("%HOSTNAME%",$data['db_host'],$database_file);
    $new  = str_replace("%USERNAME%",$data['db_username'],$new);
    $new  = str_replace("%PASSWORD%",$data['db_password'],$new);
    $new  = str_replace("%DATABASE%",$data['db_name'],$new);
    // Write the new database.php file
    $handle = fopen($output_path,'w+');
    // Chmod the file, in case the user forgot
    @chmod($output_path,0777);
    // Verify file permissions
    if(is_writable($output_path)) {
    // Write the file
    if(fwrite($handle,$new)) {
    return true;
    } else {
    return false;
    }
    } else {
    return false;
    }
    }

    function sendEmail($postData){
    $domainUrl = $postData['domain'];
    $sitemapUrl = $postData['domain'].'sitemap.xml';
    $adminUrl = $postData['domain'].'admin';
    $adminEmail = $postData['admin_email'];
    $adminPass = $postData['admin_password'];
    $message = '
    <table width="100%" cellspacing="0" cellpadding="0" bgcolor="#e3e4e6">
    <tbody>
        <tr>
            <td>
                <table width="600" align="center" style="margin:0 auto" cellpadding="0" cellspacing="0">
                    <tbody>
                        <tr>
                            <td>
                                <table width="600" cellpadding="0" cellspacing="0" style="width:600px!important">
                                    <tbody>
                                        <tr>
                                            <td style="min-width:600px;font-size:0;line-height:0">&nbsp;</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#363a40" background="https://ci5.googleusercontent.com/proxy/cN2lc40byloadYvt2oIGTnUh7Tv0dYTQvWGM_XbujxM0EiQ85pSLVbEbV17KemjBWq18MH6Yo_uG2ZDcJc9b17-UPA=s0-d-e1-ft#http://s8.postimg.org/rbv8dkxrp/bg_header.png" style="background-position:top left;background-repeat:no-repeat">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td width="36"></td>
                                            <td>
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding:26px 0 29px">
                                                                <a style="text-decoration:none"><img src="https://ci4.googleusercontent.com/proxy/Nbs1RR_H6RgXiNYiAYbKIU56ltxOrcQBD_4JjRx0FKOBTKusFbPEjPJbU0z0PMuMpM7OfYRhydF8ICZw3Wk-MOm1GdBmDZZA8Noe0R8p2YdremsNLJJo6MPxQBsDxGl1y7B0P3SHUJzv36HNL0bukLFX=s0-d-e1-ft#https://s3-us-west-2.amazonaws.com/marketplace-images-production/img/QI/QI-mandrill-logo.png" border="0" style="vertical-align:top;font:26px/35px Arial,Helvetica,sans-serif;color:#fff" alt="Quick Install" width="182" height="35" class="CToWUd"></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#4a5056" style="padding:58px 20px 64px">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td align="center" style="font:bold 30px/36px Arial,Helvetica,sans-serif;color:#fff;padding:0 0 24px">
                                                Congratulations!
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font:20px/24px Arial,Helvetica,sans-serif;color:#fff">
                                                Your blog installation is completed! Below you will find instructions on how to access to your website.
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#5c6267" style="padding:55px 38px 58px">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td style="font:19px/22px Arial,Helvetica,sans-serif;color:#fff;padding:0 0 17px">
                                                Install Complete!
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 0 12px">
                                                <table width="100%" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td width="99">
                                                                <img src="https://phpblogscript.com/uploads/global/favicon.png" border="0" style="vertical-align:top;font:22px/26px Arial,Helvetica,sans-serif;color:#fff" alt="WordPress" width="99" height="101" class="CToWUd">
                                                            </td>
                                                            <td width="20">&nbsp;</td>
                                                            <td style="font:14px/24px Arial,Helvetica,sans-serif;color:#fff">
                                                                Website : <a href="'.$domainUrl.'" style="text-decoration:none;color:#4ad1ff" target="_blank">'.$domainUrl.'</a> <br>
                                                                Admin URL: <a href="'.$adminUrl.'" style="text-decoration:none;color:#4ad1ff" target="_blank" >'.$adminUrl.'</a> <br>
                                                                Admin Email : <a href="#" style="text-decoration:none;color:#fff" > '.$adminEmail.'</a> <br>
                                                                Admin Password : '.$adminPass.'
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font:bold 19px/24px Arial,Helvetica,sans-serif;color:#fff">
                                                PHPTRAVELS
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font:12px/16px Arial,Helvetica,sans-serif;color:#fff">
                                                Version 5.3
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="15"></td>
                                        </tr>
                                        <tr>
                                            <td height="10"></td>
                                        </tr>
                                        <tr>
                                            <td height="1" bgcolor="#73767a" style="font-size:0;line-height:0">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height="10"></td>
                                        </tr>
                                        <tr>
                                            <td style="font:19px/22px Arial,Helvetica,sans-serif;color:#fff;padding:0 0 0px">
                                                XML Sitemap For better SEO <br>
                                                <a style="color: white;  text-decoration: none;" target="_blank" href="'.$sitemapUrl.'" ><span style="font:14px/22px Arial,Helvetica,sans-serif;color:#fff;padding:0 0 18px"> '.$sitemapUrl.' </span> </a>
                                            </td>
                                            <td style="font:14px/24px Arial,Helvetica,sans-serif;color:#fff">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="25"></td>
                                        </tr>
                                        <tr>
                                            <td height="1" bgcolor="#73767a" style="font-size:0;line-height:0">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td height="10"></td>
                                        </tr>
                                        <tr>
                                            <td height="25"></td>
                                        </tr>
                                        <tr>
                                            <td style="font:19px/22px Arial,Helvetica,sans-serif;color:#fff;padding:0 0 13px">
                                                Whats next?
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font:14px/22px Arial,Helvetica,sans-serif;color:#fff;padding:0 0 18px">
                                                We recommend to read our documentation and start configuration of your blog.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font:16px/22px Arial,Helvetica,sans-serif;color:#fff;padding:0 0 13px">
                                                <table width="223" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center" bgcolor="#0073E6" style="font:15px/18px Arial,Helvetica,sans-serif;color:#fff;border-radius:3px">
                                                                <a href="https://docs.phpblogscript.com" style="text-decoration:none;color:#fff;display:block;padding:13px 10px" target="_blank" >Documentation</a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td bgcolor="#444444" style="padding:30px 32px">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td align="right" style="font:10px/12px Arial,Helvetica,sans-serif;color:#fff">
                                                Powered By
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="right">
                                                <a href="https://www.phpblogscript.com" style="text-decoration:none" target="_blank" border="0" style="vertical-align:top" alt="phpblog" width="207" height="24" class="CToWUd"><img src="https://phpblogscript.com/assets/img/logo.png" alt="php blog" /></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <div style="white-space:nowrap;font:15px/2px courier;color:#e3e4e6">- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</div>
            </td>
        </tr>
    </tbody>
</table>
';
$subject = "Installation Details";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: PHP Blog Script' . "\r\n";
mail($adminEmail,$subject,$message,$headers);
}