   <ol class="breadcrumb breadcrumb-bg-green">
                <li><a href="index"><i class="material-icons">home</i> Dashboard</a></li>
                <li  class="active"><a href="javascript:void(0);"><i class="material-icons ">account_box</i> Classrooms</a></li>
            </ol>            
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Enrolled Classroom
                                <small></small>
                            </h2>
                            <div class="pull-right">
                                <div class="btn-group" role="group">
                                    <?php 
                                    if ($login_level == 1) {
                                        ?>
                                         <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#JoinClass"><i class="material-icons">person_add</i> Join Class</button>
                                        <?php
                                    }
                                    else{
                                        ?>
                                        <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#CreateClass">    <i class="material-icons">add_circle</i> Create Class</button>
                                        <?php
                                    }
                                    ?>
                                   
                                    
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="body">
                            <!-- Basic Example -->
            <div class="row clearfix">
                <?php 
                
                
                if ($login_level == 1) {
                    $sql = "SELECT * FROM `class_student` `cls`
                    INNER JOIN `class_room` `clr`  ON `cls`.`class_ID` = `clr`.`class_ID`  WHERE `cls`.user_ID =  $user_id AND join_Stat = 1";
                    $query = mysqli_query($conn, $sql);
                }
                else
                {
                    $sql  = "SELECT * FROM `class_room` WHERE user_ID = $user_id";
                    $query = mysqli_query($conn,$sql);
                }
                 
                if (mysqli_num_rows($query) > 0) {
                    // output data of each row

                    while($classroom = mysqli_fetch_assoc($query)) {
                        $class_ID = $classroom['class_ID'];
                        $class_Code = $classroom['class_Code'];
                        $class_Name = $classroom['class_Name'];
                        $class_Description = $classroom['class_Description'];
                        $class_Color = $classroom['class_Color'];
                        $class_status = $classroom['class_status'];
                        $sql = "SELECT * FROM `class_student` WHERE class_ID = $class_ID ";
                        $count_s = mysqli_query($conn,$sql);
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header <?php  bg_color($class_Color)?>">
                                <h2>
                                    <a href="classroom?name=<?php echo $class_Name?>&code=<?php echo $class_Code?>&classID=<?php echo $class_ID?>" style="color: white;"><?php echo $class_Name;?></a> <small><?php echo mysqli_num_rows($count_s);?> Student</small>
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">

                                            <li><a href="javascript:void(0);">Edit</a></li>
                                            <?php
                                            if ($class_status == 1) {
                                               ?>
                                               <li><a href="javascript:void(0);"  onclick="disableClassroom(<?php echo $class_ID;?>)">Disabled</a></li>
                                                <?php
                                            }
                                            else{
                                                ?>
                                                 <li><a href="javascript:void(0);"  onclick="enableClassroom(<?php echo $class_ID;?>)">Enable</a></li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body" style="min-height: 115px;max-height: 115px;overflow-y: scroll;">
                                <?php  echo $class_Description;?>
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                } else {
                   ?>

                   <?php
                }
                ?>
                
                
            </div>
            <!-- #END# Basic Example -->
                        </div>
                    </div>
                </div>

