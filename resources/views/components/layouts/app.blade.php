<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')


</head>

<body>

    <div className="min-h-screen bg-gray-100">
        <div className="py-10">
            <main>
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    {{ $slot }}

                </div>
            </main>
        </div>
    </div>
</body>

</html>
