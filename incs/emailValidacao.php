<?php

                $mail = new PHPMailer();
                $mail->IsSMTP(); // Define que a mensagem será SMTP
                $mail->Host = "pop.gmail.com"; // Endereço do servidor SMTP
                $mail->Port = 465;
                $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
                $mail->SMTPSecure = "ssl";
                $mail->Username = "wescleymatos@gmail.com"; // Usuário do servidor SMTP
                $mail->Password = "luana130207eosso"; // Senha do servidor SMTP

                // Define o remetente
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->From = "conferencia@nazarenonatal.com.br"; // Seu e-mail
                $mail->FromName = "Conferência 2010"; // Seu nome

                // Define os destinatário(s)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                //$mail->AddAddress('fulano@dominio.com.br', 'Fulano da Silva');
                $mail->AddAddress($_POST['email']);
                //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
                //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

                // Define os dados técnicos da Mensagem
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

                // Define a mensagem (Texto e Assunto)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->Subject  = "Cadastro Conferência Missionária 2010"; // Assunto da mensagem
                $mail->Body = "Olá, sua inscrição foi validada!!";
                $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n <img src='http://blog.thiagobelem.net/wp-includes/images/smilies/icon_smile.gif' alt=':)' class='wp-smiley'> ";

                // Define os anexos (opcional)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                //$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo

                // Envia o e-mail
                $enviado = $mail->Send();

                // Limpa os destinatários e os anexos
                $mail->ClearAllRecipients();
                $mail->ClearAttachments();

                // Exibe uma mensagem de resultado
                //if ($enviado) {
                //echo "E-mail enviado com sucesso!";
                //} else {
                //echo "Não foi possível enviar o e-mail.<br /><br />";
                //echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
                //}


?>

