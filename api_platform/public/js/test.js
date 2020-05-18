fetch('/api/user')
.then(response => response.json())
.then(result => {
    console.log(result)
    document.getElementById('img').innerHTML = '<img src="/api/user/image" alt="avatar"/>';
    document.getElementsByName("username")[0].textContent = result.username;
   
})

