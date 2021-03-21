<template>
    <app-layout :forms="$page['props']['forms']">
        <div>
            <jet-banner />

            <div class="h-screen flex overflow-hidden bg-white">
                <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
                <div class="lg:hidden">
                    <transition
                        enter-active-class="transition-opacity ease-linear duration-300"
                        enter-class="opacity-0"
                        enter-to-class="opacity-100"
                        leave-active-class="transition-opacity ease-linear duration-300"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0">
                        <div v-show="showingQuestionsDropdown" class="fixed inset-0 flex z-40">

                            <transition
                                enter-active-class="transition-opacity ease-linear duration-300"
                                enter-class="opacity-0"
                                enter-to-class="opacity-100"
                                leave-active-class="transition-opacity ease-linear duration-300"
                                leave-class="opacity-100"
                                leave-to-class="opacity-0">
                                <div v-show="showingQuestionsDropdown" class="fixed inset-0" aria-hidden="true">
                                    <div class="absolute inset-0 bg-gray-600 opacity-75"></div>
                                </div>
                            </transition>

                            <transition
                                enter-active-class="transition ease-in-out duration-300 transform"
                                enter-class="-translate-x-full"
                                enter-to-class="translate-x-0"
                                leave-active-class="transition ease-in-out duration-300 transform"
                                leave-class="translate-x-0"
                                leave-to-class="-translate-x-full">
                                <div v-show="showingQuestionsDropdown" class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                                    <div class="absolute top-0 right-0 -mr-12 pt-2">
                                        <button @click="showingQuestionsDropdown=!showingQuestionsDropdown"
                                                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                            <span class="sr-only">Close sidebar</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="flex-shrink-0 flex items-center px-4">
                                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                                            {{ $page['props']['form']['title'] }}
                                        </h1>
                                    </div>
                                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                                        <nav class="px-2">
                                            <div class="space-y-1">

                                                <!--HOME-->
                                                <inertia-link v-for="question in $page['props']['questions']" :href="route('form.question.edit', {
                                                            form:  $page['props']['form'],
                                                            question: question
                                                        })">
                                                    <a v-if="route().current('form.question.edit', {
                                                        form:  $page['props']['form'],
                                                        question: question
                                                    })" href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md" aria-current="page">

<!--                                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                                        </svg>-->
                                                        {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                                    </a>
                                                    <a v-else href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium rounded-md">

<!--                                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                                        </svg>-->
                                                        {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                                    </a>
                                                </inertia-link>

                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </transition>
                            <div class="flex-shrink-0 w-14" aria-hidden="true">
                                <!-- Dummy element to force sidebar to shrink to fit close icon -->
                            </div>
                        </div>
                    </transition>
                </div>

                <!-- Static sidebar for desktop -->
                <div class="hidden lg:flex lg:flex-shrink-0">
                    <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-white">
                        <div class="flex items-center flex-shrink-0 px-6 border-b border-gray-200">
                            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate pb-4">
                                {{ $page['props']['form']['title'] }}
                            </h1>
                        </div>
                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="h-0 flex-1 flex flex-col overflow-y-auto">

                            <!-- Navigation -->
                            <nav class="mt-6">
                                <div class="space-y-1">
                                    <!-- HOMEPAGE -->
                                    <inertia-link v-for="question in $page['props']['questions']" :href="route('form.question.edit', {
                                            form:  $page['props']['form'],
                                            question: question
                                        })">
                                        <a v-if="route().current('form.question.edit', {
                                            form:  $page['props']['form'],
                                            question: question
                                        })" href="#" class="bg-gray-200 text-gray-900 group flex items-center py-4 text-sm font-medium min-h-40">

                                            <div class="px-3">
<!--                                            <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                            </svg>-->
                                                {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                            </div>
                                        </a>
                                        <a v-else href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center py-4 text-sm font-medium min-h-40">

                                            <div class="px-3">
<!--                                            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                            </svg>-->
                                                {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                            </div>
                                        </a>
                                    </inertia-link>


                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Main column -->
                <div class="flex flex-col w-0 flex-1 overflow-hidden">
                    <!-- Search header -->
                    <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                        <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                        <button @click="showingQuestionsDropdown=!showingQuestionsDropdown"
                                class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                            <span class="sr-only">Open sidebar</span>
                            <!-- Heroicon name: outline/menu-alt-1 -->
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                            </svg>
                        </button>
                    </div>
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                        <!-- Page title & actions -->
                        <div>
                            <slot />
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Button from "@/Jetstream/Button";
import JetBanner from '@/Jetstream/Banner'

export default {
    name: "Edit.vue",
    components: {
        Button,
        AppLayout,
        JetBanner
    },

    props: ['form', 'questions'],

    data() {
        return {
            showingQuestionTypeDropdown: false,
            showingNavigationDropdown: false,
            showingQuestionsDropdown: false,
            deletedUUID: 0,
            question_id: 0,
            optionIndex: 0,
            sortedQuestions: 'this.questions',

            addText: this.$inertia.form({
                form: this.form[0],
                form_id: this.form.id,
                form_uuid: this.form.uuid,
                questions: this.questions,
                index: this.questions.length,
            }),
            deleteQuestion: this.$inertia.form({
                form_uuid: this.form.uuid,
                deletedUUID: this.deletedUUID,
            }),
            addOption: this.$inertia.form({
                form_uuid: this.form.uuid,
                question_id: this.question_id,
                index: this.optionIndex,
            }),
        }
    },

    methods: {
        convertToLetter(number) {
            let alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

            if (number > alphabet.length) {
                return "A";
            } else {
                return alphabet[number];
            }
        }
    }
}
</script>

<style scoped>

</style>
