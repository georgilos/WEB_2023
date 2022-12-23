<?php
// με την function check_login , ουσιαστικά θα τσεκάρει αν το login έχει γίνει και αν τα στοιχεία που έχουμε εισάγει ειναι τα ίδια με τα στοιχεία που έγινε και το SIGN UP
//  και επικοινωνεί με την ΒΔ ,μέσω της παραμέτρου $conn
function check_login($con)
{
    // ελέγχουμε αν το user_id είναι στην ΒΔ
	if(isset($_SESSION['user_id']))
	{
       
		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";
        
		// το αποτελέσμα που πήραμε από την ΒΔ
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//else redirect to login
	header("Location: login.php");
	die;

}
// με την συνάρτηση αυτή ουσιαστικά μπορούμε να δημιοιυργήσουμε , τον τυχαίο user_id , 
//οπού η βάση μας αποθηκεύει αυτόματα και προφανώς τυχαία 
//στην ΒΔ μετά την εγγραφή κάθε χρηστη . Τα μέγιστα ψηφία που μπορεί να πάρει ειναι 20, το οποίο το ορίσαμε στο signup.php



function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}



//με την function αυτή δημιουργούμε τους περιορισμούς για τον password του user.  


function password_strength($password) {
	$password_length = 8; 
	$returnVal = True;

	if ( strlen($password) < $password_length) {
		$returnVal = False;
	}

	if ( !preg_match("#[0-9]+#", $password) ) {
		$returnVal = False;
	}

	if ( !preg_match("#[a-z]+#", $password) ) {
		$returnVal = False;
	}

	if ( !preg_match("#[A-Z]+#", $password) ) {
		$returnVal = False;
	}

	if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password) ) {
		$returnVal = False;
	}

	return $returnVal;

}

?>