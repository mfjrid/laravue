<template>
    <div class="pt-4">
        <nav class="navbar navbar-expand-lg bg-transparent navbar-dark">
            <div class="container">
                <router-link class="navbar-brand" to="/">Navbar</router-link>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/create">New Request</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/progress">Progress</router-link>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <div class="me-2">
                            <router-link class="nav-link" to="/login">Login</router-link>
                        </div>
                        <div class="me-2">
                            <router-link class="nav-link" to="/register">Register</router-link>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <router-view>

    </router-view>
</template>

<script>
    export default {
        name: 'MainLayout'
    }
</script>

<style scoped></style>