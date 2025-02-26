<div class="container-fluid px-4">
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-success fs-3" href="/products">
                <i class="fas fa-book-open me-2"></i>Sách Hay
            </a>

            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarContent"
                    aria-controls="navbarContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Right Navigation Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                <ul class="navbar-nav align-items-center gap-3">
                    @auth
                    <li class="nav-item d-none d-lg-block">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user-circle me-2 text-success fs-5"></i>
                            <span class="text-dark fw-medium">{{ Auth::user()->name }}</span>
                        </div>
                    </li>
                    @endauth

                    <li class="nav-item">
                        <a href="{{ route('orders.index') }}" class="btn btn-success position-relative p-2">
                            <i class="fas fa-shopping-cart fs-5"></i>
                            <span class="badge bg-danger rounded-pill position-absolute top-0 start-100 translate-middle">
                                {{ $cartCount ?? 0 }}
                            </span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger px-4">
                                <i class="fas fa-sign-out-alt me-2"></i>Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
