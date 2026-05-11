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

            // Store user data
            localStorage.setItem("users", JSON.stringify(result.users));

            // Redirect to appropriate dashboard based on role
            const role = result.users.role.toLowerCase();
            let dashboardUrl = 'dashboard/views/mahasiswa/';
            
            if (role === 'admin') {
                dashboardUrl = 'dashboard/views/admin/';
            } else if (role === 'dosen') {
                dashboardUrl = 'dashboard/views/dosen/';
            }

            setTimeout(() => {
                window.location.href = dashboardUrl;
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