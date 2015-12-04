<?php
session_start();
if (!isset($_SESSION['usuario']))
{
    header('Location: /web/index.html');
    exit;
}
