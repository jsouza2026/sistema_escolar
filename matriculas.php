<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Matrícula - Sistema Escolar</title>

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
            margin-right: 22px;
            font-weight: bold;
            font-size: 14px;
        }

        nav a:hover {
            color: #2878c7;
        }

        main {
            max-width: 900px;
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

        .campo input,
        .campo select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            background-color: white;
        }

        .campo input:focus,
        .campo select:focus {
            outline: none;
            border-color: #2878c7;
        }

        .linha {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
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
                margin-right: 12px;
            }

            .card {
                padding: 20px;
            }

            .linha {
                grid-template-columns: 1fr;
                gap: 0;
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
        <a href="professores.php">Professores</a>
        <a href="turmas.php">Turmas</a>
    </nav>

    <main>

        <section class="titulo-pagina">
            <h2>Cadastro de Matrícula</h2>
            <p>Registre a matrícula do aluno no ano letivo desejado.</p>
        </section>

        <section class="card">

            <h3>Dados da matrícula</h3>

            <form action="#" method="post">

                <div class="campo">
                    <label for="aluno_id_aluno">Aluno:</label>

                    <select id="aluno_id_aluno"
                            name="aluno_id_aluno"
                            required>

                        <option value="">Selecione um aluno</option>
                        <option value="1">Maria Oliveira</option>
                        <option value="2">Pedro Santos</option>
                        <option value="3">Lucas Ferreira</option>

                    </select>
                </div>

                <div class="campo">
                    <label for="turma_id_turma">Turma:</label>

                    <select id="turma_id_turma"
                            name="turma_id_turma">

                        <option value="">Nenhuma turma definida</option>
                        <option value="1">1º Ano A</option>
                        <option value="2">2º Ano A</option>
                        <option value="3">3º Ano B</option>

                    </select>
                </div>

                <div class="linha">

                    <div class="campo">
                        <label for="data_matricula">
                            Data da matrícula:
                        </label>

                        <input
                            type="date"
                            id="data_matricula"
                            name="data_matricula"
                            required
                        >
                    </div>

                    <div class="campo">
                        <label for="ano_letivo">Ano letivo:</label>

                        <input
                            type="number"
                            id="ano_letivo"
                            name="ano_letivo"
                            min="2000"
                            max="2100"
                            placeholder="Ex.: 2026"
                            required
                        >
                    </div>

                </div>

                <div class="campo">
                    <label for="situacao">Situação da matrícula:</label>

                    <select id="situacao" name="situacao" required>
                        <option value="">Selecione a situação</option>
                        <option value="Ativa">Ativa</option>
                        <option value="Cancelada">Cancelada</option>
                        <option value="Concluída">Concluída</option>
                    </select>
                </div>

                <div class="botoes">

                    <button
                        type="submit"
                        class="botao botao-salvar"
                    >
                        Salvar matrícula
                    </button>

                    <button
                        type="reset"
                        class="botao botao-limpar"
                    >
                        Limpar campos
                    </button>

                    <a
                        href="index.php"
                        class="botao botao-voltar"
                    >
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