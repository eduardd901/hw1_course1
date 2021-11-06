<?php


include_once('functions.php');
$error = '';
$title = '';
$content = '';
$isAdd = false;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$title = (string)trim($_POST['title']) ?? '';
	$content = (string)$_POST['content'] ?? '';
	if($title === '' || $content === ''){
		$error = 'Не все поля заполнены!';
	}
	else{
		$isAdd = true;
	}
}
?>
<div class="add">
<form method="post">
	Title:<br>
	<input type="text" name="title" value=<?$title?>><br>
	Content:<br>
	<input type="text" name="content" value=<?$content?>><br>
	<button>Send</button>
	<? if($isAdd): ?>
		<? addArticle($title,$content); ?>
		<p> Элемент успешно добавлен </p>
		<? else: ?>
			<?=$error?>
			<?endif;?>
	<a href="index.php">Move to main page</a>
</form>
</div>