<template>
    <app-layout>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="px-4 sm:px-0 sm:flex sm:items-center sm:justify-between">
                <div class="flex-1 min-w-0">
                    <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                        {{ $page['props']['form']['title'] }}
                    </h1>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">
                        We've provided some example questions. Feel free to delete them if you wish.
                    </p>
                </div>
                <div class="mt-4 flex sm:mt-0 sm:ml-4">

                    <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                        Save
                    </button>
                </div>
            </div>
            <div class="px-4 sm:px-0 mt-5 border-t border-b border-gray-200">
                <dl class="sm:divide-y sm:divide-gray-200">

                    <div v-for="question in $page['props']['questions']"
                         class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4">
                        <dt class="text-sm font-medium text-gray-500">
                            {{ question.type }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ question.title }}
                        </dd>
                    </div>
                </dl>
            </div>

            <div class="relative">

                <button @click="showingQuestionTypeDropdown=!showingQuestionTypeDropdown"
                    type="button" class="ml-4 sm:ml-0 mt-8 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ">
                    + Add Question

                    <svg class="text-white ml-2 h-5 w-5 group-hover:text-gray-200 transition ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>

                <transition
                    enter-active-class="transition ease-out duration-200"
                    enter-from-class="opacity-0 translate-y-1"
                    enter-class="opacity-100 translate-y-0"
                    leave-active-class="transition ease-in duration-150"
                    leave-class="opacity-100 translate-y-0"
                    leave-to-class="opacity-0 translate-y-1">
                    <div v-if="showingQuestionTypeDropdown" class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-md sm:px-0 lg:max-w-3xl">
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">

                            <div class="p-5 bg-gray-50 sm:p-8">
                                <a href="#" class="-m-3 p-3 flow-root rounded-md hover:bg-gray-100 transition ease-in-out duration-150">
                                    <span class="flex items-center">
                                        <span class="text-base font-medium text-gray-900">
                                            Add Question
                                        </span>
<!--                                        <span class="ml-3 inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium leading-5 bg-indigo-100 text-indigo-800">-->
<!--                                            New-->
<!--                                        </span>-->
                                    </span>
                                    <span class="mt-1 block text-sm text-gray-500">
                                        There are four different types of questions. Pick the one best suited for your need.
                                    </span>
                                </a>
                            </div>
                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                    <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                        <!-- TEXT ICON -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Text
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Sufficient for most uses, this question allows for plain text input from the lead.
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                    <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                        <!-- EMAIL ICON -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Email
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            The most common way to communicate with a lead.
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                    <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                        <!-- PHONE ICON -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Phone Number
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            Useful if you want to contact the lead via phone number.
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                    <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                        <!-- MC ICON -->
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            Multiple Choice
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            If you want the lead to choose from a few options.
                                        </p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </transition>
            </div>

        </div>

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Edit.vue",
    components: {
        AppLayout
    },

    data() {
        return {
            showingQuestionTypeDropdown: false,
        }
    },
}
</script>

<style scoped>

</style>
