<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark">
            <router-link class="navbar-brand" to="/">Modelarium Hello World</router-link>
            <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/post">Posts List</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/post/table">Posts Table</router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/Corollarium/modelarium">Modelarium</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://corollarium.com">Corollarium</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div>
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
export default {};
</script>

<style></style>
