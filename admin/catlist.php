﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <?php
               if (isset($_GET['delid'])) {
                 # code...
                $del=$_GET['delid'];
                $query="delete from tbl_category where id=$del";
                $deldata=$db->delete($query);
                if ($deldata) {
                  # code...
                  echo "Delete Sucessfully";
                }
                else
                {
                  echo "Sorry";
                }
               }

                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
                       $query="select * from 	tbl_category	order by id desc";
                       $chategory=$db->select($query);
                       if ($chategory) {

                       	# code...
                       	$i=0;
                       	while ($result=$chategory->fetch_assoc()) {
                       		# code...
                       		$i++;
                       	
						?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $result['name']?></td>
							<td><a href="editcat.php?catid=<?php echo $result['id']; ?>">Edit</a> || <a onclick="return confirm('are you delete!!!!');"href="?delid=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
						<?php }
                       }?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
          <?php include 'inc/footer.php';?>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>
