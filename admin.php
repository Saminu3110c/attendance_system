<?php
require 'db.php';

// Fetch students
$students = $pdo->query("SELECT * FROM students")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white p-6">
        <h1 class="text-3xl font-bold mb-8">Admin Dashboard</h1>
        <nav>
            <ul class="space-y-4">
                <li><a href="#" class="hover:text-blue-300">Dashboard</a></li>
                <li><a href="#" class="hover:text-blue-300">Manage Students</a></li>
                <li><a href="#" class="hover:text-blue-300">Reports</a></li>
                <li><a href="#" class="hover:text-blue-300">Settings</a></li>
                <li><a href="logout.php" class="hover:text-blue-300">Logout</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-10">
        <h2 class="text-4xl font-bold mb-8 text-blue-600">Manage Students</h2>

        <!-- Student Table -->
        <div class="overflow-x-auto bg-white shadow-xl rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Class</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td class="px-6 py-4"><?= htmlspecialchars($student['id']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($student['name']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($student['email']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($student['class']) ?></td>
                            <td class="px-6 py-4">
                                <a href="edit_student.php?id=<?= $student['id'] ?>" class="text-blue-600 hover:underline">Edit</a> |
                                <a href="delete_student.php?id=<?= $student['id'] ?>" class="text-red-600 hover:underline">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Add Student Button -->
        <a href="register.php" class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition">Add New Student</a>
    </main>
</body>

</html>
