<?php 
include('../session.php');


require_once("../class.user.php");

  
$auth_user = new USER();
// $page_level = 3;
// $auth_user->check_accesslevel($page_level);
$pageTitle = "Query Simulator";
?>
<!doctype html>
<html lang="en">
  <head>
    <?php 
      include('x-meta.php');
    ?>


  <?php 
  include('x-css.php');
  ?>
 



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../assets/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
<?php 
include('x-nav.php');
?>

<div class="container-fluid">
  <div class="row">
      <?php 
    include('x-sidenav.php');
    ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Query Simulator</h1>
        
      </div>
      <nav aria-label="breadcrumb" >
        <ol class="breadcrumb bcrum" >
          <li class="breadcrumb-item " ><a href="index" class="bcrum_i_a">Dashboard</a></li>
          <li class="breadcrumb-item  active bcrum_i_ac" aria-current="page" >Query Simulator</li>
        </ol>
      </nav>
                     <div class="col-sm-12 sql_simulator">
     <link rel="stylesheet" href="../assets/plugins/sql_simulator/css/codemirror.css">
  <link rel="stylesheet" href="../assets/plugins/sql_simulator/css/demo.css">
  <script src="../assets/plugins/sql_simulator/css/codemirror.js"></script>            
               <main>
   <label for='commands'>Enter some SQL</label> 
   <div class="btn-group float-right">
    <a class="btn btn-info " href="query_simulator?req_sample=1">Load sample</a>
  </div>
   <br>   <br>
<style type="text/css">
    table {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

table td, table th {
  border: 1px solid #ddd;
  padding: 8px;
}

table tr:nth-child(even){background-color: #f2f2f2;}

table tr:hover {background-color: #ddd;}

table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;


}

</style>
    <textarea id="commands" >
      <?php 
      if (isset($_REQUEST["req_sample"])) {
        ?>
DROP TABLE IF EXISTS employees;
CREATE TABLE employees( id          integer,  name    text,
                          designation text,     manager integer,
                          hired_on    date,     salary  integer,
                          commission  float,    dept    integer);

  INSERT INTO employees VALUES (1,'JOHNSON','ADMIN',6,'1990-12-17',18000,NULL,4);
  INSERT INTO employees VALUES (2,'HARDING','MANAGER',9,'1998-02-02',52000,300,3);
  INSERT INTO employees VALUES (3,'TAFT','SALES I',2,'1996-01-02',25000,500,3);
  INSERT INTO employees VALUES (4,'HOOVER','SALES I',2,'1990-04-02',27000,NULL,3);
  INSERT INTO employees VALUES (5,'LINCOLN','TECH',6,'1994-06-23',22500,1400,4);
  INSERT INTO employees VALUES (6,'GARFIELD','MANAGER',9,'1993-05-01',54000,NULL,4);
  INSERT INTO employees VALUES (7,'POLK','TECH',6,'1997-09-22',25000,NULL,4);
  INSERT INTO employees VALUES (8,'GRANT','ENGINEER',10,'1997-03-30',32000,NULL,2);
  INSERT INTO employees VALUES (9,'JACKSON','CEO',NULL,'1990-01-01',75000,NULL,4);
  INSERT INTO employees VALUES (10,'FILLMORE','MANAGER',9,'1994-08-09',56000,NULL,2);
  INSERT INTO employees VALUES (11,'ADAMS','ENGINEER',10,'1996-03-15',34000,NULL,2);
  INSERT INTO employees VALUES (12,'WASHINGTON','ADMIN',6,'1998-04-16',18000,NULL,4);
  INSERT INTO employees VALUES (13,'MONROE','ENGINEER',10,'2000-12-03',30000,NULL,2);
  INSERT INTO employees VALUES (14,'ROOSEVELT','CPA',9,'1995-10-12',35000,NULL,1);

SELECT designation,COUNT(*) AS nbr, (AVG(salary)) AS avg_salary FROM employees GROUP BY designation ORDER BY avg_salary DESC;
SELECT name,hired_on FROM employees ORDER BY hired_on;
        <?php
      }
      ?>
    </textarea>

<!--   <button id="execute" class="btn btn-success btn-sm" >Execute</button>
  <button id="savedb"  class="btn btn-success btn-sm" >Save DB</button> -->
  <br>
<div class="form-inline ">
    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" id="execute" class="btn btn-secondary">Execute</button>
        <button type="button" class="btn btn-danger"  id="clear_textarea">Clear</button>
        <button type="button" id="savedb" class="btn btn-success">Save DB</button>
      </div>
     
    </div>
    <div >
        <input type='file' id='dbfile' class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon">
        <small id="emailHelp" class="form-text text-muted">Load an SQLite database file.</small>
    </div>
</div>
<div id="error" class="error"></div>

<pre id="output">Results will be displayed here</pre>
</main>
               </div>

    </main>
  </div>
</div>

<?php 
include('x-script.php');
?>

  <script src="../assets/plugins/sql_simulator/js/sql.js"></script>
  <script type="text/javascript" src="../assets/plugins/sql_simulator/css/gui.js"></script>
  <script type="text/javascript">
  // $(document).on('click', '#load_sample_command', function(){
  
  // var x = document.querySelectorAll(".CodeMirror-code div pre span");
  
  //   console.log ( x[0].innerHTML);
  //   $(".CodeMirror-code div pre span").html("heey");
  //   });
   $(document).on('click', '#clear_textarea', function(){
    window.location.assign("query_simulator");
  });
  

  </script>
  </body>

</html>
