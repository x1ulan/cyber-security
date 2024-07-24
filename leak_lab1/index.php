<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <section class="grid min-h-screen place-items-center bg-gray-900 p-16">
        <div class="w-72 rounded-md bg-gray-800 p-4 pt-0 shadow-lg">
            <header class="flex h-16 items-center justify-between font-bold text-gray-200">
                <span>Login</span>
                <!-- SVG: xmark -->
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <!-- SVG: xmark -->
            </header>
            <form class="grid gap-3">
                <!-- Username Input -->
                <input name="username" class="h-10 rounded-sm bg-gray-700 px-2 text-gray-200 placeholder:text-gray-400 focus:outline-none focus:ring focus:ring-gray-600" type="text" placeholder="Enter your username" />
                <!-- Password Input -->
                <input name="password" class="h-10 rounded-sm bg-gray-700 px-2 text-gray-200 placeholder:text-gray-400 focus:outline-none focus:ring focus:ring-gray-600" type="password" placeholder="Enter your password" />
                <!-- Sign In Button -->
                <button id="submit" class="flex h-10 items-center justify-between rounded-sm bg-gray-600 px-2 text-gray-200 transition-colors duration-300 hover:bg-gray-500 focus:outline-none focus:ring focus:ring-gray-400" type="button">
                    <span>Sign In</span>
                    <span>
                        <!-- SVG: chevron-right -->
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                        <!-- SVG: chevron-right -->
                    </span>
                </button>
            </form>
        </div>
    </section>
    <script>
        $("#submit").click(function() {
            $.post('./flag.php', {
                username: $('input[name=username]')[0].value,
                password: $('input[name=password]')[0].value
            }, function(data) {
                Swal.fire({
                    title: 'result',
                    html: data,
                    icon: 'info',
                    confirmButtonText: 'ok'
                }).then(() => {
                    location.reload();
                })
            })
        })
    </script>
</body>

</html>