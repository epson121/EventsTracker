function provjera()
{
	//ime provjera
	if (document.userData.imeBox.checked)
 		document.userData.ime.readOnly=false;
 	else
 		document.userData.ime.readOnly=true;
 	
 	//prezime provjera
 	if (document.userData.prezimeBox.checked)
 		document.userData.prezime.readOnly=false;
 	else
 		document.userData.prezime.readOnly=true;

 	//email
 	if (document.userData.emailBox.checked)
	{
		document.userData.email.readOnly=false;
	}
 	else
 		document.userData.email.readOnly=true;
 	
	//lozinka
	if (document.userData.passBox.checked)
 		document.userData.lozinka.readOnly=false;
 	else
 		document.userData.lozinka.readOnly=true;
	
	
 	//avatar
 	if (document.userData.avatarBox.checked)
 		document.userData.avatar.readOnly=false;
 	else
 		document.userData.avatar.readOnly=true;

}	
	
