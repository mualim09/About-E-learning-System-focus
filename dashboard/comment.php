<style type="text/css">



.titleBox {
    background-color:#fdfdfd;
    padding:10px;
}
.titleBox label{
  color:#444;
  margin:0;
  display:inline-block;
}

.commentBox {
    padding:10px;
    border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
    width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
    width:18%;
}
.actionBox .form-group * {
    width:100%;
}
.taskDescription {
    margin-top:10px 0;
}
.commentList {
    padding:0;
    list-style:none;
    max-height:200px;
    overflow:auto;
}
.commentList li {
    margin:0;
    margin-top:10px;
}
.commentList li > div {
    display:table-cell;
}
.commenterImage {
    width:30px;
    margin-right:5px;
    height:100%;
    float:left;
}
.commenterImage img {
    width:100%;
    border-radius:50%;
}
.commentText p {
    margin:0;
}
.sub-text {
    color:#aaa;
    font-family:verdana;
    font-size:11px;
}
.actionBox {
    border-top:1px dotted #bbb;
    padding:10px;
}
</style>
<?php 
include('../dbconfig.php');
error_reporting(0);
$classPost_ID = $_POST['classPost_ID'];

$sql = "SELECT cc.*,ua.user_img FROM `class_comment` `cc`
INNER JOIN `user_accounts` `ua` ON cc.user_ID = `ua`.user_ID
WHERE class_ID = '$classPost_ID'
ORDER BY `cc`.`comment_Date` DESC";

$query3 = mysqli_query($conn,$sql);
               


?>

<div class="detailBox">
    <div class="actionBox">
        <ul class="commentList">
        	<?php 
        	if (mysqli_num_rows($query3) > 0) {
		        // output data of each row

		       while($classroom_comment = mysqli_fetch_assoc($query3)) {
                    if (!empty($classroom_comment['user_img'])) {
                     $comment_img = 'data:image/jpeg;base64,'.base64_encode($classroom_comment['user_img']);
                    }
                    else{
                      $comment_img = "../assets/images/user.png";
                    }
		       		$classroom_comment = $classroom_comment["comment_content"];


		       		?>
				    <li>
		                <div class="commenterImage">
		                  <img src="<?php echo $comment_img;?>" />
		                </div>
		                <div class="commentText">
		                    <p class=""><?php echo $classroom_comment;?></p> <span class="date sub-text"><?php echo strftime("on %b %e, %Y  at (%I:%M %p)", strtotime($classroom_commentDate));?></span>

		                </div>
		            </li>
		       		<?php
		        }
		    }
        	?>
            
            
        </ul>
        <form class="form-inline" role="form">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Your comments" id="comment_content<?php echo $classPost_ID;?>" style="border:solid 1px; border-radius: 5px 0px 0px 5px;"/>
                 <span class="input-group-addon btn-success" style="border:solid 1px; border-radius: 0px 0px 0px 0px; color: white;" onclick="addComment(<?php echo $classPost_ID;?>)">Comment</span>
                  <span class="input-group-addon  btn-info" style="border:solid 1px; border-radius: 0px 5px 5px 0px; color: white;" onclick="reload(<?php echo $classPost_ID;?>)"><i class="glyphicon glyphicon-refresh" ></i></span>
            </div>
        </form>
        <!-- <div onclick="hideComment(<?php echo $classPost_ID;?>);">HIDE COMMENT</div> -->
    </div>
</div>
