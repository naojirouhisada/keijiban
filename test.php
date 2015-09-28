<?php  


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
        
        <script type='text/javascript' charset='utf-8' src='js/popbox.js'></script>
        <link rel='stylesheet' href='js/popbox.css' type='text/css'>

    </head>
<body>
<div class='popbox'>
    <a class='popOpen' href='#'>Click Here!</a>
    <div class='popCol'>                       
        <div class='box' >                        
            <div class='arrow'></div>            
            <div class='arrow-border'></div>
            xczxczxczxczxcx         
            <a href="#" class="close">close</a>  
        </div>
    </div>
</div>
       
<script type='text/javascript'>
	$(document).ready(function(){
		$('.popbox').popbox({
			'open'          : '.popOpen',
   
			'collapse'     : '.popCol'
		});
    });
</script>
        
        

</body>
</html>

	
				<?php 
								
								 $string = htmlspecialchars($CommentRow['content']); 
								 $str = nl2br($string); 
								echo preg_replace('/&gt;&gt;([0-9]+)/',
								 '<a href="javascript:void( 0 )" onclick="">&gt;&gt;\\1</a>',
								 
								  $str);
							?>
							
							
				<form class='form-horizontal' action=<?php echo $_SERVER['REQUEST_URI'] . '/post'; ?> method='post'>
				<button type='submit' class='btn btn-default'>POST!!</button>
				
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='PostName'>名前:</label>
					<div class='col-sm-10'>
						<input type='text' class='form-control' id='PostName' name='name' value=''>
					</div><!--col-sm-10-->
				</div><!--form-group-->
				
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='PostEmail'>EMAIL:</label>
					<div class='col-sm-10'>
						<input type='email' class='form-control' id='PostEmail' name='address' value=''>
					</div><!--col-sm-10-->	
				</div><!--form-group-->
			
				<div class='form-group'>
					<label class='col-sm-2 control-label' for='PostTextarea'>本文:</label>
					<div class='col-sm-10'>
						<textarea class='form-control' id='PostTextarea' name='content' value=''> </textarea>
					</div><!-- col-sm-10-->	
				</div><!--form-group-->
				<input type='hidden' name='thread_id' value=''>
				<input type='hidden' name='post_time' value=''>
				<input type='hidden' name='unique_id' value=''>
				<input type='hidden' name='comment_number' value=''>
				
			</form>
