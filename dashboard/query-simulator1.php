 <?php 
    include('../session.php');
    include('dash-global-function.php');

   
    $pagename = "Query Simulator";
    $username = $_SESSION['user_Name'];
    $script_for_specific_page = "index";
    $user_img = "../assets/images/user.png";
    $user_email = "mail@gmail.com";
    if(isset($_SESSION['login_level']) )
    {      
        $login_level = $_SESSION['login_level'];
        if ($login_level != 3) {
         
          header('location: error404.php');
        }
         
    }

    if (empty($_REQUEST['page'])) {
        $page = "";
    }
    else{
        $page = $_REQUEST['page'];
    }
?>
<!DOCTYPE html>
<html>
 <?php
    include("dash-head.php");
    ?>
<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <?php 
        include('dash-topnav.php');
    ?>
    <section>
        <?php 
        include("dash-sidenav-left.php");
        ?>

    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <ol class="breadcrumb breadcrumb-bg-green">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Library</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">archive</i> Data</a></li>
                                <li class="active"><i class="material-icons">attachment</i> File</li>
                            </ol>

            <?php
              echo '<pre>';
            var_dump($_SESSION);
            echo '</pre>';
            ?>
        
            
               <div class="col-sm-12">
                   <div class="col-sm-6">
                       <textarea style=" width: 600px;height: 550px;">-- schema
CREATE TABLE Departments (
    Id INT NOT NULL AUTO_INCREMENT,
    Name VARCHAR(25) NOT NULL,
    PRIMARY KEY(Id)
);

CREATE TABLE Employees (
    Id INT NOT NULL AUTO_INCREMENT,
    FName VARCHAR(35) NOT NULL,
    LName VARCHAR(35) NOT NULL,
    PhoneNumber VARCHAR(11),
    ManagerId INT,
    DepartmentId INT NOT NULL,
    Salary INT NOT NULL,
    HireDate DATETIME NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY (ManagerId) REFERENCES Employees(Id),
    FOREIGN KEY (DepartmentId) REFERENCES Departments(Id)
);

CREATE TABLE Customers (
    Id INT NOT NULL AUTO_INCREMENT,
    FName VARCHAR(35) NOT NULL,
    LName VARCHAR(35) NOT NULL,
    Email varchar(100) NOT NULL,
    PhoneNumber VARCHAR(11),
    PreferredContact VARCHAR(5) NOT NULL,
    PRIMARY KEY(Id)
);

CREATE TABLE Cars (
    Id INT NOT NULL AUTO_INCREMENT,
    CustomerId INT NOT NULL,
    EmployeeId INT NOT NULL,
    Model varchar(50) NOT NULL,
    Status varchar(25) NOT NULL,
    TotalCost INT NOT NULL,
    PRIMARY KEY(Id),
    FOREIGN KEY (CustomerId) REFERENCES Customers(Id),
    FOREIGN KEY (EmployeeId) REFERENCES Employees(Id)
);

-- data
INSERT INTO Departments
    (Id, Name)
VALUES
    (1, 'HR'),
    (2, 'Sales'),
    (3, 'Tech')
;

INSERT INTO Employees
    (Id, FName, LName, PhoneNumber, ManagerId, DepartmentId, Salary, HireDate)
VALUES
    (1, 'James', 'Smith', 1234567890, NULL, 1, 1000, str_to_date('01-01-2002', '%d-%m-%Y')),
    (2, 'John', 'Johnson', 2468101214, '1', 1, 400, str_to_date('23-03-2005', '%d-%m-%Y')),
    (3, 'Michael', 'Williams', 1357911131, '1', 2, 600, str_to_date('12-05-2009', '%d-%m-%Y')),
    (4, 'Johnathon', 'Smith', 1212121212, '2', 1, 500, str_to_date('24-07-2016', '%d-%m-%Y'))
;

INSERT INTO Customers
    (Id, FName, LName, Email, PhoneNumber, PreferredContact)
VALUES
    (1, 'William', 'Jones', 'william.jones@example.com', '3347927472', 'PHONE'),
    (2, 'David', 'Miller', 'dmiller@example.net', '2137921892', 'EMAIL'),
    (3, 'Richard', 'Davis', 'richard0123@example.com', NULL, 'EMAIL')
;

INSERT INTO Cars
    (Id, CustomerId, EmployeeId, Model, Status, TotalCost)
VALUES
    ('1', '1', '2', 'Ford F-150', 'READY', '230'),
    ('2', '1', '2', 'Ford F-150', 'READY', '200'),
    ('3', '2', '1', 'Ford Mustang', 'WAITING', '100'),
    ('4', '3', '3', 'Toyota Prius', 'WORKING', '1254')
