<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Tripin Login') }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style type="text/tailwindcss">
        body {
            font-family: 'Open Sans', sans-serif;
        }
        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }
        html, body {
           /* Sesuai contoh, 'visible' mungkin penting untuk positioning gambar ilustrasi */
           /* Jika ada masalah scroll horizontal yang tidak diinginkan, pertimbangkan 'clip' */
           overflow-x: visible;
        }
        /* Styling untuk input error dan session status jika tidak ingin default */
        .form-input-error {
            @apply border-red-500;
        }
        .form-error-message {
            @apply text-red-500 text-xs mt-1;
        }
        .session-status-message {
            @apply mb-4 font-medium text-sm text-green-700 bg-green-100 border border-green-300 p-3 rounded-md;
        }

        /* Untuk rounded corner custom jika Tailwind JIT CDN tidak langsung mengenali */
        .rounded-tr-40px { border-top-right-radius: 40px; }
        .rounded-br-40px { border-bottom-right-radius: 40px; }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'tripin-blue-light': '#7B94C3',
                        'tripin-blue-dark': '#1B2A4E',
                        'tripin-blue-darker': '#6a7fbb', // untuk hover states
                        'tripin-gray-placeholder': '#A0AEC0', // Sesuai placeholder-gray-400
                        'tripin-gray-input': '#4A5568', // Sesuai text-gray-700 untuk input text
                    },
                    fontFamily: {
                        'sans': ['Open Sans', 'sans-serif'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                        'playwrite': ['DynaPuff', 'system-ui'],
                    },
                    borderRadius: {
                        '40px': '40px', // Definisi untuk rounded-tr-[40px]
                    },
                    borderColor: theme => ({
                        ...theme('colors'),
                        DEFAULT: theme('colors.gray.300', 'currentColor'),
                        'tripin-blue-light': '#7B94C3',
                    }),
                    ringColor: theme => ({
                        ...theme('colors'),
                        DEFAULT: theme('colors.blue.500', '#7B94C3'),
                        'tripin-blue-light': '#7B94C3',
                    })
                }
            }
        }
    </script>
</head>
<body class="min-h-screen font-sans antialiased bg-white text-gray-900">
    <div class="w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex relative flex-1 pt-20">


        <div class="hidden md:flex flex-col justify-between w-1/3 bg-gradient-to-b from-tripin-blue-light to-white rounded-tr-40px rounded-br-40px p-8 relative z-10">
            <div>
                <div class="flex items-center space-x-1">
                    <h1 class="font-playwrite text-white text-3xl select-none">
                        BandungVibes
                    </h1>
                    {{-- <img alt="Logo with orange sun and two blue palm trees with waves" class="w-10 h-10" draggable="false" height="40" src="https://storage.googleapis.com/a1aa/image/a5316701-fc15-47f5-640a-db92a1b2ca0e.jpg" width="40"/> --}}
                </div>
            </div>
            <div class="flex-grow"></div>
            <div class="h-16"></div>
        </div>

        <img alt="Illustration of a man and woman with luggage, globe with location pin, paper plane, and airplane flying"
     class="hidden md:block absolute top-[50%] left-[28%] -translate-x-1/2 w-[300px] lg:w-[400px] h-auto select-none pointer-events-none z-30"
     draggable="false"
     src="https://cdni.iconscout.com/illustration/premium/thumb/student-go-to-study-abroad-illustration-download-in-svg-png-gif-file-formats--studying-global-education-international-people-activity-pack-illustrations-10300717.png"/>


        <div class="flex-1 flex flex-col justify-center px-6 sm:px-16 md:pl-24 md:pr-16 lg:px-32 xl:px-40 py-12 md:py-0 relative z-20 bg-white">

            @if (session('status'))
                <div class="session-status-message">
                    {{ session('status') }}
                </div>
            @endif

            <h2 class="text-tripin-blue-light font-semibold text-2xl md:text-3xl font-montserrat mb-8 text-center">
                Login Your Account
            </h2>

            <div class="flex justify-center space-x-10 sm:space-x-20 mb-10 text-lg font-semibold">
                <button class="border-b-2 border-black pb-1 text-black">
                    Sign In
                </button>
                <a href="{{ route('register') }}" class="text-gray-400 border-b border-gray-300 pb-1 hover:text-gray-500 hover:border-gray-400 transition-colors">
                    Sign Up
                </a>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6 max-w-lg mx-auto w-full">
                @csrf

                <div>
                    <label class="sr-only" for="login">{{ __('Email or phone number') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input class="w-full border {{ $errors->has('login') ? 'border-red-500' : 'border-gray-300' }} rounded-xl py-3 pl-12 pr-4 text-tripin-gray-input placeholder-tripin-gray-placeholder focus:outline-none focus:ring-1 focus:ring-tripin-blue-light focus:border-tripin-blue-light"
                            id="login"
                            type="text"
                            name="login"
                            value="{{ old('login') }}"
                            placeholder="Email or phone number"
                            required autofocus />
                    </div>
                    @error('login')
                        <p class="form-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="sr-only" for="password">{{ __('Password') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fas fa-key"></i>
                        </span>
                        <input class="w-full border {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }} rounded-xl py-3 pl-12 pr-4 text-tripin-gray-input placeholder-tripin-gray-placeholder focus:outline-none focus:ring-1 focus:ring-tripin-blue-light focus:border-tripin-blue-light"
                            id="password"
                            type="password"
                            name="password"
                            placeholder="Password"
                            required autocomplete="current-password" />
                    </div>
                    @error('password')
                        <p class="form-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col sm:flex-row items-center justify-between text-sm space-y-2 sm:space-y-0">
                    <div class="block">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-tripin-blue-light shadow-sm focus:ring-tripin-blue-light" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="font-medium text-black hover:text-tripin-blue-light transition" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password ?') }}
                        </a>
                    @endif
                </div>

                <div class="text-center text-sm my-6">
                    <p class="text-xs text-tripin-blue-dark mt-6">
                        ATAU LOGIN DENGAN
                    </p>
                </div>

                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-6 mb-10">
                    <a href="{{ url('/auth/google') }}" class="flex items-center border border-gray-300 rounded-xl py-2.5 px-4 space-x-3 text-gray-500 hover:bg-gray-50 transition w-full sm:w-auto sm:flex-1 justify-center" role="button">
                        <img alt="Google G logo in color" class="w-5 h-5" draggable="false" src="https://storage.googleapis.com/a1aa/image/dde7b386-11e6-43e2-b46e-7459bc3613ac.jpg"/>
                        <span class="text-sm font-medium">Sign In with Google</span>
                    </a>
                    <a href="{{ url('/auth/facebook') }}" class="flex items-center border border-gray-300 rounded-xl py-2.5 px-4 space-x-3 text-gray-500 hover:bg-gray-50 transition w-full sm:w-auto sm:flex-1 justify-center" role="button">
                        <i class="fab fa-facebook-f text-[#3b5998] text-lg"></i>
                        <span class="text-sm font-medium">Sign In with Facebook</span>
                    </a>
                </div>

                <button class="w-full bg-tripin-blue-light text-white font-semibold py-3 rounded-xl hover:bg-tripin-blue-darker transition" type="submit">
                    {{ __('Sign In') }}
                </button>
            </form>
        </div>
    </div>
</body>

</html>