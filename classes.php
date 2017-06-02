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
            printClasses();
        }
        function Course(name, subject){
            this.name = name;
            this.subject = subject;
        }
        function populate(){
            scheduleTable = document.getElementById('schedule-table');
            for(i=0;i<classCart.length;i++){
                row=scheduleTable.insertRow();
                timeCell = row.insertCell();
                timeCell.innerHTML = classCart[i].time;
                for(j=0;j<7;j++){
                    cell=row.insertCell();
                    if(classCart[i].days[j]){
                        cell.innerHTML = `<td class='cell'><div class="card ${classCart[i].color}">
                            <div class="card-content white-text small">
                               <br><span class="card-title">${classCart[i].name}</span>
                                ${classCart[i].subject}
                           </div>
                       </div></td>`;
                    }
                    else{
                        cell.innerHTML = cell.innerHTML = `<td class='cell'><div class="card grey">
                            <div class="card-content white-text small">
                               <br><span class="card-title">Free Period</span>
                               :)
                           </div>
                       </div></td>`;
                    }
                }
            }
            $('.cards').masonry({
                itemSelector: '.col',
            });
        }
        function printClasses(){
            classCards = $('.class-cards');
            for(i = 0; i<classCart.length; i++){
                classCards.append(
                    `<div class="card ${classCart[i].color+' darken-1'}">
                            <div class="card-content white-text small">
                               <br><span class="card-title">${classCart[i].name}</span>
                                ${classCart[i].subject}</a>
                           </div>
                       </div>`
                );
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
            <div class="row">
            <h1 class="blue-text lighten-1 center">Planner</h1>
            <table class="bordered responsive-table" id="schedule-table">
                <tr>
                    <td></td>
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
            <div class="row">
                <ul class="collapsible" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header"><i class="material-icons">dashboard</i>Your classes</div>
                        <div class="collapsible-body"><span class="class-cards">
                            
                        </span></div>
                    </li>
            </div>
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
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</body>

</html>