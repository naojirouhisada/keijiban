<?php 


require_once "db.php";
//$data = db_select('select url_name,up_genre.name as up_genre_name , under_genre.name as under_genre_name from under_genre inner join up_genre on under_genre.up_genre_id = up_genre.id order by up_genre.order_number ,under_genre.order_number');


$Keijiban = db_select("SELECT * FROM thread inner join under_genre on thread.under_genre_id = under_genre.id and thread.id = '{$_GET['url']}' ");
$Comment = db_select("SELECT * FROM thread_comment inner join thread on thread_comment.thread_id = thread.id and thread_comment.thread_id = '{$_GET['url']}'  ");

$name = addslashes($_REQUEST['name']);
$address =addslashes($_REQUEST['address']);
$content =addslashes($_REQUEST['content']);

db_insert("insert into keijiban.thread_comment (name,address,content,thread_id,post_time,unique_id) values ('$name','$address','$content','{$_GET['url']}' ,now(),unique_id);");

$sql  = "update thread set ";
$sql .= " comment_count =  (select count(*) from thread_comment where thread_id = {$_GET['url']}),";
$sql .= " last_update_time = now()";
$sql .= " where id = {$_GET['url']}";
$sql .= " limit 1";
db_update($sql);




//header("Location: /keijiban/tetugaku/{$_GET['url']}");exit;
header("Location: {$_SERVER['HTTP_REFERER']}");exit;
?>



