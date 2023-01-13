<!doctype html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>My sweet MVC</title>
    </head>
    <body>
        <?php View::show('standard/entete'); ?>
        <?php echo $A_view['body'] ?>
        <?php View::show('standard/pied'); ?>
    </body>
</html>