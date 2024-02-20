<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tailwind CSS 503 Maintenance Page Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="flex items-center justify-center h-screen">
        <div class="flex flex-col items-center justify-center max-w-lg">
            <div class="mb-4">
                <h1 class="text-5xl font-extrabold text-blue-600">503</h1>
            </div>
            <h3 class="mb-3 text-2xl font-bold text-center text-gray-700">
                Temporarily down for maintenance
                We’ll be back soon!
            </h3>
            <p class="text-sm text-center text-gray-600">
                Sorry for the inconvenience but we’re performing some maintenance at the moment.
                If you need to you can always <a class="text-blue-600 hover:underline"
                    {{-- href="mailto:info@badatkbali.ly? subject = help Us" --}}
                    {{-- href="mailto:info@badatkbali.ly?subject=Mail to Get Support From MMS &body=Type what you want...." target="_blank" --}}
                   href="{{Artisan::call('down');}}"
                    >Contact us  </a>, otherwise
                we’ll be back online shortly!
                — The Team
            </p>
        </div>
    </div>
</body>

</html>
