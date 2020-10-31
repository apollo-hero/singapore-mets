<div class="sidebar-nav">


        <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Navigation</a>
        
        	<ul id="dashboard-menu" class="nav nav-list collapse in">
        
                <li class="<? if($pg == 'dashboard') echo 'active'; ?>" ><a href="<?=pg_link("mode=comm&pg=dashboard")?>">Dashboard</a></li>
            <li class="<? if($pg == 'change_password') echo 'active'; ?>" ><a href="<?=pg_link("mode=comm&pg=change_password")?>">Change Password</a></li>
             <a href="#course-menu" class="nav-header" data-toggle="collapse"><i class="icon-book"></i>Course</a>
            
            	  <ul id="course-menu" class="nav nav-list collapse in">
                  
                         <li class="<? if($pg == 'training_list') echo 'active'; ?>"><a href="<?=pg_link("mode=training&pg=training_list")?>" >Training List</a></li>
                         <li class="<? if($pg == 'open_training_list') echo 'active'; ?>"><a href="<?=pg_link("mode=training&pg=open_training_list")?>" >Open Training List</a></li>
                         <li class="<? if($pg == 'closed_training_list') echo 'active'; ?>"><a href="<?=pg_link("mode=training&pg=closed_training_list")?>" >Closed Training List</a></li>
                         <li class="<? if($pg == 'refresher_training_list') echo 'active'; ?>"><a href="<?=pg_link("mode=training&pg=refresher_training_list&training_day=1")?>" >Refresher Training</a></li>
                         <li class="<? if($pg == 'no_date_refresher_training_list') echo 'active'; ?>"><a href="<?=pg_link("mode=training&pg=no_date_refresher_training_list")?>" >No Refresher Course Dates</a></li>
                    
                   </ul>
             <a href="#booking-menu" class="nav-header" data-toggle="collapse"><i class="icon-list"></i>Booking</a>
             	
                <ul  id="booking-menu" class="nav nav-list collapse in">
                
                   
                    	<li class="<? if($pg == 'booking_list') echo 'active'; ?>">
                        	<a href="<?=pg_link("mode=booking&pg=booking_list")?>" >Booking Details</a>
                        </li>
                   
                    
                    	<!-- <li class="<? if($pg == 'booking_list_of_premium_PPCDL') echo 'active'; ?>">
                        	<a href="<?=pg_link("mode=booking&pg=booking_list_of_premium_PPCDL")?>" >Premium PPCDL</a>
                        </li> -->
                    
                    
                        <li class="<? if($pg == 'booking_list_of_PPCDL_under_MCC') echo 'active'; ?>">
                        	<a href="<?=pg_link("mode=booking&pg=booking_list_of_PPCDL_under_MCC")?>" >PPCDL under MCC</a>
                         </li>
                    
                    
                        <li class="<? if($pg == 'booking_list_of_navigation_course') echo 'active'; ?>">
                        	<a href="<?=pg_link("mode=booking&pg=booking_list_of_navigation_course")?>" >Advance Navigation Course</a>
                        </li>
                        <li class="<? if($pg == 'booking_list_of_practical_refresher_course') echo 'active'; ?>">
                        	<a href="<?=pg_link("mode=booking&pg=booking_list_of_practical_refresher_course")?>" >Practical Refresher</a>
                        </li>
                        
                        
                    </ul>
            	</ul>
             
           
                
                   
     
            
         
            
        </ul>

    </div>