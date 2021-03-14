<template>
    <app-layout>

        <div class="px-4 sm:px-0 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex-row">
                <h3 class="text-lg leading-6 font-medium text-gray-900 flex-row justify-between">
                    {{ $page['props']['lead']['first'] + " " + $page['props']['lead']['last'] }}
                </h3>
<!--                <p class="mt-1 max-w-2xl text-sm text-gray-500">-->
<!--                    Personal details and application.-->
<!--                </p>-->
                <span v-if="$page['props']['lead']['email']" class="mt-1 mr-4 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800 flex-row">
                        {{ $page['props']['lead']['email'] }}
                    </span>
                <span v-if="$page['props']['lead']['phone']" class="mt-1 inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800 flex-row">
                        {{ $page['props']['lead']['phone'] }}
                    </span>
            </div>
            <div class="mt-5 border-t border-gray-200">
                <dl class="sm:divide-y sm:divide-gray-200">

                    <ul>
                        <li v-for="response in $page['props']['responses']" class="group">
                            <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ response.question }}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ response.response }}
                                </dd>
                            </div>
                        </li>
                    </ul>

                </dl>
            </div>
        </div>

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Show.vue",

    components: {AppLayout},

    props: ['lead'],
}
</script>

<style scoped>

</style>
