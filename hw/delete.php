<?php

	include_once('functions.php');
	$id = $_GET['id'] ?? '';
	$isRemove = false;
	if(ctype_digit($id))
		if(removeArticle($id))
			$isRemove = true;
?>
Message about result
<hr>
<? if($isRemove): ?>
	<p> Успешно удален элемент </p>
	<? else: ?>
		<p> Произошла ошибка :( </p>
		<? endif; ?>
<a href="index.php">Move to main page</a>