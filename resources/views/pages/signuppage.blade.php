<x-basecomponent>
    <style>
        body {
            background-color: #ffffff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .top-banner {
            background-color: #4276ad;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            border-top-right-radius: 12px;
            border-top-left-radius: 12px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: rgb(255, 255, 255);
        }

        .form-control::placeholder {
            color: #999;
        }

        .form-icon-left {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: rgb(107, 107, 107);
        }

        .form-icon-right {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            color: rgb(107, 107, 107);
        }

        .form-group {
            position: relative;
        }

        .form-control {
            padding-left: 2.5rem;
            padding-right: 2.5rem;
        }

        .register-btn {
            background-color: #4276ad;
            color: #fff;
            border-radius: 10px;
        }

        .register-btn:hover {
            background-color: #002144;
        }

        .login-link {
            color: #ee9b00;
            font-weight: 500;
        }

        .card-border {
            border: 1px solid #36587e;
            border-radius: 15px;
            max-width: 450px;
            margin: 40px auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 0;
        }
    </style>

    <div class="container">
        <div class="card-border">
            <div class="card-body">
                <div class="top-banner text-center">
                    <img src="{{asset('assets\image\Logo\tf.png')}}" class="mb-2" alt="" style="border-radius: 50%; width: 120px; height: 120px;">
                    <h1>Registration</h1>
                </div>

                <div class="px-4 pt-4 pb-3">
                    <form method="POST" action="{{ route('register_post') }}">
                        @csrf

                        <div class="form-group mb-3 position-relative">
                            <i class="bi bi-person-fill form-icon-left"></i>
                            <input type="text" name="name" class="form-control" placeholder="Full Name" id="fullNameInput" oninput="checkFullName()">
                            <i class="bi bi-check-circle-fill form-icon-right text-success d-none" id="fullNameIcon"></i>
                        </div>

                        <div class="form-group mb-3">
                            <i class="bi bi-envelope-fill form-icon-left"></i>
                            <input type="email" name="email" class="form-control" placeholder="Email" id="emailInput" oninput="checkEmail()">
                            <i class="bi bi-check-circle-fill form-icon-right text-success d-none" id="emailIcon"></i>
                        </div>

                         <div class="form-group mb-3 position-relative">
                            <i class="bi bi-lock-fill form-icon-left"></i>
                            <input type="password" name="password" class="form-control" placeholder="Password" id="passwordInput">
                            <i class="bi bi-eye-slash-fill form-icon-right" id="togglePassword" style="cursor: pointer;"></i>
                        </div>

                        <div class="form-group mb-3 position-relative">
                            <i class="bi bi-lock-fill form-icon-left"></i>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" id="confirmPasswordInput">
                            <i class="bi bi-eye-slash-fill form-icon-right" id="toggleConfirmPassword" style="cursor: pointer;"></i>
                        </div>

                        <div class="d-flex flex-row justify-content-center mb-3">
                            <button type="submit" class="btn register-btn px-5">Register</button>
                        </div>
                        <div class="text-center">
                            <h6>Already have an account? <a href="{{ route('login') }}" class="login-link">Log in</a>
                            </h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkEmail() {
        const emailInput = document.getElementById('emailInput');
        const emailIcon = document.getElementById('emailIcon');
        
        if (emailInput.value.trim() !== '') {
            emailIcon.classList.remove('d-none');
        } else {
            emailIcon.classList.add('d-none');
        }
        }

        function checkFullName() {
        const fullNameInput = document.getElementById('fullNameInput');
        const fullNameIcon = document.getElementById('fullNameIcon');
        
        if (fullNameInput.value.trim() !== '') {
            fullNameIcon.classList.remove('d-none');
        } else {
            fullNameIcon.classList.add('d-none');
        }
        }
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('passwordInput');
        togglePassword.addEventListener('click', function () {
        const type = passwordInput.type === 'password' ? 'text' : 'password';
        passwordInput.type = type;
        this.classList.toggle('bi-eye-fill');
        this.classList.toggle('bi-eye-slash-fill');
        });

        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordInput = document.getElementById('confirmPasswordInput');
        toggleConfirmPassword.addEventListener('click', function () {
        const type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
        confirmPasswordInput.type = type;
        this.classList.toggle('bi-eye-fill');
        this.classList.toggle('bi-eye-slash-fill');
        });
    </script>



</x-basecomponent>
