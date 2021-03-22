<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Tab-Titel-->
    <title>Auslosung Wangari-Maathai-Schule</title>
    <!--Favicon-->
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
     <!--Style CSS-->
    <link rel="stylesheet" href="../css/index.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
    <!--HEADER ANFANG-->
    <div class="container">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="index.html">
                <img src="../img/LogoNeu.png" width="30" height="30" class="align-top" alt="">
             </a>
        </nav>
    </div>
    <!--HEADER ENDE-->

    <!--HAUPTFENSTER ANFANG-->
    <div class="container" id="headline-container">
        <div class="row" id="headline-row">
            <!--ÜBERSCHRIFT ANFANG-->
            <div class="col-lg-9" id="text-col">
                <a href="index.html" class="previous round">&#8249; Startseite</a>
                <h1>Wangari-Maathai-Schule<br>Auslosung</h1>
            </div>
            <!--ÜBERSCHRIFT ENDE-->
        </div>
        <hr/>

        <div class="row" id="main-row">
            <!--KONTINGENTAUSWAHL ANFANG-->
            <div class="col-lg-6" id="kategorie">
                <h3 class="font-weight-lighter">Schritt 2</h3>
                <p>Bitte wählen Sie das gewünschte Kontingent aus</p>        
                <div class="kontingent-auswahl">
                    <form action="wangari-deutsch-hochmobil.php">
                        <button  id="button1" type="submit" class="btn btn-primary btn-lg btn-block">Deutsch hochmobil</button>
                    </form>
                    <form action="wangari-englisch-hochmobil.php">
                        <button id="button2" type="submit" class="btn btn-primary btn-lg btn-block">Englisch hochmobil</button>
                    </form>
                    <form action="wangari-deutsch-dauerhaft.php">
                        <button id="button3" type="submit" class="btn btn-primary btn-lg btn-block">Deutsch dauerhaft</button>
                    </form>
                    <form action="wangari-englisch-dauerhaft.php">
                        <button id="button4" type="submit" class="btn btn-primary btn-lg btn-block">Englisch dauerhaft</button>
                    </form>
                </div>
                <!--KONTINGENTAUSWAHL ENDE-->
            </div>
        </div>
    </div>
    <!--HAUPTFENSTER ENDE-->
        
    <!--BOOTSTRAP JS-->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>