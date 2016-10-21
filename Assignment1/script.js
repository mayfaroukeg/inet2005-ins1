//function to validate data on update and insert form submissin , it changes color of field to red
function validateForm()
{

    if(document.forms["myForm"].firstName.value.length == 0){
      document.forms["myForm"].firstName.style.borderColor = "red";
      return false;
    }

    if(document.forms["myForm"].lastName.value.length == 0){
      document.forms["myForm"].lastName.style.borderColor = "red";
      return false;
    }

    if(document.forms["myForm"].birthDate.value.length==0)
    {
       document.forms["myForm"].birthDate.style.borderColor = "red";
       return false;
    }
    if(document.forms["myForm"].hireDate.value.length==0)
    {
        document.forms["myForm"].hireDate.style.borderColor = "red";
        return false;
    }

    if(document.getElementById("genderMale").checked==false && document.getElementById("genderFemale").checked==false)
    {
        document.getElementById('radioButtonError').style.color = "red";
        document.getElementById('radioButtonError').innerHTML = "Must accept any of the Genders.";
        return false;
    }
}


function anyText(field,messageText,target)
{
    var targetSpan = document.getElementById(target);
    if(targetSpan != null)
    {
        if(field.value.length ==0)
        {
            targetSpan.innerHTML = messageText;
            return false;
        }
        else {
            targetSpan.innerHTML = "";
            return true;
        }
    }

}
