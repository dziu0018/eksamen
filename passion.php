<!DOCTYPE html>
<html lang="da">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Philosopher">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quattrocento">
	<title>mamaFlora</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="single.css">

	<link rel="apple-touch-icon" sizes="180x180" href="favicon_package_v0/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="favicon_package_v0/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="favicon_package_v0/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>

<body>

	<header>
		<div class="topnav">
			<a href="index.html" class="logo_navn_menu"><img class="logo_menu" src="img/hvid_2.svg" alt="logo"></a>
			<p id="mamaflora_menu">MamaFlora</p>
			<nav id="myLinks" class="active">
				<!-- Navigation links (hidden by default) -->
				<a href="index.html">Forside</a>
				<div></div>
				<a href="multiview.html">Planter</a>
				<div></div>
				<a href="guide.html">Guide</a>
				<div></div>
				<a href="om.html">Om os</a>
			</nav>
			<!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
			<a class="icon">
				<div id="burgercontainer">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</a>
		</div>

	</header>

	<main>
		<button class="tilbageknap">
			Tilbage
		</button>

		<article>

			<div class="row">
				<div class="column" id="slideshow">
					<div class="billede_slideshow">
						<img class="img1" src="#" alt="">
					</div>
					<div class="billede_slideshow">
						<img class="img2" src="#" alt="">
					</div>
					<div class="billede_slideshow">
						<img class="img3" src="#" alt="">
					</div>
					<div class="skift_billede">
						<button class="tilbage" onclick="plusSlides(-1)">❮</button>
						<div>
							<span class="dot"></span>
							<span class="dot"></span>
							<span class="dot"></span>
						</div>
						<button class="frem" onclick="plusSlides(1)">❯</button>
					</div>
				</div>


				<div class="column">
					<h1 class="navn"></h1>
					<h2 class="latin"></h2>
					<div class="sol">
						<img src="#" alt="">
					</div>
					<div class="vand">
						<img src="#" alt="">
					</div>
				</div>
			</div>
			<div class="divider div-transparent div-dot"></div>

			<div class="pleje_egenskaber">
				<div>
					<h2>PLEJE</h2>
					<p id="pleje"></p>
				</div>
				<div>
					<h2>EGENSKABER</h2>
					<p id="egenskaber"></p>
				</div>
			</div>
			<a class="koebknap" href="" target="_blank">
				<h2>Køb planten her</h2>
			</a>

		</article>


	</main>
	<footer>
		<p>
			© Some rights reserved 2021
		</p>
	</footer>
	<script src="javascript.js"></script>
	<script src="single.js"></script>
</body>

<script>
    document.addEventListener("DOMContentLoaded", () => //tjekker inden om DOM er loaded
    {

        const imgURL = "https://plante-2af1.restdb.io/media/";
        const url = "https://plante-2af1.restdb.io/rest/planter/";

        const options = {
            headers: {
                'x-apikey': "602e76225ad3610fb5bb6339"
            }
        }
        const urlPara = new URLSearchParams(window.location.search);
        const id = urlPara.get("id");

        console.log(id);

        async function hentData() {
            console.log("data");

            const respons = await fetch(url + `${id}`, options);
            plante = await respons.json();

            console.log("Planten", plante);
            visPlanten(plante);
        }

        hentData();

        function visPlanten() {
            console.log("visPlanten");
            document.querySelector("#pleje").innerHTML = plante.pleje;

            document.querySelector("#egenskaber").innerHTML = plante.Egenskaber;

            document.querySelector(".sol img").src = imgURL + plante.sol_ikon;

            document.querySelector(".vand img").src = imgURL + plante.vand_ikon;

            document.querySelector(".navn").textContent = plante.navn;
            document.querySelector(".latin").textContent = plante.latin;

            // IndsÃ¦tter billeder fra databasen til de t img-tags
            document.querySelector(".img1").src = imgURL + plante.pic;
            document.querySelector(".img2").src = imgURL + plante.pic_hover;
            document.querySelector(".img3").src = imgURL + plante.pic_home;

            document.querySelector(".koebknap").href = plante.koebslink;
            document.querySelector(".tilbageknap").addEventListener("click", tilbageTilMenu);
        }

        function tilbageTilMenu() {
            console.log("tilbageTilMenu")
            history.back();
        }

    })

// sÃ¦tter variablen "slideNummer" = 1
let slideNummer = 1;

visSlides(slideNummer); // Kalder funktionen "visSlides" og sender slideNummer vÃ¦rdien med (dvs. 1). funktionen visSlide fÃ¥r vÃ¦rdien fra variablen "slideNummer" med sig

function plusSlides(n) {
    console.log("N:" + n); // n = 1 ved pil frem og -1 ved pil tilbage. Det er angivet i HTML filen.
    visSlides(slideNummer += n); // Kalder funktionen "visSlides" og sender slideNummer vÃ¦rdien med, samt lÃ¦gger n (1/-1) til.
}

// KÃ¸r funktion visSlides - har vÃ¦rdien fra "n" med sig (1/-1)
function visSlides(n) {

    let i; // Opretter variablen i sÃ¥ den kan tÃ¦lles pÃ¥
    let slides = document.getElementsByClassName("billede_slideshow"); // Opretter variablen slides = classerne med "billede_slideshow"
    let dots = document.getElementsByClassName("dot"); // Opretter varibalen dots = classerne med "dot"

    // To if-sÃ¦tninger til at styre hvilket nummer af ".billede_slideshow" der skal vises.
    // Hvis n (her 4) > 3 sÃ¥ sÃ¦t slideNummer = 1, sÃ¥ledes at billede 1 bliver vist (se consollen)
    if (n > slides.length) {
        console.log("N = " + n); // N = 4 da n bliver 3(slideNummer) + 1(n) = 4
        console.log("Hvor mange img'er der = " + slides.length); // Der er 2 diver med classen billede_slideshow

        slideNummer = 1 // SÃ¦t slideNummer = 1 dvs vis billede 1
    }

    // Hvis n (her 0) < 1 sÃ¥ sÃ¦t slideNummer = 3 sÃ¥ledes at billede 3 bliver vist
    if (n < 1) {
        console.log("N = " + n); // N = 0 da n bliver 1 - 1 = 0
        console.log("Hvor mange img'er der = " + slides.length); // Der er 3 diver med classen billede_slideshow


        slideNummer = slides.length // SÃ¦t slideNummer = 3 dvs vis billede 3
    }
    // For = loop igennem kode et antal gange
    for (i = 0; i < slides.length; i++) { // SÃ¦tter fÃ¸rst i = 0. Derefter, hvis i(0) < 2(slide.length) sÃ¥ plus Ã©n til i.
        slides[i].style.display = "none"; // variable "slides" fÃ¥r tallet 1 og sÃ¦tter display til none
    }
    for (i = 0; i < dots.length; i++) { // SÃ¦tter fÃ¸rst i = 0. Derefter, hvis i(0) < 2 (dot.length) sÃ¥ plus Ã©n til i.
        dots[i].className = dots[i].className.replace(" valgt_dot", ""); // variable "dot" fÃ¥r tallet 1 og erstatter classname "valgt_dot" med ingenting
    }

    slides[slideNummer - 1].style.display = "block"; // de billeder hvor i = 0 fÃ¥r display block, sÃ¥ledes at man ikke kan se billederne
    dots[slideNummer - 1].className += " valgt_dot"; // Den prik uden i = 0 fÃ¥r tilfÃ¸jet klassen "valgt_dot"
}

    </script>

</html>
