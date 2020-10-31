

<?php 
$mode_label = str_replace('_', ' ', $mode);
$pg_label  = str_replace('_',' ',$pg);

if(isset($ind) && $ind==1){?>
	
     <ul class="breadcrumb">
    
        <li><a href="./home.php">Home</a> <span class="divider">/</span></li>
        <li><a href="<?php echo pg_link("mode=".$mode."&pg=".$pg_head)?>"><?php echo ucwords($mode_label)?></a> <span class="divider">/</span></li>
        <li class="active"><?php echo ucwords($pg_label)?></li>
        
    </ul>
	
<?php }else{?>
	
	<ul class="breadcrumb">
    
        <li><a href="./home.php">Home</a> <span class="divider">/</span></li>
        <li class="active"><?php echo ucwords($mode_label)?></li>
        
    </ul>
    
<?php }?>