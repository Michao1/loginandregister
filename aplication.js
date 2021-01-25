//Post User Register
let getData=()=>{
    let name=document.getElementById("name").value;
    let email=document.getElementById("email").value;
    let password=document.getElementById("password").value;
    
    fetch('http://test.local/register.php', {
    headers:{"Content-type": "application/json; charset=utf-8"},
    method:'POST',
    body:JSON.stringify({
        name: name,
        email: email,
        password: password
        })
    }).then(response=>{
        response
        .json()
        .then(data => {
            alert(`User ${data.user.email} aded`);
        });
    })
}

//Get Users

document.getElementById('loginForm').onsubmit = () => {
    logingUser();
    return false;
}

const logingUser=()=>{
    let email=document.getElementById("email").value;
    let password=document.getElementById("password").value;

    fetch('http://test.local/login.php',{
        headers:{"Content-type": "application/json; charset=utf-8"},
        method:'POST',
        body:JSON.stringify({ 
            email: email,
            password: password
        })
    })
    .then(response=>{
        response
        .json()
        .then(data =>{
            alert(`${data.message}`);
        });
    })
    
}


