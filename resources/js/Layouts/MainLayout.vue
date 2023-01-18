<template>
    <div class="w-full h-full bg-gray-100 mx-auto">
        <navigation></navigation>
        <slot/>
    </div>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3";
import Navigation from "@/Components/Navigation.vue";

export default {
    name: "MainLayout",

    components: {
        Link,
        Navigation
    }
}
</script>

<style scoped>

</style>
