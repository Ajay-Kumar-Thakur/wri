<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- CSS -->
    <style>
        /* Base Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f7fafc;
            color: #374151;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            max-width: 1200px;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Form Card Styles */
        .form-card {
            background-color: #FFFFFF;
            padding: 20px;
            width: 50%;
            box-sizing: border-box;
        }

        /* Text Card Styles */
        .text-card {
            
            background: linear-gradient(90deg, rgba(9,231,180,1) 0%, rgba(38,221,120,1) 100%, rgba(40,220,116,1) 100%, rgba(62,213,71,0) 100%);    
            padding: 20px;
            width: 50%;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        /* Form Container Styles */
        .form-container {
            display: flex;
            flex-direction: column;
        }

        /* Input Field Styles */
        .input-field {
            padding: 0.75rem 1.5rem;
            margin-bottom: 1rem;
            border-radius: 4px;
            transition: border-color 0.2s ease-in-out;
            font-size: 20px;
            width: 60%;
            height: 60%;
            box-sizing: border-box;
            border-radius:30px;
            height:60px;
            margin-left:5px;
            background-color:#f0f0f0;
        }

        .input-field::placeholder {
            font-size: 20px;
            color: #a1a1a1;
        }

        .input-field:focus {
            outline: none;
            border-color: #965A26;
        }

        /* Button Styles */
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 30px;
            background: linear-gradient(90deg, rgba(9,231,180,1) 0%, rgba(38,221,120,1) 100%, rgba(40,220,116,1) 100%, rgba(62,213,71,0) 100%);
            color: #fff;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            font-size: 20px;
            text-align: center;
            width: 100%;
            height: 100%;
            height:60px;
            margin-top:10px;
        }

        .btn:hover {
            background-color: #c53030;
        }

        /* Forgot Password Styles */
        .forgot-password {
            text-align: right;
            margin-top: 0.5rem;
        }

        .forgot-password a {
            color: #965A26;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        /* Other Utility Styles */
        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: 600;
        }

        #heading1 {
            font-size: 40px;
            margin-bottom: 1rem;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                max-width: 100%;
            }

            .form-card, .text-card {
                width: 100%;
            }

            .input-field {
                font-size: 14px;
            }

            .btn {
                font-size: 14px;
            }
        }
        #format{
            font-size:20px;
            margin-left:5px;
        }
        .button {
    font-size: 20px;
    border-radius: 30px;
    width: 100px;
    height: 50px;
    background-color: transparent;
    color: white; 
    border: none; 
    cursor: pointer;
    transition: background-color 0.2s ease-in-out, transform 0.2s ease-in-out; 
    border: 2px solid #ffffff;
}

.button:hover {
    background-color: #ff1a1a; /* Darker red on hover */
    transform: scale(1.05); /* Slightly enlarge the button */
}

    </style>
</head>

<body>
    <div class="container">
        <div class="form-card">
        <div style="display: flex; justify-content: space-between; align-items: center;">
    <h1 class="text-left font-bold" id="heading1">Sign In</h1>
   

</div>
<div style="border-bottom: 2px solid lightgray; margin: 16px 0;"></div>


            <div class="form-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <label for="email" class="block font-medium" id="format">Email ID:</label>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="email" class="input-field" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="email id">
                        <div class="text-red-600 text-sm">{{ $errors->first('email') }}</div>
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block font-medium" id="format">Password:</label>
                        <input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" placeholder="password">
                        <div class="text-red-600 text-sm">{{ $errors->first('password') }}</div>
                    </div>

                    <div>
                        <button type="submit" class="btn">Sign in</button><br/><br/>
                    </div>



                    <!-- Remember Me and Forgot Password -->
<div class="mt-5 flex justify-between items-center"> <!-- Use flex for layout -->
    <!-- Remember Me -->
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <span class="ml-2 text-sm text-gray-600" style="font-size: 20px;">Remember me</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </label> 

    <!-- Forgot Password -->
    <a href="/forgot-password" class="text-indigo-600 text-sm hover:underline">
        Forgot Password?
    </a>
</div>


                </form>
            </div>
        </div>

        <div class="text-card">
            <h2 class="font-bold" style="font-size: 40px; color:white; margin-left:20px;">Welcome to Login</h2>
            <p style="margin: 16px 0; color:white; font-size:20px;">Don't have account?</p>
            <button class="button">Sign In</button>
            
        </div>
    </div>
</body>

</html>
