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
            classCart = JSON.parse(Cookies.get('courses'));
            populate();
        }
        function Course(name, subject){
            this.name = name;
            this.subject = subject;
        }
        function populate(){
            for(i = 0; i<7; i++){
                firstClass = $("#schedule-table").append('<tr></tr>');
                for(j = 0; j<firstClass.length;j++){
                    firstClass.append(
                        `<td><div class="card ${classCart[j].color+' darken-1'}">
                            <div class="card-content white-text small">
                                <br><span class="card-title">${classCart[j].name}</span>
                                ${classCart[j].subject}</a>
                            </div>
                        </div></td`
                    );
                }
            }
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
                    <!--<li><a href="CollegePlanner.php">Home<i class="large material-icons">home</i></a></li>
                    <li><a href="CollegePlanner.php">Courses<i class="large material-icons">class</i></a></li>
                    <li><a href="classes.php">Schedule<i class="large material-icons">schedule</i></a></li>-->
                    <li>
                        <div class="card light-green">
                            <div class="card-content white-text">
                                <br><span class="card-title"><i class="material-icons" style="font-size: 70px">home</i></span>
                                <a href="index.html"><h2>Home</h2></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card amber">
                            <div class="card-content white-text">
                                <br><span class="card-title"><i class="material-icons" style="font-size: 70px">class</i></span>
                                <a href="CollegePlanner.php"><h2>Courses</h2></a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="card cyan">
                            <div class="card-content white-text">
                                <br><span class="card-title"><i class="material-icons" style="font-size: 70px">schedule</i></span>
                                <a href="classes.php"><h2>Schedule</h2></a>
                            </div>
                        </div>
                    </li>
                </ul>
               
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <h1 class="blue-text lighten-1 center">Planner</h1>
            <table class="bordered responsive-table" id="schedule-table">
                <tr>
                    <td>Monday</td>
                    <td>Tuesday</td>
                    <td>Wednesday</td>
                    <td>Thursday</td>
                    <td>Friday</td>
                    <td>Saturday</td>
                    <td>Sunday</td>
                </tr>
            </table>
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
    <script src="js/js.cookie-2.1.4.min.js"></script>
</body>

</html>