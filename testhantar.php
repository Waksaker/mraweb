<?php
$random_pass  = rand(100000, 999999);
$email = "farishtukiman@gmail.com";
// Email content
$subject = "PASSWORD SYSTEM";
$body = "
    <table style='border-collapse: collapse;'>
        <thead>
            <tr>
                <th style='border: 1px solid #000; padding: 8px;'>ID</th>
                <th style='border: 1px solid #000; padding: 8px;'>PASSWORD</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style='border: 1px solid #000; padding: 8px;'>$iduser</td>
                <td style='border: 1px solid #000; padding: 8px;'>$random_pass</td>
            </tr>
        </tbody>
    </table>
";


$scriptUrl = "https://script.google.com/macros/s/AKfycbx3vNzkU170boiNFepArV3kfiR9j8jVM7mz2GuD40EPy6DG7BVaINhkD7izIbFIkcz7/exec";

$data = array(
    "recipient" => $email,
    "subject"   => $subject,
    "body"      => $body,
    "isHTML"    => 'true'
);

$ch = curl_init($scriptUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/x-www-form-urlencoded",
    "User-Agent: Mozilla/5.0"
]);
$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "cURL Error: " . $error;
} else {
    echo "Response: " . $response;
}
?>