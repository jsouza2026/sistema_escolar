<?php

require_once "conexao.php";

$mensagem = "";
$tipoMensagem = "";

$nomeAluno = "";
$dataNascimento = "";
$nomeResponsavel = "";
$telefoneResponsavel = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nomeAluno = trim($_POST["nome_aluno"] ?? "");
    $dataNascimento = $_POST["data_nascimento"] ?? "";
    $nomeResponsavel = trim($_POST["nome_responsavel"] ?? "");
    $telefoneResponsavel = trim($_POST["telefone_responsavel"] ?? "");

    if (
        $nomeAluno === "" ||
        $dataNascimento === "" ||
        $nomeResponsavel === "" ||
        $telefoneResponsavel === ""
    ) {
        $mensagem = "Preencha todos os campos.";
        $tipoMensagem = "erro";

    } elseif (
        !DateTime::createFromFormat('!Y-m-d', $dataNascimento) ||
        DateTime::createFromFormat('!Y-m-d', $dataNascimento)->format('Y-m-d') !== $dataNascimento
    ) {
        $mensagem = "Informe uma data de nascimento válida.";
        $tipoMensagem = "erro";

    } else {

        try {
            $sql = "INSERT INTO aluno
                    (nome_aluno, data_nascimento, nome_responsavel, telefone_responsavel)
                    VALUES
                    (:nome, :nascimento, :responsavel, :telefone)";

            $comando = $conexao->prepare($sql);

            $comando->execute([
                ":nome" => $nomeAluno,
                ":nascimento" => $dataNascimento,
                ":responsavel" => $nomeResponsavel,
                ":telefone" => $telefoneResponsavel
            ]);

            $mensagem = "Aluno cadastrado com sucesso!";
            $tipoMensagem = "sucesso";

            $nomeAluno = "";
            $dataNascimento = "";
            $nomeResponsavel = "";
            $telefoneResponsavel = "";

        } catch (PDOException $erro) {
            error_log($erro->getMessage());

            $mensagem = "Não foi possível cadastrar o aluno. Verifique os dados e tente novamente.";
            $tipoMensagem = "erro";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Alunos - Sistema Escolar</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f2f5f9;
            color: #333;
        }

        header {
            background-color: #1e3a5f;
            color: white;
            padding: 22px 40px;
        }

        header h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        header p {
            font-size: 14px;
        }

        nav {
            background-color: white;
            padding: 15px 40px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08);
        }

        nav a {
            color: #1e3a5f;
            text-decoration: none;
            margin-right: 18px;
            font-weight: bold;
            font-size: 14px;
        }

        nav a:hover {
            color: #2878c7;
        }

        main {
            max-width: 850px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .titulo-pagina {
            margin-bottom: 25px;
        }

        .titulo-pagina h2 {
            color: #1e3a5f;
            margin-bottom: 8px;
        }

        .titulo-pagina p {
            color: #666;
            font-size: 14px;
        }

        .card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
        }

        .card h3 {
            color: #1e3a5f;
            margin-bottom: 25px;
        }

        .campo {
            margin-bottom: 20px;
        }

        .campo label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 14px;
        }

        .campo input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        .campo input:focus {
            outline: none;
            border-color: #2878c7;
        }

        .botoes {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 25px;
        }

        .botao {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .botao-salvar {
            background-color: #198754;
            color: white;
        }

        .botao-salvar:hover {
            background-color: #146c43;
        }

        .botao-limpar {
            background-color: #e2e6ea;
            color: #333;
        }

        .botao-voltar {
            background-color: #2878c7;
            color: white;
        }

        .mensagem {
            padding: 14px;
            margin-bottom: 20px;
            border-radius: 6px;
            font-size: 14px;
        }

        .sucesso {
            background-color: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
        }

        .erro {
            background-color: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 13px;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            nav {
                padding: 15px 20px;
                line-height: 2.2;
            }

            nav a {
                margin-right: 10px;
            }

            .card {
                padding: 20px;
            }

            .botoes {
                flex-direction: column;
            }

            .botao {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <header>
        <h1>Sistema Escolar</h1>
        <p>Gerenciamento de informações escolares</p>
    </header>

    <nav>
        <a href="index.php">Início</a>
        <a href="alunos.php">Cadastrar aluno</a>
        <a href="consultar_alunos.php">Consultar alunos</a>
        <a href="matriculas.php">Matrículas</a>
        <a href="consultar_matriculas.php">Consultar matrículas</a>
        <a href="professores.php">Professores</a>
        <a href="turmas.php">Turmas</a>
    </nav>

    <main>

        <section class="titulo-pagina">
            <h2>Cadastro de Alunos</h2>
            <p>Preencha os dados para cadastrar um novo aluno.</p>
        </section>

        <section class="card">

            <h3>Dados do aluno</h3>

            <?php if ($mensagem !== ""): ?>
                <div class="mensagem <?= htmlspecialchars($tipoMensagem) ?>">
                    <?= htmlspecialchars($mensagem) ?>
                </div>
            <?php endif; ?>

            <form action="alunos.php" method="post">

                <div class="campo">
                    <label for="nome_aluno">Nome completo do aluno:</label>

                    <input
                        type="text"
                        id="nome_aluno"
                        name="nome_aluno"
                        maxlength="100"
                        value="<?= htmlspecialchars($nomeAluno) ?>"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="data_nascimento">Data de nascimento:</label>

                    <input
                        type="date"
                        id="data_nascimento"
                        name="data_nascimento"
                        value="<?= htmlspecialchars($dataNascimento) ?>"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="nome_responsavel">Nome do responsável:</label>

                    <input
                        type="text"
                        id="nome_responsavel"
                        name="nome_responsavel"
                        maxlength="100"
                        value="<?= htmlspecialchars($nomeResponsavel) ?>"
                        required
                    >
                </div>

                <div class="campo">
                    <label for="telefone_responsavel">Telefone do responsável:</label>

                    <input
                        type="tel"
                        id="telefone_responsavel"
                        name="telefone_responsavel"
                        maxlength="20"
                        value="<?= htmlspecialchars($telefoneResponsavel) ?>"
                        required
                    >
                </div>

                <div class="botoes">

                    <button type="submit" class="botao botao-salvar">
                        Salvar aluno
                    </button>

                    <button type="reset" class="botao botao-limpar">
                        Limpar campos
                    </button>

                    <a href="index.php" class="botao botao-voltar">
                        Voltar ao início
                    </a>

                </div>

            </form>

        </section>

    </main>

    <footer>
        Sistema Escolar &copy; 2026
    </footer>

</body>
</html>