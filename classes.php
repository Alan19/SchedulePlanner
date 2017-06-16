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
		<link rel="stylesheet" href="css\animate.css">
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
			function initialize(){
				if(!!Cookies.get('courses')){
					classCart = JSON.parse(Cookies.get('courses'));
				}
				else{
					Cookies.set('courses', "");
					classCart = [];
					$('.classAccordion').hide();
				}
				if(checkForOverlap()) $('.tap-target').tapTarget('open');
			    populate();
			    printClasses();

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

			function Course(name, subject){
			    this.name = name;
			    this.subject = subject;
			}

			function convertToStandardFormat(hour){
                if(hour > 12){
                    return hour - 12 + "PM";
                }
                else{
                    return hour + "AM";
                }
            }

			function checkForOverlap(){
				statusButton = $('.status-button');
				if(classCart.length > 0){
					for(var i = 0; i < classCart.length-1; i++){
						if(classCart[i].timeEnd > classCart[i+1].timeStart){
							statusButton.addClass('red');
							statusButton.removeClass('blue');
							statusButton.html(
								'<i class="material-icons">warning</i>'
							);
							return true;
						}
					}
				}
				statusButton.addClass('blue');
				statusButton.removeClass('red');
				statusButton.html(
					'<i class="material-icons">check</i>'
				);
				$('.tap-target').tapTarget('close');
				return false;
			}

			function populate(){
			    scheduleTable = document.getElementById('schedule-table');
			    for(i=0;i<classCart.length;i++){
			        row=scheduleTable.insertRow();
			        timeCell = row.insertCell();
			        timeCell.innerHTML = convertToStandardFormat(classCart[i].timeStart) + "-" + convertToStandardFormat(classCart[i].timeEnd);
			        for(j=0;j<7;j++){
			            cell=row.insertCell();
			            id = removeWhitespace(classCart[i].name);
			            if(classCart[i].days[j]){
			                cell.innerHTML = `<td>
			                    <div class="card scheduleCard ${classCart[i].color+" darken-1 " + id}"}">
			                      <div class="card-content white-text">
			                         <br><span class="card-title">${classCart[i].subject}</span>
			                          ${classCart[i].name}
			                     </div>
			                    </div>
			                    </td>`;
			            }
			            else{
			                cell.innerHTML = cell.innerHTML = `<td><div class="card ${classCart[i].color+" darken-3 " + id}">
			                    <div class="card-content white-text">
			                       <br><span class="card-title">Free Period</span>
			                       :)
			                   </div>
			               </div></td>`;
			            }
			        }
			    }
			}
			function printClasses(){
			    classCards = $('.class-cards');
			    for(i = 0; i<classCart.length; i++){
			        var id = removeWhitespace(classCart[i].name);
			        classCards.append(
			            `<div class="${id}">
			                <div class="card ${classCart[i].color+' darken-1'}">
                      <a class="btn-floating halfway-fab waves-effect waves-light ${classCart[i].color} lighten-1" href = "#modal${i}"><i class="material-icons">delete</i></a>
			                    <div class="card-content white-text small">
			                       <br><span class="card-title">${classCart[i].name}</span>
			                        ${classCart[i].subject}</a>
			                   </div>
			               </div><br>
			              <div id="modal${i}" class="modal grey lighten-2">
			                <div class="modal-content">
			                  <h5>Are you sure you want to delete this class?</h5>
												<p>This will delete this class forever!!!</p>
			                </div>
			                <div class="modal-footer grey lighten-3">
			                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick = "deleteClass('${classCart[i].name}', '${id}')">Yes</a>
												<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">No</a>
			                </div>
			              </div>
			</div>`
			        );
			        $(`#modal${i}`).modal();
			    }
			}
			function deleteClass(className, id){
			    for(var i = 0; i < classCart.length; i++){
			        if(className == classCart[i].name){
						// console.log("Found");
			            index = i;
			        }
			    }
			    $(`.${id}`).addClass('animated bounceOut');
			    $(`.${id}`).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(event){
			      	classCart.splice(index, 1);
					Cookies.set('courses', JSON.stringify(classCart));
					scheduleTable.innerHTML = `
						<td></td>
						<td>Monday</td>
						<td>Tuesday</td>
						<td>Wednesday</td>
						<td>Thursday</td>
						<td>Friday</td>
						<td>Saturday</td>
						<td>Sunday</td>
					`;
					populate();
					classCards.html("");
					printClasses();
					checkForOverlap();
			    }
			    );
			}
			
			function removeWhitespace(sentence){
				return sentence.replace(/\W/g, '');
			}
		</script>
	</head>
	<body onload="initialize()" class="grey lighten-4">
		<header>
			<nav class="light-blue darken-1" role="navigation">
				<div class="nav-wrapper container">
					<a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
					<a id="logo-container" href="index.html" class="brand-logo">Schedule Planner</a>
					<!-- Desktop Navbar -->
					<ul class="right hide-on-med-and-down">
						<li><a href="CollegePlanner.php"><i class="material-icons">dashboard</i></a></li>
						<li><a href="classes.php" onclick="submitClasses()"><i class="material-icons">schedule</i></a></li>
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
                        <li><a class="waves-effect" href="http://www.brooklyn.cuny.edu/web/home.php"><i class="material-icons">favorite</i>Brooklyn College</a></li>
                        <li><a class="waves-effect" href="http://www.qc.cuny.edu/Pages/home.aspx"><i class="material-icons">favorite</i>Queens College</a></li>
                        <li><a class="waves-effect" href="http://www.hunter.cuny.edu/main/"><i class="material-icons">favorite</i>Hunter College</a></li>
                        <li><a class="waves-effect" href="https://www.ccny.cuny.edu/"><i class="material-icons">favorite</i>City College</a></li>
                    </ul>
				</div>
			</nav>
		</header>
		<main>
			<h1 class="blue-text lighten-1 center">Planner</h1>
			<table class="bordered responsive-table center" style="width:70%;margin:auto" id="schedule-table">
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
			<div class="container">
				<div class="row">
					<ul class="collapsible classAccordion" data-collapsible="accordion">
					<li>
						<div class="collapsible-header grey lighten-5"><i class="material-icons">dashboard</i>Your classes</div>
						<div class="collapsible-body"><span class="class-cards">
							</span>
						</div>
					</li>
				</div>
			</div>
			<div class="fixed-action-btn">
				<a class="btn-floating status-button btn-large waves-effect" id="menu"></a>
				<div class="tap-target red darken-1" data-activates="menu">
					<div class="tap-target-content">
						<h5 class="white-text">Overlapping Classes</h5>
						<p class="white-text">You have some classes that conflicts with other classes! Please remove them.</p>
					</div>
				</div>
			</div>

		</main>
		<footer class="page-footer green darken-1">
			<div class="footer-copyright">
				<div class="container">
					Made by the <a class="green-text text-lighten-3" href="https://github.com/Alan19/SchedulePlanner"> SchedulePlanner Team</a> with <a class="green-text text-lighten-3" href="http://materializecss.com">Materialize</a>
				</div>
			</div>
		</footer>
		<!--  Scripts-->
		<script src="js\jquery-3.2.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
		<script src="js/js.cookie-2.1.4.min.js"></script>
	</body>
</html>
