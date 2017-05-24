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
            courses = [new Course('English 101', 'English'), new Course('Calculus 101', 'Math')];
        }
        function Course(name, subject){
            this.name = name;
            this.subject = subject;
        }
    </script>
</head>

<body onload="initialize()">
    <header>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="index.html" class="brand-logo left">Schedule Planner</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#" data-activates="nav-mobile" class="show-on-large button-collapse"><i class="material-icons">menu</i></a></li>
                    <li><a href="classes.php">Classes</a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li>
                        <div class="userView">
                            <div class="background"></div>
                            <a href="#!user"><img class="circle" src="resources\student1.png"></a>
                            <a href="#!name"><span class="white-text name">John Doe</span></a>
                            <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                        </div>
                    </li>
                    <li><a href="CollegePlanner.php">Home<i class="large material-icons">home</i></a></li>
                    <li><a href="CollegePlanner.php">Courses<i class="large material-icons">class</i></a></li>
                    <li><a href="classes.php">Schedule<i class="large material-icons">schedule</i></a></li>
                </ul>
               
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <table class="bordered responsive-table"></table>
        </div>
    </main>
    <footer class="page-footer light-blue darken-1">
        <div class="footer-copyright">
            <div class="container">
                Made by the <a class="blue-text text-lighten-3" href="https://github.com/Alan19/SchedulePlanner"> SchedulePlanner Team</a> with <a class="blue-text text-lighten-3" href="http://materializecss.com">Materialize</a> 
            </div>
        </div>
    </footer>
    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>
</body>

</html>