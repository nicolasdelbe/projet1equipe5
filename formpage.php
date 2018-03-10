<?php include('./guessBook.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Le Livre d'Or</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
    </head>
    <body >
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" id="form_container">
                    <h2>Le Livre d'Or</h2> 
                    <p> Ecris nous un p'tit quelque chose, ça fait toujours plaisir ! </p><br>
                    <form method="post" action="./formpage.php">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message"> Ton message:</label>
                                <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Ton nom:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email"> Ton Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="btn btn-lg btn-default pull-right" >Envoyer &rarr;</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    if ($error == "") { ?>
                        <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your message successfully!</h3> </div>
                    <?php } else { ?>
                        <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> <?php echo ($error . PHP_EOL) ?> </div>
                    <?php } ?>

                    <?php
                    if (($handle = fopen(__DIR__ . "/bdd.csv", "r")) !== FALSE) {
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            ?> <p style="color: aqua"> <?php
                            echo ($data[1] . ' ' . $data[2] . ' ' . $data[0] . PHP_EOL);
                            echo ("<br >");
                            ?></p><?php
                        }
                        fclose($handle);
                    } else {
                        echo ("BDD Not found !");
                    }
                    ?>

                </div>
            </div>
        </div>

    </body>
</html>