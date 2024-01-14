<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>EMG Data Visualization</title>

    </head>
    <body>
        <div class="row">
            <div class="banner-col">
                <div class="banner-footer">IOT - EMG Data Visualization</div>
                <div class="banner-title">Sudah Bergabung?</div>
                <div class="banner-desc">Apakah anda sudah bergabung dan memiliki akun partnership ?</div>
                <a href="<?php echo base_url('auth');?>"><button class="button muted-button">MASUK</button></a>
            </div>
            <div class="form-col">
                <div class="form-title">Gabung Sekarang</div>
                <div class="min-row">
                    {{-- buat medsos --}}
                </div>
                <div class="form-hint">Masukan data data Anda</div>
                <form class="field-col" id="registration-form" action="<?php echo base_url('auth/register');?>" method="POST">
                    <div class="form-group">
                        <i class="icon fa fa-user"></i>
                        <input type="string" name="username" id="username" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                        <i class="icon fa-solid fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" min="8" required/>
                        <i id="see-password" class="icon fa fa-eye-slash"></i>
                    </div>
                    <div class="form-group">
                        <i class="icon fa-solid fa-lock"></i>
                        <input type="password" id="confirm-password" placeholder="Konfirmasi Password" min="8" required/>
                    </div>
                    <div class="field-hint">Sudah punya akun?&nbsp;<a href="<?php echo base_url('auth');?>" class="link">Masuk</a></div>
                    <button class="button primary-button" id="submit-button">GABUNG</button>
                </form>
            </div>
        </div>
    </body>
</html>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const seePassword = document.getElementById('see-password');
        const password = document.getElementById('password');
        const confirmPassword = document.getElementById('confirm-password');
        const nama = document.getElementById('username');
        const inputGroups = document.querySelectorAll('.form-group');

        function toggleIconFocus(inputGroup, focused) {
            if (focused) {
                inputGroup.classList.add('input-focused');
            } else {
                inputGroup.classList.remove('input-focused');
            }
        }

        seePassword.addEventListener('click', function() {
            if (password.type === "password") {
                password.type = "text";
                confirmPassword.type = "text";
                seePassword.classList.remove('fa-eye-slash');
                seePassword.classList.add('fa-eye');
            } else {
                password.type = "password";
                confirmPassword.type = "password";
                seePassword.classList.add('fa-eye-slash');
                seePassword.classList.remove('fa-eye');
            }
        });

        [nama, password, confirmPassword].forEach(input => {
        input.addEventListener('focus', () => toggleIconFocus(input.parentElement, true));
        input.addEventListener('blur', () => toggleIconFocus(input.parentElement, false));
        input.addEventListener('input', () => toggleIconFocus(input.parentElement, true));

        const submitButton = document.getElementById('submit-button');
        const form = document.getElementById('registration-form');

        function validatePassword() {
            if (password.value !== confirmPassword.value) {
                Swal.fire({
                    title: "Error!",
                    text: "Kata sandi dan konfirmasi kata sandi tidak sesuai.",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500 
                });
                return false;
            }

            return true;
        }

        submitButton.addEventListener('click', function () {
            event.preventDefault(); 

            const isPasswordValid = validatePassword();
            if (!nama.value || !password.value || !confirmPassword.value) {
                Swal.fire({
                    title: "Error!",
                    text: "Semua kolom wajib diisi.",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500 
                });
                return false;
            }else if (password.value.length < 8) {
                Swal.fire({
                    title: "Error!",
                    text: "Kata sandi harus memiliki minimal 8 karakter.",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1500 
                });
                return false;
            }else if(isPasswordValid){
                form.submit();
            }
        });
    });
    });
</script>
