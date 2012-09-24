
{include file = "header.tpl"}

		<div id = 'sadrzaj'> 
		
			<div class = image_div>
				<img src = "pictures/Giraffe.png" alt = 'Žirafa'/>
			</div>
			<div class = "podstava">
				<div>
				<form id = 'logiranje' name='logiranje' method='POST' action = 'login.php'>
					
					<input class= "form_style" id = "uname" type = 'text' name = 'username' value = "{if (isset($cookiedUser))}{$cookiedUser}{/if}" /> <br/>
					<input class= "form_style1" id ="pwd" type = 'password' name = 'password'  />  <br/> 
					<input class= "form_checkbox" type = 'checkbox' name= 'remember' value  = '0' checked /> Zapamti me <br/>                                                  
					<input type = 'hidden' name = 'op' value = 'ds'/>
					<input class= "form_style2" type = 'submit' name = 'ok' value = 'Log in' />
					<button type = "button" id = "forgottenPassword" class = "rateEventButton">Zaboravljena lozinka?</button>
				</form>
				</div>
				<div class = 'err' id = "errorDIV">
					<div name = "yy">{if (isset($emptyInput))}
						{$emptyInput}
					{elseif (isset($neuspjeh))}
						{$neuspjeh}
					{elseif (isset($nonAuthAccess))}
						{$nonAuthAccess}
					{/if}
					{if (isset($accessDenied))}
						{$accessDenied}
					{/if}
					</div>
				</div>
			</div>
			
		</div>
		
{include file = "footer.tpl"}