<?php
isset($_GET['source']) and die(show_source(__FILE__, true));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cowsay</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>

<body>
    <section class="section">
        <div class="container">
            <div class="column is-6 is-offset-3 has-text-centered">
                <div class="box">
                    <h1 class="title">Cowsay</h1>
                    <form method="POST">
                        <div class="field">
                            <div class="control">
                                <input class="input" type="text" name="name" placeholder="example.com" id="hostname" value="<?= $_POST['name'] ?? '' ?>">
                            </div>
                        </div>
                        <button class="button is-block is-info is-fullwidth">
                            Cowsay!
                        </button>
                    </form>
                    <br>
                    <?php if (isset($_POST['name'])) : ?>
                        <section class="has-text-left">
                            <p>Cowsay:</p>
                            <pre><?= shell_exec("cowsay '" . $_POST['name'] . "';") ?></pre>
                        </section>
                    <?php endif; ?>
                    <hr>
                    <a id="magic">Magic</a> | <a href="./?source">Source Code</a>
                </div>
                <article class="message is-link is-hidden is-size-4" id="hint">
                    <div class="message-body is-family-monospace">
                        cowsay '<span class="has-text-danger" id="command"></span>';
                    </div>
                </article>
            </div>
        </div>
    </section>

    <script>
        magic.onclick = () => hint.classList.toggle("is-hidden");
        window.onload = hostname.oninput = () => command.textContent = hostname.value;
    </script>
</body>

</html>