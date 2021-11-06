<?php
require_once('functions.php');
require_once('article.php');

$articles = getArticles();
$id = (int)$_GET['id'];
$title = '';
$content = '';
$error = '';
if ($id === 0)
    $error = 'Не верный айди (';
else {
    $content = $articles[$id]['content'];
    $title = $articles[$id]['title'];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $content = $_POST['content'];
        $title = $_POST['title'];
    }
}

?>
<div class="edit">
    <form method="post">
        Title:<br>
        <input type="text" name="title" value=<?= $title ?>><br>
        Content:<br>
        <input type="text" name="content" value=<?= $content ?>><br>
        <button>Send</button>
        <? if ($error === '') : ?>
            <? if ($content != '' && $title != '' && ($content != $articles[$id]['content'] || $title != $articles[$id]['title'])) : ?>
                <? if (editArticle($id, $title, $content)) : ?>
                    <?= "Элемент успешно изменен!" ?>
                <? else : ?>
                    <?= "Ошибка при изменении((" ?>
                <? endif; ?>
            <? else : ?>
                <?= "Поля не изменены или не заполнены!" ?>
            <? endif; ?>
        <? else : ?>
            <?= $error ?>
        <? endif; ?>
        <a href="index.php">Move to main page</a>
    </form>
</div>