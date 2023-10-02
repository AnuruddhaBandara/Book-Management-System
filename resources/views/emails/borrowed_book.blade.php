<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Borrowed</title>
</head>
<body>
    <h1>Hello {{ $readerName }},</h1>
    <p>You have successfully borrowed the book "{{ $bookTitle }}".</p>
    <p>Please note the following details:</p>
    <ul>
        <li><strong>Borrowed On:</strong> {{ $borrowedDate }}</li>
        <li><strong>Return By:</strong> {{ $returnByDate }}</li>
    </ul>
    <p>Please make sure to return the book by the specified date to avoid any late fees.</p>
    <p>If you have any questions, please feel free to contact us.</p>
    <p>Thank you,</p>
    <p>Your Library Team</p>
</body>
</html>
