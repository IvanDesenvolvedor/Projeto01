<?php 
include("../config.php");
$data =[];
$assunto="Nova mensagem do site";
$corpo = '';
foreach ($_POST as $key => $value) {
    $corpo.=ucfirst($key).": ".$value;
    $corpo.="<hr>";
}
$info = array('assunto'=>$assunto,'corpo'=>$corpo);
$mail = new Email('smtp.gmail.com','programador2360@gmail.com','prog#1984','Ivan');
$mail->addAdress('ivanteotonio256@gmail.com','Ivan');
$mail->formatarEmail($info); 
if($mail->enviarEmail()){
    $data['sucesso'] = true;
}else{
    $data['sucesso'] = false;
} 
$data['sucesso'] == false;
//$data['erro'] = true;

//$data['retorno'] = 'sucesso';

die(json_encode($data));