

<?php

if (isset($_POST['name']) && $_POST['name'] != '') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    $projectTypes = isset($_POST['project_type']) ? implode(', ', $_POST['project_type']) : 'None specified';
    $to_admin = "mrsalman723s@gmail.com";
    $to_user = $email; // User's email address
    $subject_admin = "New Contact Form Submission";
    $subject_user = "Thank You for Contacting Us";

    // Admin email body
    $body_admin = '
    <html>
    <head>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1) !important;
            margin: 20px auto;
            max-width: 600px;
            border: 2px solid #f4f4f4;
        }
        .header {
            background-color: #14B789;
            padding: 20px;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content table {
            width: 100%;
        }
        .content td {
            padding: 0 10px 8px;
        }
        .content strong {
            color: #14B789;
        }
        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            color: #999999;
            font-size: 12px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="header">
            <h1>New Contact Form Submission</h1>
        </div>
        <div class="content">
            <table>
                <tr>
                    <td colspan="2"><strong>Dear Admin,</strong></td>
                </tr>
                <tr>
                    <td colspan="2">You have received a new contact form submission. Here are the details:</td>
                </tr>
                <tr>
                    <td><strong>Name:</strong></td>
                    <td>' . $name . '</td>
                </tr>
                <tr>
                    <td><strong>Email:</strong></td>
                    <td>' . $email . '</td>
                </tr>
                <tr>
                    <td><strong>Interested Project:</strong></td>
                    <td>' . $projectTypes . '</td>
                </tr>
                <tr>
                    <td><strong>Message:</strong></td>
                    <td>' . nl2br($message) . '</td>
                </tr>
            
            </table>
        </div>
        <div class="footer">
            <p>&copy; ' . date("Y") . ' <a href="https://czonepk.com/mrsalm/">Portfolio</a>. All rights reserved.</p>
        </div>
    </div>
</body>
    </html>';

    // User email body
    $body_user = '
    <html>
    <head>
        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1) !important;
            margin: 20px auto;
            max-width: 600px;
            border: 2px solid #f4f4f4;
        }
        .header {
            background-color: #14B789;
            padding: 20px;
            color: #ffffff;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .content table {
            width: 100%;
        }
        .content td {
            padding: 0 10px 8px;
        }
        .content strong {
            color: #14B789;
        }
        .footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
            color: #999999;
            font-size: 12px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h1>New Contact Form Submission</h1>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <td colspan="2"><strong>Dear '.$name.',</strong></td>
                    </tr>
                    <tr>
                    <td colspan="2">We appreciate your interest in our services. Our team will review your project requirements and get back to you shortly.</td>
                </tr>
                <tr>
                    <td colspan="2">If you have any further questions, feel free to reply to this email or contact us directly at any time.</td>
                </tr>
                <tr>
                    <td colspan="2">Thank you for considering us for your project. We look forward to the opportunity to work with you.</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Best regards,</strong></td>
                </tr>
                </table>
            </div>
            <div class="footer">
                <p>&copy; ' . date("Y") . ' <a href="https://czonepk.com/mrsalm/">Portfolio</a>. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>';

    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Send email to admin
    $admin_sent = mail($to_admin, $subject_admin, $body_admin, $headers);

    // Send email to user
    $user_sent = mail($to_user, $subject_user, $body_user, $headers);

    if ($admin_sent && $user_sent) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>

