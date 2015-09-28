<?php  $_GET['url'];


require_once "db.php";
//$data = db_select('select url_name,up_genre.name as up_genre_name , under_genre.name as under_genre_name from under_genre inner join up_genre on under_genre.up_genre_id = up_genre.id order by up_genre.order_number ,under_genre.order_number');


$Keijiban = db_select("SELECT * FROM thread inner join under_genre on thread.under_genre_id = under_genre.id and thread.id = '{$_GET['url']}' ");
$Comment = db_select("SELECT * FROM thread_comment inner join thread on thread_comment.thread_id = thread.id and thread_comment.thread_id = '{$_GET['url']}'  ");


$UnderGenreData = db_select("SELECT url_name FROM under_genre where url_name ='{$_GET['url']}'");


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
         <link rel="stylesheet" href="../../keijiban.css">
        <!-- BootstrapのCSS読み込み -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <!-- jQuery読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- BootstrapのJS読み込み -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
        <script type='text/javascript' charset='utf-8' src='/js/popbox.js'></script>
        <link rel='stylesheet' href='/js/popbox.css' type='text/css'>
    </head>
<body>
	<div id="page">
		<header>
			<h1 class="topcharacter">掲示板</h1>
				
			</header>
			
			<a class="back_Home" href="../../keijiban.php">HOME</a>	
			<a class="back_Keijiban" href="
				<?php
					$bodytag = str_replace("/{$_GET['url']}","","{$_SERVER['REQUEST_URI']}");
					echo ($bodytag);
				?>">
			一覧へ</a>
			<div id="pageBody">
		
		
				<div class="content_zone">
				<?php foreach($Keijiban as $KeijibanRow ): ?>
					<p class="comment_zone_p">
					<?php echo $KeijibanRow['title']; ?>
					<?php echo $KeijibanRow['last_update_time']; ?>
					<!--タイトル名(コメント数) 最終更新日時： 年 月 日 時間  分-->
					</p>
					
					
				
				<?php foreach($Comment as $idx => $CommentRow): ?>
					<div class="comment_content pop<?php echo $idx + 1 ?>">
					<p>NO:<?php echo $idx + 1 ?>
						投稿者:<?php echo htmlspecialchars($CommentRow['name']); ?>
						投稿日時:<?php echo htmlspecialchars($CommentRow['post_time']); ?>
						<?php echo htmlspecialchars($CommentRow['unique_id']); ?></p>
				 
				
					<!--<p >番号 コメント者名 投稿日時： 年/月/日 ユニークID</p> -->
						<section class="comment">
						
							
							
						
							<?php 
								
								 $string = htmlspecialchars($CommentRow['content']); 
								 $str = nl2br($string); 
								 $row_number = $idx + 1;
								echo preg_replace('/&gt;&gt;([0-9]+)/',
								
								 "<div class='popbox' data-row={$row_number} data-comment=\\1>
								 		<a class='popOpen' href='javascript:void( 0 )' onclick=''>&gt;&gt;\\1</a>
								  		<div class='popCol'>
								  			 <div class='box' >
								  				<div class='arrow'></div>          
            									<div class='arrow-border'>
            									
            									</div>
            							<a href='#' class='close'>close</a>
            							</div>
            						</div>
            					</div>",								 
								  $str);
								  		
							?>
							
				
						
						</section>
					</div><!-- comment_content-->
				<?php endforeach; ?>
					
					<div class="comment_post">
						<form class="form-horizontal" action=<?php echo $_SERVER['REQUEST_URI'] . "/post"; ?> method="post">
							<button type="submit" class="btn btn-default">POST!!</button>
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="PostName">名前:</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="PostName" name="name" value="">
								</div><!--col-sm-10-->
							</div><!--form-group-->
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="PostEmail">EMAIL:</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="PostEmail" name="address" value="">
								</div><!--col-sm-10-->	
							</div><!--form-group-->
						
							<div class="form-group">
								<label class="col-sm-2 control-label" for="PostTextarea">本文:</label>
								<div class="col-sm-10">
									<textarea class="form-control" id="PostTextarea" name="content" value=""> </textarea>
								</div><!-- col-sm-10-->	
							</div><!--form-group-->
							<input type="hidden" name="thread_id" value="">
							<input type="hidden" name="post_time" value="">
							<input type="hidden" name="unique_id" value="">
							<input type="hidden" name="comment_number" value="">
							
						</form>
					</div><!--comment_post -->
					
				</div><!-- comment_zone-->
			<?php break ?>
				<?php endforeach; ?>
			
		</div><!-- pageBody-->
	</div><!-- page-->
	
	<script type='text/javascript'>
							$(document).ready(function(){
								    $(".popbox").each(function(){
								    	$(this).find(".box").html($(".pop" + $(this).data("comment")).clone());
								    
								    });


								
								$('.popbox').popbox({
									'open'          : '.popOpen',
									'box'           : '.box',
									'arrow'         : '.arrow',
									'arrow-border'  : '.arrow-border',
									'collapse'     : '.popCol'
								});
								
    						});
    					
						</script>	
						
</body>
</html>
		
