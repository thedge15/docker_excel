<template>
    <div v-if="meta.links.length > 1"
         class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
        <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <div>
                <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a href="#" aria-current="page"
                       class="relative z-10 inline-flex items-center border border-indigo-500 bg-indigo-50 px-4 py-2 text-sm font-medium text-indigo-600 focus:z-20">1</a>
                    <template v-for="link in meta.links" >
                        <Link v-if="link.url" :href="link.url"
                              class="relative inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-500 hover:bg-gray-50 focus:z-20"
                              v-html="link.label"></Link>
                    </template>
                    <!-- Heroicon name: mini/chevron-right -->
                </nav>
            </div>
        </div>
    </div>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3";

export default {
    name: "Pagination",

    components: {
        Link
    },

    props: [
        'meta',
    ],
}
</script>

<style scoped>

</style>
