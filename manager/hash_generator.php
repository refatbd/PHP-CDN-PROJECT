<?php
$password_hash = '';
if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Hash Generator</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-gray-900 text-white flex items-center justify-center min-h-screen">
    <div class="p-8 rounded-xl bg-gray-800 border border-gray-700 shadow-xl max-w-lg w-full">
        <h1 class="text-2xl font-bold text-center mb-6">TFM Password Hash Generator</h1>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Enter Password:</label>
                <input type="text" name="password" id="password"
                       class="w-full px-3 py-2 bg-gray-900 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Your-Secure-Password-123"
                       required>
            </div>
            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md transition-colors duration-300">
                Generate Hash
            </button>
        </form>

        <?php if ($password_hash): ?>
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-300 mb-1">Generated Hash (Copy this):</label>
                <textarea
                    class="w-full h-24 p-3 bg-gray-900 border border-gray-600 rounded-md text-green-400 font-mono text-sm"
                    readonly onclick="this.select();"><?php echo htmlspecialchars($password_hash); ?></textarea>
                <p class="text-xs text-gray-400 mt-2">
                    Example for <code>$auth_users</code>:
                    <br>
                    <code class="text-pink-400">'your_username' => '<?php echo htmlspecialchars($password_hash); ?>',</code>
                </p>
            </div>
        <?php endif; ?>

        <p class="text-center text-red-400 text-sm font-bold mt-6">
            Warning: Delete this file from your server after use.
        </p>
    </div>
</body>
</html>