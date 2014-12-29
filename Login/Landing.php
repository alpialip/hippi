<?php
session_start();
if(!isset($_SESSION['us']))
{
    header('location:Login.php');
}
else if(isset($_SESSION['us']) && $_SESSION['us']!="")
{
    print("Welcome back, ".$_SESSION['na']."!");
    ?>
    <form method="post" action="outer.php">
        <input type="submit" value="Log out" name="out" id="" class="" />        
        <pre>
            FUNCTIONS will be here!
        </pre>
    </form>
    <?php
}
?>