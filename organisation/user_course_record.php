<?php include("header.php");?>
  <div class="container">
    

    <div class="page-section">
      <div class="row">
        <div class="col-md-12 col-lg-12">

  

          <h4 class="page-section-heading">User List</h4>
          <div class="panel panel-default">
            <!-- Data table -->
            <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
              <thead>
                <tr>
                   <th>#</th>
                   <th>Course Name</th>
                   <th>Total video</th>
                   <th>Watched Video</th>
                   <th>Course Persentage</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>#</th>
                   <th>Course Name</th>
                   <th>Total video</th>
                   <th>Watched Video</th>
                   <th>Course Persentage</th>
                </tr>
              </tfoot>
              <tbody>               
                <?php
					$user_id = $_GET['u_id'];
					$i = "1";
					$query = "SELECT * FROM `courses` WHERE p_id  != '0'";
					
					$sql = mysqli_query($conn,$query);
					while($result= mysqli_fetch_array($sql)){
					
						$c_id = $result["c_id"]; 
						$c_name_lan1 = $result["c_name_lan1"];
						
						
						$query_allvideo = "SELECT * FROM `video` WHERE cat_id = '$c_id'";		
						$sql_allvideo = mysqli_query($conn,$query_allvideo);
						$sql_allvideo_num = mysqli_num_rows($sql_allvideo);
						
						
						
						$query_vv_check = "SELECT * FROM `video_view` AS vv 
											LEFT JOIN video AS vid ON vid.v_id = vv.v_id
											WHERE cat_id = '$c_id' AND u_id = '$user_id'";		
						$sql_vv_check = mysqli_query($conn,$query_vv_check);
						
						$sql_vv_check_num = mysqli_num_rows($sql_vv_check);
						
						
						$query_cc = "SELECT * FROM `course_complete` where c_id = '$c_id' AND u_id = '$user_id'";	

						$sql_cc = mysqli_query($conn,$query_cc);
						$result_cc= mysqli_fetch_array($sql_cc);
						
							$complete = $result_cc["complete"];
							if($complete == ""){
								$complete = 0 ;
							}
									       
				?>
					<tr>
						<td><?php echo $i++ ;?></td>
                        <td><?php echo $c_name_lan1 ;?></td>
                        <td><?php echo $sql_allvideo_num ;?></td>
                        <td><?php echo $sql_vv_check_num ;?></td>
                        <td><?php echo $complete ;?></td>
					</tr>
				<?php
					}
				?>
              </tbody>
            </table>
            <!-- // Data table -->
          </div>

        </div>
      </div>
    </div>

    
  </div>

<?php include("footer.php");?>