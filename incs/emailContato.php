<?php

                require_once('../class/extra/class.phpmailer.php');

                $mail = new PHPMailer();
                $mail->IsSMTP(); // Define que a mensagem será SMTP
                $mail->Host = "pop.gmail.com"; // Endereço do servidor SMTP
                $mail->Port = 465;
                $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
                $mail->SMTPSecure = "ssl";
                $mail->Username = "ignazanatal@gmail.com"; // Usuário do servidor SMTP
                $mail->Password = ""; // Senha do servidor SMTP

                // Define o remetente
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->From = "ignazanatal@gmail.com"; // Seu e-mail
                $mail->FromName = "Conferência 2010"; // Seu nome

                // Define os destinatário(s)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                //$mail->AddAddress('fulano@dominio.com.br', 'Fulano da Silva');
                $mail->AddAddress($_POST['email'], $_POST['nome']);
                $mail->AddCC('conferencia@nazarenonatal.com.br'); // Copia
                //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

                // Define os dados técnicos da Mensagem
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

                // Define a mensagem (Texto e Assunto)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->Subject  = $_POST['assunto']; // Assunto da mensagem
                $mail->Body = $_POST['mensagem'];

                $mail->AltBody = $_POST['mensagem'];

                // Define os anexos (opcional)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

                // Envia o e-mail
                $enviado = $mail->Send();

                // Limpa os destinatários e os anexos
                $mail->ClearAllRecipients();
                $mail->ClearAttachments();

                echo "<script>window.location=('../contato.php')</script>";
                // Exibe uma mensagem de resultado
                //if ($enviado) {
                //echo "E-mail enviado com sucesso!";
                //} else {
                //echo "Não foi possível enviar o e-mail.<br /><br />";
                //echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
                //}


?>

