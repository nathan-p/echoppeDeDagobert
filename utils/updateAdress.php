<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	include_once("../model/Database.php");
	include_once("../model/User.php");

	if(isset($_SESSION['user'])) {
		$user = unserialize($_SESSION['user']);

		$user->setUser($_POST);
	}

	header('Location: ../pages/compte.php');
?>
