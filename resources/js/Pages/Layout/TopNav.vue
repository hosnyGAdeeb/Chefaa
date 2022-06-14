<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container-fluid">
           <span class="navbar-brand mb-0 h1">Chefaa</span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Products</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="#">Pharmacies</a>
                    </li>


                </ul>

                <NavSearch />

            </div>
        </div>
    </nav>
</template>
<script setup>
import NavSearch from "./NavSearch";
</script>
