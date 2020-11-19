<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Php site</title>
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="script.js"></script>

    </style>
</head>

<body onload=loaded();>
    <canvas id="c"></canvas>
    <header>
        <nav id="block">
            <ul>
                <li><a href="index.html">Acceuil</a></li>
                <li><a href="price.html">Price</a></li>
                <li><a href="articles.html">Articles</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

    </header>


    <section>
        <div>
            <?php
                $aConnect = array();

                $aConnect['ip'] = "localhost"; // le serveur
                $aConnect['login'] = "root"; // le login
                $aConnect['password'] = ""; // mot de passe
                $aConnect['database'] = "phpsite"; // nom de la base de donnee
                $aConnect['port'] = "3306"; // 

                $oConnect = mysqli_connect($aConnect['ip'], $aConnect['login'], $aConnect['password'], $aConnect['database'], $aConnect['port']);

                if ($oConnect) {
                    // echo "Connexion réussie : version du serveur = ".$oConnect->server_info."<br />"; 
                } else {
                    echo "Erreur lors de la connexion.<br />";
                    exit();
                }

                $s_sqlSelect = "SELECT titre, imageUrl,corps FROM articles WHERE id=" . $_GET['id'];
                // echo "Requête: " . $s_sqlSelect;
                $oResult = @mysqli_query($oConnect, $s_sqlSelect);

                // si la requête a réussie ?
                if ($oResult) {
                    // echo "Requête exécutée.<br />";

                    // parcours de tous les résultats
                    while ($oSqlObject = mysqli_fetch_object($oResult)) {
                        $sTitre = $oSqlObject->titre;
                        $sCorps = $oSqlObject->corps;
                        $sImageUrl = $oSqlObject->imageUrl;

                        echo "<p class='txtart'><strong>" . $sTitre . "</strong><br /><img src='" . $sImageUrl . "' alt='premiere image du site'><br>" . $sCorps . "</p>";
                    }
                } else {
                    echo "Echec de l'exécution de la requête.<br />";
                    echo "Error description: " . mysqli_error($oConnect) . "<br />";
                }


                // Déconnexion. 
                $bClose = mysqli_close($oConnect);

                // echo "Déconnexion : bClose = ".$bClose."<br />"; 
            ?>
        </div>

    </section>
    <form method="post" action="/send.php">
        <p>Pseudo : <input type="text" name="pseudo" value="" /></p>
        <p>
            Votre commentaire :<br />
            <textarea name="commentaire" rows="5" cols="60" maxlength="400"></textarea>
        </p>
        <p><input type="submit" name="submit-price" value="Envoyer le commentaire" /></p>
    </form>
    <footer>

    </footer>
</body>


</html>