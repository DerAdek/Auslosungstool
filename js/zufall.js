// ANZAHL DER BEWERBER, WIRD ANHAND DER REIHENANZAHL IN DER BEWERBERTALLE DEFINIERT
var anzahl_bewerber = document.getElementById("bewerber-tabelle").rows.length - 1;

window.onload = function () {
  document.getElementById("bewerberzahl").innerHTML = anzahl_bewerber + " Bewerberinnen und Bewerber";
}

window.onbeforeunload = function() {
    return "Dude, are you sure you want to leave? Think of the kittens!";
}

//Nachdem eine Auswahl getroffen wird ändert sich das Dokumenten-Element mit der ID "anweisung". 
function gebeAnzahlFrei(){
  var auswahlfeld = document.getElementById("auswahlFeld");
  var auswahlfeldZahl = auswahlfeld.value;
  var losbutton = document.getElementById("losen");
  if (anzahl_bewerber < auswahlfeldZahl){
    alert("Die von Ihnen ausgegebene Anzahl ist größer als die Anzahl der Bewerberkinder");
  }
  else{
    document.getElementById("anweisung").innerHTML = "Anzahl freie Schulplätze: " + auswahlfeldZahl + " Plätze";
    losbutton.disabled = false;
    console.log(auswahlfeldZahl);
  }
}
// IN DAS ARRAY zahlen WERDEN DIE LOSNUMMERN (ZUFALLSZAHLEN) GEPUSHT   
let zahlen = [];

function losen() {
  var auswahlfeld = document.getElementById("auswahlFeld");
  var auswahlfeldZahl = auswahlfeld.value;
  var liste = document.getElementById("dynamische-liste-schulplatz");
  var anzahl_reihen = document.getElementById("bewerber-tabelle").rows.length - 1;
  var zufallszahl = Math.floor((Math.random() * anzahl_reihen) + 1);
  if (zahlen.includes(zufallszahl) == true || auswahlfeldZahl == "Auswählen") {
    console.log("ID wurde bereits gelost");
  } else {
    zahlen.push(zufallszahl);
    var li = document.createElement("li");
    li.setAttribute('id', zufallszahl);
    li.appendChild(document.createTextNode("Los " + zufallszahl));
    liste.appendChild(li);
    console.log(zahlen);
  }
}

function losen_nachruecker() {
  var liste = document.getElementById("dynamische-liste-nachruecker");
  var anzahl_reihen = document.getElementById("bewerber-tabelle").rows.length - 1;
  var zufallszahl = Math.floor((Math.random() * anzahl_reihen) + 1);
  if (zahlen.includes(zufallszahl) == true) {
    console.log("ID wurde bereits gelost");
  } else {
    zahlen.push(zufallszahl);
    var li = document.createElement("li");
    li.setAttribute('Los', zufallszahl);
    li.appendChild(document.createTextNode("Los " + zufallszahl));
    liste.appendChild(li);
    console.log(zahlen);
  }
}

document.getElementById("losen").addEventListener("click", display);

function display() {
  var nachrueckerButton = document.getElementById("losen-nachruecker");
  var ol = document.getElementById("dynamische-liste-schulplatz");
  var liste = ol.getElementsByTagName("li");
  var listLength = liste.length;
  var angegbene_anzahl = document.getElementById("auswahlFeld");
  var anzahl = angegbene_anzahl.value;
  var datum = new Date();
  if (listLength == anzahl) {
    document.getElementById("losen").style.display = "none";
    document.getElementById("abschlussmeldung-schulplatz").style.display = "block";
    document.getElementById('zeitstempel-auslosung').innerHTML = "Berlin, den " + datum.toLocaleString('de-DE') + " Uhr";
    nachrueckerButton.disabled = false;
    document.getElementById("auswahlFeld").style.display = "none";
  }
}

document.getElementById("losen-nachruecker").addEventListener("click", display2);

function display2() {
  var ol = document.getElementById("dynamische-liste-nachruecker");
  var liste = ol.getElementsByTagName("li");
  var anzahl_reihen = document.getElementById("bewerber-tabelle").rows.length - 1;
  var angegbene_anzahl = document.getElementById("auswahlFeld");
  var anzahl = angegbene_anzahl.value;
  var listLength = liste.length;
  var gesamt = anzahl_reihen - anzahl;
  var datum = new Date();
  var inputField = document.getElementById("namen");
  var bestaetigungsButton = document.getElementById("verschwinde");

  if (gesamt == listLength) {
    document.getElementById("losen-nachruecker").style.display = "none";
    document.getElementById("abschlussmeldung-nachruecker").style.display = "block";
    document.getElementById('zeitstempel-nachruecker').innerHTML = "Berlin, den " + datum.toLocaleString('de-DE') + " Uhr";
    inputField.disabled = false;
    bestaetigungsButton.disabled = false;
  }
}

function myFunction() {
  var teilnehmer_angabe = document.getElementById("namen").value;
  document.getElementById("teilnehmer").innerHTML = teilnehmer_angabe;
  if (teilnehmer_angabe == ""){
    alert("Geben Sie bitte die Namen der Anwesenden ein");
  }
  else{
    alert("Bitte speichern Sie das Ergebnis, bevor Sie die Seite verlassen");
    document.getElementById("emailHelp").style.display = "none";
    document.getElementById("abschluss-text").style.display = "none";
    document.getElementById("abschluss-heading").style.display = "none";
    document.getElementById("danke").style.display = "block";
    document.getElementById("namen").style.display = "none";
    document.getElementById("verschwinde").style.display = "none";
    document.getElementById('tabelle-row').style.display = 'block';
    document.getElementById("next").style.display = 'block';
    window.print()
  }
  
}

