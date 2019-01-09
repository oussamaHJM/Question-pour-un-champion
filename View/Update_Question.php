<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 08/05/2018
 * Time: 18:16
 */

require_once ("../Module/ConnexionPDO.php");
require_once ("../Module/Utilisateur.php");

$user = new Utilisateur();
$user->UpdateQuestion();
header('location:Reponse.php');