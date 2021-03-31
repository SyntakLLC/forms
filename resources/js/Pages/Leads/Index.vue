<template>
    <app-layout :forms="$page['props']['forms']">
        <div class="h-screen flex overflow-hidden bg-white">

            <!-- Main column -->
            <div class="flex flex-col w-0 flex-1 overflow-hidden">

                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                    <!-- Page title & actions (used to have border-b ) -->
                    <div class="border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                        <div class="flex-1 min-w-0">
                            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                                Responses
                            </h1>
                        </div>
                        <div class="mt-4 flex sm:mt-0 sm:ml-4">
<!--                            <button type="button" class="order-1 ml-3 inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">-->
<!--                                Share-->
<!--                            </button>-->

                            <!--                                :data = "$page['props']['leads']"-->
                            <download-csv
                                :data = "this.convertToCsv()"
                                name = "leads.csv">
                                <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                                    Export as CSV
                                </button>
                            </download-csv>
                        </div>
                    </div>
                    <!-- Pinned projects -->
<!--                    <div class="px-4 mt-6 sm:px-6 lg:px-8">-->
<!--                        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Pinned Projects</h2>-->
<!--                        <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3">-->
<!--                            <li class="relative col-span-1 flex shadow-sm rounded-md">-->
<!--                                <div class="flex-shrink-0 flex items-center justify-center w-16 bg-pink-600 text-white text-sm font-medium rounded-l-md">-->
<!--                                    GA-->
<!--                                </div>-->
<!--                                <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">-->
<!--                                    <div class="flex-1 px-4 py-2 text-sm truncate">-->
<!--                                        <a href="#" class="text-gray-900 font-medium hover:text-gray-600">-->
<!--                                            GraphQL API-->
<!--                                        </a>-->
<!--                                        <p class="text-gray-500">12 Members</p>-->
<!--                                    </div>-->
<!--                                    <div class="flex-shrink-0 pr-2">-->
<!--                                        <button type="button" class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="pinned-project-options-menu-0" aria-expanded="false" aria-haspopup="true">-->
<!--                                            <span class="sr-only">Open options</span>-->
<!--                                            &lt;!&ndash; Heroicon name: solid/dots-vertical &ndash;&gt;-->
<!--                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
<!--                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />-->
<!--                                            </svg>-->
<!--                                        </button>-->


<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->

<!--                            &lt;!&ndash; More items... &ndash;&gt;-->
<!--                        </ul>-->
<!--                    </div>-->

                    <!-- Projects list (only on smallest breakpoint) -->
                    <div class="mt-10 sm:hidden">
                        <div class="px-4 sm:px-6">
                            <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Leads</h2>
                        </div>
                        <ul class="mt-3 border-t border-gray-200 divide-y divide-gray-100">
                            <li v-for="lead in $page['props']['leads'].reverse()">
                                <a href="#" class="group flex items-center justify-between px-4 py-4 hover:bg-gray-50 sm:px-6">
                                    <span class="flex items-center truncate space-x-3">
<!--                                        <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600" aria-hidden="true"></span>-->
                                        <span v-if="!lead.viewed" class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            New
                                        </span>

                                        <span class="font-medium truncate text-sm leading-6">
                                            {{ lead.first + " " + lead.last }}
                                            <span class="truncate font-normal text-gray-500">{{ lead.email == null ? lead.phone : lead.email }}</span>
                                        </span>
                                    </span>
                                    <!-- Heroicon name: solid/chevron-right -->
                                    <svg class="ml-4 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </li>

                            <!-- More items... -->
                        </ul>
                    </div>

                    <!-- Projects table (small breakpoint and up) (mt used to be 8) -->
                    <div class="hidden mt-0 sm:block">
                        <div class="align-middle inline-block min-w-full border-b border-gray-200">
                            <table class="min-w-full">
                                <thead>
                                <tr class="border-t border-gray-200">
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <span class="lg:pl-2">Name</span>
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Form Filled
                                    </th>
                                    <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Added
                                    </th>
                                    <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">


                                <!--THE LIST OF LEADS-->
                                        <tr v-for="(lead, index) in $page['props']['leads']">
<!--                                            <a :href="route('response.show', lead.uuid)">-->
                                                <td class="px-6 py-3 max-w-0 w-full whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <div class="flex items-center space-x-3 lg:pl-2">
                                                        <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full" :class="$page['props']['formsFilled'].slice().reverse()[index]['id_color']" aria-hidden="true"></div>
                                                        <inertia-link :href="route('response.show', lead.uuid)" class="truncate hover:text-gray-600 block">
                                                            <span>
                                                                {{ lead.first + " " + lead.last }}
                                                                <span class="text-gray-500 font-normal">{{ lead.email == null ? lead.phone : lead.email }}</span>
                                                                <span v-if="!lead.viewed" class="ml-4 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                                    New
                                                                </span>
                                                            </span>
                                                        </inertia-link>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-3 text-sm text-gray-500 font-medium">
                                                    <div class="flex items-center space-x-3">

                                                        <inertia-link :href="route('response.show', lead.uuid)" class="truncate hover:text-gray-600 block">
                                                            <span>
                                                                {{ $page['props']['formsFilled'].slice().reverse()[index]['title'] }}
                                                            </span>
                                                        </inertia-link>
                                                    </div>
                                                </td>
                                                <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right">
                                                    {{ new Date(Date.parse(lead.created_at)) | dateFormat('MMMM DD, YYYY') }}
                                                </td>
<!--                                            </a>-->
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import VueFilterDateFormat from '@vuejs-community/vue-filter-date-format';

export default {
    components: {
        AppLayout,
        VueFilterDateFormat
    },

    props: ['leads', 'formsFilled', 'responses'],

    name: "Index.vue",

    methods: {
        convertToCsv() {
            return this.leads.map((lead, index) => {
                // this.responses[index].forEach((response, index) => {
                //     return {
                //         'question': response.question,
                //         'answer': response.answer,
                //     }
                // })
                return {
                    'name': lead.first,
                    'email': lead.email,
                    'phone': lead.phone,
                    'form filled': this.formsFilled[index].title,
                    // 'responses': this.responses[index].map((response, index) => {
                    //     return {
                    //         'question': response.question,
                    //         // 'answer': response.answer,
                    //     }
                    // }),
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
