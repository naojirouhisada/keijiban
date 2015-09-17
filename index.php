<?php
require_once "db.php";
//$data = db_select('select url_name,up_genre.name as up_genre_name , under_genre.name as under_genre_name from under_genre inner join up_genre on under_genre.up_genre_id = up_genre.id order by up_genre.order_number ,under_genre.order_number');

$UpGenreData = db_select('SELECT * FROM up_genre');

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
         <link rel="stylesheet" href="index.css" />
        <!-- BootstrapのCSS読み込み -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery読み込み -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
<body>
<script src="db.php"></script>
		<header>
			<h1 class="topcharacter">掲示板</h1>
			
		</header>
		<p class="maincharacter">掲示板 </p>
		<div id="pageBody">
			<section class="greet">
				<p >掲示板へそうこそ！！</p>
				<p >ここでは様々なスレッドを自由に作成できます。</p>
				<p >また、<br />
				他のスレッドに対してコメントをすることも可能です。</p>
				<p >ぜひ楽しんで使ってください。</p>
			</section>
	
		

			<footer>
				<?php foreach($UpGenreData as $UpGenreRow): ?>
			    <section class="News">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title"><?php echo $UpGenreRow['name'];?></h2>
						</div>
						<div class="panel-body">
							<?php foreach(db_select('SELECT * FROM under_genre where up_genre_id = ' . $UpGenreRow['id']) as $UnderGenreGenreRow): ?>
							<a href="keijiban/<?php  echo $UnderGenreGenreRow['url_name'];  ?>"><h3><?php  echo $UnderGenreGenreRow['name'];  ?></h3></a>
							<?php endforeach; ?>
						</div>	
					</div>
				</section>    
				<?php endforeach; ?>

				
			    <?php /* 
				<section class="Learning">
					<div class="panel panel-default">
						<div class="panel-heading">
<!--php構文　-->				<?php foreach($data as $row); ?> 
							<h2 class="panel-title">
								<?php echo $data[0]['up_genre_name']; ?>
							</h2>
						</div>
						<div class="panel-body">
							<h3><?php echo $data[0]['under_genre_name']; ?></h3>
							<ul>
								<li><a href="keijiban/tetugaku.html">哲学</a></li>
							</ul>
							<h3> <?php echo $data[1]['under_genre_name']; ?></h3>
							<ul>
								<li>日本史</li>
							</ul>
							
							<h3><?php echo $data[2]['under_genre_name']; ?></h3>
							<ul>
								<li>世界史</li>
							</ul>	
						</div>	
					</div>
				</section>
			
				<section class="News">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h2 class="panel-title"><?php echo $data[3]['up_genre_name'];?></h2>
						</div>
						<div class="panel-body">
							<h3><?php echo $data[3]['under_genre_name']; ?></h3>
							<ul>
								<li>科学ニュース</li>
							</ul>
							<h3><?php echo $data[4]['under_genre_name']; ?></h3>
							<ul>
								<li>哲学ニュース</li>
							</ul>
						</div>	
					</div>
				</section>
				<?php endforach; ?>	<!-- php構文の終了 -->
				 
				 */ ?>
			</footer>
		</div>
	
	</div>

	
</body>

</html>