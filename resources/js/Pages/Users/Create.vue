<template>
    <Head title="Create User" />

    <h1 class="text-3xl">Create User</h1>

    <form @submit.prevent="submit" class="mx-auto mt-16 max-w-xl sm:mt-20">
        <div>
            <label
                for="name"
                class="block text-sm font-semibold leading-6 text-gray-900"
                >Name</label
            >
            <input
                v-model="form.name"
                type="text"
                name="name"
                id="name"
                autocomplete="given-name"
                class="block mt-2.5 w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
        </div>

        <div>
            <label
                for="email"
                class="block text-sm font-semibold leading-6 text-gray-900"
                >Email</label
            >
            <input
                v-model="form.email"
                type="email"
                name="email"
                id="email"
                class="block mt-2.5 w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
        </div>

        <div>
            <label
                for="password"
                class="block text-sm font-semibold leading-6 text-gray-900"
                >Password</label
            >
            <input
                v-model="form.password"
                type="password"
                name="password"
                id="password"
                class="block mt-2.5 w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
            />
        </div>

        <div class="mt-10">
            <button
                type="submit"
                class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
            >
                Create
            </button>
        </div>
    </form>
</template>

<script setup>
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    name: "",
    email: "",
    password: "",
});

const submit = () => router.post('/users', form)
</script>
