<template>
    <layout>
        <div class="mt-8">
            <div class="flex justify-between">
                <h2 class="text-3xl text-gray-700 font-bold">Classes</h2>
                <div>
                    <form class="flex items-end" @submit.prevent="submit">
                        <div class="mr-2">
                            <base-input name="name" v-model="form.name" :error="$page.errors.name" placeholder="class name" required></base-input>
                        </div>
                        <div>
                            <base-button primary>Create Class</base-button>
                        </div>
                    </form>
                </div>
            </div>
            <h1 class="font-medium text-gray-500 text-xs">
                <span class="font-semibold text-red-400">Hint</span> double click on name to modify
            </h1>
            <div class="mt-4">
                <div class="flex flex-col">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6">
                        <div
                            class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            <table class="min-w-full">
                                <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        #ID
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Name
                                    </th>

                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                <tr class="border-b border-gray-200" v-for="classe in classes.data" :key="classe.id">
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        {{ classe.id }}
                                    </td>

                                    <td  class="px-6 py-4 whitespace-no-wrap">
                                        <Edit :classe="classe" />
                                    </td>

                                    <td class="flex px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <!-- <svg @click="showInput(category)" class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg> -->
                                        <button @click="Delete(classe)" class="focus:outline-none outline-none">
                                            <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    <Pagination :links="classes.links"></Pagination>

        </div>

    </layout>
</template>

<script>
import Layout from '../../../Shared/Layout'
import Pagination from'../../../Shared/Pagination';

import Edit from '../classes/Edit'
    export default {
        components: {Layout,Edit,Pagination},
        props:['classes'],
        data() {
            return {
                // show:0,
                form: {
                    name: '',
                },
            }
        },
        methods: {
            submit() {
                this.$inertia.post('/dashboard/classes', this.form);

                this.form = '';
            },
            Delete(classe){
                     this.$inertia.delete(`/dashboard/classes/${classe.id}`);
            },
            // showInput(category){
            //     this.show = category.id
            // }
        }
    }
</script>