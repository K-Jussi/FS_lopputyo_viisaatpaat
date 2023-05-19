var linkki = document.getElementById("yhteydenotto-linkki");

linkki.addEventListener("mouseover", suurennaLinkki);
linkki.addEventListener("mouseout", palautaLinkki);

function suurennaLinkki() {
  linkki.style.fontSize = "20px";
}

function palautaLinkki() {
  linkki.style.fontSize = "18px";
}
