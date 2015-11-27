<?php
session_start();
if (!isset($_SESSION['usuario']))
{
    header('Location: /site/index.html');
    exit;
}
