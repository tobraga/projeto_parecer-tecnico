<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./style-novo-parecer.css">
    <script src="./script.js" defer></script>

</head>
<body>
    
    <div class="container">
    <header>

        <img src="imgs/Logo-Censipam-PNG/LogoVertical/Logo1xCensipam-Positivo.png" alt="logo-censipam" id="logo-censipam">

    </header>
    <?php
        require_once('config/conexao.php');
    ?>


    <h1 id="titulo">Novo Parecer</h1>

    <div class="form-container">

        <div class="informacoes">

            <form autocomplete="off">
                
                <div class="box">
                    <label class="nome_campo">Nome</label>
                    <select class="campo" id="campo-texto">
                        <option>Selecione um Servidor do CRBE</option>

                        <!-- Consulta no banco - Nome dos servidores--->
                        <?php
                            $consultaServidor = $conn->prepare('SELECT * FROM servidor');
                            $consultaServidor->execute();
                            $consultaServidor = $consultaServidor->fetchAll();
                            foreach ($consultaServidor as $consultaServidor) {
                            ?>
                                <option value="<?php echo $consultaServidor['nome_servidor']; ?>">
                                    <?php echo $consultaServidor['nome_servidor']; ?>
                                </option>
                            <?php } ?>
                        ?>
                    </select>

                </div>

                <div class="box">
                    <label class="nome_campo">Origem</label>
                    <select class="campo" id="campo-origem"> 

                    <option>Selecione Local</option>

                        <!-- Consulta no banco - Localizacao--->
                        <?php
                            $consultaLocal = $conn->prepare("SELECT CONCAT(localizacao,' - ',setor) as local  FROM localizacao;");
                            $consultaLocal->execute();
                            $consultaLocal = $consultaLocal->fetchAll();
                            foreach ($consultaLocal as $consultaLocal) {
                            ?>
                                <option value="<?php echo $consultaLocal['local']; ?>">
                                    <?php echo $consultaLocal['local']; ?>
                                </option>
                            <?php } ?>
                        ?>

                    </select>
                </div>

                <div class="boxes">

                    <div class="box">
                        <label class="nome_campo">Parecer Técnico N°</label>
                        <input type="number" class="campo" id="campo-numParecer">
                    </div>

                    <div class="box">
                        <label class="nome_campo">Data</label>
                        <input type="date" class="campo" id="campo-data">
                    </div>
                
                </div>

            </form>

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

                <form action="" id="form-item">

                    <div class="box">

                        <label class="nome_campo">Equipamento</label>
                        <input class="campo" id="campo-texto">

                    </div>

                    <div class="box">

                        <label class="nome_campo">Status</label>
                        <input type="text" class="campo" id="status">

                    </div>

                    <div class="box">

                        <label class="nome_campo">SN</label>
                        <input type="text" class="campo" id="sn">

                    </div>

                    <div class="box">

                        <label class="nome_campo">Patrimônio</label>
                        <input type="text" class="campo" id="patrimonio">

                    </div>

                    

                </form>

                

            </div>

        </div>

    </div>
    </div>
    


</body>
</html>