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
    <style></style>
    <script>
        classCart = [];

        function initialize() {
            $(document).ready(function() {
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('#modal1').modal();
                $('select').material_select();
                $('.carousel').carousel();
                classCart = JSON.parse(Cookies.get('courses'));
            });
            hunterClasses = ["ACC", "ACSK", "ADSUP", "ANTH", "ANTHC", "ABTHP,", "ARB", "ARTCR", "ARTH", "ARTLA",
                "ASAIN", "ASTRO",
                "BIOCH", "BIOL", "CEDC", "CEDF", "CHEM", "CHIN", "CHND", "CLA", "COCO", "COMPL", "COMSC", "COUNM",
                "COUNR", "COUNS", "CSCI",
                "DAN", "DANED", "ECC", "ECF", "ECO", "EDESL", "EDF", "EDLIT", "ENGL", "Education - BILED",
                "Education - SPEDE", "FILM", "FIMLP", "FRENCH", "GEOG", 'GEOL', 'GERMN', 'GRK', 'GSR', 'GTECH',
                'HEBR', 'HIST', 'MLS', 'MUS', 'MUSHL', 'MUSIN', 'MUSPF', 'MUSTH', 'NURS',
                'PERM', 'PHILO', 'PHYS', 'POL', 'POLSC', 'PORT', 'PSYCH', 'PT', ''
            ];
            cityClasses = [];
            baruchClasses = [];
            queensClasses = [];
            brooklynClasses = [];

            // for(var i = 0; i < hunterClasses.length; i++) {
            //     var opt = hunterClasses[i];
            //     var el = document.createElement("hunterClasses");
            //     el.textContent = opt;
            //     el.value = opt;
            //     select.appendChild(el);
            // }​

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
            } else if (college == "Baruch College") {
                for (i = 0; i < baruchClasses.length; i++) {
                    $("#dropdown3").append(
                        `<li><a href="#" onclick="changeDropdownText('classes','${baruchClasses[i]}')">${baruchClasses[i]}</a></li>`
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
            // alert("College set");
            populate(college);
        }

        function verifyCourses() {
            if ($('#courseSelect').val() == null || $('#codeSelect').val() == null) {
                Materialize.toast('Please fill out all forms to add course', 10000)
                return false;
            } else {
                Materialize.toast('Course Added!', 10000)
                classCart.push(new Course($('#codeSelect').val(), $('#courseSelect').val()));
                Cookies.set('courses', JSON.stringify(classCart));

                return false;
            }
        }

        function Course(name, subject) {
            this.name = name;
            this.subject = subject;
        }

        function submitClasses(){
            
        }
    </script>
</head>

<body onload="initialize();">
    <header>
        <nav class="light-blue lighten-1" role="navigation">
            <div class="nav-wrapper container">
                <a id="logo-container" href="index.html" class="brand-logo left">Schedule Planner</a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="#" data-activates="nav-mobile" class="show-on-large button-collapse"><i class="material-icons">menu</i></a>
                    </li>
                    <li><a href="classes.php" onclick="submitClasses()">Classes</a>
                    </li>
                </ul>
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
    <br />
    <main>
        <center>
            <div class="container">
                <div class="row">
                    <h1 class="blue-text lighten-1">Select your school and year</h1>
                </div>
                <div class="row">
                    <div class="input-field col s4">
                        <select id="schoolPick" onchange="changeCarousel()">
                            <option value="" disabled selected>Which School are you Attending?</option>
                            <option value="1">Hunter College</option>
                            <option value="2">Baruch College</option>
                            <option value="3">City College</option>
                            <option value="4">Queens College</option>
                            <option value="5">Brooklyn College</option>
                        </select>
                        <label>School</label>
                    </div>
                    <div class="input-field offset-s4 col s4">
                        <select>
                            <option value="" disabled selected>Which term are you attending?</option>
                            <option value="1">Summer 2017</option>
                            <option value="2">Fall 2017</option>
                            <option value="3">Spring 2018</option>
                        </select>
                        <label>Term</label>
                    </div>
                </div>
                <div class="row">
                    <form onsubmit="return verifyCourses()" method="post">
                        <div class="input-field col s4">
                            <select id="codeSelect">
                                <option value="" disabled selected>Course code</option>
                                <option value="MATH">MATH</option>
                                <!--<option value="1">ENG</option>-->
                            </select>
                        </div>
                        <!--Change to Dropdown-->
                        <div class="input-field offset-s4 col s4">
                            <select id="courseSelect">
                                <option value="" disabled selected>Which course?</option>
                                <option value="Calculus 1">Calculus 1</option>
                                <option value="Calculus 2">Calculus 2</option>
                            </select>
                        </div>
                        <br>
                        <br>
                        <button class="btn waves-effect waves-light col s4" type="submit" value="Submit" name="action">
                            Submit<i class="material-icons right">send</i>
                        </button>
                        <!-- Modal Trigger -->
                        <a class="waves-effect waves-light btn offset-s4 col s4" href="#modal1">Advanced Search</a>
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal bottom-sheet">
                            <div class="modal-content">
                                <div class="container">
                                    <div class="row">
                                        <h5 class="blue-text lighten-5">Days You want the classes to be on</h5>
                                        <form>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box" />
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
                                        </form>
                                    </div>
                                    <div class="row">
                                        <div class="input-field">
                                            <input id="teacher" type="text" class="validate" />
                                            <label for="teacher">Teacher's name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Confirm</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    </br>
                </div>
                <div class="carousel">
                    <a class="carousel-item"><img src="http://www.hunter.cuny.edu/research/repository/images/hunter_campus1.jpg/image_preview">
                    </a>
                    <a class="carousel-item"><img src="https://www.baruch.cuny.edu/undergrad/images/VerticalCampus2_002.jpg">
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
    <footer class="page-footer green darken-1">
        <div class="footer-copyright">
            <div class="container">
                Made by the <a class="green-text text-lighten-3" href="https://github.com/Alan19/SchedulePlanner"> SchedulePlanner Team</a> with <a class="green-text text-lighten-3" href="http://materializecss.com">Materialize</a>
            </div>
        </div>
    </footer>
</body>

</html>