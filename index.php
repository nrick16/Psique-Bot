<?php
date_default_timezone_set('America/Sao_Paulo');
include('database.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="robots" content="noindex, nofollow">
      <title>PSIQUE-BOT</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	  <link href="style.css" rel="stylesheet">
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   </head>
   <body background="image/consultorio.jpg">
      <div class="container">
         <div class="row justify-content-md-center mb-4">
            <div class="col-md-6">
               <!-- COMEÇO DO CHAT-->
               <div class="card">
                  <div class="card-body messages-box">
					 <ul class="list-unstyled messages-list">
							<?php
							$res=mysqli_query($con,"select * from message");
							if(mysqli_num_rows($res)>=1){
								
								?>
								<li class="messages-me clearfix start_chat">
								   ***  Envie uma mensagem para Psique ***
								</li>
								<?php
							}
							?>
                    
                     </ul>
                  </div>
                  <div class="card-header">
                    <div class="input-group">
					   <input id="input-me" type="text" name="messages" class="form-control input-sm" placeholder="Digite algo..." />
					   <span class="input-group-append">
					   <input type="button" class="btn btn-primary" value="Enviar" id="keydown" onclick="send_msg()">
					   </span>
					</div> 
                  </div>
               </div>
               <!--FIM DO CHAT-->
            </div>
         </div>
      </div>
	  <!-- DATA -->
      <script type="text/javascript">
		 function getCurrentTime(){
			var now = new Date();
			var hh = now.getHours();
			var min = now.getMinutes();

			if(min<10){
				var time = hh+":0"+min+" "
			}else{
				var time = hh+":"+min+" "
			}
			return time;
		 }
		 // FUNÇÃO PARA ENVIOS DE MENSAGEM 
		 function send_msg(){
			jQuery('.start_chat').hide();
			var txt=jQuery('#input-me').val();
			var html='<li class="messages-me clearfix"><span class="message-img"><img src="image/user_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Me</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+txt+'</p></div></li>';
			jQuery('.messages-list').append(html);
			jQuery('#input-me').val('');
			if(txt){
				jQuery.ajax({
					url:'get_bot_message.php',
					type:'post',
					data:'txt='+txt,
					success:function(result){
						var html='<li class="messages-you clearfix"><span class="message-img"><img src="image/bot_avatar.png" class="avatar-sm rounded-circle"></span><div class="message-body clearfix"><div class="message-header"><strong class="messages-title">Chatbot</strong> <small class="time-messages text-muted"><span class="fas fa-time"></span> <span class="minutes">'+getCurrentTime()+'</span></small> </div><p class="messages-p">'+result+'</p></div></li>';
						jQuery('.messages-list').append(html);
						jQuery('.messages-box').scrollTop(jQuery('.messages-box')[0].scrollHeight);
					}
				});
			}
		 }
	  </script>

	  <!-- Enviar c/Enter -->
	  <script type="text/javascript">
		document.addEventListener('keydown', function (event) {
    		if (event.keyCode == 13){
    			send_msg();
   			}
		});
	</script>

   </body>
</html>