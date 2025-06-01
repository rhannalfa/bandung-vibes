<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Tripin Register') }}</title>

    <!-- Google Fonts and Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;900&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Tailwind Styles -->
    <style type="text/tailwindcss">
        body {
            font-family: 'Open Sans', sans-serif;
        }
        .font-montserrat {
            font-family: 'Montserrat', sans-serif;
        }
        html, body {
            overflow-x: visible;
        }
        .form-error-message {
            @apply text-red-500 text-xs mt-1;
        }
        .session-status-message {
            @apply mb-4 font-medium text-sm text-green-700 bg-green-100 border border-green-300 p-3 rounded-md;
        }
        /* Rounded corner custom */
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
                        'tripin-blue-darker': '#6a7fbb',
                        'tripin-gray-placeholder': '#A0AEC0',
                        'tripin-gray-input': '#4A5568',
                    },
                    fontFamily: {
                        'sans': ['Open Sans', 'sans-serif'],
                        'montserrat': ['Montserrat', 'sans-serif'],
                        'playwrite': ['DynaPuff', 'system-ui'],
                    },
                    borderRadius: {
                        '40px': '40px',
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
        <!-- Panel Kiri (Logo dan Background Gradasi) -->
        <div class="hidden md:flex flex-col justify-between w-1/3 bg-gradient-to-b from-tripin-blue-light to-white rounded-tr-40px rounded-br-40px p-8 relative z-10">
            <div>
                <div class="flex items-center space-x-1">
                    <h1 class="font-playwrite text-white text-3xl select-none">
                        BandungVibes
                    </h1>
                    {{-- <img alt="Logo with orange sun and two blue palm trees with waves" class="w-10 h-10" draggable="false" src="https://storage.googleapis.com/a1aa/image/a5316701-fc15-47f5-640a-db92a1b2ca0e.jpg"/> --}}
                </div>
            </div>
            <div class="flex-grow"></div>
            <div class="h-16"></div>
        </div>

        <!-- Ilustrasi (hanya tampil pada md ke atas) -->
        <img alt="Illustration of a man and woman with luggage, globe with location pin, paper plane, and airplane flying"
             class="hidden md:block absolute top-[50%] left-[28%] -translate-x-1/2 w-[300px] lg:w-[400px] h-auto select-none pointer-events-none z-30"
             draggable="false"
             src="https://cdni.iconscout.com/illustration/premium/thumb/student-go-to-study-abroad-illustration-download-in-svg-png-gif-file-formats--studying-global-education-international-people-activity-pack-illustrations-10300717.png"/>

        <!-- Panel Kanan: Form Pendaftaran -->
        <div class="flex-1 flex flex-col justify-center px-6 sm:px-16 md:pl-24 md:pr-16 lg:px-32 xl:px-40 py-12 md:py-0 relative z-20 bg-white">
            <!-- Judul -->
            <h2 class="text-tripin-blue-light font-semibold text-2xl md:text-3xl font-montserrat mb-8 text-center">
                Register Your Account
            </h2>

            <!-- Menu Navigasi: Sign In vs Sign Up -->
            <div class="flex justify-center space-x-10 sm:space-x-20 mb-10 text-lg font-semibold">
                <a href="{{ route('login') }}" class="text-gray-400 border-b border-gray-300 pb-1 hover:text-tripin-blue-light hover:border-tripin-blue-light transition-colors">
                    Sign In
                </a>
                <button class="border-b-2 border-black pb-1 text-black">
                    Sign Up
                </button>
            </div>

            <!-- Form Pendaftaran -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6 max-w-lg mx-auto w-full">
                @csrf

                <!-- Field: Nickname -->
                <div>
                    <label class="sr-only" for="nickname">{{ __('Nickname') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fas fa-user"></i>
                        </span>
                        <input class="w-full border border-gray-300 rounded-xl py-3 pl-12 pr-4 text-tripin-gray-input placeholder-tripin-gray-placeholder focus:outline-none focus:ring-1 focus:ring-tripin-blue-light focus:border-tripin-blue-light" 
                               id="nickname"
                               type="text"
                               name="nickname"
                               value="{{ old('nickname') }}"
                               placeholder="Nickname"
                               required autofocus />
                    </div>
                    @error('nickname')
                        <p class="form-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field: Name -->
                <div>
                    <label class="sr-only" for="name">{{ __('Name') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fas fa-id-card"></i>
                        </span>
                        <input class="w-full border border-gray-300 rounded-xl py-3 pl-12 pr-4 text-tripin-gray-input placeholder-tripin-gray-placeholder focus:outline-none focus:ring-1 focus:ring-tripin-blue-light focus:border-tripin-blue-light" 
                               id="name"
                               type="text"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="Name"
                               required />
                    </div>
                    @error('name')
                        <p class="form-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field: Email Address -->
                <div>
                    <label class="sr-only" for="email">{{ __('Email') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input class="w-full border border-gray-300 rounded-xl py-3 pl-12 pr-4 text-tripin-gray-input placeholder-tripin-gray-placeholder focus:outline-none focus:ring-1 focus:ring-tripin-blue-light focus:border-tripin-blue-light"
                               id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               placeholder="Email"
                               required autocomplete="username" />
                    </div>
                    @error('email')
                        <p class="form-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field: Password -->
                <div>
                    <label class="sr-only" for="password">{{ __('Password') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fas fa-key"></i>
                        </span>
                        <input class="w-full border border-gray-300 rounded-xl py-3 pl-12 pr-4 text-tripin-gray-input placeholder-tripin-gray-placeholder focus:outline-none focus:ring-1 focus:ring-tripin-blue-light focus:border-tripin-blue-light"
                               id="password"
                               type="password"
                               name="password"
                               placeholder="Password"
                               required autocomplete="new-password" />
                    </div>
                    @error('password')
                        <p class="form-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Field: Confirm Password -->
                <div>
                    <label class="sr-only" for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-4 flex items-center text-gray-400">
                            <i class="fas fa-check-double"></i>
                        </span>
                        <input class="w-full border border-gray-300 rounded-xl py-3 pl-12 pr-4 text-tripin-gray-input placeholder-tripin-gray-placeholder focus:outline-none focus:ring-1 focus:ring-tripin-blue-light focus:border-tripin-blue-light"
                               id="password_confirmation"
                               type="password"
                               name="password_confirmation"
                               placeholder="Confirm Password"
                               required autocomplete="new-password" />
                    </div>
                    @error('password_confirmation')
                        <p class="form-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <button class="w-full bg-tripin-blue-light text-white font-semibold py-3 rounded-xl hover:bg-tripin-blue-darker transition" type="submit">
                    {{ __('Register') }}
                </button>
            </form>
        </div>
    </div>
</body>
</html>