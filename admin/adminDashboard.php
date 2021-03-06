<?php
/*session_start();
if(isset($_SESSION["name"]))
{
  $name = $_SESSION["name"];
  $eval_email = $_SESSION["email"];
}
else
{
  header('Location:http://localhost/REAP/login.html');
}*/
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="HimanshuRanjan">
    <link rel="icon" href="../staticFiles/paper.ico">
    <title>Admin Dashboard</title>
  <!-- Our core javascripts -->
  <script type="text/javascript" src="../staticFiles/adminReap.js?x=<?php echo rand(0,100) ?>"></script>
  <link href="../staticFiles/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../staticFiles/css/myfile.css" rel="stylesheet">
  <script src="../staticFiles/assets/js/ie-emulation-modes-warning.js"></script>
  <!--This is to Enable Tabbing Action-->
  <link rel="stylesheet" href="../staticFiles/dist/css/bootstrap-theme.min.css">
  <!--alertify -->
  <link rel="stylesheet" href="../staticFiles/alertify/themes/alertify.core.css" />
    <link rel="stylesheet" href="../staticFiles/alertify/themes/alertify.default.css" />
  <script src="../staticFiles/js/jquery-1.11.2.min.js"></script>
  <script src="../staticFiles/dist/js/bootstrap.min.js"></script>
 </head>
<body bgcolor="#00cc66" onload="init()">
  <!--navigation bar-->
  <!-- THe following code will be for horizontal navigation bar at the top of the page -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
  <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="#">Admin</a>
  </div>
  <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><?php echo $name; ?></a></li>
        <li><a href="http://localhost/REAP/login.html" onclick = "session_destroy()">LogOut</a></li>
      </ul>
  </div>
