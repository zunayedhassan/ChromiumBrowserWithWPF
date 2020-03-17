<?php
session_start();

$pageTitle = "Using Chromium Browser with WPF";

function GetBootstrapColumn($column) {
    return "col-xs-$column col-sm-$column col-md-$column col-lg-$column col-xl-$column";
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?= $pageTitle ?></title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

        <style type="text/css">
            #Receiver {
                min-height: 256px;
                max-height: 256px;
                overflow-y: auto;
                background: aliceblue;
                display: block;
                border-radius: 0.5em;
                border: 1px solid cornflowerblue;
                font-family: "Consolas", monospace;
                padding: 1em;
            }

            section {
                margin-bottom: 1em;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4"><?= $pageTitle ?></h1>
            </div>
        </div>

        <main class="container">
            <section>
                <div class="row">
                    <input id="Input" type="text" class="form-control <?= GetBootstrapColumn(9) ?>" placeholder="Write something here..." />

                    <div class="<?= GetBootstrapColumn(3) ?>">
                        <button id="SendDataToBrowserButton" class="btn btn-primary" title="Send data to app">Send</button>
                    </div>
                </div>
            </section>

            <section>
                <header class="row">
                    <h2 class="<?= GetBootstrapColumn(12) ?>">Message from App</h2>
                </header>

                <div class="row">
                    <pre class="<?= GetBootstrapColumn(12) ?>">
                        <code id="Receiver" title="Get data from app"></code>
                    </pre>
                </div>
            </section>
        </main>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <script type="text/javascript">
            let input                       = document.querySelector("#Input");
            let SendDataToBrowserButton   = document.querySelector("#SendDataToBrowserButton");

            SendDataToBrowserButton.addEventListener("click", event => {
                let message = input.value;

                if (message.length === 0) {
                    message = "[!] WARNING: User didn't write anything yet";
                }

                console.log(message);
            });
        </script>
    </body>
</html>
