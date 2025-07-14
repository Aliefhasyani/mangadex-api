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
        :root {
            --primary-color: #4e73df;
            --secondary-color: #858796;
            --accent-color: #f8f9fc;
            --dark-color: #5a5c69;
            --light-color: #f8f9fa;
            --success-color: #1cc88a;
            --warning-color: #f6c23e;
            --danger-color: #e74a3b;
        }
        
        body {
            background-color: var(--accent-color);
            padding-top: 20px;
            font-family: 'Nunito', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        
        .page-header {
            position: relative;
            margin-bottom: 3rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        
        .page-header h1 {
            font-weight: 700;
            color: var(--dark-color);
            position: relative;
            display: inline-block;
        }
        
        .page-header h1::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: var(--primary-color);
            border-radius: 3px;
        }
        
        .manga-card {
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            height: 100%;
            border: none;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
            background: white;
        }
        
        .manga-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1.5rem 0 rgba(58, 59, 69, 0.2);
        }
        
        .card-img-top {
            height: 350px;
            object-fit: cover;
            object-position: center;
            transition: transform 0.5s ease;
        }
        
        .manga-card:hover .card-img-top {
            transform: scale(1.03);
        }
        
        .card-title {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 3em;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 4.5em;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }
        
        .badge-genre {
            background-color: var(--primary-color);
            color: white;
            margin-right: 5px;
            margin-bottom: 5px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
        }
        
        .btn-read {
            background-color: var(--primary-color);
            color: white;
            border: none;
            font-weight: 600;
        }
        
        .btn-read:hover {
            background-color: #2e59d9;
            color: white;
        }
        
        .btn-details {
            background-color: white;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            font-weight: 600;
        }
        
        .btn-details:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .card-footer {
            background-color: rgba(0,0,0,0.03);
            border-top: none;
        }
        
        .rating-badge {
            background-color: rgba(78, 115, 223, 0.1);
            color: var(--primary-color);
            padding: 3px 8px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .search-container {
            margin-bottom: 2rem;
        }
        
        .search-box {
            position: relative;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .search-box input {
            padding-left: 40px;
            border-radius: 50px;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 12px;
            color: var(--secondary-color);
        }
        
        .filter-section {
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.1);
        }
        
        .pagination .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .pagination .page-link {
            color: var(--primary-color);
        }
        
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--secondary-color);
        }
        
        .empty-state i {
            font-size: 5rem;
            color: #d1d3e2;
            margin-bottom: 1rem;
        }
        
        @media (max-width: 768px) {
            .card-img-top {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
    
        <div class="mb-3 text-center">
            <h1>Discover Amazing Manga</h1>
       
        </div>
        
       
   
     
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach($mangas['data'] as $manga)
            <div class="col">
                <div class="card manga-card h-100">
                    <div class="position-relative">
                        <img src="{{ $manga['cover_url'] ?? 'https://via.placeholder.com/300x450?text=No+Cover' }}"
                             class="card-img-top" 
                             alt="{{ $manga['attributes']['title']['en'] ?? 'Manga Cover' }}"
                             onerror="this.onerror=null;this.src='https://via.placeholder.com/300x450?text=Cover+Not+Available'">
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="rating-badge">
                                <i class="fas fa-star text-warning"></i> 
                                {{ $manga['attributes']['contentRating'] ?? 'N/A' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <div class="mb-2">
                         
                                @foreach(array_slice($manga['genre'], 0, 2) as $genre)
                                    <span class="badge-genre">{{ $genre }}</span>
                                @endforeach
                               
                                    <span class="badge bg-secondary">+{{ count($manga['genre']) - 2 }} more</span>
                              
                        </div>
                        
                        <h5 class="card-title fw-bold">
                            {{ $manga['attributes']['title']['en'] ?? 'Untitled Manga' }}
                        </h5>
                        
                        <p class="card-text text-muted flex-grow-1">
                            {{ Str::limit($manga['attributes']['description']['en'] ?? 'No description available.', 120) }}
                        </p>
                        
                        <div class="d-flex justify-content-between align-items-center mt-auto">
                            <a href="{{route('read', $manga['id'])}}" class="btn btn-read btn-sm">
                                <i class="fas fa-book-open me-1"></i> Read Now
                            </a>
                            <a href="#" class="btn btn-details btn-sm">
                                <i class="fas fa-info-circle me-1"></i> Details
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <div class="d-flex justify-content-between small text-muted">
                            <span>
                                <i class="fas fa-bookmark text-primary"></i> 
                                {{ $manga['attributes']['chapterNumbers'] ?? '?' }} ch
                            </span>
                            <span>
                                <i class="fas fa-calendar-alt"></i> 
                                {{ $manga['attributes']['year'] ?? '?' }}
                            </span>
                            <span>
                                <i class="fas fa-heart text-danger"></i> 
                                {{ $manga['attributes']['rating'] ?? '?' }}/10
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    
        
       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>