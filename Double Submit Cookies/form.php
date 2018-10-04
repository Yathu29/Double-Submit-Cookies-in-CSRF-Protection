<?php

	if(isset($_POST['name']) && isset($_POST['pass']))
	{
		$name = $_POST['name'];
		$pass =$_POST['pass'];

		if (($name=='IT15133496') && ($pass=='123'))
		{
			//echo "USER LOGIN SUCCESSFUL.";	
			session_start();
			$csrf_token_value = base64_encode(openssl_random_pseudo_bytes(32));
			$_SESSION['csrf_token'] = $csrf_token_value;
			$session_id = session_id();
			setcookie('session_cookie',$session_id,time()+60*60*24*30,'/');
			setcookie('csrf_cookie',$_SESSION['csrf_token'],time()+60*60*24*30,'/');
		}

		else
		{
			echo "Invalid Login";
			exit();
		}

	}

?>


<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no'>
        <title>SSD Assignment</title>
        <link rel='stylesheet' href='https://themes.getbootstrap.com/wp-content/themes/bootstrap-marketplace/style.css?ver=1531597991' />
		
		
    </head>
    <body class="page-template-default page page-id-7 page-parent woocommerce woocommerce-account woocommerce-page dokan-theme-dokan">

		<main id="main" class="site-main main">
			<section class="section">
				<div class="container">
					<div class="row">
						<div class="container container--xs">
							<div class="woocommerce">



								<div id="signup_div_wrapper" >
								
									<h1 style="margin-top:-50px !important"class="mb-1 text-center">Form</h1>
									

    												

										<form method="post" action="form_next.php" class="register">

											<p class="woocommerce-FormRow woocommerce-FormRow--first form-row form-row-first">
												<label for="reg_sr_firstname">Item <span class="required">*</span></label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name"   required/>
											</p>

											<p class="woocommerce-FormRow woocommerce-FormRow--last form-row form-row-last">
												<label for="reg_sr_lastname">Quantity <span class="required">*</span></label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="age"  required />
											</p>
											
											<p class="woocomerce-FormRow form-row">
												          
												<input type="submit" class="btn btn-primary  btn-lg mb-4 mt-3" align="center" style="width:200px !important;margin-left:150px;" name="submit" value="Submit" />
											</p>
											
											
											
											<input type="hidden" name="token" id="token" />
    
										</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
        </main>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script>
	$(document).ready(function()
	{
		var name = "csrf_cookie" + "=";
		var cookie_value = "";
		var decoded_cookie = decodeURIComponent(document.cookie);
		var d = decoded_cookie.split(';');
		for(var i = 0; i <d.length; i++) 
		{
			var c = d[i];
			while (c.charAt(0) == ' ') 
			{
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) 
			{
				cookie_value = c.substring(name.length, c.length);
				document.getElementById("token").setAttribute('value', cookie_value);
			}
		}
	});
	</script>
	   


	</body>
</html>