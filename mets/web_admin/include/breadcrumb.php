

<? 
$mode_label = str_replace('_', ' ', $mode);
$pg_label  = str_replace('_',' ',$pg);

if($ind==1){?>
	
     <ul class="breadcrumb">
    
        <li><a href="./home.php">Home</a> <span class="divider">/</span></li>
        <li><a href="<?=pg_link("mode=".$mode."&pg=".$pg_head)?>"><?=ucwords($mode_label)?></a> <span class="divider">/</span></li>
        <li class="active"><?=ucwords($pg_label)?></li>
        
    </ul>
	
<? }else{?>
	
	<ul class="breadcrumb">
    
        <li><a href="./home.php">Home</a> <span class="divider">/</span></li>
        <li class="active"><?=ucwords($mode_label)?></li>
        
    </ul>
    
<? }?>