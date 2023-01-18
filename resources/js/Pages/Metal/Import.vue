<template>
    <div >
        <div class="flex justify-center mr-28">
<!--            <div class="mr-4">-->
<!--                <input v-model="type" type="number" class="w-16 h-10 rounded-xl bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200" min="1" max="2">-->
<!--            </div>-->
            <form>
                <input @change="setExcel" type="file" ref="file" class="hidden">
                <button @click.prevent="selectExcel" type="button" class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 hover:bg-gradient-to-br
                focus:ring-4 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium rounded-lg text-sm
                px-5 py-2.5 text-center mr-2 mb-2">Excel
                </button>
            </form>
            <div v-if="file" class="ml-3">
                <button @click.prevent="importExcel" type="button" class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
                focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2
                mb-2">Import</button>
            </div>
        </div>
<!--        <div v-if="$page.props.flash.message" class="mt-4 mr-28 text-green-600 text-center">-->
<!--            {{ $page.props.flash.message }}-->
<!--        </div>-->
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    name: "Import",

    layout: MainLayout,

    data() {
        return {
            file: null,
            // type: 1,
        }
    },

    methods: {
        selectExcel() {
            this.$refs.file.click()
        },

        setExcel(e) {
            this.file = e.target.files[0]
        },

        importExcel() {
            const formData = new FormData
            formData.append('file', this.file)
            // formData.append('type', this.type)
            this.$inertia.post('/metals/import', formData, {
                onSuccess: () => {
                    this.file = null
                    this.$refs.file.value = null
                }
            })
        },
    },
}
</script>

<style scoped>

</style>
