

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devinette</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center" >
    <form action="" method="get" class="d-flex justify-content-center flex-column align-items-center w-40 h-50 mr-auto border border-danger">
        <h1 class=" justify-content-center text-danger font-weight-bold">Devinette</h1>
        <br>
        <br>
        <h2 class=" font-weight-bold">Trouvez un nombre entre 1 et 100(inclus)</h2>
        <br>
        <h2 class=" font-weight-bold">Vous avez 5 chances</h2>
        <br>
    <?php
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();

    require "Jeu.php";
    $session = new Jeu;
    $session->tentative = 5;
    $session->random = rand(0, 100);

    if (!isset($_SESSION['mystere'])){
        $_SESSION['mystere'] = $session->random;
    }

    if (!isset($_SESSION['compteur'])){
        $_SESSION['compteur'] = $session->tentative;
    }
        $_SESSION['compteur']-=1;
        
        if ($_SESSION['compteur'] >= 0) {
            if (isset($_GET['n']) && is_numeric($_GET['n'])) {
                if($_GET['n'] < $_SESSION['mystere']){
                    echo '<p>' . $_GET['n'] . $session->small() ;
                }elseif ($_GET['n'] > $_SESSION['mystere']) {
                    echo '<p>' . $_GET['n'] . $session->big() ;
                }else {
                    $session->win();
                }    
            }
            echo '<h5>il vous reste' . " " . ($_SESSION['compteur'] + 1) . " " . 'tentative</h5>';
        }else{
            session_reset();
            $_SESSION['compteur'] = $session->tentative;
            echo '<h2 class="text-danger font-weight-bold"> Vous avez perdu dommage</h2>';
            $_SESSION['mystere'] = $session->random;
            echo '<a href="index.php">Rejouer!!!</a>';
        }
    ?>


        <p>Entrez votre proposition : </p>
        <label for="n"></label>
        <input type="number" name="n" id="n" min="1" max="100" autofocus required>
        <button>Envoyer</button>
    </form>
</body>
</html>

