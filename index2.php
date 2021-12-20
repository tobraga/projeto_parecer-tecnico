<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>


</head>
<body>
    
    <div class="container">
    <header>

        
    </header>
    <?php
        require_once('config/conexao.php');
        require_once('config/painel.php');
        Painel::alert('sucesso', ' Empréstimo Atualizado com sucesso!');
        //header("Refresh:2; url='index2.php'");

        if(isset($_POST['enviar'])){
            $fk_servidor = $_POST['fk_servidor'];
            $id_localizacao = $_POST['id_localizacao'];
            $id_parecer = $_POST['id_parecer'];
            $data_teste = $_POST['data_teste'];
            $fk_equipamento = $_POST['fk_equipamento'];
            $status_parecer = $_POST['status_parecer'];
            $numero_patrimonio = $_POST['numero_patrimonio'];
            $numero_serie = $_POST['numero_serie'];

            $cadastroParecer = $conn->prepare("INSERT INTO parecer_tecnico (numero_patrimonio, numero_serie, status_parecer)
            VALUES ('$numero_patrimonio','$numero_serie', '$status_parecer')");
            $cadastroParecer->execute();
        }
    ?>


    <h1 id="titulo">Novo Parecer</h1>




            <div class="box-item">

                <div class="parte-superior-box-item">
                    
                    <h1>Item 1</h1>
                
                </div>

                <form action="post" id="form-item">

                    <div class="box">

                        <label class="nome_campo">Equipamento</label>
                        <select class="campo" id="campo-texto" name="fk_equipamento">
                            <option>Selecione um Equipamento</option>

                            <!-- Consulta no banco - Nome dos servidores--->
                            <?php
                                $consultaEquipamento = $conn->prepare("SELECT id_equipamento, CONCAT(descricao,' - ',marca,' - ',modelo) as equipamento  FROM equipamento;");
                                $consultaEquipamento->execute();
                                $consultaEquipamento = $consultaEquipamento->fetchAll();
                                foreach ($consultaEquipamento as $consultaEquipamento) {
                                ?>
                                    <option value="<?php echo $consultaEquipamento['id_equipamento']; ?>">
                                        <?php echo $consultaEquipamento['equipamento']; ?>
                                    </option>
                                <?php } ?>
                            ?>
                    </select>

                    </div>

                    <div class="box">

                        <label class="nome_campo">Status</label>
                        <select class="campo" id="campo-texto" name="status_parecer">
                            <option>Selecione um Status</option>
                            <option>Bom</option>
                            <option>Ocioso</option>
                            <option>Antieconomico</option>
                        </select>
                    </div>

                    <div class="box">

                        <label class="nome_campo">SN</label>
                        <input type="text" class="campo" id="numero_serie" name="numero_serie" required>

                    </div>

                    <div class="box">

                        <label class="nome_campo">Patrimônio</label>
                        <input type="text" class="campo" id="numero_patrimonio" name="numero_patrimonio" required>

                    </div>

                    
                    <div class="d-grid gap-2 d-md-block">
                        <button onclick = "window.location.href=index2.php'" type="submit" class="btn btn-primary" type="button" name="enviar" id="myButton">Button</button>

                    </div>

                    
                </form>

                

            </div>

        

    


</body>
</html>