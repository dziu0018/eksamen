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

    <section id="main" class="site-main">
        <!--tom container til alle produkter-->
        <div id="produkt-oversigt"></div>
        <!--div element der har en højde og en loading-animation-->
        <div id="loadingscreen">
            <div id="loader"></div>
            <div id="spacer">
            </div>
        </div>
    </section>

    <!--indholdet af <template> tag er html skabelon for de enkelte produkter-->
    <template>
        <article>
            <img class="produktpic" src="" alt="">
            <h2></h2>
            <h3></h3>
        </article>
    </template>


    <style>
        #produkt-oversigt {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-gap: 10px;
        }

        img {
            width: 250px;
            height: 250px;
            object-fit: cover;
            box-shadow: 0px 0px 6px #8b8b8b;
        }

        article:nth-child(odd) {}

        @media screen and (min-width:768px) {
            #produkt-oversigt {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
                grid-gap: 0.8em;
            }
        }

        body {
            padding: 0;
            margin: 0;
            background: rgb(255, 255, 255);
            background: linear-gradient(180deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 40%, rgba(245, 240, 236, 1) 40%, rgba(245, 240, 236, 1) 50%, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 1) 64%, rgba(247, 234, 222, 1) 64%, rgba(247, 234, 222, 1) 74%, rgba(255, 255, 255, 1) 74%, rgba(255, 255, 255, 1) 74%, rgba(255, 255, 255, 1) 100%, rgba(255, 255, 255, 1) 100%);
        }

        #main {
            padding-right: 40px;
            padding-left: 40px;
            width: 100%;
        }

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
            font-size: 1.2rem;
            font-weight: 500;
            padding-top: 8px;
        }

        h3 {
            color: #4A4951;
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
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

        .kategoriknapper h2 a:hover {
            color: aqua;
        }

        #spacer {
            height: 100vw;
        }

        #loader {
            border: 11px solid #eeeef0;
            border-top: 11px solid #f8534c;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1.5s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        #primary {
            margin: 0;
        }

    </style>


    <script>
        let produkter = [];

        const liste = document.querySelector("#produkt-oversigt");
        const skabelon = document.querySelector("template");

        // WP REST API sti til JSON
        const url = "http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-json/wp/v2/product?per_page=100";

        // når DOM er loadet kalder den efter funktionen "start"
        document.addEventListener("DOMContentLoaded", start)

        // første funktion der kaldes efter DOM er loaded, der herefter kalder på getJson funktionen
        function start() {
            console.log("start");
            getJson();
        }

        // Henter JSON dataen og henfører til visProdukter funktionen
        async function getJson() {
            console.log("getJson");
            let response = await fetch(url);
            produkter = await response.json();
            visProdukter();
        }

        // Viser produkter i liste view
        function visProdukter() {
            console.log(produkter);
            document.querySelector("#loadingscreen").style.display = "none"; // fjerner div med loading-animation og spacer
            liste.innerHTML = ""; // html container tømmes før der fyldes nyt indhold i den
            produkter.forEach(produkter => { // produkter løbes igennem, og hvert produkt indsættes i html
                const klon = skabelon.cloneNode(true).content; // html template klones og fyldes med indhold

                klon.querySelector("img").src = produkter.billede.guid;
                klon.querySelector("img").alt = produkter.billede.post_title;
                klon.querySelector("h2").innerHTML = produkter.title.rendered;
                klon.querySelector("h3").innerHTML = produkter.pris;

                klon.querySelector(".produktpic").addEventListener("click", () => {
                    location.href = produkter.link;

                }) // laver en eventlistener "click" på produktbillederne, som refererer til single.php, altså detaljesiden.
                liste.appendChild(klon); // klonen tilføjes til DOM

            })
        }

    </script>


</div>
<!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
