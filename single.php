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
                                    <div id="loadingscreen">
                                        <div id="loader"></div>
                                        <div id="spacer">
                                        </div>
                                    </div>
                                </section>




                                <template>
                                    <article>
                                        <div class="row">
                                            <div class="column">
                                                <div class="storebillede">
                                                    <img class="img1" src="#" alt="">
                                                </div>
                                                <img class="img2 hide" src="#" width="171" height="171" alt="" onclick="myFunction();">
                                                <img class="img3 hide" src="#" width="171" height="171" alt="" onclick="myFunction1();">
                                            </div>

                                            <div class="column">
                                                <h2 class="beskrivelse"></h2>
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
                                    <article class="udvalgtesektion">

                                        <h2 class="udvalgte">Udvalgte produkter</h2>
                                        <div class="udvalgtebilleder">
                                            <a href="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/product/w153-ile-poppy-red/">
                                                <img class="img4" src="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-content/uploads/2021/06/w153_highres_cutout_25_1024x1024.jpg" alt="red-lamp">
                                            </a>
                                            <a href="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/product/engelbrecht-kevi-2070-oak/">
                                                <img class="img4" src="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-content/uploads/2021/05/KEVI-2070-oak-veneer-1_1024x1024.jpeg" alt="engelbrecht-kevi-oak">
                                            </a>
                                            <a href="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/product/no24-tea-cozy-blue-multi-striped/">
                                                <img class="img4" src="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-content/uploads/2021/05/200321no24tehaetter02_1024x1024.jpeg" alt="no24-tea-cozy">
                                            </a>
                                            <a href="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/product/kyoto-tango-for-hay-bracelet-no-03/">
                                                <img class="img4" src="http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-content/uploads/2021/05/541052_KyotoTangoforHAYBraceletno3_590x.jpg" alt="kyoto-tango-for-hay-bracelet">
                                            </a>
                                        </div>
                                    </article>
                                </template>




                                <style>
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

                                    .img1 {
                                        width: 400px;
                                        height: 300px;
                                        object-fit: cover;
                                    }

                                    .img2,
                                    .img3 {
                                        margin-top: 20px;
                                        cursor: pointer;
                                        width: 100px;
                                        height: 100px;
                                        object-fit: cover;
                                    }

                                    .img3 {
                                        margin-left: 10px;
                                    }

                                    .img4 {
                                        width: 78px;
                                        height: 78px;
                                        box-shadow: 0px 0px 6px #8b8b8b;
                                        object-fit: cover;
                                    }

                                    .udvalgte {
                                        margin-top: 5vw;
                                    }

                                    .udvalgtebilleder {
                                        margin-top: 4vw;
                                    }

                                    .udvalgtesektion {
                                        padding-left: 20px;
                                        padding-right: 20px;
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
                                        text-transform: lowercase;
                                    }

                                    .knap2 {
                                        margin-top: 1vw;
                                        width: 180px;
                                        color: #4a4951;
                                        background-color: white;
                                        border: solid 2px #4a4951;
                                        font-family: 'Quicksand', sans-serif;
                                        font-size: 1rem;
                                        font-weight: 600;
                                        text-transform: lowercase;
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
                                        margin-left: 20px;
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
                                        }
                                        .img1 {
                                            width: 400px;
                                            height: 500px;
                                        }
                                        .img2,
                                        .img3 {
                                            width: 200px;
                                            height: 200px;
                                        }
                                        .img4 {
                                            width: 150px;
                                            height: 150px;
                                            margin-left: 10px;
                                        }
                                        .udvalgtebilleder {
                                            margin-top: 1vw;
                                        }
                                    }

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

                                    .beskrivelse {
                                        margin-top: 20px;
                                    }

                                    h2 {
                                        color: #4A4951;
                                        font-family: 'Quicksand', sans-serif;
                                        font-size: 1.8em;
                                        font-weight: 500;
                                        margin-top: 0.5em;
                                        text-transform: lowercase;
                                    }

                                    h3 {
                                        color: #4A4951;
                                        font-family: 'Quicksand', sans-serif;
                                        font-size: 1.6rem;
                                        text-transform: lowercase;
                                    }

                                    h1 {
                                        text-align: center;
                                        font-family: 'Quicksand', sans-serif;
                                    }

                                    p {
                                        color: #4A4951;
                                        font-family: 'Raleway', sans-serif;
                                        font-size: 1.1em;
                                        margin-top: 20px;
                                    }

                                    .column img {
                                        box-shadow: 0px 0px 6px #8b8b8b;
                                    }

                                    .hide {
                                        display: none;
                                    }

                                    .ast-separate-container #primary,
                                    .ast-separate-container.ast-left-sidebar #primary,
                                    .ast-separate-container.ast-right-sidebar #primary {
                                        margin: 0em;
                                    }

                                    #spacer {
                                        height: 68vw;
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
                                  /*  const catUrl = "http://dziugas.dk/kea/eksamen/gruppe19/wordpress/wp-json/wp/v2/categories";*/

                                    async function getJson() {
                                        console.log("getJson");
                                        let response = await fetch(url);
                                        let catresponse = await fetch(catUrl);
                                        produkter = await response.json();
                                        categories = await catresponse.json();
                                        console.log(categories);
                                        visProdukter();

                                    }




                                    function visProdukter() {
                                        console.log("visProdukter");
                                        document.querySelector("#loadingscreen").style.display = "none";
                                        let klon = skabelon.cloneNode(true).content;
                                        klon.querySelector(".img1").src = produkter.billede.guid;
                                        klon.querySelector(".img1").alt = produkter.billede.post_title;
                                        if (produkter.billede1.guid) {
                                            klon.querySelector(".img2").src = produkter.billede1.guid;
                                            klon.querySelector(".img2").alt = produkter.billede1.post_title;
                                            klon.querySelector(".img2").classList.remove("hide");
                                            klon.querySelector(".img3").src = produkter.billede.guid;
                                            klon.querySelector(".img3").alt = produkter.billede.post_title;
                                            klon.querySelector(".img3").classList.remove("hide");
                                        }
                                        klon.querySelector("h2").innerHTML = produkter.title.rendered;
                                        klon.querySelector("h3").innerHTML = produkter.pris;
                                        klon.querySelector("p").innerHTML = produkter.langbeskrivelse;
                                        console.log("produkt", produkter.link);
                                        liste.appendChild(klon);
                                        document.querySelector(".back-button").addEventListener("click", tilbageTilListe);
                                    }

                                    function myFunction() {

                                        document.querySelector(".img1").src = produkter.billede1.guid;
                                        document.querySelector(".img1").alt = produkter.billede1.post_title;
                                    }

                                    function myFunction1() {
                                        document.querySelector(".img1").src = produkter.billede.guid;
                                        document.querySelector(".img1").alt = produkter.billede.post_title;
                                    }


                                    function tilbageTilListe() {
                                        history.back();
                                    }

                                </script>


                </div>
                <!-- #primary -->

                <?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

                    <?php get_sidebar(); ?>

                        <?php endif ?>

                            <?php get_footer(); ?>
