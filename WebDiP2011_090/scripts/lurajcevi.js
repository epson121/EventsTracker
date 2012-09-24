window.onload = function()
{
	//dohvaćanje urla
	var sPath = window.location.pathname;
	var sPage =  sPath.substring(sPath.lastIndexOf('/') + 1);
	var counter = 0;
	
	if ((sPage == "lurajcevi_02_login.php") || (sPage == "login.php"))
	{
		//dohvati elemente forme za login
		var elem = document.getElementById('logiranje').elements;
		for (var i = 0; i < elem.length; i++)
		{
			//ako je neki od boxeva
			if (elem[i].type == 'text' || elem[i].type == 'password' )
			{
				//za IE
				if (!elem[i].addEventListener)
				{
					elem[i].onfocus = function()
					{
						this.className = "jsFormFocusedLogin";
					}
					elem[i].onblur = function()
					{
						this.className = "form_style";
					} 
				}	
				//dodavanje addeventlistenera
				else 
				{
					elem[i].addEventListener('focus', focusField, false);
					elem[i].addEventListener('blur', blurField, false);
				}
			}
			//ak se klikne kraj
			else if (elem[i].type == 'submit')
			{
				//za IE
				if (!elem[i].addEventListener)
				{
					elem[i].onclick = function()
					{
						
						event.preventDefault();
						var use = document.getElementById("uname");
						//dohvati formu i proslijedi ju provjeri
						var forma = use.form;
						if (validateInput(forma))
						{
							forma.submit();
						}
					}
				}
				//za ostale
				else
				{
				elem[i].addEventListener('click', checkInput, false);
				}
			}
		}
	}

	if ((sPage == "lurajcevi_02_registration.php") || (sPage == "insert.php"))
	{

		

		var elem = document.getElementById('registracija').elements;
		for (var i = 0; i < elem.length; i++)
		{
			//console.log(elem[i].type);
			if (elem[i].type == 'text' || elem[i].type == 'password' || elem[i].type == 'file')
			{
				if  (elem[i].type == 'text' && elem[i].name == 'username')
				{
					elem[i].addEventListener('focus', focusFieldReg, false);
					elem[i].addEventListener('blur', checkUsernameAJAX, true);
					//elem[i].addEventListener('blur', blurField, false);
				}
				else
				{
				elem[i].addEventListener('focus', focusFieldReg, false);
				elem[i].addEventListener('blur', blurFieldReg, false);
				}
			}
			else if (elem[i].type == 'submit')
			{
				//var forma = elem.form;
				elem[i].addEventListener('click', checkUser, true);
			}
		}
	}
	if ((sPage == "usersPaging.php") || (sPage == "categoriesPaging.php"))
	{
	//postavljanje eventa za onmouse over i onmouseout za tablice (da mijenjaju boju na hover)
	var elem = document.getElementsByTagName('tr');
	for (var i = 1; i < elem.length; i++)
	{
		//console.log(elem[i].type);
		//za IE
		if (!elem[i].addEventListener)
		{
			//elem[i].attachEvent('onmouseover', mousseoverIE);
			//elem[i].attachEvent('onmouseout', mousseoutIE);
			elem[i].onmouseover = function()
			{
				this.style.backgroundColor = "332211";
			}
			elem[i].onmouseout = function()
			{
				this.style.backgroundColor = "112233";
			}
			
		}
		else if (elem[i].addEventListener)
		{
			elem[i].addEventListener('mouseover', mousseOver, false);
			elem[i].addEventListener('mouseout', mousseOut, false);
		}
	}
	}
	//dodavanje gumba za zaboravljenu lozinku
	if (sPage == "lurajcevi_02_login.php")
	{
		$("#forgottenPassword").click({param1:id}, forgottenPasswordDialog);
	}
	if (sPage == "events.php") 
	{
		//dohvati podatke o eventima s ajaxom
		$.ajax({
			type: 'GET',
			url: 'eventsPaging.php',
			dataType: 'xml',
			success: displayXML,
			
		})
	}
	if (sPage == "allEvents.php")
	{
		//dohvati podatke o svim eventima s ajaxom
		$.ajax({
			type: 'GET',
			url: 'allEventsPaging.php',
			dataType: 'xml',
			success: displayXML,
			
		})
	}
	if (sPage == "popisDogadaja.php")
	{
		$.ajax({
			type: 'GET',
			url: 'eventsPaging.php',
			dataType: 'xml',
			success: displayXML,
			
		})
	} 
	if (sPage == 'lurajcevi_02_admin_panel.php')
	{
		//dodaj gumbe na admin panel
		$("#markUserButton").click({param1:id}, markUserDialog);
		$("#disableUserAccessButton").click({param1:id}, disableUserAccessDialog);
		$("#deleteCategoryButton").click({param1:id}, deleteCategoryDialog);
		$("#deleteEventButton").click({param1:id}, deleteEventDialog);
		$("#deleteUserButton").click({param1:id}, deleteUserDialog);
	}
	if (sPage == 'lurajcevi_02_kreiranje_dogadaja.php')
	{
		// prikazi i sakrij dodatne pogodnosti
		$("#eventBenefits").hide();
		var input = $("#addEventBenefits").click( function(){
			$("#eventBenefits").show();
		});
	}
	if (sPage == 'user_management.php')
	{
		//on click eventi na gumbe
		var id = getEventId();
		$("#addCreditCardButton").click({param1:id}, addCreditCard);
		$("#addAdress").click({param1:id}, addAdress);
		$("#getMyEvents").click({param1:id}, getMyEvents);
		
		
	}
	if (sPage == 'cartCheckout.php')
	{
		//klikom na kupi karte u cartCheckout
		var input = $("#purchaseEvents_cart").click(cartPurchase)
	}
	if (sPage == 'eventDetails.php')
	{
		//podaci o eventu
		var url = document.location.href;
		var sUrl =  url.substring(url.lastIndexOf('=')+1);
		loadComments(sUrl);
		if (sUrl.charAt(1) == "#")
		{
			sUrl = sUrl.slice(0,1);
		}
		else if (sUrl.charAt(2) == "#")
		{
			sUrl = sUrl.slice(0,2);
		}
		
		var input = $("#rateEventButton").click({param1: sUrl}, rateEvent);
		var input2 =$("#getVotersNames").click({param1:sUrl},getVoters);
		$('#eventCommentText').selectRange(0,0);
		var input3 = $("#postCommentButton").click({param1:sUrl},postAComment);
		var input6 = $("#purchaseButton").click({param1:sUrl}, purchaseEvent);
		var input7 = $("#addToCartButton").click({param1:sUrl}, addToCart);
		var input7 = $("#goToCartSite").click({param1:sUrl}, goToCartSite);
		var input8 = $("#getBuyers").click({param1:sUrl}, getBuyers);
		
				
}
}

