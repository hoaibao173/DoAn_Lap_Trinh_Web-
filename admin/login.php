<?php 
if (!isset($_SESSION)) session_start();
$u = isset($_POST['u'])?$_POST['u']:'';
$p = isset($_POST['p'])?$_POST['p']:'';

if ($u=='admin' && $p=='123456789')
{
    $_SESSION['admin']=$u;
    header('location:index.php');
    exit;
}
else 
{
    header('location:login.html');
    exit;
}
