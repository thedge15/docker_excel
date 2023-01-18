<template>
    <div>
        <div v-if="metals" class="overflow-x-auto">
            <div
                class="bg-gray-100 flex items-center justify-center bg-gray-100 font-sans overflow-auto">
                <div class="w-full">
                    <div class="bg-white shadow-md rounded my-6">
                        <table class="min-w-max w-full table-auto">
                            <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-center">Id</th>
                                <th class="py-3 px-6 text-center">Наименование проекта</th>
                                <th class="py-3 px-6 text-center">Наименование и техническая характеристика</th>
                                <th class="py-3 px-6 text-center">Единица измерения</th>
                                <th class="py-3 px-6 text-center">Количество</th>
                                <th class="py-3 px-6 text-center">АКЗ</th>
                                <th class="py-3 px-6 text-center">Количество краски, кг</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            <tr v-for="metal in metals.data"
                                class="border-b border-gray-200 bg-gray-50 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">
                                    <div class="text-center">
                                        <span class="font-medium">{{ metal.id }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="text-center">
                                        <span>{{ metal.project.title }}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ metal.title }}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ metal.measure_unit_project }}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ metal.quantity_project }}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        {{ metal.type_of_paint }}
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="text-center">
                                        <span class="font-medium">{{ metal.amount_of_paint }}</span>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <pagination :meta="metals.meta"></pagination>
            </div>
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
        'metals'
    ]
}
</script>

<style scoped>

</style>
