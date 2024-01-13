<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $mailData['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }

        h3 {
            color: #333;
            margin-bottom: 20px;
        }

        h5 {
            color: #333;
            margin-top: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
        }

        span {
            display: inline-block;
            width: 120px;
            margin-right: 10px;
        }

        a {
            color: #1E88E5;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .paragrap {
            text-indent: 20px;
            /* Adjust the value as needed */
        }
    </style>
</head>

<body>
    <h3>Halo admin, {{ $mailData['subject'] }}</h3>
    <p class="paragrap">{{ $mailData['message'] }}</p>

    <h5>Informasi Pengirim:</h5>
    <ul>
        <li><span>Nama </span>: {{ $mailData['nama'] }}</li>
        <li><span>E-Mail </span>: {{ $mailData['email'] }}</li>
    </ul>


    <h5>Contact Information:</h5>
    <p>Phone: {{ array_key_exists('telepon', $contact) ? $contact['telepon'] : '+62 345 6789' }}</p>
    <p>Email: {{ array_key_exists('email', $contact) ? $contact['email'] : 'info@example.com' }}</p>
    <p>Address: {{ array_key_exists('address', $contact) ? $contact['address'] : '123 Street, Food, Konoha' }}</p>
    <p><a href="{{ route('web.index') }}"
            style="color: #1E88E5; text-decoration: none;">{{ array_key_exists('general_nama_app', $settings) ? ($settings['general_nama_app'] ? $settings['general_nama_app'] : 'Compro') : 'Compro' }}</a>
    </p>
</body>

</html>
