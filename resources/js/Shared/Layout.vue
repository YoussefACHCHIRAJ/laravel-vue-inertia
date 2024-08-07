<template>
    <header class="bg-sky-800 px-8 py-1 flex items-center justify-between">
        <div class="flex items-center">
            <h1 class="text-2xl font-bold">My App</h1>
            <p class="text-sm ml-4">Welcome back, {{ $page.props.auth.user.username }}!</p>
        </div>
        <Nav />
    </header>

    <section class="mt-4 max-w-5xl mx-auto"><slot /></section>
</template>

<script setup>
import Nav from "./Nav.vue";
</script>
