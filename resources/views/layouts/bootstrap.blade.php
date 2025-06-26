<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AmaZom e-commerce - @yield('title')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        /* Pour éviter que le contenu soit caché sous la navbar fixed */
        body {
            padding-top: 70px; /* ajuste selon la hauteur de ta navbar */
        }
        /* Optionnel : limiter hauteur sidebar si besoin */
        .sidebar {
            height: calc(100vh - 70px);
            overflow-y: auto;
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Navbar fixed-top -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand"  href="{{ route('produits.index') }}">
            <i class="fas fa-hospital me-2"></i>AmaZom
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            @auth
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/ta') }}">
                        <i class="fas fa-search me-1"></i> Gérer les produits
                    </a>
                </li>
                   <li class="nav-item">
                    <a class="nav-link" href="{{ url('/ta') }}">
                        <i class="fas fa-search me-1"></i> Gérer les catégories
                    </a>
                </li>
                <!-- Lien vers le panier ajouté ici -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="fas fa-shopping-cart me-1"></i> Panier
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user me-1"></i> Profil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{ url('/getLogout') }}">
                                <i class="fas fa-sign-out-alt me-1"></i> Déconnexion
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            @else
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/formLogin') }}">
                        <i class="fas fa-sign-in-alt me-1"></i> Connexion
                    </a>
                </li>
            </ul>
            @endauth
        </div>
    </div>
</nav>


    <!-- Contenu principal -->
    <div class="container-fluid main-container">
        <div class="row">
            @auth
            <!-- Sidebar -->
            <aside class="col-md-3 col-lg-2 d-none d-md-block sidebar p-3 bg-light border">
                <div class="list-group">
                    <a href="{{ url('/listePraticiens') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-list me-2"></i> Liste des catégories 
                    </a>
                    <a href="{{ url('/rechercherPraticien') }}" class="list-group-item list-group-item-action">
                        <i class="fas fa-search me-2"></i> Rechercher un produit
                    </a>
                </div>
            </aside>
            @endauth

            <!-- Contenu dynamique -->
            <main class="@auth col-md-9 col-lg-10 @else col-12 @endauth py-4">
                {{-- Messages flash --}}
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
                </div>
                @endif

                {{-- Contenu principal : plusieurs cartes pour les produits --}}
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle avec Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')
</body>
</html>
