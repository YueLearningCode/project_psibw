const loginForm = document.getElementById("loginForm");

loginForm.addEventListener("submit", async function(e){

    e.preventDefault();

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    try {

        const response = await fetch("api/login.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                username: username,
                password: password
            })
        });

        const text = await response.text();
        
        let result;
        try {
            result = JSON.parse(text);
        } catch(e) {
            console.error('JSON Parse Error:', e);
            console.error('Response received:', text);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Server error - check console for details'
            });
            return;
        }

        if(result.success){

            Swal.fire({
                icon: 'success',
                title: 'Login Berhasil',
                text: result.message,
                timer: 1500,
                showConfirmButton: false
            });

            localStorage.setItem("user", JSON.stringify(result.user));

            setTimeout(() => {

                if(result.user.role === "admin"){
                    window.location.href = "admin/dashboard.php";
                }
                else if(result.user.role === "dosen"){
                    window.location.href = "dosen/dashboard.php";
                }
                else if(result.user.role === "mahasiswa"){
                    window.location.href = "mahasiswa/dashboard.php";
                }

            }, 1500);

        } else {

            Swal.fire({
                icon: 'error',
                title: 'Login Gagal',
                text: result.message
            });

        }

    } catch(error){

        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Terjadi kesalahan server'
        });

        console.error('Fetch Error:', error.message);
        console.error('Full Error:', error);
    }

});