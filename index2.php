<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./style-novo-parecer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="./script.js" defer></script>

</head>
<body>
    
    <div class="container">
    <header>

        <img src="imgs/Logo-Censipam-PNG/LogoVertical/Logo1xCensipam-Positivo.png" alt="logo-censipam" id="logo-censipam">

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

 
            <div class="ilustracao">

                <img src="./imgs/ilustracao/streamline-icon-maintenance@400x400.png" id="maintenance">
            
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#45e0d1" fill-opacity="1" d="M0,64L20,96C40,128,80,192,120,208C160,224,200,192,240,202.7C280,213,320,267,360,261.3C400,256,440,192,480,154.7C520,117,560,107,600,117.3C640,128,680,160,720,154.7C760,149,800,107,840,96C880,85,920,107,960,138.7C1000,171,1040,213,1080,202.7C1120,192,1160,128,1200,122.7C1240,117,1280,171,1320,202.7C1360,235,1400,245,1420,250.7L1440,256L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,
                    320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,
                    280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z">
                </path>
                </svg>

            </div>

        </div>

        <div class="secao-itens">

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
                        <button type="submit" class="btn btn-primary" type="button" name="enviar">Button</button>

                    </div>
                </form>

                

            </div>

        </div>

    </div>
    </div>
    


</body>
</html>