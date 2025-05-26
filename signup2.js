let errore=false;


function validatePassword(password) {

    const caratterispeciali = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    const hacaratspec = caratterispeciali.test(password);
    
    const hamaiuscole = /[A-Z]/.test(password);
    
   
    return hacaratspec && hamaiuscole;
}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password input');
    if (passwordInput.value.length >= 8 && validatePassword(passwordInput.value)) {
        errore=false;
    } else {
        errore=true;
    }

}


function checkEmail(event) {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()[]\.,;:\s@"]+(.[^<>()[]\.,;:\s@"]+)*)|(".+"))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) 
        {
        errore=false;
    }
    else
    {
        errore=true;
    }
}

function checkSurname(event) {
    const input = event.currentTarget;

    if (formStatus[input.surname] = input.value.length > 0) {

        errore=false;
    } 
    else {

        errore=true;
    }
}
function checkName(event) {
    const input = event.currentTarget;

    if (formStatus[input.name] = input.value.length > 0) {
       
        errore=false;
    } 
    else
     {
    
        errore=true;
    }
}


function checkSignup(event) {
    if (errore) {
        event.preventDefault();
    }
}

document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('form').addEventListener('submit', checkSignup);
document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.email input').addEventListener('blur', checkEmail);
