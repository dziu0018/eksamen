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



    <main id="main" class="site-main">
        <nav id="filtrering"></nav>
        <div id="produkt-oversigt">
        </div>
    </main>





    <template>
        <article>
            <img class="produktpic" src="" alt="">
            <h2></h2>
            <h3></h3>
        </article>
    </template>

    <style>
        /* ------------------------------------------------ */

        #produkt-oversigt {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-gap: 10px;
        }

        /*
        article {
            border: 1px solid #000;
        }
*/

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

        /* ------------------------------------------------ */


        body {
            padding: 0;
            margin: 0;
            background: rgb(255,255,255);
background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 20%, rgba(245,240,236,1) 20%, rgba(245,240,236,1) 40%, rgba(255,255,255,1) 40%, rgba(255,255,255,1) 65%, rgba(247,234,222,1) 65%, rgba(247,234,222,1) 80%, rgba(255,255,255,1) 80%, rgba(255,255,255,1) 100%);
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



        #filtrering {
            padding: 20px;
            text-align: center;
        }

    </style>

    <script>
        let produkter = [];
        let categories;
        let filterCategory = "alle";

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


        const url = "http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-json/wp/v2/product?categories=12";
        //const catUrl = "http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-json/wp/v2/categories/8";

        async function getJson() {
            console.log("getJson");
            let response = await fetch(url);
            //let catresponse = await fetch(catUrl);
            produkter = await response.json();
            //categories = await catresponse.json();
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


        /*function visProdukter() {
            console.log(produkter);

            liste.innerHTML = "";
            produkter.forEach(produkter => {
                if (filterProdukt == "alle" || produkter.categories.includes(parseInt(filterProdukt))) {
                    const klon = skabelon.cloneNode(true).content;
                    klon.querySelector("h2").innerHTML = produkter.title.rendered + " - " + produkter.pris;
                    // --------------------------------------------------------------------------------"produkter"
                    klon.querySelector("img").src = produkter.billede.guid;
                    klon.querySelector("img").alt = produkter.billede.post_title;

                    klon.querySelector(".produktpic").addEventListener("click", () => {
                        location.href = produkter.link;
                    })
                    liste.appendChild(klon);
                }
            })
        }*/



        function visProdukter() {
            console.log(produkter);

            liste.innerHTML = "";
            produkter.forEach(produkter => {
                if (filterProdukt == "alle" || produkter.categories.includes(parseInt(filterProdukt))) {
                    const klon = skabelon.cloneNode(true).content;
                    klon.querySelector("h2").innerHTML = produkter.title.rendered;
                    klon.querySelector("h3").innerHTML = produkter.pris;
                    // --------------------------------------------------------------------------------"produkter"
                    klon.querySelector("img").src = produkter.billede.guid;
                    klon.querySelector("img").alt = produkter.billede.post_title;

                    klon.querySelector(".produktpic").addEventListener("click", () => {
                        location.href = produkter.link;
                    })
                    liste.appendChild(klon);
                }
            })
        }

    </script>


</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>