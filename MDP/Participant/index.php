<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <title>Marathon World</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CDN of javascript, nodejs and bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!--External Cascading stylesheet-->
        <link rel="stylesheet" href="css/main.css">
        
        <!--jQuery-->
        <script defer    
        src="https://code.jquery.com/jquery-3.4.1.min.js"    
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="    
        crossorigin="anonymous">
        </script>
        
        <!--Bootstrap JS--> 
        <script defer   
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"    
        crossorigin="anonymous">
        </script>
        <!-- Custom JS -->
<script defer src="js/main.js"></script>
    </head>
    <?php include "nav.inc.php" ?>

    <body>   
        <header> 
            <div class="nav-offset"></div>
            <section class="home__banner-wrapper">
                <div class="banner__video-wrapper">
                    <video autoplay loop muted width="100%">
                        <source src="/MDP/video/Promo video.mp4">
                        <track src="captions_en.vtt" kind="captions" srclang="en" label="english_captions">
                    </video>
                </div>
                <div class="bg-shadow full"></div>
                <div class="banner__content-wrapper">
                    <h1 class="title title-white">Welcome to the Marathon World </h1> <div class="btn btn-green with-arrow">
                        <a href="Reg_Acc.php">Register now </a>
                        </div>
                </div>
            </section>
        </header>
        <section class="home__races-wrapper" >

        <main class="container">
            <!--Section for event 1 -->
            <section id="event1">
                <h2>Events</h2>
                <!--h2 refers to level 2 header size -->
                <div class="row">
                    <!--article just indicates that the section is for an article post/etc.. -->
                    <article class="col-sm"> <!-- this is to indicate columns are small size -->
                        <h3>Standard Chartered Marathon 2020</h3>
                        <figure class="imgcaptions">
                            <img class="article_images img-thumbnail" src="images/1.jpg" 
                                alt="Standard Chartered Marathon Image"/>
                            <!-- </a> -->
                            <!--<figcaption> to caption the images-->
                            <figcaption>Standard Chartered Marathon</figcaption>
                        </figure>
                        <p> The Standard Chartered Singapore Marathon  is back on 01 Dec with an exciting first-ever evening race! 
                            Registration is now open! <a href= Reg_Acc.php >Sign up</a> now!</p>
                    </article>
                    <article class="col-sm">
                        <h3>2020 Sundown Marathon</h3>                   
                        <figure class="imgcaptions">
                            <img class="article_images img-thumbnail" src="images/4.jpg" alt="Osim Sundown Marathon Image"/>
                            <!-- </a> -->
                            <figcaption>2020 Sundown Marathon</figcaption>
                        </figure>
                        <p> Challenge yourself with Running At Sundown! We’ll be kicking off our event in December 2020! <a href= Reg_Acc.php >Sign up</a> and register now! </p>
                    </article>
                </div>
            </section>
            
            <section id="followingevents" aria-label="followingevents">
                
                <div class="row">
                    <article class="col-sm">
                        <h3>Garmin Marathon 2020</h3>
                        <figure class="imgcaptions">
                            <img class="article_images img-thumbnail" src="images/2.jpg" alt="GarminMarathon"/>
                            <!-- </a> -->
                            <figcaption>Garmin Marathon </figcaption>
                        </figure>
                        <p>Just keep running, Garmin Marathon. <a href= Reg_Acc.php >Sign up</a> and register now!</p>
                    </article>
                    <article class="col-sm">
                        
                        <h3>Home Team NS Run 2020</h3>
                        <figure class="imgcaptions">
                           <img class="article_images img-thumbnail" src="images/3.jpg" alt="Home team"/>
                            <!-- </a> -->
                            <figcaption>Home Team NS Run 2020</figcaption>
                        </figure>
                        <p>It's never too late to kickstart your active lifestyle – gear up for the 5km and 10km  marathons and <a href= Reg_Acc.php >sign up</a> now!</p>
                    </article>
                </div>
            </section>
        </main>
            </section>
        <?php 
        include "footer.inc.php"
        ?>
        </body>
</html>
