<?php

    if(Session::getSession("userPerfil") != null && Session::getSession("userLogin") != null) {

?>
<div id="menu">
    <ul class="menu">
        <li><a href="index.php" class="parent"><span>Home</span></a></li>
        <li><a href="informacao.php"><span>Informações</span></a></li>
        <li><a href="programacao.php" class="parent"><span>Programação</span></a></li>
        <li><a href="inscricao.php"><span>Inscrições</span></a></li>
        <li><a class="parent"><span>Relatórios</span></a>
            <div><ul>
                <li><a href="consulta/listaGeral.php"><span>Lista Geral</span></a></li>
                <li><a href="consulta/listaValidado.php"><span>Lista Validados</span></a></li>
                <li><a href="consulta/listaInvalidado.php"><span>Lista Não Validados</span></a></li>
                <li><a href="consulta/buscar.php"><span>Buscar Cadastrados</span></a></li>
            </ul></div>
        </li>
    </ul>
</div>
<?php

    } else {

?>
<div id="menu">
    <ul class="menu">
        <li><a href="index.php" class="parent"><span>Home</span></a></li>
        <li><a href="informacao.php"><span>Informações</span></a></li>
        <li><a href="programacao.php" class="parent"><span>Programação</span></a></li>
        <li><a href="inscricao.php"><span>Inscrições</span></a></li>
    </ul>
</div>
<?php

    }

?>

