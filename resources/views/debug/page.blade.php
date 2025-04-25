<x-basecomponent>
    
      <style>
        * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
        }

        body {
          height: 100vh;
          background-color: #3a6899; /* Blue background */
          font-family: Arial, sans-serif;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .container {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
          gap: 40px;
        }

        .logo img {
          width: 200px;
          height: auto;
        }

        .buttons {
          display: flex;
          flex-direction: column;
          gap: 20px;
          width: 100%;
          align-items: center;
        }

        .btn {
          padding: 12px 30px;
          font-size: 16px;
          border: none;
          border-radius: 8px;
          cursor: pointer;
          transition: 0.3s;
          width: 200px;
        }

        .btn-login {
          background-color: #ffffff;
          color: #007BFF;
        }

        .btn-signup {
          background-color: #0056b3;
          color: #ffffff;
        }

        .btn:hover {
          opacity: 0.85;
        }

        a {
          text-decoration: none;
        }
      </style>
   

      <div class="container">
        <div class="logo">
          <img src="{{ asset('assets/image/Logo/lolo1.png') }}" alt="Logo" />
        </div>

        <div class="buttons">
          <a href=""><button class="btn btn-login">Log In</button></a>
          <a href=""><button class="btn btn-signup">Sign Up</button></a>
        </div>
      </div>


    </x-basecomponent>
