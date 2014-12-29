<?php
session_start();
require_once("user.php");

if(isset($_POST['sbmt']))
{
    if(isset($_SESSION['us']))
    {
        $_SESSION['us']="";
    }    
    $us = $_POST['us'];    
    $pa = sha1($_POST['pa']);
    
    $q = mysql_query("SELECT COUNT(*) FROM `user` u 
                    WHERE u.`username`='$us' 
                    AND u.`password`='$pa'");
    $r = mysql_fetch_array($q);
    if($r[0]==1)
    {
        $q2 = mysql_query("SELECT u.`username`, u.`level`, u.`name`
                        FROM `user` u
                        WHERE u.`username`='$us' 
                        AND u.`password`='$pa'");
        $r2 = mysql_fetch_array($q2);
        $_SESSION['us'] = $r2['username'];
        $_SESSION['lv'] = $r2['level'];
        $_SESSION['na'] = $r2['name'];
        if($r2['level']!=0)
        {
            header('location:Landing.php');
        }
        else
        {
            header('location:VIPLanding.php');
        }
    }else{
        print("Username or password is incorrect!");
    }    
}
else
{
    
}

?>
<html>
    <head></head>
    <body>
        <form method="post" action="Login.php" target="_self">
            <h1>LOGIN</h1>
            Username: <input type="text" value="" name="us" id="" class="" />
            <br />
            Password: <input type="password" value="" name="pa" id="" class="" />
            <br />
            <pre>CAPTCHA will be around here, if necessary!</pre>
            <input type="submit" value="Log in" name="sbmt" id="" class="" />
        </form>
    </body>
</html>