<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<div id="primary" <?php astra_primary_class(); ?>>

    <?php astra_primary_content_top(); ?>

    <?php astra_content_page_loop(); ?>

    <?php astra_primary_content_bottom(); ?>

    <head>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    </head>

    <main id="main" class="site-main">
        <nav id="filtrering"></nav>
        <div id="produkt-oversigt">
        </div>
    </main>





    <template>

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

        <!--        <article>
            <div>
                <img class="produktpic" src="" alt="">
            </div>
        </article>
        <article>
            <div>
                <img class="produktpic1" src="" alt="">
            </div>
        </article>-->
        <article>
            <h2></h2>
            <h3></h3>
        </article>
    </template>



    <style>
        /* ------------------------------------------------ */

        .ast-separate-container .ast-article-post,
        .ast-separate-container .ast-article-single:not(.ast-related-post) {
            display: none;
        }

        .ast-single-post .entry-title,
        .page-title {
            display: none;
        }

        .single .post-navigation .nav-links {
            display: none;
        }

        #produkt-oversigt {
            margin: 0 auto;

        }

        /*
        article {
            border: 1px solid #000;
        }
*/

        .produktpic {
            width: 400px;
            height: 400px;
            object-fit: cover;
            box-shadow: 0px 0px 6px #8b8b8b;
        }

        .produktpic1 {
            width: 250px;
            height: 250px;
            object-fit: cover;
            box-shadow: 0px 0px 6px #8b8b8b;
        }

        article:nth-child(odd) {}

        @media screen and (min-width:768px) {

            #produkt-oversigt {
                display: grid;
                grid-template-columns: 1fr 1fr;

            }

        }

        /* ------------------------------------------------ */


        body {
            padding: 0;
            margin: 0;
            background: rgb(245, 240, 236);
            background: linear-gradient(180deg, rgba(245, 240, 236, 1) 0%, rgba(245, 240, 236, 1) 50%, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 1) 100%);


        }


        main {
            padding-right: 40px;
            padding-left: 40px;
            width: 100%;

        }

        /*
        #produkt-oversigt {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            grid-gap: 0.8em;
        }
*/


        .produktpic {
            transition: 0.2s ease-out;
            cursor: pointer;
        }

        .produktpic:hover {
            transform: scale(1.02);
        }



        h2 {
            color: #4A4951;
            font-family: 'Quicksand', sans-serif;
            font-size: 2rem;
            font-weight: 500;
        }

        h3 {
            color: #4A4951;
            font-family: 'Quicksand', sans-serif;
            font-size: 1.6rem;
        }



        h1 {
            text-align: center;
            font-family: 'Josefin Sans', sans-serif;
        }



        p {
            color: white;
        }



        article {
            padding: 20px;
        }



        #filtrering {
            padding: 20px;
            text-align: center;
        }





        .billede_slideshow img {
            object-fit: cover;
            height: 50vh;
            width: 100vw;
        }

        .skift_billede {
            display: flex;
            margin-top: 1vw;
            justify-content: space-evenly;
            align-items: center;
        }

        .frem,
        .tilbage {
            color: #567356;
            font-weight: bold;
            border: none;
            cursor: pointer;
            background-color: transparent;
            font-size: 1.7rem;
        }

        .frem {
            right: 1vw;
        }

        .tilbage {
            left: 1vw;
        }

        .frem:hover,
        .tilbage:hover {
            background-color: transparent;
            color: #CA9C2C;
        }

        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #85A69B;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .valgt_dot {
            background-color: #4C6E72;
        }

    </style>

    <script>
        let produkter = [];
        let products;
        let categories;
        let filterCategory = "alle";
        let aktuelProdukt = <?php echo get_the_ID() ?>;

        const liste = document.querySelector("#produkt-oversigt");
        const skabelon = document.querySelector("template");

        let filterProdukt = "alle";


        // når DOM er loadet kalder den efter funktionen "start"
        document.addEventListener("DOMContentLoaded", start)


        // første funktion der kaldes efter DOM er loaded
        function start() {
            console.log("start");
            getJson();
        }


        const url = "http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-json/wp/v2/product/" + aktuelProdukt;
        const catUrl = "http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-json/wp/v2/categories";

        async function getJson() {
            console.log("getJson");
            let response = await fetch(url);
            let catresponse = await fetch(catUrl);
            produkter = await response.json();
            categories = await catresponse.json();
            console.log(categories);
            visProdukter();
            //opretknapper();
        }


        //function opretknapper() {



        // ------------------------------------------------------ DETTE ER USIKKERT!!!!!!
        // categories.forEach(cat => {
        //   if (cat.name == "Alle") {
        //     document.querySelector("#filtrering").innerHTML += `<button class="filter active" data-produkt="${cat.id}">${cat.name}</button>`
        // } else {
        //    document.querySelector("#filtrering").innerHTML += `<button class="filter" data-produkt="${cat.id}">${cat.name}</button>`
        // }
        //  })

        //   addEventListenerToButtons();
        //  }


        // function addEventListenerToButtons() {

        //     document.querySelectorAll("#filtrering button").forEach(elm => {
        //         elm.addEventListener("click", filtrering);
        //     })
        //  }


        //   function filtrering() {
        //     document.querySelectorAll("#filtrering button").forEach(elm => {
        //         elm.classList.remove("active")
        //      });
        //      filterProdukt = this.dataset.produkt;
        //      console.log(filterProdukt);
        //      visProdukter();
        //   }


        function visProdukter() {
            console.log("visProdukter");
            let klon = skabelon.cloneNode(true).content;
            klon.querySelector(".img1").src = produkter.billede.guid;
            klon.querySelector(".img1").alt = produkter.billede.post_title;
            klon.querySelector(".img2").src = produkter.billede1.guid;
            klon.querySelector(".img2").alt = produkter.billede1.post_title;
            klon.querySelector("h2").innerHTML = produkter.title.rendered;
            klon.querySelector("h3").innerHTML = produkter.pris;

            console.log("produkt", produkter.link);
            liste.appendChild(klon);
        }





        // sætter variablen "slideNummer" = 1
        let slideNummer = 1;

        visSlides(slideNummer); // Kalder funktionen "visSlides" og sender slideNummer værdien med (dvs. 1). funktionen visSlide får værdien fra variablen "slideNummer" med sig

        function plusSlides(n) {
            console.log("N:" + n); // n = 1 ved pil frem og -1 ved pil tilbage. Det er angivet i HTML filen.
            visSlides(slideNummer += n); // Kalder funktionen "visSlides" og sender slideNummer værdien med, samt lægger n (1/-1) til.
        }

        // KÃ¸r funktion visSlides - har værdien fra "n" med sig (1/-1)
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
                slides[i].display = "none"; // variable "slides" fÃ¥r tallet 1 og sÃ¦tter display til none
            }
            for (i = 0; i < dots.length; i++) { // SÃ¦tter fÃ¸rst i = 0. Derefter, hvis i(0) < 2 (dot.length) sÃ¥ plus Ã©n til i.
                dots[i].className = dots[i].className.replace(" valgt_dot", ""); // variable "dot" fÃ¥r tallet 1 og erstatter classname "valgt_dot" med ingenting
            }

            slides[slideNummer - 1].display = "block"; // de billeder hvor i = 0 fÃ¥r display block, sÃ¥ledes at man ikke kan se billederne
            dots[slideNummer - 1].className += " valgt_dot"; // Den prik uden i = 0 fÃ¥r tilfÃ¸jet klassen "valgt_dot"
        }

    </script>


</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
