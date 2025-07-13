<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Read Manga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f1f1f1;
        }
        .manga-page {
            max-width: 800px;
            margin: 20px auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            background: white;
        }
        .manga-page img {
            width: 100%;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Manga Reader</h1>
        @forelse($pages as $page)
            <div class="manga-page">
                <img src="{{ $page }}" alt="Manga Page">
            </div>
        @empty
            <p class="text-center">No pages found for this chapter.</p>
        @endforelse
    </div>
</body>
</html>
