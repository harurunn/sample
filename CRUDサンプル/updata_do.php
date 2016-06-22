<?php
require('dbconnect.php');

$sql = sprintf('update my_items set maker_id=%d, item_name="%s",
price=%d, keyword="%s" where id=%d',
  mysqli_real_escape_string($db, $_POST['maker_id']),
  mysqli_real_escape_string($db, $_POST['item_name']),
  mysqli_real_escape_string($db, $_POST['price']),
  mysqli_real_escape_string($db, $_POST['keyword']),
  mysqli_real_escape_string($db, $_POST['id'])
);
mysqli_query($db, $sql) or die(mysqli_error($db));
 ?>
 <p>商品の情報を変更しました。</p>
 <p><a href="index.php">一覧に戻ります</a></p>
