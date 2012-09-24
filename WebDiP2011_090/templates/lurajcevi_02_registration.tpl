{include file="header.tpl"}

<div id = 'sadrzaj'> 
			<div class = image_div>
			<img class = 'image' src = "pictures/Giraffe.png" alt = 'Žirafa' />
			</div>
			<div class = "reg_form" >
				Registriraj se:
				<form id = 'registracija' name='registracija_' method='post' action = 'insert.php' enctype="multipart/form-data">
					Ime:<br/>
					<div>
					<input type="text" class = "formInput" id = "ime" name = "ime" value ="{if (isset($ime))}{$ime}{/if}"/>
					{if (isset($noName))} <span class = 'greska'> {$noName} </span> {/if} 
					
					</div>
					<div>
					Prezime:<br/><input type="text" class = "formInput" name= "prezime" value = "{if (isset($prezime))}{$prezime}{/if}"/>
					{if (isset($noSurname))} <span class = 'greska'> {$noSurname} </span> {/if} 
					
					</div>
					<div>
					E-mail<br/><input type ="text"  class = "formInput" name = "email" value = "{if (isset($email))}{$email}{/if}" />
					{if (isset($noEmail))} <span class = 'greska'> {$noEmail} </span> {/if}
					
					</div>
					<div>
					Korisničko ime <br/><input type = "text" class = "formInput" id = "kor_ime" name = "username" value = "{if (isset($username))}{$username}{/if}"/>
					<span id = "usernameStatus" class = "jsOk"></span>
					{if (isset($noUsername))} <span class = 'greska'> {$noUsername} </span> {/if}
					
					</div>
					<div>
					Lozinka<br/><input type = "password" class = "formInput" id = "password" name = "password" />
					{if (isset($noPassword))} <span class = 'greska'> {$noPassword} </span> {/if}
					
					</div>
					<div>
					Ponovljena lozinka: <br/><input type = "password" class = "formInput" name = "re_password" />
					{if (isset($noRePass))} <span class = 'greska'> {$noRePass} </span> {/if}
					
					</div>
					<input type="hidden" name="MAX_FILE_SIZE" value="1048576">
					<div>
					Avatar: <br/><input type = "file" name = "avatar" /><br/>
					</div>
					{if (isset($captcha))} {$captcha} {/if}
					<div>
					<input type = "submit" name = "ok" value = "Registriraj se" />
					</div>
				</form>
				{if (isset($noPassMatch))} <span class = 'greska'> {$noPassMatch} </span> {/if}
				{if (isset($passwordError))} <br/><span class = 'greska'> {$passwordError} </span>{/if}
				{if (isset($recaptcha_err))} <br/><span class = 'greska'> {$recaptcha_err} </span>{/if}
			</div>
</div>
{include file="footer.tpl"}