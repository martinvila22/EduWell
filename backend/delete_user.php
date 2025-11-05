<?php
require 'database.php'; 

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);

    
    $stmt = $conn->prepare("SELECT course_id FROM user_courses WHERE user_id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    
    $courseIds = [];
    while ($row = $result->fetch_assoc()) {
        $courseIds[] = $row['course_id'];
    }
    $stmt->close();

    
    $stmt1 = $conn->prepare("DELETE FROM user_courses WHERE user_id = ?");
    $stmt1->bind_param("i", $userId);
    $stmt1->execute();
    $stmt1->close();

    
    if (!empty($courseIds)) {
        
        $courseIdsString = implode(',', array_map('intval', $courseIds));

       
        $deleteCoursesQuery = "DELETE FROM courses WHERE id IN ($courseIdsString)";
        $conn->query($deleteCoursesQuery);
    }

   
    $stmt2 = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt2->bind_param("i", $userId);
    $stmt2->execute();
    $stmt2->close();

    $conn->close();
}


header("Location: admin.php");
exit;
?>
