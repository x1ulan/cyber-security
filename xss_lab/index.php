<?php
//open httponly and make it fun.
//ini_set( 'session.cookie_httponly', 1 );

session_start();

$data = json_decode(file_get_contents("data.json"), true);

if (!isset($_SESSION["role"])) {
    $_SESSION["role"] = "User";
}

//delete the comment which post 1 minutes ago.
foreach ($data as $key => $row) {
    if ($row["time"] == "now") {
        $rtime = new DateTime("now", new DateTimeZone('Asia/Taipei'));
    } else {
        $rtime = date_create_from_format("Y-m-d H:i:s", $row["time"], new DateTimeZone('Asia/Taipei'));
    }
    $now = new DateTime("now", new DateTimeZone('Asia/Taipei'));
    $diff = date_diff($rtime, $now);
    if($diff->format('%i')>=1){
        array_splice($data, $key,1);
    }
}

file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));

//generate card with comment
function get_card($user, $time, $comment)
{
    return <<<CARD
    <div class="mt-4">
      <div class="flex items-center space-x-2">
        <img src="https://placehold.co/50?text=$user" alt="user-avatar" class="w-10 h-10 rounded-full" />
        <div>
          <h2 class="font-bold">$user</h2>
          <p class="text-sm text-muted">$time</p>
        </div>
      </div>
      <p class="mt-2">$comment</p>
    </div>
CARD;
}
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
/* --muted: 240 4.8% 95.9%; */
--muted: 222 100% 20%;
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
    <style>
        form {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function submit(item) {
            $.ajax({
                url: './submit.php',
                type: 'POST',
                data: `comment=${encodeURIComponent(item.previousElementSibling.value)}`,
                contentType: 'application/x-www-form-urlencoded',
            });
            item.previousElementSibling.value = ""
            location.reload()
        }

        function report() {
            $.ajax({
                url: './report.php',
                type: 'GET',
            });
            Swal.fire({
                title: 'Success!',
                text: 'Report to Admin successful.',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        }
    </script>
    <div class="bg-background text-primary-foreground min-h-screen flex flex-col items-center justify-center">
        <div class="bg-card w-full max-w-lg p-4 rounded-lg shadow-lg text-black">
            <h1 class="text-2xl font-bold mb-4">Welcome <?= $_SESSION["role"] ?></h1>
            <div class="flex items-center space-x-2 mb-4">
                <textarea required name="comment" placeholder="Write your message here..." class="w-full px-3 py-2 rounded-lg border border-input focus:outline-none focus:ring focus:ring-primary"></textarea>
                <input onclick="submit(this)" type="submit" value="Post" class="bg-primary text-primary-foreground px-4 py-2 rounded-lg hover:bg-primary/80 cursor-pointer" />
            </div>
            <?php
            //echo the comments
            foreach ($data as $key => $row) {
                if ($key == 0 and $_SESSION["role"] !== "Admin") {
                    $card = get_card($row["user"], $row["time"], "[!Only Admin Can See The Flag!]");
                } else {
                    $card = get_card($row["user"], $row["time"], $row["comment"]);
                }
                echo $card;
            }
            ?>
        </div>
        <br>
        <button class="bg-primary text-primary-foreground px-4 py-2 rounded-lg hover:bg-primary/80 cursor-pointer" onclick="report()">Report to Admin</button>
    </div>
</body>

</html>