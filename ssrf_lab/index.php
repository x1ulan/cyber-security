<?php
session_start();
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script src="https://unpkg.com/unlazy@0.11.3/dist/unlazy.with-hashing.iife.js" defer init></script>
    <script type="text/javascript">
        window.tailwind.config = {
            darkMode: ['class'],
            theme: {
                extend: {
                    colors: {
                        border: 'hsl(var(--border))',
                        input: 'hsl(var(--input))',
                        ring: 'hsl(var(--ring))',
                        background: 'hsl(var(--background))',
                        foreground: 'hsl(var(--foreground))',
                        primary: {
                            DEFAULT: 'hsl(var(--primary))',
                            foreground: 'hsl(var(--primary-foreground))'
                        },
                        secondary: {
                            DEFAULT: 'hsl(var(--secondary))',
                            foreground: 'hsl(var(--secondary-foreground))'
                        },
                        destructive: {
                            DEFAULT: 'hsl(var(--destructive))',
                            foreground: 'hsl(var(--destructive-foreground))'
                        },
                        muted: {
                            DEFAULT: 'hsl(var(--muted))',
                            foreground: 'hsl(var(--muted-foreground))'
                        },
                        accent: {
                            DEFAULT: 'hsl(var(--accent))',
                            foreground: 'hsl(var(--accent-foreground))'
                        },
                        popover: {
                            DEFAULT: 'hsl(var(--popover))',
                            foreground: 'hsl(var(--popover-foreground))'
                        },
                        card: {
                            DEFAULT: 'hsl(var(--card))',
                            foreground: 'hsl(var(--card-foreground))'
                        },
                    },
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer base {
				:root {
					--background: 0 0% 100%;
--foreground: 240 10% 3.9%;
--card: 0 0% 100%;
--card-foreground: 240 10% 3.9%;
--popover: 0 0% 100%;
--popover-foreground: 240 10% 3.9%;
--primary: 240 5.9% 10%;
--primary-foreground: 0 0% 98%;
--secondary: 240 4.8% 95.9%;
--secondary-foreground: 240 5.9% 10%;
--muted: 240 4.8% 95.9%;
--muted-foreground: 240 3.8% 46.1%;
--accent: 240 4.8% 95.9%;
--accent-foreground: 240 5.9% 10%;
--destructive: 0 84.2% 60.2%;
--destructive-foreground: 0 0% 98%;
--border: 240 5.9% 90%;
--input: 240 5.9% 90%;
--ring: 240 5.9% 10%;
--radius: 0.5rem;
				}
				.dark {
					--background: 240 10% 3.9%;
--foreground: 0 0% 98%;
--card: 240 10% 3.9%;
--card-foreground: 0 0% 98%;
--popover: 240 10% 3.9%;
--popover-foreground: 0 0% 98%;
--primary: 0 0% 98%;
--primary-foreground: 240 5.9% 10%;
--secondary: 240 3.7% 15.9%;
--secondary-foreground: 0 0% 98%;
--muted: 240 3.7% 15.9%;
--muted-foreground: 240 5% 64.9%;
--accent: 240 3.7% 15.9%;
--accent-foreground: 0 0% 98%;
--destructive: 0 62.8% 30.6%;
--destructive-foreground: 0 0% 98%;
--border: 240 3.7% 15.9%;
--input: 240 3.7% 15.9%;
--ring: 240 4.9% 83.9%;
				}
			}
		</style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <div class="bg-background text-primary-foreground min-h-screen flex flex-col items-center justify-center">
        <h1 class="text-muted-foreground text-4xl font-bold mb-6">Profile Photo Settings</h1>
        <div class="bg-card p-8 rounded-lg shadow-lg max-w-md w-full">
            <div class="mb-6 flex flex-col items-center">
                <img src="<?php if(isset($_SESSION['image'])){echo $_SESSION['image'];}else{echo "https://placehold.co/150?text=Profile";}?>" alt="Profile Photo" class="w-32 h-32 rounded-full border-4 border-primary shadow-md" />
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium text-muted-foreground mb-1">Choose an option:</label>
                <div class="flex items-center mb-2">
                    <input type="radio" id="upload" name="photo-option" value="upload" class="mr-2" checked onchange="toggleInput()">
                    <label for="upload" class="text-muted-foreground">Upload File</label>
                </div>
                <div class="flex items-center mb-4">
                    <input type="radio" id="url" name="photo-option" value="url" class="mr-2" onchange="toggleInput()">
                    <label for="url" class="text-muted-foreground">Enter URL</label>
                </div>
            </div>
            <div id="upload-section">
                <input id="image" accept="image/png, image/jpeg" type="file" class="bg-primary text-primary-foreground px-4 py-2 rounded-md w-full mb-4 hover:bg-primary/80 transition duration-200">
            </div>
            <div id="url-section" class="hidden">
                <label for="photo-url" class="block text-sm font-medium text-muted-foreground mb-1">Enter Photo URL:</label>
                <input style="color: black;" id="photo-url" type="text" placeholder="http://example.com/photo.jpg" class="bg-input text-input-foreground px-4 py-2 rounded-md w-full border border-muted focus:outline-none focus:ring-2 focus:ring-primary transition duration-200 mb-4" />
            </div>
            <input id="uploadbtn" type="submit" class="bg-blue-500 text-blue-50 px-4 py-2 rounded-md w-full mb-4 hover:bg-blue-600 transition duration-200">
        </div>
    </div>

    <script>
        function reset() {
            $("#photo-url").val("");
            $("#image").val("");
        }

        function toggleInput() {
            if ($("#upload")[0].checked) {
                $("#upload-section")[0].classList.remove('hidden');
                $("#url-section")[0].classList.add("hidden");
            } else {
                $("#upload-section")[0].classList.add('hidden');
                $("#url-section")[0].classList.remove("hidden");
            }
            reset();
        }

        $("#uploadbtn").click(function() {
            var files = $('#image').prop('files');
            var data = new FormData();
            data.append('image', files[0]);
            data.append('url', $("#photo-url")[0].value);
            if($("#photo-url")[0].value!=='' && !/^(https?:\/\/)?((?:\d{1,3}\.){3}\d{1,3}|[\da-z\.-]+)\.?([a-z\.]{2,6})?([\/\w \.-]*)*\/?(\?[a-z0-9=&]*)?(#[\w-]*)?$/.test($("#photo-url")[0].value)){
                Swal.fire({
                        title: 'Error!',
                        text: "url is illegal",
                        icon: 'error',
                        confirmButtonText: 'ok'
                    }).then(()=>{
                        location.reload();
                    })
                return;
            }
            $.ajax({
                type: 'POST',
                url: "./upload.php",
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(ret) {
                    if(ret=="error"){
                        Swal.fire({
                        title: "Error!",
                        text: "url is illegal",
                        icon: 'error',
                        confirmButtonText: 'ok'
                    })}else{
                        Swal.fire({
                        title: "Success!",
                        text: "success",
                        icon: 'success',
                        confirmButtonText: 'ok'
                    }).then(()=>{
                        location.reload();
                    })
                    }
                }
            });
            reset();
        });
    </script>
</body>

</html>