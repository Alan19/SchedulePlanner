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
        
        <style>
            .waves-effect.waves-cyan .waves-ripple {
            /* The alpha value allows the text and background color
            of the button to still show through. */
            background-color: rgba(0, 188, 212, 0.65);
            }

            .waves-effect.waves-amber .waves-ripple {
            /* The alpha value allows the text and background color
            of the button to still show through. */
            background-color: rgba(255, 193, 7, 0.65);
            }

        </style>
        <script>
            classCart = [];

            function getDays(){
                days = [];
                for(var i = 1; i <=7 ; i++){
                    if($(`#filled-in-box${i}`).is(':checked')){
                        days.push(true);
                    }
                    else{
                        days.push(false);
                    }
                }
                return days;
            }
            
            function wipeAllInfo(){
                Cookies.set('courses', "");
                classCart = [];
            }

            function initialize() {
                $(document).ready(function() {
                    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                    $('#modal1').modal();
                    $('select').material_select();
                    $('.carousel').carousel();
                    if(!!Cookies.get('courses')){
                        classCart = JSON.parse(Cookies.get('courses'));
                    }
                    else{
                        Cookies.set('courses', "");
                    }
                    slider = document.getElementById('hourSlider');
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

                    //Initialize cookies

                    //School pick cookie
                    if (!!Cookies.get('selectedSchool')) {
                    // have cookie
                        school = Cookies.get('selectedSchool');
                        $('#schoolPick').val(school);
                        getCourses(school);
                        $('select').material_select();
                    } 
                    else {
                    // no cookie
                        school = "";
                        $("#courseSelect").prop('disabled', true);
                        Cookies.set('selectedSchool', "");
                        $('select').material_select();
                    }

                    //Change school warning cookie
                    if (!(!!Cookies.get('firstVisit'))) {
                        //no cookie
                        Cookies.set('firstVisit', "true");
                        $('.tap-target').tapTarget('open');
                    }

                    //Term color cookie
                    if (!!Cookies.get('term')) {
                    // have cookie
                        changeColorScheme(Cookies.get('term'));
                        $('#termPick').val(Cookies.get('term'));
                        $('select').material_select();
                    } 
                    else {
                    // no cookie
                        Cookies.set('term', "");
                    }
                });            
            }

            function changeColorScheme(term){
                $('body').attr('class', '');
                Cookies.set('term', term);
                switch(term){
                    case "spring":
                        termColor = "green";
                        $('body').addClass(termColor + " lighten-5");
                        break;
                    case "summer":
                        termColor = "light-blue";
                        $('body').addClass(termColor + " lighten-5");
                        break;
                    case "fall":
                        termColor = "orange";
                        $('body').addClass(termColor + " lighten-5");
                        break;
                    case "winter":
                        termColor == "blue";
                        $('body').addClass(termColor + " lighten-5");
                        break;
                }
                
            }

            function confirmChange(){
                school = $("#schoolPick").val();
                Cookies.set('selectedSchool', school);
                $("#courseSelect").prop('disabled', false);
                $('select').material_select();
                if(classCart.length > 0){
                    wipeAllInfo();
                    Materialize.toast('Your classes have been wiped!', 10000);
                }
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
                courseName = $('#courseSelect option:selected').data('course-name');
                subject = $('#courseSelect option:selected').data('prefix');
                for(i = 0; i < classCart.length; i++){
                    if(courseName == classCart[i].name){
                        Materialize.toast('You are already taking this course!', 10000);
                    }
                }
                Materialize.toast('Course Added!', 10000);
                classCart.push(new Course(courseName, subject));
                sortClasses();
                Cookies.set('courses', JSON.stringify(classCart));
            }

            function checkForDuplicate(){
                courseName = $('#courseSelect option:selected').data('course-name');
                subject = $('#courseSelect option:selected').data('prefix');
                if ($('#courseSelect').val() == null) {
                    Materialize.toast('Please fill out all forms to add course', 10000);
                } 
                else{
                    for(i = 0; i < classCart.length; i++){
                        if(courseName == classCart[i].name){
                            Materialize.toast('You are already taking this course!', 10000);
                            return;
                        }
                    }
                    $('#modal1').modal('open');
                }
            }
            
            function sortClasses(){
                for(var i = 0; i < classCart.length-1; i++){
                    for(var j = i+1; j <classCart.length; j++){
                        if(classCart[i].timeStart > classCart[j].timeStart){
                            var temp = classCart[i];
                            classCart[i] =classCart[j];
                            classCart[j] = temp;
                        }
                    }
                }
            }

            function Course(name, subject) {
                this.name = name;
                this.subject = subject;
                sliderValues = slider.noUiSlider.get();
                this.timeStart = Number.parseInt(sliderValues[0]);
                this.timeEnd = Number.parseInt(sliderValues[1]);
                this.color = getSubjectColor(subject);
                this.days = getDays();
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
                        <li><a href = "index.html" class="waves-effect waves-green"><i class="material-icons">home</i>Home</a></li>
                        <li><a href = "CollegePlanner.php" class="waves-effect waves-amber"><i class="material-icons">class</i>Planner</a></li>
                        <li><a href = "classes.php" class="waves-effect waves-cyan"><i class="material-icons">schedule</i>Schedule</a></li>
                        <li><div class="divider"></div></li>
                        <li><a class="subheader">CUNY Info</a></li>
                        <li><a class = "waves-effect waves-purple" href="https://home.cunyfirst.cuny.edu/psp/cnyepprd/GUEST/HRMS/c/COMMUNITY_ACCESS.CLASS_SEARCH.GBL?FolderPath=PORTAL_ROOT_OBJECT.HC_CLASS_SEARCH_GBL&IsFolder=false&IgnoreParamTempl=FolderPath%2CIsFolder"><i class="material-icons">explore</i>Registrar</a></li>
                        <li><a class="waves-effect" href="http://www.brooklyn.cuny.edu/web/home.php"><i class="material-icons">info</i>Brooklyn College</a></li>
                        <li><a class="waves-effect" href="http://www.qc.cuny.edu/Pages/home.aspx"><i class="material-icons">info</i>Queens College</a></li>
                        <li><a class="waves-effect" href="http://www.hunter.cuny.edu/main/"><i class="material-icons">info</i>Hunter College</a></li>
                        <li><a class="waves-effect" href="https://www.ccny.cuny.edu/"><i class="material-icons">info</i>City College</a></li>
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
                            <select id="schoolPick" onchange="changeCarousel(); getCourses(this.value); confirmChange();">
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
                            <select id="termPick" onchange="changeColorScheme(this.value)">
                                <option disabled selected>Which term are you attending? (optional)</option>
                                <option value="summer">Summer 2017</option>
                                <option value="fall">Fall 2017</option>
                                <option value="spring">Spring 2018</option>
                            </select>
                            <label>Term</label>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="input-field">
                            <select id="courseSelect">
                                <option value="" disabled selected>Select a course</option>
                            </select>
                            <label>Course</label>
                        </div>
                        <br>
                        <br>
                        <a class="btn waves-effect waves-light" onclick="checkForDuplicate()">
                            Submit<i class="material-icons right">send</i>
                        </a>
                        <!-- Time selection modal -->
                        <div id="modal1" class="modal bottom-sheet">
                            <div class="modal-content">
                                <div class="container">
                                    <div class="row">
                                        <h5 class="blue-text lighten-5">Days the class will take place on</h5>
                                            <p>
                                                <input type="checkbox" class="filled-in" id="filled-in-box1" />
                                                <label for="filled-in-box1">Monday</label>
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
            <div class="fixed-action-btn">
				<a class="btn-floating blue status-button btn-large waves-effect" onclick="$('.tap-target').tapTarget('open');" id="menu">
					<i class="material-icons">question_answer</i>
				</a>
            </div>
            <div class="tap-target red darken-1" data-activates="menu">
                <div class="tap-target-content">
                <h5 class="white-text">Changing your college deletes your classes</h5>
                <p class="white-text">Make sure you don't change your college unless you want to delete your classes!</p>
                </div>
            </div>

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