<!DOCTYPE html>
<html>
<head>
    <title>D3.sh - Free Shorter</title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
    <meta charset="utf-8" >
    <link rel='stylesheet' href='assets/css/default.css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class='banner'>
        <div class='wrap'>
            <div class='banner-text'>
                <h1>D3.sh - Free Shorter</h1>
                <h2>Faça as suas URL administrável.</h2>
                <div class='form-info'>
                    <form method='post' action=''>
                        <input type='text' class='text' placeholder='http://' name='shorter_new' required>
                        <input type='submit' value='Encurtar !'>
                    </form>
                </div>
            </div>
        </div>
        <div class='clear'> </div>

        {if $exec eq true}
        <center>
            <br><br>
            <h1 class='h2-preview'>URL Encurtada</h1>
            <a href='{$descShort->getShortBaseUrl()}{$descShort->getShortUrlCode()}' class='url-preview'>{$descShort->getShortBaseUrl()}{$descShort->getShortUrlCode()}</a>
        </center>
        {/if}

    </div>
</body>
</html> 