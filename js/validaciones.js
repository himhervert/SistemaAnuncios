var user = document.getElementById('username');
var pwd = document.getElementById('pwd');
var rpwd = document.getElementById('rpwd');
var form = document.getElementById('registro');
var errorUser = document.getElementById('e1');
var errorPwd = document.getElementById('e2');
var errorRpwd = document.getElementById('e3');
var letrasynumeros = (/[a-z]+[0-9]/i).test(pwd);

var numeros = (/[0-9]/i).test(user);
user.addEventListener('keyup', function(){
    if(user.value.length < 6  || numeros)
    {
        errorUser.innerHTML = '  El usuario debe contener los 6 digitos de tu clave unica';
    }
    else
    {
        errorUser.innerHTML = '';
    }
});

pwd.addEventListener('keyup', function(){
    if(pwd.value.length < 8 || letrasynumeros)
    {
        errorPwd.innerHTML = '  La contraseña debe contener por lo menos 8 caracteres y no debe incluir caracteres especiales';
    }
    else
    {
        errorPwd.innerHTML = '';
    }
});

rpwd.addEventListener('keyup', function(){
    if(pwd.value != rpwd.value)
    {
        errorRpwd.innerHTML = '  Las contraseñas no coinciden';
    }
    else
    {
        errorRpwd.innerHTML = ''; 
    }
})

form.addEventListener('submit', function(evento){
    if(user.value.length < 6 || numeros || pwd.value.length < 8 || pwd.value != rpwd.value || letrasynumeros)
    {
        evento.preventDefault();
    }
});