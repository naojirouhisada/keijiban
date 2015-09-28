<?php  $_GET['url']; ?>

<?php
require_once "db.php";
//$data = db_select('select url_name,up_genre.name as up_genre_name , under_genre.name as under_genre_name from under_genre inner join up_genre on under_genre.up_genre_id = up_genre.id order by up_genre.order_number ,under_genre.order_number');


$UpGenreData = db_select('SELECT * FROM up_genre');

$ThreadData = db_select("SELECT thread.id,title,comment_count FROM thread inner join under_genre on thread.under_genre_id = under_genre.id and url_name = '{$_GET['url']}'");
$Keijiban = db_select("SELECT * FROM thread inner join under_genre on thread.under_genre_id = under_genre.id and url_name = '{$_GET['url']}'");
$Comment = db_select("SELECT * FROM thread_comment inner join thread on thread_comment.thread_id = thread.id  ");

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width ,initial-scale=1">
        <meta name="discription" content="掲示板です。ここでは色々なスレッドを自由に開設できますので、楽しんでこの掲示板を利用してください。">
		<meta name="keywords" content="掲示板">
        <title>掲示板</title>
         <link rel="stylesheet" href="../keijiban.css" />
        <!-- BootstrapのCSS読み込み -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery読み込み -->
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
<body>
	<div id="page">
		<header>
			<h1 class="topcharacter">掲示板</h1>
				
			</header>
				
			<a class="back_Home" href="../keijiban.php">HOME</a>
			<p class="NewThread"><a href="#new_tread_zone">New Thread!!</a></p>
			<div id="pageBody">
			
				<section class="keijiban">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h2 class="panel-title">掲示板一覧</h2>
						</div>
						<div class="panel-body">
						<!--<?php
							$result = mysql_query('SELECT title from thread');
							while ($row = mysql_fetch_assoc($result)) {
								 print($row['title']);
							}
							?> -->

	
				<?php  foreach($ThreadData as $key => $ThreadRow ):?>
				<a href="<?php echo $_GET['url']; ?>/<?php  echo $ThreadRow['id']; ?>"><?php  echo $ThreadRow['title'];  ?>(<?php echo $ThreadRow['comment_count'] ?>)　</a>
				<?php endforeach; ?>
				<!--		<p>
							<a href="<?php  echo $_GET['url']  ?>/1">スレッド1()</a>
								スレッド2()
								スレッド3()
								スレッド4()
							</p>
							<p>
								スレッド5()
								スレッド6()
								スレッド7()
								スレッド8()
							</p>
							<p>
								スレッド9()
								スレッド10()
								スレッド11()
								スレッド12()
							</p>
							<p>
								スレッド13()
								スレッド14()
								スレッド15()
								スレッド16()
							</p>
				-->
							
						</div>	
					</div>
				</section>
			
	
	
				<div id="new_tread_zone">
			
				<form class="form-horizontal" action=<?php echo $_SERVER['REQUEST_URI'] . "/post"; ?>  method="post">
					<button type="submit" class="btn btn-default">New Thread!!</button>
						<div class="form-group">
							<label class="col-sm-2 control-label" for="InputName">	タイトル:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="InputName" name="title" value="" >
							</div><!--col-sm-10-->
						</div><!--form-group-->
						
						
						<input type="hidden" name="under_genre_id" value="">
				</form>
				
			</div><!-- new_tread_zone -->
		
		</div><!-- pageBody-->
	</div><!-- page--> 
</body>
</html>