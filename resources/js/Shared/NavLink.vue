<template>
    <Link
        class="hover:underline hover:text-white transition-all duration-300 ease-in-out"
        :class="{
            'font-bold text-white': active,
        }"
    >
        <slot />
    </Link>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    active: Boolean,
});
</script>
