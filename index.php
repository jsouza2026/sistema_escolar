<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar Simples</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            color: #333;
        }

        /* Cabeçalho */
        header {
            background-color: #174a75;
            color: white;
            padding: 22px 6%;
        }

        .cabecalho {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .logo {
            font-size: 23px;
            font-weight: bold;
        }

        .subtitulo {
            font-size: 13px;
            margin-top: 5px;
            color: #dce9f5;
        }

        /* Menu */
        nav {
            background-color: #103958;
            padding: 0 6%;
        }

        nav ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
        }

        nav a {
            display: block;
            padding: 16px 18px;
            color: white;
            text-decoration: none;
            font-size: 14px;
        }

        nav a:hover,
        nav a.ativo {
            background-color: #2878ad;
        }

        /* Conteúdo principal */
        main {
            max-width: 1150px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .boas-vindas {
            margin-bottom: 30px;
        }

        .boas-vindas h1 {
            color: #174a75;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .boas-vindas p {
            color: #666;
            line-height: 1.6;
        }

        /* Cartões */
        .titulo-secao {
            font-size: 20px;
            margin-bottom: 18px;
            color: #333;
        }

        .cartoes {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .cartao {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            border: 1px solid #e1e6ec;
            border-left: 5px solid #2878ad;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
        }

        .icone {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .cartao h3 {
            font-size: 19px;
            margin-bottom: 10px;
            color: #174a75;
        }

        .cartao p {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            min-height: 45px;
            margin-bottom: 20px;
        }

        .botao {
            display: inline-block;
            background-color: #2878ad;
            color: white;
            padding: 11px 17px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .botao:hover {
            background-color: #174a75;
        }

        /* Rodapé */
        footer {
            text-align: center;
            padding: 22px;
            margin-top: 45px;
            background-color: #e7edf3;
            color: #666;
            font-size: 13px;
        }

        /* Ajuste para celulares */
        @media (max-width: 650px) {
            .cabecalho {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
            }

            nav a {
                padding: 12px 10px;
            }

            .cartoes {
                grid-template-columns: 1fr;
            }

            .boas-vindas h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="cabecalho">
            <div>
                <div class="logo">Sistema Escola</div>
                <p class="subtitulo">Controle de alunos e matrículas</p>
            </div>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="index.html" class="ativo">Início</a></li>
            <li><a href="alunos.php">Alunos</a></li>
            <li><a href="matriculas.php">Matrículas</a></li>
            <li><a href="professores.php">Professores</a></li>
            <li><a href="turmas.php">Turmas</a></li>
        </ul>
    </nav>

    <main>

        <section class="boas-vindas">
            <h1>Bem-vindo ao sistema!</h1>
            <p>
                Gerencie os alunos e suas matrículas de forma simples
                e organizada.
            </p>
        </section>

        <h2 class="titulo-secao">Acesso rápido</h2>

        <section class="cartoes">

            <article class="cartao">
                <div class="icone">👨‍🎓</div>
                <h3>Cadastro de alunos</h3>
                <p>
                    Cadastre novos alunos e mantenha seus dados
                    pessoais e informações dos responsáveis organizados.
                </p>
                <a href="alunos.php" class="botao">Acessar alunos</a>
            </article>

            <article class="cartao">
                <div class="icone">📋</div>
                <h3>Matrículas</h3>
                <p>
                    Registre matrículas, consulte situações e
                    associe alunos às suas turmas.
                </p>
                <a href="matriculas.php" class="botao">Acessar matrículas</a>
            </article>

            <article class="cartao">
                <div class="icone">👩‍🏫</div>
                <h3>Professores</h3>
                <p>
                    Consulte e organize os dados dos professores
                    cadastrados no sistema.
                </p>
                <a href="professores.php" class="botao">Acessar professores</a>
            </article>

            <article class="cartao">
                <div class="icone">🏫</div>
                <h3>Turmas</h3>
                <p>
                    Organize as turmas por série escolar e turno,
                    facilitando o controle das matrículas.
                </p>
                <a href="turmas.php" class="botao">Acessar turmas</a>
            </article>

        </section>

    </main>

    <footer>
        Sistema Escolar &copy; 2026
        <br>
       
    </footer>

</body>
</html>