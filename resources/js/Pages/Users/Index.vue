<template>
        <Head title="Users" />

    <div class="flex justify-between">
        <h2 class="px-4 py-2 font-extrabold text-3xl">Users</h2>
        <input
            type="text"
            class="border px-1 rounded-lg min-w-96"
            placeholder="search..."
            v-model="search"
        />
    </div>

    <ul class="divide-y divide-gray-100">
        <li
            class="flex justify-between gap-x-6 py-5"
            v-for="user in users.data"
            :key="user.id"
        >
            <div class="flex min-w-0 gap-x-4">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">
                        {{ user.name }}
                    </p>
                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">
                        {{ user.email }}
                    </p>
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                <button
                    class="text-indigo-600 hover:text-indigo-900 text-sm font-medium"
                >
                    Edit
                </button>
            </div>
        </li>
    </ul>

    <Pagination :links="users.links" class="my-6 text-center" />
</template>

<script setup>
import { router } from "@inertiajs/vue3";
import { ref, watch } from "vue";
import Pagination from "../../Shared/Pagination.vue";

const props = defineProps({
    users: Object,
    filters: Object,
});

const search = ref(props.filters.search),
    pageNumber = ref(1);

watch(search, (value) => {
    router.visit("users", {
        data: {
            search: value,
            page: pageNumber.value,
        },
        preserveState: true,
        preserveScroll: true,
        replace: true
    });
});
</script>
