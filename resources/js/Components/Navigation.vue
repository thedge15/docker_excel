<template>
    <div class="flex">
        <div class="mb-4 mx-auto w-96 ">
            <nav class="bg-gray-800 ">
                <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <Link :class="['px-3 py-2 rounded-md text-sm font-medium', $page.component === 'Dashboard' ?
                                'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
                              :href="route('dashboard')">
                            Main
                        </Link>
                        <Link :class="['px-3 py-2 rounded-md text-sm font-medium', $page.component === 'Metal/Index' ?
                                'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
                              :href="route('metal.index')">
                            Metal
                        </Link>
                        <Link :class="['px-3 py-2 rounded-md text-sm font-medium', $page.component === 'Metal/Import' ?
                                'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
                              :href="route('metal.import')">
                            Import
                        </Link>
                        <Link :class="['px-3 py-2 rounded-md text-sm font-medium', $page.component === 'Task/Index' ?
                                'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']"
                              :href="route('task.index')">
                            Tasks
                        </Link>
                    </div>
                </div>
<!--                &lt;!&ndash; Mobile menu, show/hide based on menu state. &ndash;&gt;-->
<!--                <div class="sm:hidden" id="mobile-menu">-->
<!--                    <div class="space-y-1 px-2 pt-2 pb-3">-->
<!--                        &lt;!&ndash; Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" &ndash;&gt;-->
<!--                        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"-->
<!--                           aria-current="page">Dashboard</a>-->

<!--                        <a href="#"-->
<!--                           class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>-->

<!--                        <a href="#"-->
<!--                           class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>-->

<!--                        <a href="#"-->
<!--                           class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>-->
<!--                    </div>-->
<!--                </div>-->
            </nav>
        </div>
        <div class="hidden sm:flex sm:items-center sm:ml-6">
            <!-- Settings Dropdown -->
            <div class="ml-3 pr-4 relative">
                <Dropdown align="right" width="48">
                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                    </template>

                    <template #content>
                        <DropdownLink :href="route('profile.edit')"> Profile</DropdownLink>
                        <DropdownLink :href="route('logout')" method="post" as="button">
                            Log Out
                        </DropdownLink>
                    </template>
                </Dropdown>
            </div>
        </div>
    </div>
</template>

<script>

import {Link} from "@inertiajs/inertia-vue3";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

export default {
    name: "Navigation",

    components: {
        Link,
        Dropdown,
        DropdownLink
    }
}
</script>

<style scoped>

</style>
