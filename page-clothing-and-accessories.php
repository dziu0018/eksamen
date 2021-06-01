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
        </article>
    </template>

    <style>
        /* ------------------------------------------------ */

        #produkt-oversigt {
            max-width: 1000px;
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
            max-width: 100%;
        }

        article:nth-child(odd) {}

        @media screen and (min-width:768px) {

            #produkt-oversigt {
                grid-template-columns: repeat(5, 1fr);
                grid-auto-flow: dense;

            }

            article:nth-child(odd) {
                grid-column: span 4;
            }


            article:nth-child(4n -1) {

                grid-column: 2 / span 4;
            }

            article:nth-child(4) {}

        }

        /* ------------------------------------------------ */


        body {
            padding: 0;
            margin: 0;
            background: rgb(255, 144, 132);
            background: linear-gradient(180deg, rgba(255, 144, 132, 1) 34%, rgba(237, 76, 95, 1) 100%);
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
            width: 100%;
            transition: 0.2s ease-out;
            cursor: pointer;
        }

        .produktpic:hover {
            transform: scale(1.02);
        }



        h2 {
            color: black;
            font-family: 'Josefin Sans', sans-serif;
            font-size: 1.5rem;
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


        .menu-toggle,
        button,
        .ast-button,
        .ast-custom-button,
        .button,
        input#submit,
        input[type="button"],
        input[type="submit"],
        input[type="reset"] {
            padding-left: 10px;
            padding-right: 10px;
            background-color: #DB083A;



        }



        #filtrering {
            padding: 20px;
            text-align: center;
        }



        button {
            font-size: 1.6em;
            margin: 10px;
            color: white;
            text-transform: uppercase;
            transition: 0.2s linear;
            background-color: rgba(51, 51, 51, 0);
            border-radius: 6px;
            padding: 0.8em 0.2em 0.8em 0.2em;
            font-family: 'Josefin Sans', sans-serif;
        }



        button:hover {
            transform: scale(1.1);
            color: #DB083A;
            background-color: rgba(51, 51, 51, 0);
            cursor: pointer;
        }



        button.active {
            color: #DB083A;
        }



        button:focus {
            border-color: rgba(51, 51, 51, 0);
            background-color: rgba(51, 51, 51, 0);
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


        const url = "http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-json/wp/v2/product?categories=3";
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
            let temp = document.querySelector("template");
            let container = document.querySelector("#main");
            produkter.forEach(produkter => {
                let klon = temp.cloneNode(true).content;
                klon.querySelector("h2").innerHTML = produkter.title.rendered + " - " + produkter.pris;
                klon.querySelector("img").src = produkter.billede.guid;
                klon.querySelector("img").alt = produkter.billede.post_title;
                klon.querySelector(".produktpic").addEventListener("click", () => {
                    location.href = produkter.link;
                })
                liste.appendChild(klon);
            })
        }

    </script>


</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
