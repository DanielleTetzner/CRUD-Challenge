
<!DOCTYPE html lang="pt-br">

<html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script/listagem.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>  <!--MODAL-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js" integrity="sha512-0XDfGxFliYJPFrideYOoxdgNIvrwGTLnmK20xZbCAvPfLGQMzHUsaqZK8ZoH+luXGRxTrS46+Aq400nCnAT0/w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <title>Listagem de Clientes</title>

    </head>

    <body>    
        <header id="header" class="title0">
        <img class="logokabum" src="images/logo-kabum.png" alt="">
        <div id="btnLog">
            <img class="logoUser" src="images/userninja1.png" alt=""><p id="saudacao" class="saudacao">Olá,</p>
            <button type="button" class="btnLogout" id="btnLogout">Sair</button>
        </div>
        </header>
    
        <nav id="nav" class="nav">
            <div class="link">
                <a href="menu.html">Menu</a>  
            </div>
        </nav>
        <div id="botaoCad">        
            <a id="cadbutton" class="cadbutton" data-toggle="modal" data-target="#cadModal" title="Cadastrar" >Cadastrar</a>
        </div>
            <main>

            <div id="cadCliente">              
                <form id="listagemForm" method="GET">
                    <table id="tabela">
                        <thead>
                            <tr>

                                <th></th>
                                
                                <th >Nome</th>
                                
                                <th >CPF</th>
                                
                                <th >RG</th>
                                
                                <th id="emailTab">Email</th>
                                
                                <th >Telefone 1</th>
                                
                                <th >Telefone 2</th>
                                
                                <th >Ano</th>

                                <th class="user_id" >Usuario</th>

                                <th id="acaoTab" >Ação</th>
                                
                            </tr>
                        </thead>
                    </form>

                    <tbody id="listagem"> <!-- tabela feita no JS -->

                    </tbody>

                </table>
            </div>
        </main>
            
            <?php
                include_once 'Modals/cadModal.php';
                include_once 'Modals/formModal.php';
                include_once 'Modals/endModal.php';
                include_once 'Modals/endListmodal.php';
            ?>
            
        <footer>


            <div class="footericons">  <!--     target="_blank" abro o link em outra pagina   -->
                <div class="insta0">
                    <a href="https://www.instagram.com/danielle_grotta/"target="_blank"><img class="insta" src="images/insta.png" alt="">Danielle_Grotta</a>
                </div>

                <div class="git0">
                    <a href="https://github.com/DanielleTetzner"target="_blank"><img class="git" src="images/git.png" alt=""> DanielleTetzner</a>
                </div>
            </div>

        </footer>
    </body>
</html>