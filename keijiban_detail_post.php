<?php 

require_once "db.php";


$Keijiban = db_select("SELECT * FROM thread inner join under_genre on thread.under_genre_id = under_genre.id and thread.id = '{$_GET['url']}' ");
$Comment = db_select("SELECT * FROM thread_comment inner join thread on thread_comment.thread_id = thread.id and thread_comment.thread_id = '{$_GET['url']}'  ");

$title = addslashes($_REQUEST['title']);

db_insert("insert into thread (title,comment_count,last_update_time,under_genre_id) select '$title',0,now(),id from under_genre where url_name = '{$_GET['url']}'");

header("Location: /keijiban/{$_GET['url']}");exit;

?>


