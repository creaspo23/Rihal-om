<template>
    <layout>

        <div class="mt-8">
            <div class="flex justify-between">
                <h2 class="text-3xl text-gray-700 font-bold">
                    Students
                </h2>
                <div>
                    <inertia-link href="/dashboard/students/create"
                                  class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded">
                        Create Student
                    </inertia-link>
                </div>
            </div>
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
                                        Name
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Date Of Birth
                                    </th>

                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Class Name
                                    </th>

                                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                                        style="text-align: start">
                                        Country Name
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white text-gray-700">
                                <tr v-for="student in students.data" :key="student.index">
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ student.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ student.date_of_birth }}
                                    </td>
                                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ student.classe.name }}
                                    </td>
                                     <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        {{ student.country.name }}
                                    </td>


                                    <td class="flex px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 font-medium">
                                        <inertia-link :href="`/dashboard/students/${student.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </inertia-link>
                                        <button @click="Delete(student)" class="focus:outline-none outline-none">
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
    <pagination :links="students.links"></pagination>

        </div>

    </layout>
</template>

<script>
    import Layout from "../../../Shared/Layout";
   import Pagination from'../../../Shared/Pagination';


    export default {
        components: {Layout,Pagination},
        props: ['students'],
        methods: {
            Delete(student){
                     this.$inertia.delete(`/dashboard/students/${student.id}`);
            }
        },
    }
</script>
