﻿<?php

$id = $_POST['id'];

session_start();

ver($id);

function ver($id){
	$cont = 0;
	if(isset($_SESSION['rand'][0])):
		foreach($_SESSION['rand'] as $rand):
			if($rand == $id):
				$id = rand(1, 14);
				$cont++;
			endif;
		endforeach;
	endif;
	if($cont > 0):
		ver();
	endif;
	
	$_SESSION['rand'][] = $_POST['id'];
	
	echo $id;
}
?>