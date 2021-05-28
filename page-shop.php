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
        <?php
the_content();
?>
        <nav id="filtrering"></nav>
        <div id="podcast-oversigt">
        </div>
    </main>





    <template>
        <article>
            <img class="podcastpic" src="" alt="">
            <div class="hjerte">
                <i class="fa fa-heart like heart" aria-hidden="true"></i>
            </div>
            <h2></h2>
            <p class="kort_beskrivelse"></p>
        </article>
    </template>

    <script>
        let podcasts = [];





        let categories;





        let filterCategory = "alle";









        const liste = document.querySelector("#podcast-oversigt");






        const skabelon = document.querySelector("template");
        let filterPodcast = "alle";





        // når DOM er loadet kalder den efter funktionen "start"
        document.addEventListener("DOMContentLoaded", start)






        // første funktion der kaldes efter DOM er loaded
        function start() {
            console.log("start");
            getJson();
        }





        const url = "http://dziugas.dk/kea/2semester/tema9/radio_loud/wordpress//wp-json/wp/v2/podcast?per_page=100";





        const catUrl = "http://dziugas.dk/kea/2semester/tema9/radio_loud/wordpress//wp-json/wp/v2/categories";





        async function getJson() {
            console.log("getJson");
            let response = await fetch(url);
            let catresponse = await fetch(catUrl);
            podcasts = await response.json();
            categories = await catresponse.json();
            console.log(categories);
            visPodcasts();
            opretknapper();
        }





        function opretknapper() {





            // ----------------------------------------------------------------- "data-podcast"





            // categories.forEach(cat => {
            // document.querySelector("#filtrering").innerHTML += `<button class="filter active" data-podcast="${cat.id}">${cat.name}</button>`
            //})



            categories.forEach(cat => {
                if (cat.name == "Alle") {
                    document.querySelector("#filtrering").innerHTML += `<button class="filter active" data-podcast="${cat.id}">${cat.name}</button>`
                } else {
                    document.querySelector("#filtrering").innerHTML += `<button class="filter" data-podcast="${cat.id}">${cat.name}</button>`
                }
            })





            addEventListenerToButtons();





        }









        function addEventListenerToButtons() {
            document.querySelectorAll(".like").forEach(like => {
                like.addEventListener("click", hjerteFunktion);

            })

            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.addEventListener("click", filtrering);

            })
        }




        function filtrering() {
            document.querySelectorAll("#filtrering button").forEach(elm => {
                elm.classList.remove("active")
            });
            filterPodcast = this.dataset.podcast;
            console.log(filterPodcast);
            visPodcasts();
        }


        function hjerteFunktion() {
            console.log("this", this);
            this.classList.toggle("heart");
        }





        function visPodcasts() {
            console.log(podcasts);
            document.querySelectorAll(".like").forEach(like => {
                like.addEventListener("click", hjerteFunktion);

            })
            liste.innerHTML = "";
            podcasts.forEach(podcasts => {
                if (filterPodcast == "alle" || podcasts.categories.includes(parseInt(filterPodcast))) {
                    const klon = skabelon.cloneNode(true).content;
                    klon.querySelector("h2").textContent = podcasts.title.rendered;
                    // --------------------------------------------------------------------------------"podcasts"
                    klon.querySelector("img").src = podcasts.billede.guid;
                    klon.querySelector("img").alt = podcasts.billede.post_title;
                    klon.querySelector(".kort_beskrivelse").innerHTML = podcasts.kort_beskrivelse;
                    klon.querySelector(".podcastpic").addEventListener("click", () => {
                        location.href = podcasts.link;
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
