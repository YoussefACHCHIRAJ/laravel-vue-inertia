<template>
    <div>
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            :key="link.url"
            class="px-1"
            :class="{'text-gray-500': !link.url, 'font-bold': link.active}"
        ></Component>
    </div>
</template>

<script>
export default {
    props: {
        links: Array,
    },
};
</script>
