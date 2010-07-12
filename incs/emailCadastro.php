<?php

                $mail = new PHPMailer();
                $mail->IsSMTP(); // Define que a mensagem será SMTP
                $mail->Host = "pop.gmail.com"; // Endereço do servidor SMTP
                $mail->Port = 465;
                $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
                $mail->SMTPSecure = "ssl";
                $mail->Username = "ignazanatal@gmail.com"; // Usuário do servidor SMTP
                $mail->Password = "naza2009web"; // Senha do servidor SMTP

                // Define o remetente
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->From = "ignazanatal@gmail.com"; // Seu e-mail
                $mail->FromName = "Conferência 2010"; // Seu nome

                // Define os destinatário(s)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                //$mail->AddAddress('fulano@dominio.com.br', 'Fulano da Silva');
                $mail->AddAddress($_POST['email']);
                $mail->AddCC('conferencia@nazarenonatal.com.br'); // Copia
                //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

                // Define os dados técnicos da Mensagem
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

                // Define a mensagem (Texto e Assunto)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->Subject  = "Cadastro na Conferência Missionária 2010"; // Assunto da mensagem
                $mail->Body = " <p>Ol&aacute; " . $_POST['nome'] . ", seu cadastro foi realizado com sucesso.</p>
                                <p>Para confirmar sua inscri&ccedil;&atilde;o,
                                realize um dep&oacute;sito banc&aacute;rio no valor de 10,00 R$ (dez reais) na conta informada abaixo:</p><br />
                                <p>Conta: <strong></strong></p>
                                <p>Banco: <strong></strong></p>
                                <p>Destinat&aacute;rio: <strong></strong></p>
                                <br />
                                <p><strong>IMPORTANTE!!!</strong></p>
                                <p>Se faz necess&aacute;rio o envio do comprovante de depósito scaneado ou as informa&ccedil;&otilde;es contidas no mesmo para os emails:</p>
                                <p><strong>conferencia@nazarenonatal.com.br</strong></p>
                                <p><strong>ignazanatal@gmail.com</strong></p>";

                $mail->AltBody = "Olá " . $_POST['nome'] . ", Seu cadastro foi realizado com sucesso.
Para confirmar sua inscrição,
realize um depósito bancário no valor de 10,00 R$ (dez reais) na conta informada abaixo:
Conta:
Banco:
Destinatário:


IMPORTANTE!!!
Para validar seu cadastro se faz necessário o envio do comprovante de depósito ou as informações contidas no mesmo para os emails:

conferencia@nazarenonatal.com.br
ignazanatal@gmail.com";

                // Define os anexos (opcional)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-
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

