<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT SPR Langgak</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            background:#f3f4f6;
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:20px;
        }

        .login-container{
            width:950px;
            min-height:550px;
            background:white;
            border-radius:14px;
            overflow:hidden;
            display:flex;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
        }

        /*Ini Style untuk Logo yang Besar yaa*/

        .left{
            width:45%;
            padding:40px;
            background:white;
        }

        .top-logo{
            display:flex;
            align-items:center;
            gap:15px;
            margin-bottom:50px;
        }

        .top-logo img{
            width:75px;
            height:75px;
            object-fit:contain;
        }

        .top-logo h2{
            font-size:20px;
            color:#111827;
            margin-bottom:5px;
        }

        .top-logo p{
            font-size:13px;
            color:#6b7280;
        }

        .title{
            font-size:48px;
            font-weight:bold;
            color:#111827;
            margin-bottom:10px;
        }

        .subtitle{
            color:#6b7280;
            margin-bottom:35px;
            font-size:16px;
        }

        .form-group{
            margin-bottom:22px;
        }

        .form-group label{
            display:block;
            margin-bottom:10px;
            font-weight:600;
            color:#1f2937;
            font-size:18px;
        }

        .form-group input{
            width:100%;
            padding:15px;
            border:1px solid #d1d5db;
            border-radius:10px;
            font-size:15px;
        }

        .form-group input:focus{
            outline:none;
            border-color:#4f46e5;
        }

        .btn-google{
            width:100%;
            padding:15px;
            background:#4f46e5;
            color:white;
            border:none;
            border-radius:10px;
            font-size:15px;
            cursor:pointer;
            margin-top:5px;
            transition:0.3s;
        }

        .btn-google:hover{
            background:#4338ca;
        }

        .btn-login{
            width:100%;
            padding:15px;
            background:#67c587;
            color:white;
            border:none;
            border-radius:10px;
            font-size:15px;
            cursor:pointer;
            margin-top:12px;
            transition:0.3s;
        }

        .btn-login:hover{
            background:#4fa96c;
        }

        .forgot{
            margin-top:25px;
            text-align:center;
            font-size:14px;
            color:#6b7280;
        }

        .forgot a{
            color:#4f46e5;
            text-decoration:none;
        }

       /*Ini Style untuk Logo yang Kecil yaa*/

        .right{
            width:55%;
            background:linear-gradient(
                135deg,
                #dff6ff,
                #ffffff,
                #e7f9e7
            );
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            text-align:center;
            padding:40px;
        }

        .right img{
            width:220px;
            object-fit:contain;
            margin-bottom:20px;
        }

        .right h1{
            font-size:52px;
            color:#1f2a44;
            margin-bottom:10px;
        }

        .right p{
            font-size:18px;
            color:#4b5563;
        }

        @media(max-width:900px){

            .login-container{
                flex-direction:column;
                width:100%;
            }

            .left,
            .right{
                width:100%;
            }

            .right{
                padding:50px 20px;
            }

            .right h1{
                font-size:36px;
            }

            .title{
                font-size:40px;
            }
        }

    </style>
</head>

<body>

<div class="login-container">

   
    <!--Ini Logo Yang Kecil yaa-->

    <div class="left">

        <div class="top-logo">

            <img src="{{ asset('images/logo.png') }}" alt="Logo">

            <div>
                <h2>PT SPR Langgak</h2>

                <p>
                    Sistem Dokumen Digitalisasi Divisi Finance
                </p>
            </div>

        </div>

        <div class="title">
            Masuk
        </div>

        <div class="subtitle">
            Silakan login untuk mengakses sistem
        </div>

        <form method="POST" action="{{ route('login') }}">

            @csrf

            <div class="form-group">

                <label>Email</label>

                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email..."
                >

            </div>

            <div class="form-group">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password..."
                >

            </div>

            <button type="submit" class="btn-login">
                Login
            </button>

            <div class="forgot">

                Lupa password?

                <a href="{{ route('password.request') }}">
                    Reset password
                </a>

            </div>

            <div class="forgot" style="margin-top:10px;">
                Belum punya akun?
                <a href="{{ route('register') }}">
                    Daftar
                </a>
            </div>

        </form>

    </div>

    <!--Ini Logo Yang Besar yaa-->
    <div class="right">

        <img src="{{ asset('images/logo.png') }}" alt="Logo">

        <h1>PT SPR Langgak</h1>

        <p>
            Sistem Dokumen Digitalisasi Divisi Finance
        </p>

    </div>

</div>

</body>
</html>
