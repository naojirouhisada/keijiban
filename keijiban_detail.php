<?php  echo $_GET['url']; ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width ,initial-scale=1">
        <meta name="discription" content="掲示板です。ここでは色々なスレッドを自由に開設できますので、楽しんでこの掲示板を利用してください。">
		<meta name="keywords" content="掲示板">
        <title>掲示板</title>
         <link rel="stylesheet" href="../keijiban.css">
        <!-- BootstrapのCSS読み込み -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery読み込み -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
<body>
	<div id="page">
		<header>
			<h1 class="topcharacter">掲示板</h1>
				
			</header>
				
			<a class="back_Home" href="../index.php">HOME</a>
			<a class="back Keijiban" href="keijiban.php">一覧へ</a>
			<div id="pageBody">
		
				<div class="content_zone">
					<p class="comment_zone_p">タイトル名(コメント数) 最終更新日時：　年　月　日　時間　分</p>
				
					<div class="comment_content">
						<p >番号　コメント者名　投稿日時：　年/月/日　ユニークID</p>
						<section class="comment">
							<p>コンテンツ名</p>
						</section>
					</div><!-- comment_content-->
					
					<div class="comment_post">
						<form class="form-horizontal">
							<button type="submit" class="btn btn-default">POST!!</button>
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="PostName">名前:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="PostName">
								</div><!--col-sm-10-->
							</div><!--form-group-->
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="PostEmail">EMAIL:</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="PostEmail">
								</div><!--col-sm-10-->	
							</div><!--form-group-->
						
							<div class="form-group">
								<label class="col-sm-2 control-label" for="PostTextarea">本文:</label>
								<div class="col-sm-10">
									<textarea class="form-control" id="PostTextarea"> </textarea>
								</div><!-- col-sm-10-->	
							</div><!--form-group-->
						</form>
					</div><!--comment_post -->
					
				</div><!-- comment_zone-->
				
				
			
		</div><!-- pageBody-->
	</div><!-- page-->
	
</body>
</html>

			
			
