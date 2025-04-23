<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu Digital</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container" style="max-width: 600px; margin: 40px auto;">
        <h1>Buku Tamu</h1>

        @if(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif

        <form action="{{ route('guestbook.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nama" required><br><br>
            <input type="email" name="email" placeholder="Email (opsional)"><br><br>
            <textarea name="message" placeholder="Pesan" required></textarea><br><br>
            <button type="submit">Kirim</button>
        </form>

        <hr>
        <h2>Isi Buku Tamu:</h2>
        @foreach($entries as $entry)
            <div style="margin-bottom: 20px; border-bottom: 1px solid #ccc;">
                <strong>{{ $entry->name }}</strong> ({{ $entry->email ?? 'Tidak ada email' }})<br>
                <p>{{ $entry->message }}</p>
                <small>{{ $entry->created_at->format('d M Y H:i') }}</small>
            </div>
        @endforeach
    </div>
</body>
</html>
