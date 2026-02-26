<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Paper</title>

        <script><?php echo file_get_contents(__DIR__ . '/../vendor/technomage-liloi/rune-framework/Frontside/Library/Jquery.min.js'); ?></script>
        <script><?php echo file_get_contents(__DIR__ . '/../vendor/technomage-liloi/rune-framework/Frontside/Library/Underscore.min.js'); ?></script>
        <script><?php echo file_get_contents(__DIR__ . '/../vendor/technomage-liloi/rune-framework/Frontside/Library/Backbone.min.js'); ?></script>
        <script><?php echo file_get_contents(__DIR__ . '/../vendor/technomage-liloi/rune-api/Client/API.js'); ?></script>

        <style><?php echo file_get_contents(__DIR__ . '/../vendor/twbs/bootstrap/dist/css/bootstrap.min.css'); ?></style>
        <script><?php echo file_get_contents(__DIR__ . '/../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js'); ?></script>

        <script><?php echo file_get_contents(__DIR__ . '/../vendor/technomage-liloi/stylo/Source/Stylo.js'); ?></script>
        <style><?php echo file_get_contents(__DIR__ . '/Style.css'); ?></style>
        <style><?php echo file_get_contents(__DIR__ . '/API/Style.css'); ?></style>

        <script><?php echo file_get_contents(__DIR__ . '/API/Requests.js'); ?></script>
        <script><?php echo file_get_contents(__DIR__ . '/API/Thesis/Requests.js'); ?></script>

    </head>
    <body>

        <div id="menu">
            <a class="butn" href="javascript:void(0)" onclick="window.location.reload();">Refresh</a>
        </div>

        <div id="page" class="stylo">
            <script>
                Requests.Thesis.show();
            </script>
        </div>
    </body>
</html>