<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <title>Schedule Planner</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <script>
        function initialize(){

        }
    </script>
</head>

<body onload="initialize()">
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.html" class="brand-logo">Schedule Planner</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="classes.php">Classes</a>
                </li>
            </ul>
            <ul id="nav-mobile" class="side-nav">
                <li><a href="classes.php">Classes<i class="large material-icons">schedule</i></a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    <main>
        <div class="container">
            <table class="bordered responsive-table">
        </div>
    </main>
    <footer class="page-footer light-blue darken-1">
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a> and the <a class="blue-text text-lighten-3" href="https://github.com/Alan19/SchedulePlanner"> SchedulePlanner Team</a>
            </div>
        </div>
    </footer>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>

</html>