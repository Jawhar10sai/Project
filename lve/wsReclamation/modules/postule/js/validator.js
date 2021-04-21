function ChaineTelValide(tel)
{
	var reg = new RegExp('^0[0-9]{9}$', 'i');
	return(reg.test(tel));
}
 function checkDate(date) {
reg = new RegExp(/^[0-3]{1}[0-9]{1}[\/][0-1]{1}[0-9]{1}[\/][0-9]{4}$/);
if(!reg.test(date)){ // VERIFICATION DU FORMAT JJ/MM/AAAA
return false;
} else{
	return true;
	}
 }
function ChaineMailValide(mail)
{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	return(reg.test(mail));
}
function checkText(field)
{
    if (field.value == '') document.getElementById('d'+field.id).style.display = '';
}
function checkSelect(field)
{
    if (field.value == '') document.getElementById('d'+field.id).style.display = '';
	else document.getElementById('d'+field.id).style.display = 'none';
}
function clearText(field)
{
	document.getElementById('d'+field.id).style.display = 'none'
}
function checkMail(field)
{
    if (!ChaineMailValide(field.value)) document.getElementById('d'+field.id).style.display = '';
	else document.getElementById('d'+field.id).style.display = 'none';
}
function validerMail(field)
{
    if (!ChaineMailValide(field.value) || field.value != document.getElementById('v'+field.id).value) { 
		document.getElementById('d'+field.id).style.display = '';
		//return false;
	}
	else 
	{
		document.getElementById('d'+field.id).style.display = 'none';
		//return true;
	}
}
function checkTel(field)
{
    if (!ChaineTelValide(field.value)) {
		document.getElementById('d'+field.id).style.display = '';
		//return false;
	}
	else {
		document.getElementById('d'+field.id).style.display = 'none';
		//return true;
	}
}



function validateForm()
{
    var x=document.getElementById('demail').style.display
if (x==null || x=="")
  {
  alert("email non valide");
  return false;
  }
     var x=document.getElementById('dvemail').style.display
if (x==null || x=="")
  {
  alert("email non valide");
  return false;
  }
       var x=document.getElementById('dphone').style.display
if (x==null || x=="")
  {
  alert("Telephone non valide");
  return false;
  }



var x=document.forms["form_recrute"]["poste_recherche"].value
if (x==null || x=="Choisissez")
  {
  alert("Un des champs obligatoire (Type de poste recherche) n'est pas bien rempli, veuillez le remplir");
  return false;
  }

 var x=document.getElementById('nationalite').value
if (x==null || x=="")
  {
	  
  alert("Un des champs obligatoire (Nationalité) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
 var x=document.getElementById('nom').value
if (x==null || x=="")
  {
	  
  alert("Un des champs obligatoire (Nom) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
  
  var x=document.forms["form_recrute"]["prenom"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Prenom) n'est pas bien rempli, veuillez le remplir");
  return false;
  }

    var x=document.forms["form_recrute"]["adresse"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Adresse) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
  
 
var x=document.forms["form_recrute"]["ville"].value
if (x==null || x=="Sans choix")
  {
  alert("Un des champs obligatoire (Ville) n'est pas bien rempli, veuillez le remplir");
  return false;
  }

var x=document.forms["form_recrute"]["region"].value
if (x==null || x=="Sans choix")
  {
  alert("Un des champs obligatoire (Region) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
  var x=document.forms["form_recrute"]["date_naissance"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Date naissance) n'est pas bien rempli, veuillez le remplir");
  return false;
  }else if (!checkDate(x))
  {
  alert("Format date de naissance incorrect. Ex:01/01/2000");
  return false;
  }
  var x=document.forms["form_recrute"]["pays_residence"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Pays residence) n'est pas bien rempli, veuillez le remplir");
  return false;
  }

  
  var x=document.forms["form_recrute"]["email"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Email) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
    var x=document.forms["form_recrute"]["vemail"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Validation Email) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
    var x=document.forms["form_recrute"]["phone"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Telephone) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
 
  

var x=document.forms["form_recrute"]["situation_actuelle"].value
if (x==null || x=="Sans choix")
  {
  alert("Un des champs obligatoire (Situation actuelle) n'est pas bien rempli, veuillez le remplir");
  return false;
  }

var x=document.forms["form_recrute"]["experience"].value
if (x==null || x=="Sans choix")
  {
  alert("Un des champs obligatoire (Experience) n'est pas bien rempli, veuillez le remplir");
  return false;
  }  

var x=document.forms["form_recrute"]["niveau_etudes"].value
if (x==null || x=="Sans choix")
  {
  alert("Un des champs obligatoire (Niveau d'etudes) n'est pas bien rempli, veuillez le remplir");
  return false;
  }  
    var x=document.forms["form_recrute"]["etablissement"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (Etablissement) n'est pas bien rempli, veuillez le remplir");
  return false;
  }





var x=document.forms["form_recrute"]["type_formation"].value
if (x==null || x=="Sans choix")
  {
  alert("Un des champs obligatoire (Type de formation) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
  

var x=document.forms["form_recrute"]["cv"].value
if (x==null || x=="")
  {
  alert("Un des champs obligatoire (CV) n'est pas bien rempli, veuillez le remplir");
  return false;
  }
  

  
}


function recup_extension(fichier) // fonction de récupération extension fichier
   {
         if (fichier!="")// si le champ fihier n'est pas vide
         {
            nom_fichier=fichier;// on récupere le chemin complet du fichier
            nbchar = nom_fichier.length;// on compte le nombre de caractere que compose ce chemin
            extension = nom_fichier.substring(nbchar-4,nbchar); // on récupere les 4 derniers caracteres
            extension=extension.toLowerCase(); //on uniforme les caracteres en minuscules au cas ou cela aurait été écris en majuscule...
            return extension; // on renvoi l'extension vers la fonction appelante
         }
   }



function validateForm2()
{

  var error=0;
  var invalid=0;
  var invalid_fields="";
  var msg="";
  var conf=0;
  var verif_file=0;
  var invalid_files="";
  
$(".obligatoire").each(function(){

	if($(this).val()==""){
			error++;
	}
	
});
$(".email").each(function(){
	var reg = /^[a-z0-9._-]+@[a-z0-9.-]{2,}[.][a-z]{2,3}$/;
	if((!reg.test($(this).val())) && $(this).val()!=""){
		invalid++;
		invalid_fields +=$(this).attr("title") +", ";
	}
});

$(".Numeric").each(function(){
var reg = /^[0-9][0-9]*$/;
if((!reg.test($(this).val())) && $(this).val()!=""){
		invalid++;
		invalid_fields +=$(this).attr("title") +", ";
	}
});


$(".file").each(function(){
	ext = recup_extension($(this).val());
	if($(this).val()!=""){
		if(ext==".pdf"||ext==".PDF"||ext==".jpg"||ext==".jpeg"||ext==".gif"||ext==".png"||ext==".JPG"||ext==".GIF"||ext==".PNG"||ext==".doc"||ext==".docx"||ext=="docx"){}
		else 
		{
		  verif_file++;
		   invalid_files+=$(this).attr("title") +", ";
		}
	}
});

	if(error>0){
		msg +="Veuillez remplir tous les champs obligatoires\n";
    }
	if(invalid>0){
		msg +="Veuillez vérifier le format des champs suivants : "+invalid_fields+"\n";
    }
	if(verif_file>0){
		msg +="Veuillez verifier les champs : "+invalid_files+" Seules les extensions suivantes sont autorisées : pdf, doc, docx, jpg, jpeg, gif, png\n";
    }
	
	if(msg!=""){
	alert(msg);
	return false;
	}
}