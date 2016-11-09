<?php include("header.php");?>
  <div class="container">
    

    <div class="page-section">
      <div class="row">
        <div class="col-md-12 col-lg-12">

  

          <h4 class="page-section-heading">Recent  Watch Video</h4>
          <div class="panel panel-default">
            <!-- Data table -->
            <table data-toggle="data-table" class="table" cellspacing="0" width="100%">
              <thead>
                <tr>
                	<th>#</th>
                    <th>Category</th>
                    <th>Video Name</th>
                    <th>Viewed by</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                	<th>#</th>
                    <th>Category</th>
                    <th>Video Name</th>
                    <th>Viewed by</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
              </tfoot>
              <tbody>               
                <?php
					$i = "1";
								$query = "SELECT vv.*,vid.v_name_lan2,cor.c_name_lan2,usr.full_name FROM `video_view` AS vv
											LEFT JOIN video as vid ON vid.v_id = vv.v_id
											LEFT JOIN courses as cor ON vid.cat_id = cor.c_id
											LEFT JOIN user as usr ON usr.u_id = vv.u_id																						
											WHERE add_by  = '$uid'
											ORDER BY vv_id desc
											";
								
								$sql = mysqli_query($conn,$query);
								while($result= mysqli_fetch_array($sql)){
								
									$c_name_lan2 = $result["c_name_lan2"];
									$v_name_lan2 = $result["v_name_lan2"]; 
									$full_name = $result["full_name"];
									$date = $result["date"];
									
									$date1 = explode(" ",$date);
									$date = $date1[0];
									$time = $date1[1];
									
									$date = date("d-m-Y", strtotime($date));				
				?>
					<tr>
						<td><?php echo $i++ ;?></td>
                        <td><?php echo $c_name_lan2 ;?></td>
                        <td><?php echo $v_name_lan2 ;?></td>
                        <td><?php echo $full_name ;?></td>
                        <td><?php echo $date ;?></td>
                        <td><?php echo $time ;?></td>
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