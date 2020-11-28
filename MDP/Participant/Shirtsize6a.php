<?php

$usr_eventid = $_GET['event_id'];
$usr_cw = $_GET['cw'];
  // Set up the query
$query = "SELECT * FROM shirtsize WHERE event_id='$usr_eventid'";
  // Run the query
  $result = mysqli_query($connection, $query);

if ($_GET['contactForm'] == "Submit") {
 
  while ($row = mysqli_fetch_array($result)) {
    $xs_cw = $row['XSC'];
	$xs_al = $row['XSL'];
	$s_cw = $row['SC'];
	$s_al = $row['SL'];
	$m_cw = $row['MC'];
	$m_al = $row['ML'];
	$l_cw = $row['LC'];
	$l_al = $row['LL'];
	$xl_cw = $row['XLC'];
	$xl_al = $row['XLL'];
    $usr_name = $row['Event_Name'];
  };
  
    if	($usr_cw<$xs_cw){
    $size="XS";
	} else if	($usr_cw>=$xs_cw && $usr_cw<$s_cw){
	$size="S";
	}else if	($usr_cw>=$s_cw && $usr_cw<$m_cw){
	$size="M";
	}else if	($usr_cw>=$m_cw && $usr_cw<$l_cw){
	$size="L";
	}else if	($usr_cw>=$l_cw){
	$size="XL";
	}


	if ($size=="XS") {
	$usr_al=$xs_al;
	} else if ($size=="S") {
	$usr_al=$s_al;
	} else if ($size=="M") {
	$usr_al=$m_al;
	} else if ($size=="L") {
	$usr_al=$l_al;
	} else if ($size=="XL") {
	$usr_al=$xl_al;
			}
            error_reporting(0);
            ?>
<div class="row">
<svg width="100%" height="250" style="min-width:280px;">
    <g>
  <rect x="3" y="20" rx="20" ry="20" width="98%" height="220"  
  style="fill:#ffffff;stroke:#728C00;stroke-width:5px;opacity:0.5" />
         <text x="17%" y="67" style="font-weight:bold" font-size="19" fill="#728CCC">  <?php echo "$usr_name";?></text>
        <text x="20%" y="115" style="font-weight:bold" font-size="17" fill="#728C00">  Your chest width: <?php echo "$usr_cw";?></text>
        <text x="20%" y="160" style="font-weight:bold" font-size="17" fill="#728C00">  Recommended size: <?php echo "$size";?></text>
        <text x="20%" y="205"  style="font-weight:bold" font-size="17" fill="#728C00">  Length of shirt: <?php echo "$usr_al";?></text>
        
        </g>
</svg></div>

<?php
}
?>
