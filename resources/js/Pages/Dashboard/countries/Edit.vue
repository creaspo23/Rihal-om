<template>
    <form @submit.prevent="submit">
        <h3 v-if="!edit" @dblclick="edit = true">{{ country.name }}</h3>

        <div class="flex items-center space-x-2" v-if="edit">
            <input type="text" v-model="form.name" class="px-4 py-2 block rounded bg-white text-gray-800 border border-gray-300 focus:border-blue-500 focus:outline-none focus:shadow-outline">
                
            <button @click="update" class="flex items-center py-2 px-4 capitalize tracking-wide bg-gray-800 text-white font-medium rounded hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Edit</button>
        </div>
    </form>
</template>

<script>
    export default {
        props:[
            'country'
        ],
        data() {
            return {
                form: { 
                    name: this.country.name,
                },
                edit: false
            }
        },

        methods: {
            update() {
                this.$inertia.put(this.$route('countries.update', this.country.id), this.form);

                this.edit = false;
            },
        },
    }
</script>