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
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    </head>

    <section id="produkt-oversigt">
        <button class="back-button">Back</button>
    </section>




    <template>
        <article>
            <div class="row">

                <div class="column">
                    <!--<div class="storebillede">
                       <img class="img1" src="#" alt="">
                   </div>
                    <img class="img2 hide" src="#" width="171" height="171" alt="">-->




                    <!-- The expanding image container -->
                    <div class="container">
                        <!-- Close the image -->
                        <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

                        <!-- Expanded image -->
                        <img id="expandedImg" style="width:100%">

                        <!-- Image text -->
                        <div id="imgtext"></div>
                    </div>

                    <!-- The grid: four columns -->
                    <div class="row1">
                        <div class="column">
                            <img src="#" alt="" onclick="myFunction(this);">
                        </div>
                        <div class="column">
                            <img src="#" alt="" onclick="myFunction(this);">
                        </div>

                    </div>



                </div>

                <div class="column">
                    <h2></h2>
                    <h3></h3>
                    <p></p>
                    <div>
                        <button class="knap1">Buy Now</button>
                    </div>
                    <div>
                        <button class="knap2">Add to Cart</button>
                    </div>
                </div>
            </div>
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

        #primary {
            width: 100%
        }

        .row {
            padding-top: 40px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .img2 {
            margin-top: 20px;
        }

        .buttons {
            display: flex;
        }

        .knap1 {
            width: 180px;
            color: #F8534C;
            background-color: white;
            border: solid 2px #F8534C;
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            font-weight: 700;

        }

        .knap2 {
            margin-top: 1vw;
            width: 180px;
            color: #4a4951;
            background-color: white;
            border: solid 2px #4a4951;
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            font-weight: 700;

        }

        .back-button {
            margin-top: 2vw;
            width: 137px;
            color: #4a4951;
            background-color: white;
            border: solid 2px #4a4951;
            font-family: 'Quicksand', sans-serif;
            font-size: 1rem;
            font-weight: 800;
        }

        @media screen and (min-width:768px) {

            .row {
                display: flex;
            }

            .column {
                flex: 33.33%;
                padding-left: 3vw;
            }

            .storebillede {
                overflow: hidden;
                margin: 0 auto;
                box-shadow: 0px 0px 6px #8b8b8b;

            }

            .storebillede img {
                width: 100%;
                transition: 0.5s all ease-in-out;
            }

            .storebillede:hover img {
                transform: scale(1.5);
                cursor: crosshair;

            }

        }

        /* ------------------------------------------------ */


        body {
            padding: 0;
            margin: 0;
            background: rgb(245, 240, 236);
            background: linear-gradient(180deg, rgba(245, 240, 236, 1) 0%, rgba(245, 240, 236, 1) 50%, rgba(255, 255, 255, 1) 50%, rgba(255, 255, 255, 1) 100%);
        }

        #produkt-oversigt {
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
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
            font-family: 'Quicksand', sans-serif;
        }



        p {
            color: #4A4951;
            font-family: 'Raleway', sans-serif;
            font-size: 0.9em;
        }

        .column img {
            box-shadow: 0px 0px 6px #8b8b8b;
        }

        .hide {
            display: none;
        }




        /*------------------------------------------------------*/

        /* The grid: Four equal columns that floats next to each other */
        .column {
            float: left;
            width: 25%;
            padding: 10px;
        }

        /* Style the images inside the grid */
        .column img {
            opacity: 0.8;
            cursor: pointer;
        }

        .column img:hover {
            opacity: 1;
        }

        /* Clear floats after the columns */
        .row1:after {
            content: "";
            display: table;
            clear: both;
        }

        /* The expanding image container (positioning is needed to position the close button and the text) */
        .container {
            position: relative;
            display: none;
        }

        /* Expanding image text */
        #imgtext {
            position: absolute;
            bottom: 15px;
            left: 15px;
            color: white;
            font-size: 20px;
        }

        /* Closable button inside the image */
        .closebtn {
            position: absolute;
            top: 10px;
            right: 15px;
            color: white;
            font-size: 35px;
            cursor: pointer;
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
            if (produkter.billede1.guid) {
                klon.querySelector(".img2").src = produkter.billede1.guid;
                klon.querySelector(".img2").alt = produkter.billede1.post_title;
                klon.querySelector(".img2").classList.remove("hide");
                myFunction(imgs);
            }
            klon.querySelector("h2").innerHTML = produkter.title.rendered;
            klon.querySelector("h3").innerHTML = produkter.pris;
            klon.querySelector("p").innerHTML = produkter.langbeskrivelse;
            console.log("produkt", produkter.link);
            liste.appendChild(klon);
            document.querySelector(".back-button").addEventListener("click", tilbageTilListe);
        }


        function myFunction(imgs) {
            // Get the expanded image
            var expandImg = document.getElementById("expandedImg");
            // Get the image text
            var imgText = document.getElementById("imgtext");
            // Use the same src in the expanded image as the image being clicked on from the grid
            expandImg.src = imgs.src;
            // Use the value of the alt attribute of the clickable image as text inside the expanded image
            imgText.innerHTML = imgs.alt;
            // Show the container element (hidden with CSS)
            expandImg.parentElement.style.display = "block";
        }

        function tilbageTilListe() {
            history.back();
        }

    </script>


</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
