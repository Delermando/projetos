<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title ?></title>
        <link type="text/css" rel="stylesheet" href="views/css/style.css" />
        <script type="text/javascript"  src="views/js/jQuery.js"></script>
        <?php echo $linksCabecalho; ?>
    </head>
    <body>
        <div class="container">
            <header>
                    <div class="headerBarMenu">
                        <div class="headerBarMenuCenter">
                            <nav>
                                <div class="headerMenu">
                                    <ul>
                                        <li><a href="?action=cadastrar">Cadastrar</a></li>
                                        <li><a href="?action=listar">Listar</a></li>
                                        <li><a href="?action=alterar">Alterar</a></li>
                                        <li><a href="?action=deletar">Deletar</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
            </header>
            <section>
                <main>
                