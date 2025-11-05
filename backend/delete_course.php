<?php
require 'database.php'; 

$message = '';
if (isset($_GET['id'])) {
    $courseId = $_GET['id'];

    
    $stmt = $conn->prepare("DELETE FROM user_courses WHERE course_id = ?");
    $stmt->bind_param("i", $courseId);
    $stmt->execute();

  
    $stmt = $conn->prepare("DELETE FROM courses WHERE id = ?");
    $stmt->bind_param("i", $courseId);
    if ($stmt->execute()) {
        $message = "Course successfully deleted.";
    } else {
        $message = "Failed to delete the course.";
    }
} else {
    $message = "No course ID provided.";
}
header("Location: admin.php");
exit;
?>
