<?php include 'includes/config.php'; ?>
<?php include 'includes/header.php'; ?>

	 
<?php
//form2.php

//DEFINE('THIS_PAGE', basename($_SERVER['PHP_SELF']));

if(isset($_POST['MyName']))
{
	$to= $_POST['MyEmail'];

	//$personInfo = $_POST['MyName'] . $_POST['MyEmail'] . $_POST['MyTelephone'];

	$edisonDate = ' ' . date('l jS \of F Y h:i:s A');
	
	$message= process_post();

	$subject = 'Email Test Form' . $edisonDate;

	$headers='From:' . $_POST['MyEmail']  . PHP_EOL . 'Reply-To:' . $_POST['MyEmail'] . PHP_EOL . 'X-Mailer:PHP/' . phpversion();

	mail($to, $subject, $message, $headers/*, $personInfo*/);


	echo 'Email sent..!';
	
	
}
else{

echo '
<form action = " ' .THIS_PAGE. '" method="post">

<br>
<br>
My Name:<input type="text" name="MyName" required /> <br />
<br>
My Password:<input type="password" name="MyPassword" required /> <br />
<br>
My Email:<input type="email" name="MyEmail" /> <br />
<br>
<input type="radio" name="Sex" value="male" checked>Male
<br>
<input type="radio" name="Sex" value="female">Female
<br>
<input type="radio" name="Sex" value="other">Other
<br>
<input type="radio" name="Sex" value="alloftheabove">All of the Above
<br>
<br>
<input type="checkbox" name="size" value="xSmall"> X-Small<br>
<input type="checkbox" name="size" value="small" checked> Small<br>
<input type="checkbox" name="size" value="medium"> Medium<br>
<input type="checkbox" name="size" value="large" checked> Large<br>
<input type="checkbox" name="size" value="xLarge" checked> X-Large<br>

<br>
<br>

<select>
  <option value="batman">Batman</option>
  <option value="cacti">Cacti</option>
  <option value="checkmate">Checkmate</option>
  <option value="elephant">Elephant and Bird</option>
  <option value="flowers">Flowers with Legs</option>
  <option value="gunHolster">Gun Holster</option>
  <option value="hanging">Hanging Out</option>
  <option value="jesus">Jesus</option>
  <option value="lightbulb">Lightbulb Headphones</option>
  <option value="mickey">Mickey Mouse Guns</option>
  <option value="mummy">Mummy In Pocket</option>
  <option value="organs">Organs</option>
  <option value="chess">Rather Play Chess</option>
  <option value="starlord">Starlord</option>
  <option value="starpaint">Star Paint Spill</option>
  <option value="stormtrooper">Storm Trooper Suit</option>
  <option value="theseguns">These Guns</option>
  <option value="trexdrums">T-Rex Drums</option>
  <option value="uniqueness">UniqueNess</option>
  <option value="unstoppable">Unstoppable T-Rex</option>
  <option value="wonderwoman">Wonder Woman</option>
</select>

<br>
<br>
<br>

<textarea rows="4" cols="50" name ="MyComments">
</textarea>

<br>
<br>

<input type = "submit"/>

</form>



';
}
?>	
	<?php include 'includes/footer.php'; ?>