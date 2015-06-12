<?php
/**
 * demo_view.php along with demo_list.php provides a sample web application
 *
 * this app is contingent upon the  installation and proper 
 * configuration of the nmMini package (config-mini.php) or equivalent  
 * 
 * @package nmListView
 * @author Bill Newman <williamnewman@gmail.com>
 * @version 3.0 2012/11/14
 * @link http://www.newmanix.com/
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License ("OSL") v. 3.0
 * @see demo_list.php
 * @todo none
 */
 
require 'includes/config.php'; #provides configuration, pathing, error handling, db credentials
require 'includes/credentials.php';
 

# check variable of item passed in - if invalid data, forcibly redirect back to list.php page
if(isset($_GET['id'])){#proper data must be on querystring
	 $myID = $_GET['id']; #Convert to integer, will equate to zero if fails
}else{#send the user to a safe location!
	header("Location:list.php");
}

//sql statement to select individual item
$sql = "select shirtName,shirtPrice from shirts_For_Sale where shirtPath = ". '"' . $myID . '"';
//---end config area --------------------------------------------------

$foundRecord = FALSE; # Will change to true, if record found!
   
# connection comes first in mysqli (improved) function
$iConn = @mysqli_connect("mySQL.anthonyjmyers.com","amyers04","DAIiwtl1085","nefarious") or die(myerror(__FILE__,__LINE__,mysqli_connect_error()));
$result = mysqli_query($iConn,$sql) or die(myerror(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0)
{#records exist - process
	   $foundRecord = TRUE;	
	   while ($row = mysqli_fetch_assoc($result))
	   {
			$ShirtName = dbOut($row['shirtName']);
			$Price = (float)$row['shirtPrice'];
	   }
}

@mysqli_free_result($result); # We're done with the data!

if($foundRecord)
{#only load data if record found
	$title = $ShirtName . " a shirt with style!"; #overwrite title with Muffin info!
}
# END CONFIG AREA ---------------------------------------------------------- 

include 'includes/header.php'; #header must appear before any HTML is printed by PHP
?>
<h3 align="center"><?=THIS_PAGE;?></h3>


<?php
if($foundRecord)
{#records exist - show shirts!
?>
	<h3 align="center">An Awesome <?=$ShirtName;?> T-Shirt!</h3>
	<div align="center"><a href="list.php">More T-Shirts?!?</a></div>
	<table align="center">
		<tr>
			<td><img src="images/<?=$myID;?>.jpg" /></td>
			<td>We sell <?=$ShirtName;?> for cheap prices!</td>
		</tr>
		<tr>
			<td align="center" colspan="2">
				<h3><i>ONLY!!:</i> <font color="red">$<?=number_format($Price,2);?></font></h3>
			</td>
		</tr>
	</table>
<?php
}else{//no such shirt!
    echo '<div align="center">What! No such Shirt? There must be a mistake!!</div>';
    echo '<div align="center"><a href="list.php">Another Shirt?</a></div>';
}

include 'includes/footer.php'; #header must appear before any HTML is printed by PHP
?>
