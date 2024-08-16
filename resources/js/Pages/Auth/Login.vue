<template>
    <Head title="Login Page" />

    <main class="min-h-screen grid place-items-center">
        <section class="bg-white p-8 border rounded-xl w-1/3 mx-auto">
            <h1 class="text-3xl">Login</h1>
            <form
                @submit.prevent="submit"
                class="mx-auto mt-7 max-w-xl "
            >

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
                    <p
                        :v-if="form?.errors?.email"
                        class="text-xs text-red-600 mb-2 mt-1"
                    >
                        {{ form?.errors?.email }}
                    </p>
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
                    <p
                        :v-if="form?.errors?.password"
                        class="text-xs text-red-600 mb-2 mt-1"
                    >
                        {{ form?.errors?.password }}
                    </p>
                </div>

                <div class="mt-10">
                    <button
                        type="submit"
                        class="block w-full rounded-md bg-indigo-600 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        :disabled="form.processing"
                    >
                        Create
                    </button>
                </div>
            </form>
        </section>
    </main>
</template>

<script>
export default {
    layout: null,
};
</script>

<script setup>
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    email: "",
    password: "",
});
</script>
