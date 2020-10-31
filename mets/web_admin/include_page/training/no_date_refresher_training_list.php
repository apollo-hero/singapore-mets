 <?php
 
 if($del )
 {
		$str = mysql_query("select count(*) as ct from no_date_refresher where id = '".$del_id."'");
		$result = mysql_fetch_array($str);
		if($result['ct']>0)
		{
			$str = mysql_query("delete from no_date_refresher where id = '".$del_id."'");
			set_message("Deleted Successfully","SUCC");
			red_url("mode=training&pg=no_date_refresher_training_list");
		}
		
 }
 $pg_head = 'training_list';
 	if($_POST)
	{
	
			
			$str = mysql_query("SELECT count(*) as ct FROM `no_date_refresher` WHERE `month_year` = '".$month_year."' ");
			$result = mysql_fetch_array($str);
			if($result['ct']==0)
			{
			
				$qr = "INSERT  no_date_refresher SET
				month_year			=	'".add_trim($month_year)."',
				nodate				=	'".add_trim($nodate)."'";
			
			
				mysql_query($qr);
				set_message("Added Successfully","SUCC");
				red_url("mode=training&pg=no_date_refresher_training_list");
			}
			else
			{
				$qr = "Update  no_date_refresher SET
				nodate				=	'".add_trim($nodate)."'
				where month_year			=	'".add_trim($month_year)."'";
				set_message("Updated Successfully","ERR");
				red_url("mode=training&pg=no_date_refresher_training_list");
				
			}
		}
		

	
	
	
	
				
 ?> 
<?php include("./include/top_bar.php");?>
    
<?php include("./include/sidebar_nav.php");?>    


<div class="content">

    <div class="header">
    
        <h1 class="page-title"> No Practical Refresher Course Dates</h1>
    </div>

   
    <?php $ind=1;
	include("./include/breadcrumb.php");?>
   
   

    <div class="container-fluid">
        <div class="row-fluid">
        
        <?php show_message();?>
        
           
            
            <div class="well">
            
                
                
                <div id="myTabContent" class="tab-content">
                
                    <div class="tab-pane active in" id="home">
                       
                        <form  name="reg_form" id="reg_form" method="post" action="">
                        
                        
                        
                         
                        <label><strong>Month-Year</strong></label>
                       <select name="month_year" id="month_year" onChange="javascript:ch_mon(this.value)">
					    <option value="">Select Month and year</option>
					   <?
					   for ($i = 0; $i <= 4; $i++) {
							$months_dis = date("M-Y", strtotime( date( 'Y-m-01' )." +$i months"));
							$months_val = date("Y-m-d", strtotime( date( 'Y-m-01' )." +$i months"));
						
						?>
					    <option value="<?=$months_val?>" <? if($months_val==$month_year){?> selected <? } ?> ><?=$months_dis?></option>
					  <?
					  }
					  ?>
						</select>
                     <?
					 if($month_year){
						 $univ3 = mysql_query("select * from no_date_refresher  where month_year='".$month_year."' ");
						$result3 = mysql_fetch_array($univ3);
							$nodate =$result3['nodate'];
						}
			?>
                        <label><strong>Date(exp 1,20,25,30)</strong></label>
                       <input type="text" name="nodate" value="<?=$nodate?>">
                        
                  <div class="btn-toolbar">
                <button class="btn btn-primary" type="submit" onClick="document.reg_form.submit()"><i class="icon-save"></i> Save</button>
              
                   
            </div>
                      
                        
                        </form>
                    </div>
                    
                    
                   
                </div>
            
            </div>
			
			
			
			
        <div class="well">
				    <h3 >No Practical Refresher Course Dates List </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            
                            <th>Start Time</th>
                            <th>End Time</th>
                            
                           
                           
 <th></th>
                        </tr>
                    </thead>
                    
                    <tbody>
            <?php 
			$cnt=0;
			$univ = mysql_query("select * from no_date_refresher  order by month_year desc ");
			while($result = mysql_fetch_array($univ)){
				$cnt++;
				?>
                    
                        <tr>
                            <td><?=$cnt?></td>
                             <td><?=date("M-Y", strtotime($result['month_year']))?></td>
                            <td><?=$result['nodate']?></td>
                          
                           <td> <a href="<?=pg_link("mode=training&pg=no_date_refresher_training_list&del_id=".$result['id']."&del=true&start=".$start)?>" title="Delete">Delete</a></td>
                        </tr>
             <? }?>           

                    </tbody>
                </table>
            </div>
            
        
        
        
        	<?php include("./include/footer.php"); ?>
            
        </div>
    </div>
</div>

<script type="text/javascript">
function ch_mon(obj)
{
	window.location.href='<?=pg_link("mode=training&pg=no_date_refresher_training_list")?>&month_year='+obj;
}


</script>
  
  </body>
</html>


