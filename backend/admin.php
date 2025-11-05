<?php
include("database.php");

$userQuery = "SELECT * FROM users";
$userResult = mysqli_query($conn, $userQuery);

$courseQuery = "SELECT * FROM courses";
$courseResult = mysqli_query($conn, $courseQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 220px;
            background-color: #F57C00;
            color: white;
            padding-top: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .sidebar h2 {
            margin-bottom: 30px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 20px;
            width: 100%;
            text-align: center;
            transition: 0.3s;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: white;
            color: #F57C00;
            font-weight: bold;
        }

        .main {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        h1 {
            color: #F57C00;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #F57C00;
            color: white;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .actions {
            display: flex;
            gap: 5px;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar {
                flex-direction: row;
                width: 100%;
                justify-content: space-around;
                padding: 10px;
            }

            .sidebar a {
                padding: 10px;
            }

            .main {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="sidebar">
        <h2>Admin</h2>
        <a href="#" class="active" onclick="showTab('dashboard')">Dashboard</a>
        <a href="#" onclick="showTab('users')">Users</a>
        <a href="#" onclick="showTab('courses')">Courses</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main">
        <div id="dashboard" class="tab-content active">
            <h1>Dashboard</h1>
            <p>Welcome to the admin panel. Use the sidebar to manage content.</p>
        </div>

        <div id="users" class="tab-content">
            <h1>Users</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($user = mysqli_fetch_assoc($userResult)): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['username']) ?></td>
                        <td><?= htmlspecialchars($user['email']) ?></td>
                        <td><?= htmlspecialchars($user['role']) ?></td>
                        <td class="actions">
                      <a class="btn btn-edit" href="edit_user.php?id=<?= $user['id'] ?>">Edit</a>
                      <a href="delete_user.php?id=<?= $user['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');" style="color: white; background: red; padding: 5px 10px; border-radius: 5px; text-decoration: none;">Delete</a>

                         </td>

                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <div id="courses" class="tab-content">
            <h1>Courses</h1>
            <table>
                <thead>
                    <tr>
                        <th>ID</th><th>Name</th><th>Lecturer</th><th>Email</th><th>State</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($course = mysqli_fetch_assoc($courseResult)): ?>
                    <tr>
                        <td><?= htmlspecialchars($course['id']) ?></td>
                        <td><?= htmlspecialchars($course['name']) ?></td>
                        <td><?= htmlspecialchars($course['lecturer_name']) ?></td>
                        <td><?= htmlspecialchars($course['lecturer_email']) ?></td>
                        <td><?= htmlspecialchars($course['state']) ?></td>
                        <td class="actions">
                            <a class="btn btn-edit" href="edit_course.php?id=<?= $course['id'] ?>">Edit</a>
                            <a class="btn btn-delete" href="delete_course.php?id=<?= $course['id'] ?>" onclick="return confirm('Delete this course?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function showTab(tabId) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.remove('active'));
        document.getElementById(tabId).classList.add('active');

        document.querySelectorAll('.sidebar a').forEach(el => el.classList.remove('active'));
        const clickedLink = Array.from(document.querySelectorAll('.sidebar a')).find(a => a.getAttribute('onclick')?.includes(tabId));
        if (clickedLink) clickedLink.classList.add('active');
    }
</script>

</body>
</html>
