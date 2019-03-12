            
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Enrolled Classrrom
                                <small>With a bit of extra markup, it's possible to add any kind of HTML content like headings, paragraphs, or buttons into thumbnails.</small>
                            </h2>
                            <div class="pull-right">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#JoinClass"><i class="material-icons">person_add</i> Join Class</button>
                                    <button type="button" class="btn bg-green waves-effect" data-toggle="modal" data-target="#CreateClass">    <i class="material-icons">add_circle</i> Create Class</button>
                                </div>
                            </div>
                            <br>
                        </div>
                        <div class="body">
                            <!-- Basic Example -->
            <div class="row clearfix">
                <?php 
                
                 $query = mysqli_query($conn,"SELECT * FROM `class_room`");
               
                 
                if (mysqli_num_rows($query) > 0) {
                    // output data of each row

                    while($classroom = mysqli_fetch_assoc($query)) {
                        $class_ID = $classroom['class_ID'];
                        $class_Code = $classroom['class_Code'];
                        $class_Name = $classroom['class_Name'];
                        $class_Color = $classroom['class_Color'];
                        ?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header <?php  bg_color($class_Color)?>">
                                <h2>
                                    <a href="classroom?name=<?php echo $class_Name?>&code=<?php echo $class_Code?>&classID=<?php echo $class_ID?>" style="color: white;"><?php echo $class_Name;?></a> <small>0 Student</small>
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body" style="max-height: 115px;overflow-y: scroll;">
                                Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                                Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                                Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                                Quis pharetra a pharetra fames blandit. Risus faucibus velit Risus imperdiet mattis neque volutpat, etiam lacinia netus dictum magnis per facilisi sociosqu. Volutpat. Ridiculus nostra.
                            </div>
                        </div>
                    </div>
                        <?php
                    }
                } else {
                     echo "<script>alert('Sql Error');
                                                        window.location='index.php';
                                                    </script>";
                }
                ?>
                
                
            </div>
            <!-- #END# Basic Example -->
                        </div>
                    </div>
                </div>