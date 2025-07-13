<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manga Collection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
        }
        .manga-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
        }
        .manga-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 350px;
            object-fit: cover;
            object-position: center;
        }
        .card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 3em;
        }
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 4.5em;
        }
        .badge-genre {
            background-color: #6c757d;
            margin-right: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Manga Collection</h1>
        
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach($mangas['data'] as $manga)
            <div class="col">
                <div class="card manga-card h-100">
                  
                    <img src="{{ $manga['cover_url'] ?? 'https://via.placeholder.com/300x450?text=No+Cover' }}"

                         class="card-img-top" 
                         alt="{{ $manga['attributes']['title']['en'] ?? 'Manga Cover' }}"
                         onerror="this.onerror=null;this.src='https://via.placeholder.com/300x450?text=Cover+Not+Available'">
                    
                    <div class="card-body d-flex flex-column">
                    
                        <h5 class="card-title fw-bold">
                            {{ $manga['attributes']['title']['en'] ?? 'Untitled Manga' }}
                        </h5>
                        
              
                        <p class="card-text text-muted flex-grow-1">
                            {{ $manga['attributes']['description']['en'] ?? 'No description available.' }}
                        </p>
                        
          
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <a href="{{route('read', $manga['id'])}}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-book-open me-1"></i> Read
                            </a>
                            <a href="#" class="btn btn-outline-secondary btn-sm">
                                <i class="fas fa-info-circle me-1"></i> Details
                            </a>
                        </div>
                    </div>
                    
                 
                    <div class="card-footer bg-transparent">
                        <div class="d-flex justify-content-between small text-muted">
                            <span>
                                <i class="fas fa-star text-warning"></i> 
                                {{ $manga['attributes']['rating'] ?? 'N/A' }}
                            </span>
                            <span>
                                <i class="fas fa-calendar-alt"></i> 
                                {{ $manga['attributes']['year'] ?? 'Unknown' }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       
    </script>
</body>
</html>