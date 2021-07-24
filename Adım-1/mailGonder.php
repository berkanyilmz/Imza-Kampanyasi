<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php

        include 'php/class.phpmailer.php';

        $adsoyad = $_POST['adsoyad'];
        $email = $_POST['mail'];
        

        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->Username = 'E-posta adresi'; //Mail gönderecek e-posta adresi
        $mail->Password = 'şifre'; //Mail gönderecek e-posta adresinin şifresi
        $mail->SetFrom($mail->Username, $adsoyad);
        $mail->AddAddress($email, $adsoyad);
        $mail->CharSet = 'UTF-8';
        $mail->Subject = 'İmza Kampanyası Onay Maili';
        $mail->MsgHTML(" Sayın $adsoyad Desteğinizi Onaylamak İçin Bağlantıya Tıklayınız !");
        $mail->AddAttachment('destek.html');
        
        if($mail->Send()) {
            echo 'Mail gönderildi!';
        } else {
            echo 'Mail gönderilirken bir hata oluştu: ' . $mail->ErrorInfo;
        }

        ?>
    </body>
</html>