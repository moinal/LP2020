<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>My sweet MVC</title>
    </head>
    <body>
        <?php Vue::show('standard/entete'); ?>
        <?php echo $A_view['body'] ?>
        <?php Vue::show('standard/pied'); ?>
    </body>
</html>