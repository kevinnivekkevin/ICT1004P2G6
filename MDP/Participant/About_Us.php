<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
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
    <body>   
      <?php 
      include "nav.inc.php"
      ?>
        <header class="jumbotron text-center"> <!-- class="text-center" centralizes the header -->     
            <h1>About AiPao Marathon World</h1>
            <h2>A place where we all run from our problems!</h2>
        </header>

        <main class="container">
            
            <section id="who" class="container">
                
                <!--Section for Who are we? -->
                <h2>Who are we?</h2>
                <div class="row">
                    <article class="col-sm">
                    <!--article just indicates that the section is for an article post/etc.. -->
                            <p> We are a group that has members who loves running and some who simply just hate it. We decided to come together
                            to build a community that everyone fits into simply by joining in events.</p>
                    </article>
                </div>
            </section>
            
            <!--Section for cats -->
            <section id="About Us" class="container">
                
              <h2>About Us?</h2>
                <div class="row">
                    <article class="col-sm">
                    <!--article just indicates that the section is for an article post/etc.. -->
                        <p> At AiPao, we believe that through marathons, non running lovers or running lovers can be brought together as 1 big 
                            community to conquer any amount of distance put between them and the finish line. Run, jog or walk, as long as you
                            cross the finish line, you already are a better version of yourself. </p>
                    </article>
                </div>
            </section>
        </main>
        <?php 
        include "footer.inc.php"
        ?>
    </body>
</html>