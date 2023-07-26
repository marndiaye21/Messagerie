const connect = document.querySelector('#save');

console.log(document.currentScript.baseURI.split("/views"));

document.querySelector('#save').addEventListener('click', async () => {
    const email = document.querySelector('#email').value;
    const passWord = document.querySelector('#password').value;

    const response = await fetch('http://localhost:8000/api/login', {
        method: "POST",
        headers: {
            "Accept": "application/json",
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            "email": email,
            "password": passWord
        })
    });

    const data = await response.json();
    handleLogin(data);
})

function handleLogin(data) {
    console.log(data);
    if (data.errors) {
        if (data.errors.email) {
            console.log(data.errors.email);
        } else if (data.errors.password) {
            console.log(data.errors.password);
        }
    } else if (data.message) {
        
    } else if (data.token) {
        console.log(window.location);
        // window.location.href = '../account';
    }
}