</div>
 </nav>
    <!-- Make this div block when u logout so that php session is set to empty array -->
    <div id = "sessionDestroy" style="display:none;"><?php $_SESSION = array(); ?></div>
  <!-- ############end of top navigation bar #############-->
  <!-- start of side Navigation bar and Place holder-->
  <div id = "verticalnav" class="container-fluid">
    <div class="row">
      <div class="tab-content">
        <div id="adminHomepage" class="tab-pane fade in active">
          <!--
          <h1 class="page-header">Admin Dashboard</h1> -->
          <ul class="nav nav-pills">
              <li class="active" style="padding:10px">
                <a data-toggle="tab" href="#answerParts" onclick="init()">
                  <span class="glyphicon glyphicon-scissors"></span> ANSWER PARTS EXTRACTION
                </a>
              </li>
              <li style="padding:10px">  
                <a data-toggle="tab" href="#bundles" onclick="init2()">
                <span class="glyphicon glyphicon-tasks"></span> BUNDLES 
                </a>
              </li>
              <li style="padding:10px">  
                <a data-toggle="tab" href="#result" onclick="resultInit()">
                <span class="glyphicon glyphicon-stats"></span> RESULT 
                </a>
              </li>
              <li style="padding:10px">  
                <a data-toggle="tab" href="#issues" onclick="">
                <span class="glyphicon glyphicon-exclamation-sign"></span> ISSUES 
                </a>
              </li>
            </ul>
            <div class="tab-content">
              <br />
              <!-- ################  ####  internal tab 1 #######-->
              <div id="answerParts" class="tab-pane fade in active">
                <p class="text-success"> Run Your Image Extraction Module to get all the answer parts... It may take some time </p>
                <div class="row">
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT EXAM TYPE</span></h3>
                    <select id="examTypeSelect" class="form-control" placeholder=".col-lg-4">
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT SUBJECT CODE</span></h3>
                    <select id="subjectCodeSelect" class="form-control" placeholder=".col-lg-4">
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <br/><br />
                    <input type="submit" name="submit" class="btn btn-lg btn-success" value="Go" onclick="startImageProcessing() " />
                  </div>
                </div>
              </div>  

              <div id = "bundles" class ="tab-pane fade" >
                <p class="text-success"> Create and assign bundles to the evaluators..from this beautiful UI. This will assist you maintaing the log of all the assignment </p>
                <div class="row">
                  <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                      Step-1 Create A Bundle  <!--Padding is optional-->
                      </span>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT EXAM TYPE</span></h3>
                    <select id="examTypeBundle" class="form-control" placeholder=".col-lg-4">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT DEPARTMENT</span></h3>
                    <select id="departmentBundle" class="form-control" placeholder=".col-lg-4">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT SUBJECT CODE</span></h3>
                    <select id="subjectCodeBundle" class="form-control" placeholder=".col-lg-4">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <br/><br />
                    <div style = "display:inline;">
                    <input type="submit" name="submit" class="btn btn-lg btn-success" value="Create a Bundle" onclick="createBundle()" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Optional </div>
                  </div>
                </div>

                <div class="row">
                  <br/><br/><br/><br/><br/>
                  <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                      Step-2 Assign Students to a Bundle <!--Padding is optional-->
                      </span>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT BUNDLE-ID</span></h3>
                    <select id="idBundleStudent"  class="form-control" placeholder=".col-lg-4">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT STUDENTS</span></h3>
                    <h6>Mutiple select list (hold ctrl or shift (or drag with the mouse) to select more than one):</h6>
                    <select multiple id="studentsBundle" class="form-control" placeholder=".col-lg-4" style="height:100px;">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <br/><br />
                    <input id = "assignStudents" type="submit" name="submit" class="btn btn-lg btn-success" value="Assign Student" onclick="assignStudents()" />
                  </div>
                </div>

                <div class="row">
                  <br/><br/><br/><br/><br/>
                  <div style="width: 100%; height: 20px; border-bottom: 1px solid black; text-align: center">
                      <span style="font-size: 20px; background-color: #F3F5F6; padding: 0 10px;">
                      Step-3 Assign Bundle to a Evaluator <!--Padding is optional-->
                      </span>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT BUNDLE-ID</span></h3>
                    <select id="idBundleEvaluator" class="form-control" placeholder=".col-lg-4">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT EVALUATOR</span></h3>
                    <h6>Mutiple select list (hold ctrl or shift (or drag with the mouse) to select more than one):</h6>
                    <select multiple id="evaluatorsBundle" name = "evaluatorsBundle" class="form-control" placeholder=".col-lg-4" style="height:100px;">
                      <option>Select</option>
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <br/><br />
                    <input type="submit" name="submit" class="btn btn-lg btn-success" value="Assign Evaluator" onclick="assignEvaluators()" />
                  </div>
                </div>

                <br /><br /><br />
              </div>
              <div id = "result" class ="tab-pane fade">
                <p class="text-success"> U can see the entire marks scored by each candidate</p>
                <div class="row">
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT EXAM TYPE</span></h3>
                    <select id="examTypeResult" class="form-control" placeholder=".col-lg-4">
                    </select>
                  </div>
                  <div class="col-lg-3">
                    <h3><span class="label label-success">SELECT DEPARTMENT</span></h3>
                    <select id="deptResult" class="form-control" placeholder=".col-lg-4">
                    </select>
                  </div>
                  <div class="col-lg-2">
                    <br/><br />
                    <input type="submit" name="submit" class="btn btn-lg btn-success" value="Go" onclick="fetchResult()" />
                  </div>
                </div>
                <div class="table-responsive">
                	<table class="table table-hover">
                		<thead id="resultHead">
                		</thead>
                		<tbody id="resultBody">
                		</tbody>
                	</table>
                </div>
             	</div>
              <div id = "issues" class ="tab-pane fade">
                <p class="text-success"> We have been notified about the following issues...Kindly look it !!</p>
              </div>
        </div> 
      </div>   <!-- end of class tab-content-->
    </div>   <!-- end of main row -->
  </div>     <!-- end of container-->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../staticFiles/js/jquery-1.11.2.min.js"></script>
  <script src="../staticFiles/dist/js/bootstrap.min.js"></script>
    <script src="../staticFiles/assets/js/docs.min.js"></script>
    <script src="../staticFiles/assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="../staticFiles/alertify/lib/alertify.min.js"></script>



</body>
</html>