<?php


require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials 
require 'includes/credentials.php';

# SQL statement
$sql = "select shirtName,shirtPath, shirtPrice from shirts_For_Sale";

#Fills <title> tag  
$title = 'Shirts to impress the opposite sex. Or same sex. We dont judge';

# END CONFIG AREA ---------------------------------------------------------- 

include 'includes/header.php'; #header must appear before any HTML is printed by PHP
?>


<?php

# connection comes first in mysqli (improved) function

$iConn = @mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));
if(mysqli_num_rows($result) > 0)
{#records exist - process
	while($row = mysqli_fetch_assoc($result))
	{# process each row

          echo '<div align="center"><a href="view.php?id=' . $row['shirtPath'] . '">' . dbOut($row['shirtName']) . '</a>';
         echo ' <i>only</i> <font color="red">$' . number_format((float)$row['shirtPrice'],2)  . '</font></div>';
 
	} 
}else{#no records
    echo "<div align=center>What! No Shirts?  There must be a mistake!!</div>";	
}
@mysqli_free_result($result);

include 'includes/footer.php';
?>