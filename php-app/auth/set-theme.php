<?php
/**
 * Theme Setter for JOKEBURG
 * File: /php-app/auth/set-theme.php
 */

require_once '../config/config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $theme = $input['theme'] ?? 'default';
    
    // Validate theme
    $valid_themes = ['default', 'dark', 'green', 'purple', 'orange', 'red', 'teal', 'pink', 'yellow', 'gray'];
    
    if (in_array($theme, $valid_themes)) {
        $_SESSION['theme'] = $theme;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid theme']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>