
<p><a href="input.php">新しい商品を登録する</a></p>


<?php
require('dbconnect.php');
$page = $_REQUEST['page'];
if($page == ''){
  $page = 1;
}
$page = max($page,1);

//最終ページの取得
$sql = 'select count(*) as cnt from my_items';
$recordset = mysqli_query($db, $sql);
$table = mysqli_fetch_assoc($recordset);
$maxPage = ceil($table['cnt'] / 5);
$page = min($page, $maxPage);

$start = ($page - 1) * 5;

/*
$recordset = mysqli_query($db, 'select m.name, i.* from makers m,
my_items i where m.id = i.maker_id order by id desc limit' . $start . ',5');
*/

$recordset = mysqli_query($db, 'select m.name, i.* from makers m,
my_items i where m.id=i.maker_id order by id desc limit '. $start . ',5');
?>

<table border="1" width="100%">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">メーカー</th>
    <th scope="col">商品名</th>
    <th scope="col">価格</th>
    <th scope="col">編集・削除</th>
 </tr>
<?php
while($table = mysqli_fetch_assoc($recordset)){
?>
 <tr>
   <td><?php print(htmlspecialchars($table['id'])); ?></td>
   <td><?php print(htmlspecialchars($table['name'])); ?></td>
   <td><?php print(htmlspecialchars($table['item_name'])); ?></td>
   <td><?php print(htmlspecialchars($table['price'])); ?></td>
   <td><a href="updata.php?id=<?php print(htmlspecialchars($table['id']));?>">編集</a>
       <a href="delete.php?id=<?php print(htmlspecialchars($table['id']));?>">削除</a>
   </td>
 </tr>
<?php
}
?>
</table>

<ul class="paging">
  <?php
  if($page > 1){
   ?>
   <li><a href="index.php?page=<?php print($page - 1); ?>">前のページへ</a></li>
  <?php
  }else{
   ?>
   <li>前のページへ</li>
   <?php
  }
    ?>
  <?php
  if($page < $maxPage){
   ?>
  <li><a href="index.php?page=<?php print($page + 1); ?>">次のページへ</a></li>
  <?php
  }else{
   ?>
  <li>次のページへ</li>
  <?php
  }
   ?>
</ul>

<?php

/*
mysqli_query($db, 'insert into my_items set maker_id=1, item_name=
"もも", price=210, keyword="缶詰、ピンク、甘い", created=
"2010-08-01", modified="2010-08-01"') or die(mysqli_error($db));
echo 'データを挿入しました';
*/

/*
mysqli_query($db, 'update my_items set item_name="白桃" where id=5') or
die(mysqli_error($db));
echo '更新しました';
*/

/*
mysqli_query($db, 'delete from my_items where id=5') or die(mysqli_error($db));
echo '削除しました';
*/

/*
while ($data = mysqli_fetch_assoc($recordset)) {
  echo $data['item_name'] . '<br />';
}

$recordset = mysqli_query($db, 'select count(id) as record_count from my_items
order by id desc');
$data = mysqli_fetch_assoc($recordset);




echo '<p>合計件数は' . $data['record_count'] . 'です</p>';
*/

/*
$data = mysqli_fetch_row($recordset);
echo $data[0];
echo $data[1];
echo $data[2];
echo $data[3];
*/

/*
echo $data['item_name'];
$data = mysqli_fetch_assoc($recordset);
echo '<br />' . $data['item_name'];
$data = mysqli_fetch_assoc($recordset);
echo '<br />' . $data['item_name'];
$data = mysqli_fetch_assoc($recordset);
echo '<br />' . $data['item_name'];
*/
 ?>