;</textarea>
                       <button>Build Schema</button>
                   </div>
                   <div class="col-sm-6">
                       <textarea style=" width: 600px;height: 550px;">SELECT * FROM Customers
;

SELECT * FROM Employees
;

SELECT * FROM Departments
;

SELECT * FROM Cars
;</textarea>
                       <button>Run SQL</button>
                   </div>
               </div>
            <div class="">
                <h2>Result:</h2>
            </div>
<div class="span12 panel needsReadySchema" id="output" style="min-height: 198.3px; zoom: 1;"><div class="set" id="set_0">
        <table class="results table table-bordered table-striped">
            <tbody><tr>
            <th>Id</th>
            <th>FName</th>
            <th>LName</th>
            <th>Email</th>
            <th>PhoneNumber</th>
            <th>PreferredContact</th>
            </tr>
            <tr>
                <td>1</td>
                <td>William</td>
                <td>Jones</td>
                <td>william.jones@example.com</td>
                <td>3347927472</td>
                <td>PHONE</td>
            </tr>
            <tr>
                <td>2</td>
                <td>David</td>
                <td>Miller</td>
                <td>dmiller@example.net</td>
                <td>2137921892</td>
                <td>EMAIL</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Richard</td>
                <td>Davis</td>
                <td>richard0123@example.com</td>
                <td>(null)</td>
                <td>EMAIL</td>
            </tr>
        </tbody></table>
        <div id="messages_0" class="alert alert-success database-messages">
            <i class="icon-ok"></i>
            Record Count: 3; Execution Time: 2ms
            <a href="#executionPlan" class="executionPlanLink"><i class="icon-plus"></i>View Execution Plan</a>
            <a href="#!9/faf2f/1/0" class="setLink"><i class="icon-share-alt"></i> link</a>
        </div>

            <table class="executionPlan table table-bordered">
                <tbody><tr>
                <th>id</th>
                <th>select_type</th>
                <th>table</th>
                <th>type</th>
                <th>possible_keys</th>
                <th>key</th>
                <th>key_len</th>
                <th>ref</th>
                <th>rows</th>
                <th>filtered</th>
                <th>Extra</th>
                </tr>
                <tr>
                    <td><div style="position:relative">1</div></td>
                    <td><div style="position:relative">SIMPLE</div></td>
                    <td><div style="position:relative">Customers</div></td>
                    <td><div style="position:relative">ALL</div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative">3</div></td>
                    <td><div style="position:relative">100.00</div></td>
                    <td><div style="position:relative"></div></td>
                </tr>


            </tbody></table>

</div>
<div class="set" id="set_1">
        <table class="results table table-bordered table-striped">
            <tbody><tr>
            <th>Id</th>
            <th>FName</th>
            <th>LName</th>
            <th>PhoneNumber</th>
            <th>ManagerId</th>
            <th>DepartmentId</th>
            <th>Salary</th>
            <th>HireDate</th>
            </tr>
            <tr>
                <td>1</td>
                <td>James</td>
                <td>Smith</td>
                <td>1234567890</td>
                <td>(null)</td>
                <td>1</td>
                <td>1000</td>
                <td>2002-01-01T00:00:00Z</td>
            </tr>
            <tr>
                <td>2</td>
                <td>John</td>
                <td>Johnson</td>
                <td>2468101214</td>
                <td>1</td>
                <td>1</td>
                <td>400</td>
                <td>2005-03-23T00:00:00Z</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Michael</td>
                <td>Williams</td>
                <td>1357911131</td>
                <td>1</td>
                <td>2</td>
                <td>600</td>
                <td>2009-05-12T00:00:00Z</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Johnathon</td>
                <td>Smith</td>
                <td>1212121212</td>
                <td>2</td>
                <td>1</td>
                <td>500</td>
                <td>2016-07-24T00:00:00Z</td>
            </tr>
        </tbody></table>
        <div id="messages_1" class="alert alert-success database-messages">
            <i class="icon-ok"></i>
            Record Count: 4; Execution Time: 7ms
            <a href="#executionPlan" class="executionPlanLink"><i class="icon-plus"></i>View Execution Plan</a>
            <a href="#!9/faf2f/1/1" class="setLink"><i class="icon-share-alt"></i> link</a>
        </div>

            <table class="executionPlan table table-bordered" style="display: none;">
                <tbody><tr>
                <th>id</th>
                <th>select_type</th>
                <th>table</th>
                <th>type</th>
                <th>possible_keys</th>
                <th>key</th>
                <th>key_len</th>
                <th>ref</th>
                <th>rows</th>
                <th>filtered</th>
                <th>Extra</th>
                </tr>
                <tr>
                    <td><div style="position:relative">1</div></td>
                    <td><div style="position:relative">SIMPLE</div></td>
                    <td><div style="position:relative">Employees</div></td>
                    <td><div style="position:relative">ALL</div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative">4</div></td>
                    <td><div style="position:relative">100.00</div></td>
                    <td><div style="position:relative"></div></td>
                </tr>


            </tbody></table>

