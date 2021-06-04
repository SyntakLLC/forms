<template>
    <app-layout :forms="$page['props']['forms']">

        <div class="">
            <div class=" border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="flex-1 min-w-0">
                    <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                        {{ $page['props']['lead']['first'] + " " + $page['props']['lead']['last'] }}
                    </h1>
                </div>

                <span v-if="$page['props']['lead']['email']" class="mt-1 mr-4 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800 flex-row">
                        {{ $page['props']['lead']['email'] }}
                    </span>
                <span v-if="$page['props']['lead']['phonenum']" class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800 flex-row">
                        {{ $page['props']['lead']['phonenum'] }}
                    </span>

                <div class="mt-4 flex sm:mt-0 sm:ml-4">
                    <download-csv
                        :data="this.convertToCsv()"
                        name="lead.csv">
                        <button type="button"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:order-1 sm:ml-3">
                            Download
                        </button>
                    </download-csv>
                </div>
            </div>

            <div class="mb-10 px-4 sm:px-0 max-w-7xl mx-auto sm:px-6 lg:px-8">
                <ul>
                    <li v-for="response in $page['props']['responses']" class="group">
                        <div class="border-t border-gray-200">
                            <dl class="sm:divide-y sm:divide-gray-200">
                                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ response.question }}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ response.response }}
                                </dd>
                            </div>
                            </dl>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Show.vue",

    components: {AppLayout},

    props: ['lead', 'responses'],

    methods: {
        convertToCsv() {
            return this.responses.map((response, index) => {
                return {
                    'question': response.question,
                    'answer': response.response,
                }
            })
        }
    }
}
</script>

<style scoped>

</style>
