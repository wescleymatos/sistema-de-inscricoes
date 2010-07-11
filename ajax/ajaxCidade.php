<?php

    function __autoload($classe){
        $pastas = array('../class/connection', '../class/controller', '../class/model');

        foreach($pastas as $pasta){
            if(file_exists("{$pasta}/{$classe}.class.php")){
                include_once("{$pasta}/{$classe}.class.php");
            }
        }
    }

    $id = $_POST['id'];

    $cd = new CidadeDao();

?>

<p>
    <label for="cidade">Cidade</label>
    <select id="cidade" name="cidade">
        <option value="">Escolha uma Cidade</option>
        <?php
            $retorno = $cd->listaCidade($id);
            foreach($retorno as $r){ ?>
        <option value="<?php echo $r->getIdCidade(); ?>"><?php echo utf8_encode($r->getCidade()); ?></option>
        <?php }?>
    </select>
</p>
