<?php
require_once "utils/BancoDados.php";
require_once "utils/utils.php";
require_once "model/Atende.php";
require_once "model/Animal.php";
require_once "model/Funcionario.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./src/app.js" defer></script>
    <link rel="stylesheet" href="./src/style.css">
    <link rel="shortcut icon" href="./src/img/logo.png">
    <title>Pet Gatô</title>
</head>

<body>
    <header>
        <a href="index.php">
            <span>
                <h2>Pet Gatô</h2>
                <img src="src/img/logo.png" alt="logo da página">
            </span>
        </a>
        <span class="menu" estado="fechado">
            <div></div>
            <div></div>
            <div></div>
        </span>
        <nav id="nav-mob">
            <div>
                <span>
                    <img src="src/img/pata.png" alt="simbolo pata de cachorro">
                    <span>Animais</span>
                </span>
                <ul>
                    <a href="index.php?op=c&tab=An">
                        <li>Cadastrar</li>
                    </a>
                    <a href="index.php?op=r&tab=An">
                        <li>Listar</li>
                    </a>
                </ul>
            </div>
            <div>
                <span>
                    <img src="src/img/funcionario.png" alt="simbolo funcionário">
                    <span>Funcionários</span>
                </span>
                <ul>
                    <a href="index.php?op=c&tab=Fu">
                        <li>Cadastrar</li>
                    </a>
                    <a href="index.php?op=r&tab=Fu">
                        <li>Listar</li>
                    </a>
                </ul>
            </div>
            <div>
                <span>
                    <img src="src/img/atendimento.png" alt="simbolo atendimento">
                    <span>Atendimentos</span>
                </span>
                <ul>
                    <a href="index.php?op=c&tab=At">
                        <li>Cadastrar</li>
                    </a>
                    <a href="index.php?op=r&tab=At">
                        <li>Listar</li>
                    </a>
                </ul>
            </div>
            <div>
                <span>
                    <img src="src/img/buscar.png" alt="simbolo de lupa">
                    <span>Buscar</span>
                </span>
                <ul>
                    <a href="index.php?op=r&bus=1">
                        <li>Buscar animais por funcionário</li>
                    </a>
                    <a href="index.php?op=r&bus=2">
                        <li>Buscar funcionário por animal</li>
                    </a>
                    <a href="index.php?op=r&bus=3">
                        <li>Buscar animais por raça</li>
                    </a>
                    <a href="index.php?op=r&bus=4">
                        <li>Buscar animais por telefone</li>
                    </a>
                </ul>
            </div>
        </nav>
    </header>
    <nav id="nav-desk">
        <span>
            <img src="src/img/pata.png" alt="simbolo pata de cachorro">
            <h3>Animais</h3>
            <span class="triang"></span>
            <ul class="menuDeskOriginal">
                <a href="index.php?op=c&tab=An">
                    <li>Cadastrar</li>
                </a>
                <a href="index.php?op=r&tab=An">
                    <li>Listar</li>
                </a>
            </ul>
        </span>
        <span>
            <img src="src/img/funcionario.png" alt="simbolo funcionário">
            <h3>Funcionários</h3>
            <span class="triang"></span>
            <ul class="menuDeskOriginal">
                <a href="index.php?op=c&tab=Fu">
                    <li>Cadastrar</li>
                </a>
                <a href="index.php?op=r&tab=Fu">
                    <li>Listar</li>
                </a>
            </ul>
        </span>
        <span>
            <img src="src/img/atendimento.png" alt="simbolo atendimento">
            <h3>Atendimentos</h3>
            <span class="triang"></span>
            <ul class="menuDeskOriginal">
                <a href="index.php?op=c&tab=At">
                    <li>Cadastrar</li>
                </a>
                <a href="index.php?op=r&tab=At">
                    <li>Listar</li>
                </a>
            </ul>
        </span>
        <span>
            <img src="src/img/buscar.png" alt="simbolo de lupa">
            <h3>Buscar</h3>
            <span class="triang"></span>
            <ul class="menuDeskOriginal">
                <a href="index.php?op=r&bus=1">
                    <li>Buscar animais por funcionário</li>
                </a>
                <a href="index.php?op=r&bus=2">
                    <li>Buscar funcionário por animal</li>
                </a>
                <a href="index.php?op=r&bus=3">
                    <li>Buscar animais por raça</li>
                </a>
                <a href="index.php?op=r&bus=4">
                    <li>Buscar animais por telefone</li>
                </a>
            </ul>
        </span>
    </nav>
    <section id="dashboard">
        <div>
            <div class="circle-progress">
                <div class="circle">
                    <h3><?= count(Animal::consultar()) ?></h3>
                </div>
            </div>
            <p>Animais cadastrados</p>
        </div>
        <div>
            <div class="circle-progress">
                <div class="circle">
                    <h3><?= count(Funcionario::consultar()) ?></h3>
                </div>
            </div>
            <p>Funcionários cadastrados</p>
        </div>
        <div>
            <div class="circle-progress">
                <div class="circle">
                    <h3><?= count(Atende::consultar()) ?></h3>
                </div>
            </div>
            <p>Atendimentos cadastrados</p>
        </div>
    </section>
    <section class="forms" id="formsAn">
        <div class="animais"></div>
        <form action="index.php" method="POST">
            <h2>Cadastro de animais</h2>
            <div class="campos">
                <input type="text" required name="nomeAnimal" maxlength="255" placeholder="Nome">
                <input type="text" required name="raçaAnimal" maxlength="255" placeholder="Raça">
                <input type="text" required name="telefoneAnimal" maxlength="11" placeholder="Telefone">
                <input type="hidden" name="op" value="c">
                <input type="hidden" name="idU" value="">
                <input type="hidden" name="tab" value="An">
            </div>
            <div class="botoes">
                <button type="submit">Cadastrar</button>
                <button type="reset">Limpar</button>
            </div>
        </form>
    </section>

    <section class="forms" id="formsFu">
        <div class="funcionarios"></div>
        <form action="" method="POST">
            <h2>Cadastro de funcionários</h2>
            <div class="campos">
                <input type="text" required name="nomeFuncionario" maxlength="255" placeholder="Nome">
                <input type="email" required name="emailFuncionario" placeholder="E-mail">
                <input type="hidden" name="op" value="c">
                <input type="hidden" name="idU" value="">
                <input type="hidden" name="tab" value="Fu">
            </div>
            <div class="botoes">
                <button type="submit">Cadastrar</button>
                <button type="reset">Limpar</button>
            </div>
        </form>
    </section>

    <section class="forms" id="formsAt">
        <div class="atendimentos"></div>
        <form action="" method="POST">
            <h2>Cadastro de atendimentos</h2>
            <div class="campos">
                <label for="idF">Selecione o Funcionário:</label>
                <select name="idFuncionario" id="idF">
                    <?php
                    $res = Funcionario::consultar();
                    foreach ($res as $r) {
                        echo "<option value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
                    }
                    ?>
                </select>
                <label for="idA">Selecione o Animal:</label>
                <select name="idAnimal" id="idA">
                    <?php
                    $res = Animal::consultar();
                    foreach ($res as $r) {
                        echo "<option value='" . $r['id'] . "'>" . $r['nome'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="op" value="c">
                <input type="hidden" name="idU" value="">
                <input type="hidden" name="tab" value="At">
            </div>
            <div class="botoes">
                <button type="submit">Cadastrar</button>
                <button type="reset">Limpar</button>
            </div>
        </form>
    </section>

    <section class="forms" id="formsBusca1">
        <div class="busca1"></div>
        <form action="" method="GET">
            <h2>Busca de animais por funcionário</h2>
            <div class="campos">
                <label for="nomeFuncionario">Selecione o nome do funcionário:</label>
                <select name="key" id="nomeFuncionario">
                    <option>---</option>
                    <?php
                    $res = Funcionario::consultar();
                    foreach ($res as $r) {
                        echo "<option value='" . $r['nome'] . "'>" . $r['nome'] . "</option>";
                    }
                    ?>
                </select>
                <label for="emailFuncionario">Selecione o e-mail do funcionário:</label>
                <select name="key2" id="emailFuncionario">
                    <option>---</option>
                    <?php
                    $res = Funcionario::consultar();
                    foreach ($res as $r) {
                        echo "<option value='" . $r['email'] . "'>" . $r['email'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="op" value="r">
                <input type="hidden" name="opBus" value="1">
            </div>
            <div class="botoes">
                <button type="submit">Buscar</button>
            </div>
        </form>
    </section>

    <section class="forms" id="formsBusca2">
        <div class="busca2"></div>
        <form action="" method="GET">
            <h2>Busca funcionário por animal</h2>
            <div class="campos">
                <label for="nomeAnimal">Selecione o animal:</label>
                <select name="key" id="nomeAnimal">
                    <?php
                    $res = Animal::consultar();
                    foreach ($res as $r) {
                        echo "<option value='" . $r['nome'] . "'>" . $r['nome'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="op" value="r">
                <input type="hidden" name="opBus" value="2">
            </div>
            <div class="botoes">
                <button type="submit">Buscar</button>
            </div>
        </form>
    </section>

    <section class="forms" id="formsBusca3">
        <div class="busca3"></div>
        <form action="" method="GET">
            <h2>Busca de animais por raça</h2>
            <div class="campos">
                <label for="nomeRaca">Selecione a raça:</label>
                <select name="key" id="nomeRaca">
                    <?php
                    $res = Animal::consultarRaca();
                    foreach ($res as $r) {
                        echo "<option value='" . $r['raça'] . "'>" . $r['raça'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="op" value="r">
                <input type="hidden" name="opBus" value="3">
            </div>
            <div class="botoes">
                <button type="submit">Buscar</button>
            </div>
        </form>
    </section>

    <section class="forms" id="formsBusca4">
        <div class="busca4"></div>
        <form action="" method="GET">
            <h2>Busca de animais por telefone</h2>
            <div class="campos">
                <label for="numeroTelefone">Selecione o telefone:</label>
                <select name="key" id="numeroTelefone">
                    <?php
                    $res = Animal::consultarTelefone();
                    foreach ($res as $r) {
                        echo "<option value='" . $r['tel_dono'] . "'>" . $r['tel_dono'] . "</option>";
                    }
                    ?>
                </select>
                <input type="hidden" name="op" value="r">
                <input type="hidden" name="opBus" value="4">
            </div>
            <div class="botoes">
                <button type="submit">Buscar</button>

            </div>
        </form>
    </section>

    <section id="tabelas">
        <table id="tabelaAnimal">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Raça</th>
                    <th>Contato</th>
                    <th>Data de cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = Animal::consultar();
                foreach ($res as $r) {
                    echo "<tr>
                    <td>" . $r['id'] . "</td>
                    <td>" . $r['nome'] . "</td>
                    <td>" . $r['raça'] . "</td>
                    <td>" . $r['tel_dono'] . "</td>
                    <td>" . $r['data_cadastro'] . "</td>
                    <td>
                        <form action='index.php' method='GET'>
                            <input type='hidden' name='op' value='u'>
                            <input type='hidden' name='tab' value='An'>
                            <input type='hidden' name='id' value='" . $r['id'] . "'>
                            <button class='btn-acoes'><img class='btn-acoes' src='./src/img/editar.png' alt='simbolo de editar'></button>
                        </form>
                        <form action='index.php' method='GET'>
                            <input type='hidden' name='op' value='d'>
                            <input type='hidden' name='tab' value='An'>
                            <input type='hidden' name='id' value='" . $r['id'] . "'>
                            <button class='btn-acoes'><img class='btn-acoes' src='./src/img/excluir.png' alt='simbolo de excluir'></button>
                        </form>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
        <table id="tabelaFuncionario">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = Funcionario::consultar();
                foreach ($res as $r) {
                    echo "<tr>
                    <td>" . $r['id'] . "</td>
                    <td>" . $r['nome'] . "</td>
                    <td>" . $r['email'] . "</td>                    
                    <td>" . $r['data_cadastro'] . "</td>
                    <td>
                        <form action='index.php' method='GET'>
                            <input type='hidden' name='op' value='u'>
                            <input type='hidden' name='tab' value='Fu'>
                            <input type='hidden' name='id' value='" . $r['id'] . "'>
                            <button class='btn-acoes'><img class='btn-acoes' src='./src/img/editar.png' alt='simbolo de editar'></button>
                        </form>
                        <form action='index.php' method='GET'>
                            <input type='hidden' name='op' value='d'>
                            <input type='hidden' name='tab' value='Fu'>
                            <input type='hidden' name='id' value='" . $r['id'] . "'>
                            <button class='btn-acoes'><img class='btn-acoes' src='./src/img/excluir.png' alt='simbolo de excluir'></button>
                        </form>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
        <table id="tabelaAtende">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Funcionario</th>
                    <th>Animal</th>
                    <th>Data de cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $res = Atende::consultar();

                foreach ($res as $r) {
                    echo "<tr>
                    <td>" . $r['id'] . "</td>
                    <td>" . $r['nome_funcionario'] . "</td>
                    <td>" . $r['nome_animal'] . "</td>                    
                    <td>" . $r['data_atendimento'] . "</td>
                    <td>
                        <form action='index.php' method='GET'>
                            <input type='hidden' name='op' value='u'>
                            <input type='hidden' name='tab' value='At'>
                            <input type='hidden' name='id' value='" . $r['id'] . "'>
                            <button class='btn-acoes'><img class='btn-acoes' src='./src/img/editar.png' alt='simbolo de editar'></button>
                        </form>
                        <form action='index.php' method='GET'>
                            <input type='hidden' name='op' value='d'>
                            <input type='hidden' name='tab' value='At'>
                            <input type='hidden' name='id' value='" . $r['id'] . "'>
                            <button class='btn-acoes'><img class='btn-acoes' src='./src/img/excluir.png' alt='simbolo de excluir'></button>
                        </form>
                    </td>
                </tr>";
                }
                ?>
            </tbody>
        </table>
        <table id="tabelaBusca">
            <thead>
                <tr></tr>
            </thead>
            <tbody></tbody>
        </table>
    </section>

    <aside class="msg">
        <div id="msgSucesso">
            <h3>Operação realizada com sucesso!</h3>
        </div>
        <div id="msgError">
            <h3>Operação não foi realizada!</h3>
        </div>
    </aside>
</body>

</html>

<?php

if (isMetodo("GET")) {
    if (parametrosValidos($_GET, ["op", "tab", "id", "idU"]) || parametrosValidos($_GET, ["op", "tab", "id"]) || parametrosValidos($_GET, ["op", "tab"]) || parametrosValidos($_GET, ["op", "bus"]) || parametrosValidos($_GET, ["op", "opBus", "key"])) {
        echo "<script>
            document.querySelector('#dashboard').style.display = 'none';            
        </script>";
        if (!empty($_GET["tab"]))
            $tab = $_GET["tab"];
        else
            $tab = null;
        switch ($_GET["op"]) {
            case "c":
                echo "<script>                
                    document.querySelector('#forms$tab').style.display = 'flex';                    
                </script>";
                break;
            case "r":
                if (!empty($_GET["opBus"]))
                    $opBus = $_GET["opBus"];
                else
                    $opBus = null;
                if (!empty($_GET["bus"])) {
                    $bus = $_GET["bus"];
                    echo "<script>
                            document.querySelector('#formsBusca$bus').style.display = 'flex';                                                                               
                        </script>";
                }
                switch ($tab) {
                    case 'An':
                        echo "<script>
                            document.querySelector('#tabelas').style.display = 'flex';                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaFuncionario'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAtende'));                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaBusca'));                            
                        </script>";
                        break;
                    case 'Fu':
                        echo "<script>
                            document.querySelector('#tabelas').style.display = 'flex';                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAnimal'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAtende'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaBusca'));
                        </script>";
                        break;
                    case 'At':
                        echo "<script>
                            document.querySelector('#tabelas').style.display = 'flex';                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaFuncionario'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAnimal'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaBusca'));
                        </script>";
                        break;
                }

                switch ($opBus) {
                    case '1':
                        if ($res = Atende::buscarAnimaisPorFuncionario($_GET['key2'], $_GET['key'])) {
                            $tab = '';
                            foreach ($res as $r) {
                                $tab .= '<tr><td>' . $r['id_animal'] . '</td><td>' . $r['nome_animal'] . '</td><td>' . $r['raça'] . '</td><td>' . $r['tel_dono'] . '</td><td>' . $r['data_cadastro'] . '</td></tr>';
                            }
                            echo "<script>
                            const array = ['ID','Nome','Raça','Contato','Data de cadastro'];
                            array.forEach(e => {
                                let th = document.createElement('th');                
                                th.textContent = e;
                                document.querySelector('#tabelaBusca>thead>tr').appendChild(th);
                            })                          
                            document.querySelector('#tabelaBusca>tbody').innerHTML += '$tab';                            
                            document.querySelector('#tabelas').style.display = 'flex';                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaFuncionario'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAnimal'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAtende'));                          
                        </script>";
                        } else {
                            echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                        }
                        break;
                    case '2':
                        if ($res = Atende::buscarFuncionariosPorAnimais($_GET['key'])) {
                            $tab = '';
                            foreach ($res as $r) {
                                $tab .= '<tr><td>' . $r['id'] . '</td><td>' . $r['nome_funcionario'] . '</td><td>' . $r['email'] . '</td><td>' . $r['data_cadastro'] . '</td></tr>';
                            }
                            echo "<script>
                            const array = ['ID','Nome','E-mail','Data de cadastro'];                            
                            array.forEach(e => {
                                let th = document.createElement('th');                
                                th.textContent = e;
                                document.querySelector('#tabelaBusca>thead>tr').appendChild(th);                                      
                            })        
                            document.querySelector('#tabelaBusca>tbody').innerHTML += '$tab';                            
                            document.querySelector('#tabelas').style.display = 'flex';                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaFuncionario'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAnimal'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAtende'));
                        </script>";
                        } else {
                            echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                        }
                        break;
                    case '3':
                        if ($res = Animal::buscarAnimaisPorRaca($_GET['key'])) {
                            $tab = '';
                            foreach ($res as $r) {
                                $tab .= '<tr><td>' . $r['id'] . '</td><td>' . $r['nome'] . '</td><td>' . $r['raça'] . '</td><td>' . $r['tel_dono'] . '</td><td>' . $r['data_cadastro'] . '</td></tr>';
                            }
                            echo "<script>
                            const array = ['ID','Nome','Raça','Contato','Data de cadastro'];                            
                            array.forEach(e => {
                                let th = document.createElement('th');                
                                th.textContent = e;
                                document.querySelector('#tabelaBusca>thead>tr').appendChild(th);                                      
                            })        
                            document.querySelector('#tabelaBusca>tbody').innerHTML += '$tab';                            
                            document.querySelector('#tabelas').style.display = 'flex';                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaFuncionario'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAnimal'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAtende'));
                        </script>";
                        } else {
                            echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                        }
                        break;
                    case '4':
                        if ($res = Animal::buscarAnimaisPorTelefone($_GET['key'])) {
                            $tab = '';
                            foreach ($res as $r) {
                                $tab .= '<tr><td>' . $r['id'] . '</td><td>' . $r['nome'] . '</td><td>' . $r['raça'] . '</td><td>' . $r['tel_dono'] . '</td><td>' . $r['data_cadastro'] . '</td></tr>';
                            }
                            echo "<script>
                            const array = ['ID','Nome','Raça','Contato','Data de cadastro'];                            
                            array.forEach(e => {
                                let th = document.createElement('th');                
                                th.textContent = e;
                                document.querySelector('#tabelaBusca>thead>tr').appendChild(th);                                      
                            })        
                            document.querySelector('#tabelaBusca>tbody').innerHTML += '$tab';                            
                            document.querySelector('#tabelas').style.display = 'flex';                            
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaFuncionario'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAnimal'));
                            document.querySelector('#tabelas').removeChild(document.querySelector('#tabelas>#tabelaAtende'));
                        </script>";
                        } else {
                            echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                        }
                        break;
                }

                break;
            case "u":
                echo "<script>
                document.querySelector('#forms$tab').style.display = 'flex';
                document.querySelector('#forms$tab>form>div>input[name=op]').value = 'u';
                document.querySelector('#forms$tab>form>div>input[name=idU]').value = '" . $_GET["id"] . "'
                </script>";
                switch ($tab) {
                    case 'An':
                        if ($res = Animal::buscarID($_GET['id'])) {
                            echo "<script>
                        document.querySelector('#formsAn>form>div>input:nth-child(1)').value = '" . $res["nome"] . "'
                        document.querySelector('#formsAn>form>div>input:nth-child(2)').value = '" . $res["raça"] . "'
                        document.querySelector('#formsAn>form>div>input:nth-child(3)').value = '" . $res["tel_dono"] . "'</script>";
                        } else {
                            echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                        }
                        break;
                    case 'Fu':
                        if ($res = Funcionario::buscarID($_GET['id'])) {
                            echo "<script>
                        document.querySelector('#formsFu>form>div>input:nth-child(1)').value = '" . $res["nome"] . "'
                        document.querySelector('#formsFu>form>div>input:nth-child(2)').value = '" . $res["email"] . "'</script>";
                        } else {
                            echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                        }
                        break;
                    case 'At':
                        if ($res = Atende::buscarID($_GET['id'])) {
                            echo "<script>
                        document.querySelector('#formsAt>form>div>select:nth-child(2)').value = '" . $res["id_funcionario"] . "'
                        document.querySelector('#formsAt>form>div>select:nth-child(4)').value = '" . $res["id_animal"] . "'</script>";
                        } else {
                            echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                        }
                        break;
                }
                break;
            case "d":
                switch ($tab) {
                    case 'An':
                        if (!empty($_GET['id'])) {
                            if (Animal::excluir($_GET['id'])) {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                    
                                </script>";
                            } else {
                                echo "<script>                        
                                window.location.href = 'index.php'                                                                                    
                                </script>";
                            }
                        }
                        break;
                    case 'Fu':
                        if (!empty($_GET['id'])) {
                            if (Funcionario::excluir($_GET['id'])) {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                    
                                </script>";
                            } else {
                                echo "<script>                        
                                window.location.href = 'index.php'                                                                                    
                                </script>";
                            }
                        }
                        break;
                    case 'At':
                        if (!empty($_GET['id'])) {
                            if (Atende::excluir($_GET['id'])) {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                    
                                </script>";
                            } else {
                                echo "<script>                        
                                window.location.href = 'index.php'                                                                                    
                                </script>";
                            }
                        }
                        break;
                }
                break;
        }
    }
}

if (isMetodo("POST")) {
    if (parametrosValidos($_POST, ["nomeAnimal", "telefoneAnimal", "raçaAnimal", "op", "tab", "idU"]) || parametrosValidos($_POST, ["nomeFuncionario", "emailFuncionario", "op", "tab", "idU"]) || parametrosValidos($_POST, ["idFuncionario", "idAnimal", "op", "tab", "idU"]) || parametrosValidos($_POST, ["nomeAnimal", "telefoneAnimal", "raçaAnimal", "op", "tab"]) || parametrosValidos($_POST, ["nomeFuncionario", "emailFuncionario", "op", "tab"]) || parametrosValidos($_POST, ["idFuncionario", "idAnimal", "op", "tab"])) {
        switch ($_POST["tab"]) {
            case "An":
                switch ($_POST["op"]) {
                    case "c":
                        if (!empty($_POST["nomeAnimal"]) && !empty($_POST["telefoneAnimal"]) && !empty($_POST["raçaAnimal"])) {
                            if (Animal::cadastrar($_POST["nomeAnimal"], $_POST["raçaAnimal"], $_POST["telefoneAnimal"])) {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                                                        
                                </script>";
                            } else {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                
                                </script>";
                            }
                        }
                        break;
                    case "u":
                        if (!empty($_POST["idU"]) && !empty($_POST["nomeAnimal"]) && !empty($_POST["telefoneAnimal"]) && !empty($_POST["raçaAnimal"])) {
                            if (Animal::editar($_POST["idU"], $_POST["nomeAnimal"], $_POST["raçaAnimal"], $_POST["telefoneAnimal"])) {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                                                        
                                </script>";
                            } else {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                                                        
                                </script>";
                            }
                        }
                        break;
                }
            case "Fu":
                switch ($_POST["op"]) {
                    case "c":
                        if (!empty($_POST["nomeFuncionario"]) && !empty($_POST["emailFuncionario"])) {
                            if (filter_var($_POST["emailFuncionario"], FILTER_VALIDATE_EMAIL)) {
                                if (Funcionario::cadastrar($_POST["nomeFuncionario"], $_POST["emailFuncionario"])) {
                                    echo "<script>
                                    window.location.href = 'index.php'                                                                                                                                              
                                    </script>";
                                } else {
                                    echo "<script>
                                    window.location.href = 'index.php'                                                                                                                                                  
                                    </script>";
                                }
                            }
                        }
                        break;
                    case "u":
                        if (!empty($_POST["idU"]) && !empty($_POST["nomeFuncionario"]) && !empty($_POST["emailFuncionario"])) {
                            if (filter_var($_POST["emailFuncionario"], FILTER_VALIDATE_EMAIL)) {
                                if (Funcionario::editar($_POST["idU"], $_POST["nomeFuncionario"], $_POST["emailFuncionario"])) {
                                    echo "<script>
                                window.location.href = 'index.php'                                                                                                                                              
                                </script>";
                                } else {
                                    echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                                }
                            }
                        }
                        break;
                }
            case "At":
                switch ($_POST["op"]) {
                    case "c":
                        if (!empty($_POST["idFuncionario"]) && !empty($_POST["idAnimal"])) {
                            if (Atende::cadastrar($_POST["idFuncionario"], $_POST["idAnimal"])) {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                                                              
                                </script>";
                            } else {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                            }
                        }
                        break;
                    case "u":
                        if (!empty($_POST["idU"]) && !empty($_POST["idFuncionario"]) && !empty($_POST["idAnimal"])) {
                            if (Atende::editar($_POST["idU"], $_POST["idFuncionario"], $_POST["idAnimal"])) {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                                                              
                                </script>";
                            } else {
                                echo "<script>
                                window.location.href = 'index.php'                                                                                                                                                  
                                </script>";
                            }
                        }
                        break;
                }
        }
    }
}
?>