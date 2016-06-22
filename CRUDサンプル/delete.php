<?php
require('dbconnect.php');

$sql = sprintf("delete from my_items where id=%d",
mysqli_real_escape_string($db, $_REQUEST['id']));
mysqli_query($db, $sql) or die(mysqli_error($db));
 ?>

<p>商品を削除しました</p>
<p><a href="index.php">一覧に戻ります</a></p>
