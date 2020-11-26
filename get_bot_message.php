<?php
date_default_timezone_set('America/Sao_Paulo');
include('database.inc.php');

// CAPTURA O QUE O USUÁRIO DIGITOU E ENVIA UMA PROCURA PARA O BD
$txt=mysqli_real_escape_string($con,$_POST['txt']);
$sql="SELECT reply FROM chatbot_hints WHERE question LIKE '%$txt%'";
$res=mysqli_query($con,$sql);



// PROCURA UMA RESPOSTA ASSOCIATIVA AO QUE O USUÁRIO DIGITOU EM 'chatbot_hints'
if(mysqli_num_rows($res)>0){
	$row=mysqli_fetch_assoc($res);
	$html=$row['reply'];
}else{
// CASO NENHUMA RESPOSTA SEJA ENCONTRADA, ELE RETORNA UMA RESPOSTA PADRÃO
	$html="Desculpa, não entendi";
}






// --> SALVA A CONVERSA EM 'message' <--
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"INSERT INTO message(message,added_on,type) VALUES('$txt','$added_on','user')"); // --> USUÁRIO
$added_on=date('Y-m-d h:i:s');
mysqli_query($con,"INSERT INTO message(message,added_on,type) VALUES('$html','$added_on','bot')"); // --> PSIQUE-BOT



echo $html;


?>