<!DOCTYPE html>
<html>
    <head>
        <title>Simulation Success</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--CDN of javascript, nodejs and bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!--External Cascading stylesheet-->
        <link rel="stylesheet" href="css/main.css">
        
        <!--Bootstrap JS--> 
        <script defer   
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"    
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"    
        crossorigin="anonymous">
        </script>
    </head>
    <body>   
      <?php 
      include "nav.inc_logged.php"
      ?>
        
        <header class="jumbotron text-center"> <!-- class="text-center" centralizes the header -->     
            <h1>Pack has been collected!</h1>
        </header>

        <main class="container">
            <div class="row">
            <section class="container">
                <div class="row">
                    <article>
                            <h2>Click <a href='/MDP/Participant/index.php'>here </a> to return to Home page. Happy running and see you there!</h2>
                    </article>
                </div>
                </section>
            </div>

        </main>
        <?php 
        include "footer.inc.php"
        ?>
    </body>
</html>