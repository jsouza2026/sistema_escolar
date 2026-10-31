<?php

require_once "conexao.php";

$pesquisa = trim($_GET["pesquisa"] ?? "");

try {
    if ($pesquisa !== "") {
        $sql = "SELECT id_aluno, nome_aluno, data_nascimento,
                       nome_responsavel, telefone_responsavel
                FROM aluno
                WHERE nome_aluno LIKE :pesquisa
                ORDER BY nome_aluno";

        $comando = $conexao->prepare($sql);

        $comando->execute([
            ":pesquisa" => "%" . $pesquisa . "%"
        ]);

    } else {
        $sql = "SELECT id_aluno, nome_aluno, data_nascimento,
                       nome_responsavel, telefone_responsavel
                FROM aluno
                ORDER BY nome_aluno";

        $comando = $conexao->query($sql);
    }

    $alunos = $comando->fetchAll();

} catch (PDOException $erro) {
    error_log($erro->getMessage());
    exit("Não foi possível consultar os alunos.");
}

function escapar($valor)
{
    return htmlspecialchars((string) $valor, ENT_QUOTES, "UTF-8");
}

function formatarData($data)
{
    $dataObj = DateTime::createFromFormat("!Y-m-d", $data);

    if (!$dataObj || $dataObj->format("Y-m-d") !== $data) {
        return $data;
    }

    return $dataObj->format("d/m/Y");
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consulta de Alunos - Sistema Escolar</title>

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
            max-width: 1100px;
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
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.07);
            margin-bottom: 25px;
        }

        .card h3 {
            color: #1e3a5f;
            margin-bottom: 20px;
        }

        .form-pesquisa {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .form-pesquisa input {
            flex: 1;
            min-width: 220px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        button, .botao {
            border: none;
            border-radius: 6px;
            padding: 12px 18px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .botao-pesquisar {
            background-color: #2878c7;
            color: white;
        }

        .botao-novo {
            background-color: #198754;
            color: white;
            margin-bottom: 18px;
        }

        .tabela-container {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        thead {
            background-color: #1e3a5f;
            color: white;
        }

        th, td {
            padding: 14px;
            text-align: left;
            border-bottom: 1px solid #e5e5e5;
            font-size: 14px;
        }

        tbody tr:hover {
            background-color: #f5f8fc;
        }

        .sem-registros {
            text-align: center;
            color: #666;
            padding: 25px;
        }

        .aviso {
            font-size: 13px;
            color: #666;
            margin-top: 15px;
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
                padding: 18px;
            }

            .form-pesquisa {
                flex-direction: column;
            }

            .form-pesquisa button {
                width: 100%;
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
        <h2>Consulta de Alunos</h2>
        <p>Pesquise e visualize os alunos cadastrados no sistema.</p>
    </section>

    <section class="card">
        <h3>Pesquisar aluno</h3>

        <form class="form-pesquisa" action="consultar_alunos.php" method="get">

            <input
                type="text"
                name="pesquisa"
                placeholder="Digite o nome do aluno..."
                value="<?= escapar($pesquisa) ?>"
                aria-label="Nome do aluno para pesquisa"
            >

            <button type="submit" class="botao-pesquisar">
                Pesquisar
            </button>

            <a href="consultar_alunos.php" class="botao">
                Limpar pesquisa
            </a>

        </form>
    </section>

    <section class="card">

        <h3>Alunos cadastrados</h3>

        <a href="alunos.php" class="botao botao-novo">
            + Cadastrar novo aluno
        </a>

        <div class="tabela-container">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do aluno</th>
                        <th>Data de nascimento</th>
                        <th>Responsável</th>
                        <th>Telefone</th>
                    </tr>
                </thead>

                <tbody>

                <?php if (count($alunos) > 0): ?>

                    <?php foreach ($alunos as $aluno): ?>
                        <tr>
                            <td><?= escapar($aluno["id_aluno"]) ?></td>

                            <td><?= escapar($aluno["nome_aluno"]) ?></td>

                            <td>
                                <?= escapar(
                                    formatarData($aluno["data_nascimento"])
                                ) ?>
                            </td>

                            <td><?= escapar($aluno["nome_responsavel"]) ?></td>

                            <td><?= escapar($aluno["telefone_responsavel"]) ?></td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="5" class="sem-registros">
                            Nenhum aluno encontrado.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>
            </table>

        </div>

        <p class="aviso">
            Total de alunos encontrados: <?= count($alunos) ?>
        </p>

    </section>

</main>

<footer>
    Sistema Escolar &copy; 2026
</footer>

</body>
</html>