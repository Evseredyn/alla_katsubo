<?php
// Перевірка захисту від спаму
if ($_POST['secret'] !== 'secretkey') {
    echo "Помилка відправки форми";
    exit;
}

// Отримання даних з форми
$name = htmlspecialchars($_POST['name']);
$phone = htmlspecialchars($_POST['phone']);

// Email отримувача
$to = "zhenyavn@gmail.com, allakatsubo2025@gmail.com"; // Заміни на свій email

// Тема листа
$subject = "Нова реєстрація з лендінгу";

// Текст повідомлення
$message = "Новачок!\n\n";
$message .= "Ім'я: " . $name . "\n";
$message .= "Телефон: " . $phone . "\n";

// Заголовки
$headers = "From: info@allakatsubo.com.ua\r\n";
$headers .= "Reply-To: " . $name . " <info@allakatsubo.com.ua>\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Відправка email
if (mail($to, $subject, $message, $headers)) {
    // Перенаправлення на сторінку з подякою
    header("Location: thank-you.html");
} else {
    echo "Виникла помилка при відправці повідомлення.";
}
?>