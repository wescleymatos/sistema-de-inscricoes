<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon" />
<title>1° Conferência Missionária - Área Norte</title>
<style>
    table {
	width:860px;
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
	text-align:left;
}
th {
	padding:7px 10px;
	color:#333;
	border-top:3px solid #808080;
	background:#CFCFCE;
    text-align: center;
}
td {
	border-bottom:1px solid #f4f4f4;
	padding:10px;
    text-align: center;
}
</style>
</head>
<body>
            <div id="vizualizar">
                <table cellspacing="0">
                    <tr>
					    <th colspan="2">Nome</th>
				    </tr>
                    <tr>
					    <td colspan="2"><h5><?php echo $_POST['nome']; ?></h5></td>
				    </tr>
                    <tr>
					    <th colspan="2">Validado</th>
				    </tr>
                    <tr>
					    <td colspan="2"><h5><?php echo $_POST['validado']; ?></h5></td>
				    </tr>
                    <tr>
					    <th colspan="2">Igreja</th>
				    </tr>
                    <tr>
					    <td colspan="2"><h5><?php echo $_POST['igreja']; ?></h5></td>
				    </tr>
                    <tr>
					    <th>Email</th>
					    <th>Telefone</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo $_POST['email']; ?></h5></td>
					    <td><h5><?php echo $_POST['telefone']; ?></h5></td>
				    </tr>
                    <tr>
					    <th>Cidade</th>
					    <th>UF</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo $_POST['cidade']; ?></h5></td>
					    <td><h5><?php echo $_POST['uf']; ?></h5></td>
				    </tr>
                    <tr>
					    <th>Data de Nascimento</th>
					    <th>Data do Cadastro</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo $_POST['dataNasc']; ?></h5></td>
					    <td><h5><?php echo $_POST['dataCad']; ?></h5></td>
				    </tr>
                    <tr>
					    <th>Estado Civil</th>
					    <th>Tipo de Pagamento</th>
				    </tr>
                    <tr>
					    <td><h5><?php echo $_POST['estadoCivil']; ?></h5></td>
					    <td><h5><?php echo $_POST['tipoPagamento']; ?></h5></td>
				    </tr>
                </table>
		</div>

</body>
</html>

