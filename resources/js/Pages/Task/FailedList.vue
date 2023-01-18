<template>
    <div >
        <Link class="ml-32 border border-gray-300 px-4 bg-amber-300 rounded-xl" :href="route('task.index')">Back</Link>
    </div>
    <div v-if="failedList" class="overflow-x-auto">
        <div
            class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-hidden">
            <div class="w-full lg:w-5/6">
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-max w-full table-auto">
                        <thead>
                        <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-6 text-center">Id</th>
                            <th class="py-3 px-6 text-center">Row</th>
                            <th class="py-3 px-6 text-center">Key</th>
                            <th class="py-3 px-6 text-center">Message</th>
                            <th class="py-3 px-6 text-center">Task id</th>
                            <th class="py-3 px-6 text-center">Created</th>
                        </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                        <tr v-for="fail in failedList.data"
                            class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <div class="text-center">
                                    <span class="font-medium">{{ fail.id }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6">
                                <div class="text-center">
                                    <span>{{ fail.row }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    {{ fail.key }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    {{ fail.message }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    {{ fail.task_id }}
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center justify-center">
                                    {{ fail.created_at }}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <Pagination :meta="failedList.meta"></Pagination>
        </div>
    </div>
</template>

<script>

import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/inertia-vue3";
import Pagination from "@/Components/Pagination.vue";

export default {
    name: "Index",

    layout: MainLayout,

    components: {
        Link,
        Pagination
    },

    props: [
        'failedList',
    ],


}
</script>

<style scoped>

</style>
