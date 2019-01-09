<?php
/**
 * Created by PhpStorm.
 * User: oussama
 * Date: 05/05/2018
 * Time: 20:02
 */
require_once ("../Module/ConnexionPDO.php");
require_once ("../Module/Utilisateur.php");
$user = new Utilisateur();
$stmt = $user->ReturnQuestion();
$stmt->execute();
$ligne = $stmt->fetch();
