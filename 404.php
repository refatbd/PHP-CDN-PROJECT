<?php
// Set the proper HTTP response code for a 404 error.
header("HTTP/1.0 404 Not Found");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found - cdn.refat.ovh</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-text-error {
            background: linear-gradient(to right, #f87171, #fb923c);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    
    <div class="absolute top-0 left-0 w-full h-full bg-grid-gray-700/[0.2] z-0"></div>

    <div class="text-center p-8 rounded-xl bg-gray-900/50 backdrop-blur-md border border-gray-700/50 shadow-2xl shadow-red-500/10 max-w-2xl mx-auto relative z-10">
        <!-- Icon -->
        <div class="mx-auto mb-6 flex items-center justify-center h-20 w-20 rounded-full bg-gradient-to-br from-red-500 to-orange-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-white"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        </div>
        
        <!-- Error Heading -->
        <h1 class="text-7xl md:text-9xl font-black mb-2">
            <span class="gradient-text-error">404</span>
        </h1>
        
        <!-- Subheading -->
        <p class="text-xl md:text-2xl text-gray-300 mb-4 font-bold">
            File Not Found
        </p>
        
        <!-- Description -->
        <p class="text-gray-400 max-w-md mx-auto mb-8">
            The resource you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>
        
        <!-- Home Button -->
        <a href="/" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300 shadow-lg hover:shadow-xl">
            Go to Homepage
        </a>
    </div>

</body>
</html>
