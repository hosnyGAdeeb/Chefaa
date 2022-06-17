<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Chefaa</span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item">
                        <Link href="/"
                              class="nav-link "
                              :class="{ 'active': $page.url === '/' }"
                        >
                            Home
                        </Link>
                    </li>


                    <li class="nav-item">
                        <Link href="/products"
                              class="nav-link"
                              :class="{ 'active': $page.url.startsWith('/products') }"
                        >
                            Products
                        </Link>
                    </li>


                    <li class="nav-item">
                        <Link href="/pharmacies"
                              class="nav-link"
                              :class="{ 'active': $page.url.startsWith('/pharmacies') }"
                        >
                            Pharmacies
                        </Link>
                    </li>

                    <li class="nav-item">
                        <Link href="/search"
                              class="nav-link"
                              :class="{ 'active': $page.url.startsWith('/search') }"
                        >
                            Search
                        </Link>
                    </li>


                </ul>


            </div>
        </div>
    </nav>
</template>
<script setup>
</script>
