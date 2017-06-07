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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
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
			            id = classCart[i].name.replace(/\s+/g, '');
			            if(classCart[i].days[j]){
			                cell.innerHTML = `<td>
			                    <div class="card scheduleCard ${classCart[i].color+" darken-1 " + id}"}">
			                      <div class="card-content white-text small">
			                         <br><span class="card-title">${classCart[i].subject}</span>
			                          ${classCart[i].name}
			                     </div>
			                    </div>
			                    </td>`;
			            }
			            else{
			                cell.innerHTML = cell.innerHTML = `<td><div class="card ${classCart[i].color+" darken-3 " + id}">
			                    <div class="card-content white-text small">
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
			        id = classCart[i].name.replace(/\s+/g, '');
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
			                  <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick = "deleteClass('${classCart[i].name}', '${classCart[i].name.replace(/\s+/g, '')}')">Yes</a>
												<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">No</a>
			                </div>
			              </div>
			</div>`
			        );
			        $(`#modal${i}`).modal();
			    }
			}
			function deleteClass(className, id){
			    for(i = 0; i < classCart.length; i++){
			        if(className == classCart[i].name){
			            index = i;
			            break;
			        }
			    }
			    $(`.${id}`).addClass('animated bounceOut');
			    $(`.${id}`).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend',function(event){
			      classCart.splice(i, 1);
          Cookies.set('courses', JSON.stringify(classCart));
          scheduleTable.innerHTML = "";
             populate();
             classCards.html("");
             printClasses();
			    }
			                         
			    );
			    
			}
			
			function removeWhitespace(sentence){
				sentence.replace(/\s+/g, '');
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
						<div class="collapsible-header grey lighten-5"><i class="material-icons">dashboard</i>Your classes</div>
						<div class="collapsible-body"><span class="class-cards">
							</span>
						</div>
					</li>
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
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="js/init.js"></script>
		<script src="js/js.cookie-2.1.4.min.js"></script>
	</body>
</html>