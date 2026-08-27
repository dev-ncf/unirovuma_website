<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manutenção - Universidade Rovuma</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --cor-primaria: #003366; 
            --cor-secundaria: #f4b400; 
            --cor-texto: #333;
            --cor-fundo: #f4f7f6;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--cor-fundo);
            color: var(--cor-texto);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            border-top: 8px solid var(--cor-primaria);
        }

        .logo {
            max-width: 180px;
            margin-bottom: 20px;
        }

        h1 {
            color: var(--cor-primaria);
            font-size: 2rem;
            margin-bottom: 15px;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 25px;
            color: #666;
        }

        .status-badge {
            display: inline-block;
            background: var(--cor-secundaria);
            color: #000;
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: bold;
            font-size: 0.9rem;
            margin-bottom: 25px;
            text-transform: uppercase;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid var(--cor-primaria);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .footer-info {
            border-top: 1px solid #eee;
            padding-top: 20px;
            font-size: 0.9rem;
        }

        .contact-links {
            margin-top: 15px;
        }

        .contact-links a {
            color: var(--cor-primaria);
            text-decoration: none;
            margin: 0 10px;
            font-weight: bold;
        }

        .contact-links a:hover {
            text-decoration: underline;
        }

        /* Estilo para imagem de fallback caso não haja logo */
        .logo-placeholder {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--cor-primaria);
            margin-bottom: 20px;
            display: block;
        }
    </style>
</head>
<body>

    <div class="container">
       
        <img src="./Universidade Rovuma - home_files/logotipo-unirovuma.fw.png" alt="Logo UniRovuma" class="logo" onerror="this.style.display='none'; document.getElementById('placeholder').style.display='block';">
        <div id="placeholder" class="logo-placeholder" style="display:none;">UNIVERSIDADE ROVUMA</div>

        <div class="loader"></div>
        
        <div class="status-badge">Sistema em Atualização</div>
        
        <h1>Estamos a trabalhar para melhorar!</h1>
        
        <p>Prezado utilizador, o portal da <strong>Universidade Rovuma</strong> encontra-se temporariamente indisponível para manutenção programada. Voltaremos a estar online em breve.</p>

        
    </div>

</body>
</html>