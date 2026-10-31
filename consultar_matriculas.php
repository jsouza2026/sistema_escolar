<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Consulta de Matrículas - Sistema Escolar</title>

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
            max-width: 1150px;
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

        .form-pesquisa input,
        .form-pesquisa select {
            flex: 1;
            min-width: 180px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            background-color: white;
        }

        button, .botao {
            display: inline-block;
            border: none;
            border-radius: 6px;
            padding: 11px 16px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .botao-pesquisar {
            background-color: #2878c7;
            color: white;
        }

        .botao-pesquisar:hover {
            background-color: #1e5f9f;
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
            min-width: 850px;
            border-collapse: collapse;
        }

        thead {
            background-color: #1e3a5f;
            color: white;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #e5e5e5;
            font-size: 14px;
        }

        tbody tr:hover {
            background-color: #f5f8fc;
        }

        .situacao {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }

        .ativa {
            background-color: #d1e7dd;
            color: #146c43;
        }

        .cancelada {
            background-color: #f8d7da;
            color: #842029;
        }

        .concluida {
            background-color: #cfe2ff;
            color: #084298;
        }

        .botao-editar {
            background-color: #ffc107;
            color: #333;
        }

        .aviso {
            font-size: 13px;
            color: #777;
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

            .form-pesquisa input,
            .form-pesquisa select,
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
        <a href="matriculas.php">Cadastrar matrícula</a>
        <a href="consultar_matriculas.php">Consultar matrículas</a>
        <a href="professores.php">Professores</a>
        <a href="turmas.php">Turmas</a>
    </nav>

    <main>

        <section class="titulo-pagina">
            <h2>Consulta de Matrículas</h2>
            <p>Consulte as matrículas e verifique a situação dos alunos.</p>
        </section>

        <section class="card">

            <h3>Pesquisar matrícula</h3>

            <form class="form-pesquisa" action="#" method="get">

                <input
                    type="text"
                    name="nome_aluno"
                    placeholder="Nome do aluno..."
                    aria-label="Nome do aluno"
                >

                <input
                    type="number"
                    name="ano_letivo"
                    placeholder="Ano letivo"
                    min="2000"
                    max="2100"
                    aria-label="Ano letivo"
                >

                <select name="situacao" aria-label="Situação da matrícula">
                    <option value="">Todas as situações</option>
                    <option value="Ativa">Ativa</option>
                    <option value="Cancelada">Cancelada</option>
                    <option value="Concluída">Concluída</option>
                </select>

                <button type="submit" class="botao-pesquisar">
                    Pesquisar
                </button>

            </form>

        </section>

        <section class="card">

            <h3>Matrículas cadastradas</h3>

            <a href="matriculas.php" class="botao botao-novo">
                + Cadastrar matrícula
            </a>

            <div class="tabela-container">

                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Aluno</th>
                            <th>Turma</th>
                            <th>Data da matrícula</th>
                            <th>Ano letivo</th>
                            <th>Situação</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>1</td>
                            <td>Maria Oliveira</td>
                            <td>1º Ano A</td>
                            <td>15/01/2026</td>
                            <td>2026</td>
                            <td>
                                <span class="situacao ativa">
                                    Ativa
                                </span>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="botao-editar"
                                    onclick="alert('Protótipo: edição ainda não implementada.')"
                                >
                                    Editar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>Pedro Santos</td>
                            <td>2º Ano A</td>
                            <td>20/01/2026</td>
                            <td>2026</td>
                            <td>
                                <span class="situacao ativa">
                                    Ativa
                                </span>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="botao-editar"
                                    onclick="alert('Protótipo: edição ainda não implementada.')"
                                >
                                    Editar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>Lucas Ferreira</td>
                            <td>3º Ano B</td>
                            <td>10/02/2025</td>
                            <td>2025</td>
                            <td>
                                <span class="situacao concluida">
                                    Concluída
                                </span>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="botao-editar"
                                    onclick="alert('Protótipo: edição ainda não implementada.')"
                                >
                                    Editar
                                </button>
                            </td>
                        </tr>

                    </tbody>
                </table>

            </div>

            

        </section>

    </main>

    <footer>
        Sistema Escolar &copy; 2026
    </footer>

</body>
</html>