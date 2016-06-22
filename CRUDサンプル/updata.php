<?php
require('dbconnect.php');

$id = $_REQUEST['id'];
if($id == ''){
  $id = 1;
}
$sql = sprintf("select * from my_items where id=%d",
mysqli_real_escape_string($db, $id));
$recordset = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($recordset);
 ?>

<p>変更する内容を記入してください。</p>
<form id="frmUpdata" name="frmUpdata" method="post" action="updata_do.php">
  <dl>
    <dt>
      <label for="maker_id">メーカーID</label>
    </dt>
    <dd>
      <input name="maker_id" type="text" id="maker_id" size="20" maxlength="20"
      value="<?php print(htmlspecialchars($data['maker_id'], ENT_QUOTES)); ?>" />
    </dd>
    <dt>
      <label for="iten_name">商品名</label>
    </dt>
    <dd>
      <input name="item_name" type="text" id="item_name" size="35" maxlength="255"
      value="<?php print(htmlspecialchars($data['item_name'], ENT_QUOTES)); ?>" />
    </dd>
    <dt>
      <label for="price">価格</label>
    </dt>
    <dd>
      <input name="price" type="text" id="price" size="20" maxlength="20"
      value="<?php print(htmlspecialchars($data['price'], ENT_QUOTES)); ?>" />円
    </dd>
    <dt>
      <label for="keyword">キーワード</label>
    </dt>
    <dd>
      <input name="keyword" type="text" id="keyword" size="50" maxlength="255"
      value="<?php print(htmlspecialchars($data['keyword'], ENT_QUOTES)); ?>" />
    </dd>
  </dl>
  <input type="submit" value="変更する" />
  <input  type="hidden" name="id" value="<?php print(htmlspecialchars($data['id'], ENT_QUOTES)) ?>" />
</form>
