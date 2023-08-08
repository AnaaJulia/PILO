<?php
    if(isset($_GET['page'])){

        switch ($_GET['page']) {
            case 'evento':
                include ("base/nav.php");
                include ("base/sidebar.php");

                include ("base/evento.php");

                include ("base/footer.php");
                break;

            // USUARIO
            case 'login':
                include ("sis/usu/logar.php");
                break;

            case 'cadastro':
                include ("sis/usu/cadastrar.php");
                break;

            case 'insere':
                include ("sis/usu/insere_usu.php");
                break;

            case 'perfil':
                include ("base/nav.php");
                include ("base/sidebar.php");

                include ("sis/usu/meu_perfil.php");

                include ("base/footer.php");
                break;

            case 'valida':
                include ("sis/usu/valida.php");
                break;

            case 'excluir':
                include ("sis/usu/excluir_usu.php");
                break;
            //////////// 

            // ALERT
            case 'alert':
                include ("base/alerts.php");
                break;
            //////////// 

            // DEFAULT
            default:
                include ("base/nav.php");
                include ("base/sidebar.php");

                include ("base/home.php");

                include ("base/footer.php");
            //////////// 
        }

    } else {
        include ("base/nav.php");
        include ("base/sidebar.php");

        include ("base/home.php");

        include ("base/footer.php");
    }
?>