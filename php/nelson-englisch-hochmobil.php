<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--TAB-TITEL-->
    <title>Auslosung Englisch hochmobil NMS</title>
    <!--FAVICON-->
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <!--GESTALTUNG CSS-->
    <link rel="stylesheet" href="../css/kontingent.css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

<?php
//KONFIGURATION DES LOKALEN SERVERS
$servername = "localhost";
$user = "root";
$password = "";

// ERSTELLUNG EINER VERBINDUNG ZUM LOKALEN SERVER

$con = new mysqli($servername, $user, $password);

// ÜBERPRÜFUNG DER VERBINDUNG ZUM LOKALEN SERVER

if ($con->connect_error){
    die("Connection failed: " . $con->connect_error);
}
?>
   <!--HEADER ANFANG-->
   <div class="container">
        <nav class="navbar navbar-light">
            <a class="navbar-brand" href="index.html">
                <img src="../img/LogoNeu.png" width="230" height="60" class="align-top" alt="">
            </a>
        </nav>
    </div>
    <!--HEADER ENDE-->

    <!--ÜBERSCHRIFT ANFANG-->
    <div class="container">
        <div class="row" id="headline-row">
            <div class="col-lg-8" id="text-col">
                <a href="nelson.php" class="previous round">&#8592; Kontingentauswahl</a>
                <h4>Nelson-Mandela-Schule</h4>
                <h1 id="headline-two">Kategorie: Englisch hochmobil</h1>
                 <p class="font-weight-bold" id="bewerberzahl">Liste der Bewerber*innen:</p>
            </div>
        </div>
        <hr>
    </div>
    <!--ÜBERSCHRIFT ANFANG-->

    <!--TABELLE ANFANG-->
    <div class="container">
        <div class="row" id="tabelle-row">
            <div class="col-lg-12">
                    <table class="table table-bordered table-md table-hover" id="bewerber-tabelle">
                    <thead class="thead-dark">
                            <tr>
                                <th scope="col">Los</th>
                                <th scope="col">ID</th>
                                <th scope="col">Vorname</th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>
                        <!--VERBINDUNG ZUR DATENBANK SCHUELER-->
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "Bewerberkinder2020");
                        if ($con -> connect_error){
                        die("Verbindeung fehlgeschlagen: ". $con-> connect_error);
                        }
                        /*VERBINDUNG ZUR TABELLE. AUSWAHL DER ID UND DER VOR- UND NACHNAMEN DER BEWERBER*/
                        $sql = "SELECT Losnummer, ID, Vorname, Name from EnglischHochmobil";
                        $result = $con-> query($sql);
                            if($result-> num_rows > 0 ){
                                while ($row = $result-> fetch_assoc()){
                                    echo "<tr><td>". $row["Losnummer"]. "</td><td>". $row["ID"]. "</td><td>". $row["Vorname"]."</td><td>". $row["Name"];
                                    }
                                    echo "</table>";
                                    }
                                    else{
                                        echo "0 result";
                                    }
                                    $con-> close();
                                    ?>
                    </table> 
                </div>                
            </div>
            <hr>
        </div>
    </div>
        <!--TABELLE ENDE-->
    
    <!--PLATZAUSLOSUNG ANFANG-->   
    <div class="container" id="auslosung-container">
        <div class="row" id="auslosung-row">
            <div class="col-lg-12" id="col-sieger">
                    <h2>Platzauslosung</h2>
                    <div class="form-group">
                        <label for="auswahlFeld" id="anweisung">Bitte wählen Sie die Anzahl der freien Plätze aus</label>
                        <select class="form-control" id="auswahlFeld" onchange="gebeAnzahlFrei()">
                                    <option selected>Auswählen</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                        </select>
                    </div>
                    <!--BUTTON MIT ZUFALLSFUNKTION.-->                                
                    <button onclick="losen()" id="losen" class="btn btn-dark btn-sm" style="width:100px;height:40px;" disabled>Losen</button>    
                    <div class="liste-schulplatz">
                        <ol id="dynamische-liste-schulplatz"></ol>
                    </div>
                    <div id="abschlussmeldung-schulplatz">
                        <strong>Platzauslosung erfolgreich beendet. <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="#2E7D32" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                        </svg></strong>
                        <p id="zeitstempel-auslosung"></p>
                    </div>
            </div>
        </div>
        <hr>
    </div>
    <!--PLATZAUSLOSUNG ENDE-->   

    <!--NACHRÜCKERAUSLOSUNG ANFANG-->   
    <div class="container" id="nachruecker-container">
        <div class="row" id="nachruecker-row">
            <div class="col-lg-12" id="nachruecker-col">
                <div id="show">
                    <h2>Nachrückerauslosung</h2>
                    <!--BUTTON MIT ZUFALLSFUNKTION.-->                
                    <button onclick="losen_nachruecker()" id="losen-nachruecker" class="btn btn-dark btn-sm" style="width:100px;height:40px;" disabled>Losen</button>
                </div>
                <div class="liste-nachruecker">
                    <ol id="dynamische-liste-nachruecker"></ol>
                </div>
                <div id="abschlussmeldung-nachruecker">
                    <strong>Nachrückerauslosung erfolgreich beendet. <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-check-circle" fill="#2E7D32" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                    </svg></strong>
                    <p id="zeitstempel-nachruecker"></p>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <!--NACHRÜCKERAUSLOSUNG ENDE--> 

    <!--ABSCHLUSS TEIL ANFANG-->   
    <div class="container">
        <div class="row">
            <div class="col-lg-12 abschluss-col">
                <h2 id="abschluss-heading">Abschluss</h2>
                <p id="abschluss-text">Zum Abschluss geben Sie bitte noch die Namen der Anwesenden in 
                    das untere Textfeld ein und bestätigen Ihre Eingabe durch drücken der Schaltfläche "Bestätigen".</p>
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" id="namen" placeholder="Herr Zufall, Frau Random, ..." disabled>
                        <small id="emailHelp" class="form-text text-muted">Trennen Sie die Namen durch Komma.</small>
                    </div>
                    <button type="button" id="verschwinde" onclick="myFunction()" class="btn btn-dark btn-sm" disabled
                    style="width:100px;height:40px;">Bestätigen</button>
                </form>
                <div class="danke-box">
                    <h3 id="danke">Anwesend beim Auslosungsverfahren:</h3>
                    <h5 id="teilnehmer"></h5>
                    <div id="next">
                        <p>Zur nächsten Kategorie</p>
                        <a href="nelson-deutsch-dauerhaft.php" class="previous round">Deutsch dauerhaft &#8594; </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--ABSCHLUSS TEIL ENDE-->   
            
    <!--JAVASCRIPT DATEI FÜR DIE FUNKTION DER ZUFALLSZAHL-->
    <script src="../js/zufall.js"></script>
    <!-- BOOTSTRAP -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    
</body>
</html>