//funkcija za zaboravljenu lozinku
function forgottenPasswordDialog(event)
{
	var url = "forgottenPassword.php";
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}



//funkcija koja dohvaca podatke iz baze i prikazuje dialog za brisanje korisnika
function deleteUserDialog(event)
{
	var url = "deleteUser.php";
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//funkcija koja dohvaca podatke iz baze i prikazuje dialog za brisanje dogadaja
function deleteEventDialog(event)
{
	var url = "deleteEvent.php";
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//funkcija koja dohvaca podatke iz baze i prikazuje dialog za brisanje kategorije
function deleteCategoryDialog(event)
{
	var url = "deleteCategory.php";
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}


//funkcija koja dohvaća podatke o događajima nekog korisnika
function getMyEvents(event)
{
	var id = event.data.param1;
	var x = "myEventsXml.php";
	$.ajax({
			type: 'GET',
			url: x,
			dataType: 'xml',
			success: showMyEvents,
			error:function (xhr, ajaxOptions, thrownError){
                    //alert(xhr.status);
                    //alert(thrownError);
                }    
		})
}

//funkcija koja dohvaca podatke iz baze i prikazuje dialog za onemogućavanje korisnika
function disableUserAccessDialog(event)
{
	var url = "disableUser.php";
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//funkcija koja dohvaca podatke iz baze i prikazuje dialog za označavanje korisnika
function markUserDialog(event)
{
	var url = "markUser.php";
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//funkcija za prikaz evenata (xml parsiranje)
function showMyEvents(xml)
{
	$('#myEvents').html('');
	var tablica = $('<table id = "myEventsTable" class = "rateTable">');
	tablica.append("<td class = 'rateHeader'> Naziv događaja </td><td class = 'rateHeader'> Broj ulaznica </td><td class = 'rateHeader'> Noćenje </td><td class = 'rateHeader'> Prijevoz </td>");
	$(xml).find("event").each(function(){	
		if ($(this).find("prijevoz").text() == "0")
		{
			var x = "Ne";
		}
		else
		{
			x = $(this).find("prijevoz").text();
		}
		if ($(this).find("nocenje").text() == "0")
		{
			var y = "Ne";
		}
		else
		{
			y = $(this).find("nocenje").text();
		}
	tablica.append("<tr><ul><li><td id= 'rateUsername'>" + $(this).find("name").text() + "</td><td id= 'rateUsername'>" + $(this).find("ticketNo").text() + "</td><td id= 'rateUsername'>" + x + "</td><td id= 'rateUsername'>" + y + "</td></li></tr>");
	});
	$('#myEvents').append(tablica);
	$('#myEvents').append(tablica);

	//$('#eventBuyers').append("<div class='pager'><a href='#' alt='Previous' class='prevPage'>Prev</a><span class='currentPage'>&nbsp;</span> of <span class='totalPages'>&nbsp;</span><a href='#' alt='Next' class='nextPage'>Next</a></div>");
	//$('#tablica').paginateTable({ rowsPerPage: 10 });
	
	$('#myEvents').show('blind', 2000);
}

//funkcija za dohvaćanje kupaca
function getBuyers(event)
{
	var id = event.data.param1;
	var x = "buyersXML.php?id="+id;
	$.ajax({
			type: 'GET',
			url: x,
			dataType: 'xml',
			success: showBuyers,
			error:function (xhr, ajaxOptions, thrownError){
                    //alert(xhr.status);
                    //alert(thrownError);
                }    
		})
}

//funkcija za prikaz kupaca
function showBuyers(xml)
{
	$('#eventBuyers').html('');
	var tablica = $('<table id = "table" class = "rateTable">');
	tablica.append("<td class = 'rateHeader'> Korisničko ime </td>");
	$(xml).find("kupac").each(function(){	
	tablica.append("<tr><ul><li><td id= 'rateUsername'>" + $(this).find("username").text() + "</td></li></tr>");
	});
	$('#eventBuyers').append(tablica);
	$('#eventBuyers').append(tablica);

	//$('#eventBuyers').append("<div class='pager'><a href='#' alt='Previous' class='prevPage'>Prev</a><span class='currentPage'>&nbsp;</span> of <span class='totalPages'>&nbsp;</span><a href='#' alt='Next' class='nextPage'>Next</a></div>");
	//$('#tablica').paginateTable({ rowsPerPage: 10 });
	
	$('#eventBuyers').show('blind', 2000);
}

//funkcija za prikaz dialoga za kupnju stvari u košarici
function cartPurchase(event)
{
	var url = "purchaseByCart.php";
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//deprecated
function goToCartSite(event)
{
	document.location.href='cartCheckout.php';
}

//f za dodavanje stvari u košaricu
function addToCart(event)
{
	var id = event.data.param1;
	var url = "addToCart.php?id=" + id;
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//f za dodavanje adrese (load dialoga)
function addAdress(event)
{
	var uname = event.data.param1;
	//alert (uname);
	var url = "addAdress.php?uname=" + uname;
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//f za dodavanje kreditne kartice
function addCreditCard(event)
{
	var uname = event.data.param1;
	//alert (uname);
	var url = "addCreditCard.php?uname=" + uname;
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('body');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

//kupovina dogadaja direktno iz eventdetails
function purchaseEvent(event)
{
	var id = event.data.param1;
	var url = "loadPurchaseData.php?id=" + id;
	var dialog = $("#dialog");
	if ($("#dialog").length == 0) {  // if it doesnt exist create it
        dialog = $('<div id="dialog" style="display:hidden"></div>').appendTo('#event');
    } 
	dialog.load(
		url, 
		{},
		function(responseText, textStatus, XMLHttpRequest) { // success callback
			dialog.dialog();  // show the dialog
        }
	
	);
	return false;
}

function lightbox(event) {
 
        //prevent default action (hyperlink)
        event.preventDefault();
 
        //Get clicked link href
        var image_href = $(this).attr("href");
 		//alert(image_href);
        /*
        If the lightbox window HTML already exists in document,
        change the img src to to match the href of whatever link was clicked
 
        If the lightbox window HTML doesn't exists, create it and insert it.
        (This will only happen the first time around)
        */
 
        if ($('#lightbox').length > 0) 
        { // #lightbox exists
 
            //place href as img src value
            $('#content').html('<img src="' + image_href + '" />');
 
            //show lightbox window - you could use .show('fast') for a transition
            $('#lightbox').show();
        }
 
        else 
        { //#lightbox does not exist - create and insert (runs 1st time only)
 
            //create HTML markup for lightbox window
            var lightbox =
            '<div id="lightbox">' +
                '<p>Click to close</p>' +
                '<div id="content">' + //insert clicked link's href into img src
                    '<img src="' + image_href +'" />' +
                '</div>' +
            '</div>';
 
            //insert lightbox HTML into page
            $('body').append(lightbox);
        }
   
} 

//dodaj komentar
function postAComment(event)
{
	var id = event.data.param1;
	var z = $("#eventCommentText").val();
	var x = "commentPosting.php?id="+ id;
	$.ajax({
			type: 'POST',
			url: x,
			data:'txt='+ z,
			success: loadComments(id),
			error:function (xhr, ajaxOptions, thrownError){

                } 
			    
		})
}

//load komentara
function loadComments(id)
{
	var x = "commentsXml.php?id="+ id;
	$.ajax({
			type: 'GET',
			url: x,
			dataType: 'xml',
			success: showComments,
			error:function (xhr, ajaxOptions, thrownError){

                }    
		})
}

//prikaz komentara
function showComments(xml)
{
	$('#eventComments').html('');
	var tablica = $('<table id = "table" class = "commentTable">');
	tablica.append("<span class = 'commentHeader'> Komentari </span>");
	$(xml).find("comment").each(function(){	
	tablica.append("<tr colspan = '2' id = 'tableTr'><td id= 'rateUsername'><p>" + $(this).find("username").text() + "</p></td></tr><tr colspan='2'><td id='rateRate'><p class = 'comment'>"+ $(this).find("text").text() + "<br/></p></td></tr>");
	});
	$('#eventComments').append(tablica);
	//$('#eventComments').append(tablica);

	$('#eventComments').append("<div class='pager'><a href='#' alt='Previous' class='prevPage'>Prev</a><span class='currentPage'>&nbsp;</span> of <span class='totalPages'>&nbsp;</span><a href='#' alt='Next' class='nextPage'>Next</a></div>");
	$('#table').paginateTable({ rowsPerPage: 10 });
	
	$('#eventComments').show('blind', 1000);
}

//dohvati one koji su glasali
function getVoters(event)
{
	id = event.data.param1;
	var x = "votersXml.php?id="+id;
	$.ajax({
			type: 'GET',
			url: x,
			dataType: 'xml',
			success: showVoters,
			error:function (xhr, ajaxOptions, thrownError){
                    //alert(xhr.status);
                    //alert(thrownError);
                }    
		})
}

//prikazi one koji su glasali
function showVoters(xml)
{
	$('#eventStuff').html('');
	var tablica = $('<table id = "table" class = "rateTable">');
	tablica.append("<td class = 'rateHeader'> Korisničko ime </td><td class = 'rateHeader'> Ocjena </td></td>");
	$(xml).find("ocjena").each(function(){	
	tablica.append("<tr><ul><li><td id= 'rateUsername'>" + $(this).find("username").text() + "</td></li><td id='rateRate'>"+ $(this).find("rate").text() + "</td></tr>");
	});
	$('#eventStuff').append(tablica);
	$('#eventStuff').append(tablica);

	//$('#eventStuff').append("<div class='pager'><a href='#' alt='Previous' class='prevPage'>Prev</a><span class='currentPage'>&nbsp;</span> of <span class='totalPages'>&nbsp;</span><a href='#' alt='Next' class='nextPage'>Next</a></div>");
	//$('#tablica').paginateTable({ rowsPerPage: 10 });
	
	$('#eventStuff').show('blind', 2000);

}

//prikaz dogadaja u tablicu
function displayXML(xml)
{
	//dinamicki kreiramo tablicu (slicno kao document.createElement)
		
		var tablica = $('<table id = "tablica" class = "tablica">');
		tablica.append("<td class = 'tdAjax'> Naziv događaja </td><td class = 'tdAjax'> Autor </td><td class = 'tdAjax'> Vrijeme </td><td class = 'tdAjax'> Cijena </td><td class = 'tdAjax'> Mjesto </td><td class = 'tdAjax'> Pogledaj!</td>");
		$(xml).find("event").each(function(){
							//generiramo redove iz xml-a i dodajemo ih na tablicu
		tablica.append("<tr><ul><li><td class = 'ime_table2'>" + $(this).find("naziv").text() + "</td></li><td class = 'ime_table2'>" + $(this).find("autor").text() + "</td><td class = 'ime_table2'>" + $(this).find("vrijeme").text() + "</td><td class = 'ime_table2'>" + $(this).find("cijena").text() + "</td><td class = 'ime_table2'>" + $(this).find("mjesto").text() + "</td><td class = 'ime_table2'><a href = 'eventDetails.php?id=" +$(this).find("rb").text() + "'>Pogledaj događaj</a></td></tr>");
		//tablica.append('<tr><td>' + $(this).attr('naziv') + '</td><td>' +$(this).attr('datum') + "</td></tr>");
				});
							//gotovu tablicu postavimo na pripremljeno mjesto
		//$('#paging_events').append(tablica2);
		$('#paging_events').append(tablica);

		$('#paging_events').append("<div class='pager'><a href='#' alt='Previous' class='prevPage'>Prev</a><span class='currentPage'>&nbsp;</span> of <span class='totalPages'>&nbsp;</span><a href='#' alt='Next' class='nextPage'>Next</a></div>");
		$('#tablica').paginateTable({ rowsPerPage: 3 });
		//$('#paging_events').show('blind', 1000);
		$('#tablica').show();

}

//ocijeni dogadaj
function rateEvent(event)
{
	id = event.data.param1;
	var eventRate = $("#eventRate").val();
	//alert(eventRate);
	var x = 'rateEvents.php?id='+ id + '&rate=' + eventRate;
	
	$.ajax({
			type: 'GET',
			url: x,
			dataType: 'xml',
			success: rate(id),
			error:function (xhr, ajaxOptions, thrownError){
                   // alert(xhr.status);
                    // alert(thrownError);
                }    
		})
}

//dohvati novu prosjecnu ocjenu - ne radi
function rate(id)
{
	//alert("x");
	var x = "getNewAverageRate.php?id=" + id;
	$.ajax({
			type: 'GET',
			url: x,
			dataType: 'xml',
			success: showNewAverageRate,
			error:function (xhr, ajaxOptions, thrownError){
                    
                }    
		})
}

//prikaz nove prosječne ocjene za događaj
function showNewAverageRate(xml)
{/*
		//alert("x");
		//$("#xD").html('');
		$(xml).find("ocjena").each(function(){
			alert("!");
		});
		//$('#prosjek').show();
  */
}


//za registraciju
function sayOk()
{
	alert("nijeok");

}
function focusFieldReg()
{
	//this.style.backgroundColor = '#CFCFC4';
	this.className = "jsFormFocused";
}

//za registraciju
function blurFieldReg()
{
	this.className = "jsFormInput";
}

//za login
function focusField()
{
	this.className = "jsFormFocusedLogin";
}
//za login
function blurField()
{
	this.className = "form_style";
}

//za login
function checkInput(event)
{
	event.preventDefault();
	var use = document.getElementById("uname");
	var forma = use.form;
	if (validateInput(forma))
	{
		forma.submit();
	}
	
}


//provjera za login
function validateInput(forma)
{
	//event.preventDefault();
	var ok = true;
	var isEmpty = false;
	var index;
	var indexSum = 0;
		var jsErrorLogs = document.querySelectorAll('span.jsError');
		for (i = 0; i < jsErrorLogs.length; i++)
		{
			jsErrorLogs[i].parentNode.removeChild(jsErrorLogs[i]);
		}
		for (var i = 0; i < forma.elements.length; i++)
		{
			//jsErrorLogs[i].parentNode.removeChild(jsErrorlogs[i]);
			if(forma.elements[i].type == 'text' || forma.elements[i].type == 'password' )
			{
				if(forma.elements[i].value == "")
				{
					ok = false;
					isEmpty = true;
					index = i;
					indexSum++;
				}
			}
		}
		if (isEmpty)
		{
			ok = false;
			var empty = document.getElementById('errorDIV');
			var loginErr = document.createElement('span');
			loginErr.innerHTML = "Oba polja moraju biti popunjena.";
			loginErr.className = "jsError";
			empty.parentElement.appendChild(loginErr); 
			if (indexSum == 2)
			{
				forma.elements[0].focus();
			}
			else
			{
				forma.elements[index].focus();
			}
		}
return ok;
}

var xhr = false;
//za registraciju
function checkUser(event)
{
	//console.log(event);
	event.preventDefault();
	var username = document.getElementById('kor_ime');
	var forma = username.form;
	
	if (validateForm(forma))
	{
		forma.submit();
	}
	
}

//provjera usernamea s ajaxom
function checkUsernameAJAX()
{
		if (window.XMLHttpRequest) 
		{
	        xhr = new XMLHttpRequest();
	    }
	
	     else 
	     {
	        if (window.ActiveXObject) 
	        {
	           try 
	           {
	           		xhr = new ActiveXObject ("Microsoft.XMLHTTP");
	           }
	           catch (e) { }
	        }
	     }
		if (xhr) 
		{
			
        xhr.onreadystatechange = showContents;
        xhr.open("GET", "scripts/usersXml.xml", true);
        xhr.send(null);
     	}
     	else
     	{
     		var status = document.getElementById("usernameStatus");
     		status.innerHTML = "Pogreska";
     	}
}




function showContents()
{
	
	if (xhr.readyState == 4)
		{
			
			if (xhr.status == 200)
			{
				
				var data = xhr.responseXML;
				
				createInfo(data);
			}
			else
			{
				alert(xhr.status);
				
			}
		}
}

function validateForm(forma)
{
	//event.preventDefault();
	var ok = true;
	var errors = new Array();
	//var jsErrorLogs = document.getElementsByClassName('jsError');
		var jsErrorLogs = document.querySelectorAll('span.jsError');
		for (i = 0; i < jsErrorLogs.length; i++)
		{
			//console.log(jsErrorLog[i]);
			jsErrorLogs[i].parentNode.removeChild(jsErrorLogs[i]);
		}
		for (var i = 0; i < forma.elements.length; i++)
		{
			
			if(forma.elements[i].type == 'text' || forma.elements[i].type == 'password' )
			{
				if(forma.elements[i].value == "")
				{
					ok = false;
					//console.log("Polje "+elem[i].name + " ne smije biti prazno!");
					forma.elements[i].className = 'jsFormError';
					var err = document.createElement('span');
					err.innerHTML = "Polje ne smije biti prazno!";
					err.className = "jsError";
					forma.elements[i].parentNode.appendChild(err);
					errors[i] = "g";
				}
				else if(forma.elements[i].name == "email")
				{
					var email = forma.elements[i];
					var filter= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
								
					if (!filter.test(email.value))
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Email nije valjan";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
				}
				else if (forma.elements[i].name == "ime" || forma.elements[i].name == "prezime")
				{
					var user = forma.elements[i].value;
					var filter = /^[A-Z][a-z]*/;
					var filter2 = /[a-z]*$/
					//var filter3 = /[a-z]{3,20}/;
					if (!filter.test(user))
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Polje mora početi sa velikim slovom.";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					else if (!filter2.test(user))
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Polje mora sadržavati samo slova!";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					/*else if (!filter3.test(user))
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var arr = document.createElement('span');
						err.innerHTML = "Minimalno 3 znaka!";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					*/
				}
				
				else if(forma.elements[i].name == "password")
				{
					
					var pass = forma.elements[i].value;
					var filter1 = /[a-z]/; //mala slova
					var filter2 = /[A-Z]/; //velika slova
					var filter3 = /[0-9]/;
					var filter4 = /\W/;//nonalphanumeric characters
					
					if (pass.length < 6)
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Prekratka lozinka.";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					
					else if(!filter1.test(pass) )
					{
						
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Mala slova?";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					
					else if(!filter2.test(pass) )
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Velika slova?";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					else if(!filter3.test(pass) )
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Broj?";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					
					else if(!filter4.test(pass))
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Specijalni znak?";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
					
					
				}
				else if(forma.elements[i].name == "re_password")
				{
					var rePass = forma.elements[i].value;
					var pass = document.getElementById("password");
					if (rePass != pass.value)
					{
						ok = false;
						forma.elements[i].className = 'jsFormError';
						var err = document.createElement('span');
						err.innerHTML = "Lozinke se ne podudaraju.";
						err.className = "jsError";
						forma.elements[i].parentNode.appendChild(err);
						errors[i] = "g";
					}
				}
			}
		}
		if (errors)
		{
			for (i = 0; i<6; i++)
			{
				if (errors[i] == "g")
				{
					forma.elements[i].style.backgroundColor = "#F75D59";
					forma.elements[i].focus();
					//errors[i] = null;
					return ok;
				}	
				else
				{
					forma.elements[i].style.backgroundColor = "FFFFFF";
				}		
			}
		}
	console.log('dosao sam do kraja');
	return ok;
}

//javi da li korisnik postoji ili ne kod reg
function createInfo(data)
{
	
	var status = document.getElementById("usernameStatus");
	var x = document.getElementById('kor_ime');
	user = x.value;
	var exists = false;
	var names = data.getElementsByTagName("username");
	for (i = 0; i<names.length; i++)
	{
		//console.log (names[i].firstChild.nodeValue)
		
		if (names[i].firstChild.nodeValue == user)
		{
			exists = true;
			
		}
	}
	if (exists)
	{
		status.innerHTML = "Zauzeto ime.";
	}
	else
	{
		status.innerHTML = "Ime je slobodno.";
	}
}

//za popise kod paginga (hover mijenja boju)
function mousseOver()
{
	this.style.backgroundColor = "332211";
}
function mousseOut()
{
	this.style.backgroundColor = "112233";
}


function setSelectionRange(input, selectionStart, selectionEnd) {
  if (input.setSelectionRange) {
    input.focus();
    input.setSelectionRange(selectionStart, selectionEnd);
  }
  else if (input.createTextRange) {
    var range = input.createTextRange();
    range.collapse(true);
    range.moveEnd('character', selectionEnd);
    range.moveStart('character', selectionStart);
    range.select();
  }
}

function setCaretToPos (input, pos) {
  setSelectionRange(input, pos, pos);
}

$.fn.selectRange = function(start, end) {
    return this.each(function() {
        if (this.setSelectionRange) {
            this.focus();
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};

function getEventId()
{
	var url = document.location.href;
		var sUrl =  url.substring(url.lastIndexOf('=')+1);
		//$('#rateEventButton').bind('click', alert("nesto"));
		//$(document).ready(function() {
		loadComments(sUrl);
		//})
		if (sUrl.charAt(1) == "#")
		{
			sUrl = sUrl.slice(0,1);
		}
		else if (sUrl.charAt(2) == "#")
		{
			sUrl = sUrl.slice(0,2);
		}
		
	return sUrl;	
}