</div>
<div class="set" id="set_2">
        <table class="results table table-bordered table-striped">
            <tbody><tr>
            <th>Id</th>
            <th>Name</th>
            </tr>
            <tr>
                <td>1</td>
                <td>HR</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Sales</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Tech</td>
            </tr>
        </tbody></table>
        <div id="messages_2" class="alert alert-success database-messages">
            <i class="icon-ok"></i>
            Record Count: 3; Execution Time: 1ms
            <a href="#executionPlan" class="executionPlanLink"><i class="icon-plus"></i>View Execution Plan</a>
            <a href="#!9/faf2f/1/2" class="setLink"><i class="icon-share-alt"></i> link</a>
        </div>

            <table class="executionPlan table table-bordered">
                <tbody><tr>
                <th>id</th>
                <th>select_type</th>
                <th>table</th>
                <th>type</th>
                <th>possible_keys</th>
                <th>key</th>
                <th>key_len</th>
                <th>ref</th>
                <th>rows</th>
                <th>filtered</th>
                <th>Extra</th>
                </tr>
                <tr>
                    <td><div style="position:relative">1</div></td>
                    <td><div style="position:relative">SIMPLE</div></td>
                    <td><div style="position:relative">Departments</div></td>
                    <td><div style="position:relative">ALL</div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative">3</div></td>
                    <td><div style="position:relative">100.00</div></td>
                    <td><div style="position:relative"></div></td>
                </tr>


            </tbody></table>

</div>
<div class="set" id="set_3">
        <table class="results table table-bordered table-striped">
            <tbody><tr>
            <th>Id</th>
            <th>CustomerId</th>
            <th>EmployeeId</th>
            <th>Model</th>
            <th>Status</th>
            <th>TotalCost</th>
            </tr>
            <tr>
                <td>1</td>
                <td>1</td>
                <td>2</td>
                <td>Ford F-150</td>
                <td>READY</td>
                <td>230</td>
            </tr>
            <tr>
                <td>2</td>
                <td>1</td>
                <td>2</td>
                <td>Ford F-150</td>
                <td>READY</td>
                <td>200</td>
            </tr>
            <tr>
                <td>3</td>
                <td>2</td>
                <td>1</td>
                <td>Ford Mustang</td>
                <td>WAITING</td>
                <td>100</td>
            </tr>
            <tr>
                <td>4</td>
                <td>3</td>
                <td>3</td>
                <td>Toyota Prius</td>
                <td>WORKING</td>
                <td>1254</td>
            </tr>
        </tbody></table>
        <div id="messages_3" class="alert alert-success database-messages">
            <i class="icon-ok"></i>
            Record Count: 4; Execution Time: 1ms
            <a href="#executionPlan" class="executionPlanLink"><i class="icon-plus"></i>View Execution Plan</a>
            <a href="#!9/faf2f/1/3" class="setLink"><i class="icon-share-alt"></i> link</a>
        </div>

            <table class="executionPlan table table-bordered">
                <tbody><tr>
                <th>id</th>
                <th>select_type</th>
                <th>table</th>
                <th>type</th>
                <th>possible_keys</th>
                <th>key</th>
                <th>key_len</th>
                <th>ref</th>
                <th>rows</th>
                <th>filtered</th>
                <th>Extra</th>
                </tr>
                <tr>
                    <td><div style="position:relative">1</div></td>
                    <td><div style="position:relative">SIMPLE</div></td>
                    <td><div style="position:relative">Cars</div></td>
                    <td><div style="position:relative">ALL</div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative"></div></td>
                    <td><div style="position:relative">4</div></td>
                    <td><div style="position:relative">100.00</div></td>
                    <td><div style="position:relative"></div></td>
                </tr>


            </tbody></table>

</div>

<span id="donationSuggestion">Did this query solve the problem? If so, consider donating $5 to help make sure SQL Fiddle will be here next time you need help with a database problem. Thanks!</span>
</div>

            </div>
        </div>
    </section>

    <?php 
        include("dash-js.php");
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
    $('.id_22').click(function(){
        $('#message').load('table.php');
        $(".nano").nanoScroller();
    });
});
    </script>
</body>

</html>
