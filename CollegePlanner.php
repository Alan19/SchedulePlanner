<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- child -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
        <title>Schedule Planner</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <link href="extras\noUiSlider\nouislider.css" rel="stylesheet">
        <style></style>
        <script>
            classCart = [];
            function trueOrFalse(){
                days = [];
                for(i = 0; i < 7; i++){
                    if(Math.floor(Math.random()*2)==0){
                        days.push(false);
                    }
                    else{
                        days.push(true);
                    }
                }
                return days;
            }
            
            function initialize() {
                $(document).ready(function() {
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('#modal1').modal();
                    $('select').material_select();
                    $('.carousel').carousel();
                    if(Cookies.get('courses') == null || Cookies.get('courses') == ''){
                        Cookies.set('courses', "");
                    }
                    else{
                        classCart = JSON.parse(Cookies.get('courses'));
                    }
                      var slider = document.getElementById('hourSlider');
                        noUiSlider.create(slider, {
                            start: [8, 9],
                            connect: true,
                            step: 1,
                            range: {
                                'min': 0,
                                'max': 24
                            },
                            format: wNumb({
                                decimals: 0
                            })
                        });
                });            
            }
            
            //Include # in dropdownID in the parameter
            function changeDropdownText(dropdownID, text) {
                originalWidth = $("#" + dropdownID).width();
                $("#" + dropdownID).html(text);
                $("#" + dropdownID).width(originalWidth);
            }
            
            function changeCarousel() {
                schoolIndex = $('#schoolPick').val() - 1;
                $('.carousel').carousel('set', schoolIndex);
            
            }
            
            function populate(college) {
                // console.log("hello");
                $("#dropdown3").html("");
                if (college == "Hunter College") {
                    // console.log(currentCollege);
                    for (i = 0; i < hunterClasses.length; i++) {
                        // console.log(`<li><a href="#" onclick="changeDropdownText('classes','math')">${hunterClasses[i]}</a></li>`);
                        $("#dropdown3").append(
                            `<li><a href="#" onclick="changeDropdownText('classes','${hunterClasses[i]}')">${hunterClasses[i]}</a></li>`
                        );
                    }
                } else if (college == "City College") {
                    for (i = 0; i < cityClasses.length; i++) {
                        $("#dropdown3").append(
                            `<li><a href="#" onclick="changeDropdownText('classes','${cityClasses[i]}')">${cityClasses[i]}</a></li>`
                        );
                    }
                } else if (college == "Queens College") {
                    for (i = 0; i < queensClasses.length; i++) {
                        $("#dropdown3").append(
                            `<li><a href="#" onclick="changeDropdownText('classes','${queensClasses[i]}')">${queensClasses[i]}</a></li>`
                        );
                    }
                } else {
                    for (i = 0; i < brooklynClasses.length; i++) {
                        $("#dropdown3").append(
                            `<li><a href="#" onclick="changeDropdownText('classes','${brooklynClasses[i]}')">${brooklynClasses[i]}</a></li>`
                        );
                    }
                }
            }
            
            function changeCollege(dropdownID, college) {
                originalWidth = $("#" + dropdownID).width();
                $("#" + dropdownID).html(college);
                $("#" + dropdownID).width(originalWidth);
                currentCollege = college;
            }
            
            function getCourses(school) {
                document.getElementById("courseSelect").innerHTML = "";
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        var defOpt = "<option selected disabled>Select a course</option>"
                        document.getElementById("courseSelect").innerHTML = defOpt + this.responseText;
                        $(document).ready(function() {
                            $('select').material_select();
                        });
                    }
                };
                
                xmlhttp.open("GET", "getcourses.php?q=" + school, true);
                xmlhttp.send();
            }
            
            function getSelectedOption(sel) {
            var opt;
            for ( var i = 0, len = sel.options.length; i < len; i++ ) {
                opt = sel.options[i];
                if ( opt.selected === true ) {
                   break;
                }
            }
            return opt;
            }
            
            function verifyCourses() {
                if ($('#courseSelect').val() == null) {
                    Materialize.toast('Please fill out all forms to add course', 10000);
                    return false;
                } else {
                    courseName = $('#courseSelect option:selected').data('course-name');
                    subject = $('#courseSelect option:selected').data('prefix');
                    for(i = 0; i < classCart.length; i++){
                      if(courseName == classCart[i].name){
                        Materialize.toast('You are already taking this course!', 10000);
                        return false;
                      }
                    }
                    Materialize.toast('Course Added!', 10000);
                    classCart.push(new Course(courseName, subject));
                    Cookies.set('courses', JSON.stringify(classCart));
                    return false;
                }
            }
            
            function Course(name, subject) {
                this.name = name;
                this.subject = subject;
                this.time = convertToStandardFormat(Math.floor(Math.random()*24));
                this.color = getSubjectColor(subject);
                this.days = trueOrFalse();
            }
            
            function convertToStandardFormat(hour){
                if(hour > 12){
                    return hour - 12 + "PM";
                }
                else{
                    return hour + "AM";
                }
            }
            
            function getSubjectColor(subject){
                switch(subject){
                    case "MATH":
                    case "FQUAN":
                        return "blue";
                    case "ENGL":
                        return "orange";
                    case "FIQWS":
                        return "red";
                    case "BIO":
                    case "EAS":
                        return "green";
                    case "CHEM":
                        return "blue-grey";
                    default:
                        return "grey";
                }
            }
        </script>
    </head>
    <body onload="initialize();" class="grey lighten-4">
        <header>
            <nav class="light-blue darken-1" role="navigation">
                <div class="nav-wrapper container">
                    <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
                    <a id="logo-container" href="index.html" class="brand-logo">Schedule Planner</a>
                    <!-- Desktop Navbar -->
                    <ul class="right hide-on-med-and-down">
                        <li><a href="CollegePlanner.php"><i class="material-icons">dashboard</i></a></li>
                        <li><a href="classes.php"><i class="material-icons">schedule</i></a></li>
                    </ul>
                    <!-- Mobile Nav -->
                    <ul id="nav-mobile" class="side-nav">
                        <li>
                            <div class="userView">
                                <div class="background"></div>
                                <a href="#!user"><img class="circle" src="resources\student1.png">
                                </a>
                                <a href="#!name"><span class="white-text name">John Doe</span></a>
                                <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
                            </div>
                        </li>
                        <div class="container">
                            <li>
                                <div class="card light-green">
                                    <div class="card-content white-text">
                                        <br><span class="card-title"><i class="material-icons" style="font-size: 70px">home</i></span>
                                        <a href="index.html">
                                            <h2>Home</h2>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card amber">
                                    <div class="card-content white-text">
                                        <br><span class="card-title"><i class="material-icons" style="font-size: 70px">class</i></span>
                                        <a href="CollegePlanner.php">
                                            <h2>Courses</h2>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="card cyan">
                                    <div class="card-content white-text">
                                        <br><span class="card-title"><i class="material-icons" style="font-size: 70px">schedule</i></span>
                                        <a href="classes.php">
                                            <h2>Schedule</h2>
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </div>
                    </ul>
                </div>
            </nav>
        </header>
        <br />
        <main>
            <center>
                <div class="container">
                    <div class="row">
                        <h1 class="blue-text lighten-1">Select your school and year</h1>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <select id="schoolPick" onchange="changeCarousel(); getCourses(this.value);">
                                <option selected disabled>What school are you attending?</option>
                                <option value="brooklyn">Brooklyn College</option>
                                <option value="ccny">City College</option>
                                <option value="hunter">Hunter College</option>
                                <option value="queens">Queens College</option>
                            </select>
                            <label>School</label>
                        </div>

                        <!-- Have term change the tint of the schedule page -->
                        <div class="input-field offset-s4 col s4">
                            <select>
                                <option disabled selected>Which term are you attending?</option>
                                <option value="1">Summer 2017</option>
                                <option value="2">Fall 2017</option>
                                <option value="3">Spring 2018</option>
                            </select>
                            <label>Term</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field">
                            <select id="courseSelect">
                                <option value="" disabled selected>Select a college</option>
                            </select>
                            <label>Course</label>
                        </div>
                        <br>
                        <br>
                        <a class="btn waves-effect waves-light col s4" href="#modal1">
                            Submit<i class="material-icons right">send</i>
                        </a>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal bottom-sheet">
                            <div class="modal-content">
                                <div class="container">
                                    <div class="row">
                                        <h5 class="blue-text lighten-5">Days the class will take place on</h5>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box1" />
                                                <label for="filled-in-box">Monday</label>
                                            </p>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box2" />
                                                <label for="filled-in-box2">Tuesday</label>
                                            </p>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box3" />
                                                <label for="filled-in-box3">Wednesday</label>
                                            </p>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box4" />
                                                <label for="filled-in-box4">Thursday</label>
                                            </p>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box5" />
                                                <label for="filled-in-box5">Friday</label>
                                            </p>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box6" />
                                                <label for="filled-in-box6">Saturday</label>
                                            </p>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box7" />
                                                <label for="filled-in-box7">Sunday</label>
                                            </p>
                                    </div>
                                    <div class="row">
                                        <div id="hourSlider"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="verifyCourses()">Confirm</a>
                                </div>
                            </div>
                        </div>
                        </br>
                    </div>
                    <div class="carousel">
                        <a class="carousel-item"><img src="http://www.hunter.cuny.edu/research/repository/images/hunter_campus1.jpg/image_preview">
                        </a>
                        <a class="carousel-item"><img src="https://static01.nyt.com/images/2016/08/30/nyregion/30CUNY3/30CUNY2-1472516337388-master768.jpg">
                        </a>
                        <a class="carousel-item"><img src="http://www2.cuny.edu/wp-content/uploads/sites/4/2015/01/09_14_2004_qcc_campus_05.jpg">
                        </a>
                        <a class="carousel-item"><img src="http://www.brooklyn.cuny.edu/web/com_campus_exteriors/111121_CampusExterior_738x330_001.jpg">
                        </a>
                    </div>
                </div>
            </center>
        </main>
        <!--<button onclick = "addItem();"> Search For Profesor </button>-->
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
        <script src="js/js.cookie-2.1.4.min.js"></script>
        <script src="extras\noUiSlider\nouislider.js"></script>
        <footer class="page-footer green darken-1">
            <div class="footer-copyright">
                <div class="container">
                    Made by the <a class="green-text text-lighten-3" href="https://github.com/Alan19/SchedulePlanner"> SchedulePlanner Team</a> with <a class="green-text text-lighten-3" href="http://materializecss.com">Materialize</a>
                </div>
            </div>
        </footer>
    </body>
</html>