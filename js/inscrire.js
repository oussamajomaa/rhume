window.addEventListener('load',()=>{
   document.getElementById('inputNom').focus();
})

function verifier(ele1, ele2,ele3) {
    let pass1 = document.getElementById(ele1);
    let pass2 = document.getElementById(ele2);
    let inputAddress=document.getElementById(ele3);
    inputAddress.addEventListener('focus', () => {
        if (pass2.value != pass1.value) {
            pass2.focus();
            
            alert ('Mot de passe non identique');
            inputAddress.style.borderColor='#ced4da';
            pass2.style.borderColor='red';

        }
        else {
            pass2.blur();
        }
    })
}

function inputValid(ele){
    let input=document.querySelectorAll(ele);
    for (let i=0;i<input.length;i++){
        input[i].addEventListener('blur',()=>{
            if (input[i].value!=""){
                input[i].style.borderColor='green';
            }
            else{
                input[i].style.borderColor='red';  
            }
        })
    }
}

let reset=document.querySelector('#reset');
reset.addEventListener('click',()=>{
    document.getElementById('inputNom').focus();
    let input=document.querySelectorAll('.form-control');
    for (let i=0;i<input.length;i++){
        input[i].style.borderColor='#ced4da';
        
    }   
})


inputValid('.form-control');
verifier('inputPassword', 'inputPasswordC','inputAddress');


