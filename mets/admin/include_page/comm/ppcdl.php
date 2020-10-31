<?php include("./include/top_bar.php");?>
<?php include("./include/sidebar_nav.php");?>
<script>
function delete_faq(id){
	var r = confirm("Are you sure you want to delete?");
	 if (r == true) {
       window.location = "home.php?mode=comm&pg=ppcdl&deleteid="+id;
    }
	
}
</script>
 <?php if(isset($deleteid) && $deleteid !=''){
	 $qr = "DELETE from ppcdl_forms where id = '".$deleteid."'";
					
					mysqli_query($con, $qr);
					 set_message("Deleted Successfully","SUCC");
 }?> 
    <div class="content">
        
        <div class="header">

            <h1 class="page-title">PPCDL Forms</h1>
        </div>
        
  
                <ul class="breadcrumb">
            <li><a href="home.php">Home</a> <span class="divider">/</span></li>
            <li class="active">PPCDL</li>
        </ul>

        <div class="container-fluid">
            <div class="row-fluid">
                     <?php show_message();?>


<div class="row-fluid">
 <div class="btn-toolbar">
           <!--      <a href="<?php echo pg_link("mode=comm&pg=ppcdl_add")?>"  title="Add New Form" class="btn btn-primary"><i class="icon-plus"></i> New PPCDL Form</a>
                -->
                <div class="btn-group">
                </div>
                
            </div>
    <div class="block span6">
        <a href="#tablewidget" class="block-heading" data-toggle="collapse">PPCDL Form's</a>
		
        <div id="tablewidget" class="block-body collapse in">
        <?php $faq = mysqli_query($con,"SELECT * from ppcdl_forms");
		$sl =1;
		?>
            <table class="table"  style="width:100%;">
              <thead>
             
                <tr>
               
                  <th>SL</th>
                  <th>Form</th>
                  <th>Delete</th>
                </tr>
              </thead>
              
              <tbody>
              
               <?php while($result = mysqli_fetch_array($faq)){
			  ?>
                
                <tr>
                  <td ><?php echo $sl;?></td>
                  <td><a href="uploads/<?php echo $result['form'];?>"><?php echo $result['form']?></a></td>
                  
                 
                  <td style="text-align:center;"> 
				 
				  <a onclick="delete_faq(<?php echo $result['id'];?>)" title="Delete"><i class="icon-trash"></i></a>
				  </td>
                </tr>
              <?php 
			  $sl++;
			  }?>  
                
              
              </tbody>
            </table>
         
        </div>
    </div>
  
</div>



                
            </div>
           <?php include("./include/footer.php"); ?>
         
        </div>
    </div>
    


    
  </body>
</html>


