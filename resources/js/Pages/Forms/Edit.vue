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
                                                <inertia-link :key="index" v-for="(question, index) in $page['props']['questions']" :href="route('form.question.edit', {
                                                            form:  $page['props']['form'],
                                                            question: question
                                                        })">
                                                    <a v-if="route().current('form.question.edit', {
                                                        form:  $page['props']['form'],
                                                        question: question
                                                    })" href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-base leading-5 font-medium h-15 truncate" aria-current="page">

<!--                                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                                        </svg>-->
                                                        {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                                    </a>
                                                    <a v-else href="#" class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-2 text-base leading-5 font-medium h-15 truncate">

<!--                                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                                        </svg>-->
                                                        {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                                    </a>
                                                </inertia-link>


                                                <!--ADD QUESTION-->
                                                <div class="relative">

                                                    <button @click="showingQuestionTypeDropdown=!showingQuestionTypeDropdown"
                                                            type="button"
                                                            class="ml-4 sm:ml-0 mt-8 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ">
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
                                                        <span class="flex items-center">
                                                            <span class="text-base font-medium text-gray-900">
                                                                Add Question
                                                            </span>
                                                        </span>
                                                                    <span class="mt-1 block text-sm text-gray-500">
                                                            There are four different types of questions. Pick the one best suited for your need.
                                                        </span>
                                                                </div>
                                                                <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                                                                    <form @submit.prevent="addText.post('/form/add_text')">
                                                                        <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                                            <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
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
                                                                            <!--                                </a>-->
                                                                        </button>
                                                                    </form>

                                                                    <!--EMAIL-->
                                                                    <form @submit.prevent="addText.post('/form/add_email')">
                                                                        <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
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
                                                                        </button>
                                                                    </form>

                                                                    <!--PHONE-->
                                                                    <form @submit.prevent="addText.post('/form/add_phone')">
                                                                        <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
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
                                                                        </button>
                                                                    </form>

                                                                    <!--MC-->
                                                                    <form @submit.prevent="addText.post('/form/add_multiple_choice')">
                                                                        <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
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
                                                                        </button>
                                                                    </form>

                                                                    <!--SECTION BREAK-->
                                                                    <form @submit.prevent="addText.post('/form/add_section_break')">
                                                                        <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                                            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                                <!-- BREAK ICON -->
                                                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                                                                </svg>
                                                                            </div>
                                                                            <div class="ml-4">
                                                                                <p class="text-base font-medium text-gray-900">
                                                                                    Section Break
                                                                                </p>
                                                                                <p class="mt-1 text-sm text-gray-500">
                                                                                    Add a message in the middle of the form to keep things from feeling monotonous.
                                                                                </p>
                                                                            </div>
                                                                        </button>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </transition>
                                                </div>
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
                                    <inertia-link v-for="(question, index) in $page['props']['questions']" :key="index" :href="route('form.question.edit', {
                                            form:  $page['props']['form'],
                                            question: question
                                        })">
                                        <a v-if="route().current('form.question.edit', {
                                            form:  $page['props']['form'],
                                            question: question
                                        })" href="#" class="bg-gray-200 text-gray-900 group flex items-center py-4 text-sm font-medium h-15 truncate">

                                            <div class="px-3">
<!--                                            <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                            </svg>-->
                                                {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                            </div>
                                        </a>
                                        <a v-else href="#" class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center py-4 text-sm font-medium h-15 truncate">

                                            <div class="px-3">
<!--                                            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
<!--                                            </svg>-->
                                                {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                            </div>
                                        </a>
                                    </inertia-link>

                                    <!--ADD QUESTION-->
                                    <div class="relative">

                                        <button @click="showingQuestionTypeDropdown=!showingQuestionTypeDropdown"
                                                type="button"
                                                class="ml-4 sm:ml-0 mt-8 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 ">
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
                                                        <span class="flex items-center">
                                                            <span class="text-base font-medium text-gray-900">
                                                                Add Question
                                                            </span>
                                                        </span>
                                                        <span class="mt-1 block text-sm text-gray-500">
                                                            There are four different types of questions. Pick the one best suited for your need.
                                                        </span>
                                                    </div>
                                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                                                        <form @submit.prevent="addText.post('/form/add_text')">
                                                            <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                                <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
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
                                                                <!--                                </a>-->
                                                            </button>
                                                        </form>

                                                        <!--EMAIL-->
                                                        <form @submit.prevent="addText.post('/form/add_email')">
                                                            <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
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
                                                            </button>
                                                        </form>

                                                        <!--PHONE-->
                                                        <form @submit.prevent="addText.post('/form/add_phone')">
                                                            <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
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
                                                            </button>
                                                        </form>

                                                        <!--MC-->
                                                        <form @submit.prevent="addText.post('/form/add_multiple_choice')">
                                                            <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
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
                                                            </button>
                                                        </form>

                                                        <!--SECTION BREAK-->
                                                        <form @submit.prevent="addText.post('/form/add_section_break')">
                                                            <button type="submit" class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                    <!-- BREAK ICON -->
                                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
                                                                    </svg>
                                                                </div>
                                                                <div class="ml-4">
                                                                    <p class="text-base font-medium text-gray-900">
                                                                        Section Break
                                                                    </p>
                                                                    <p class="mt-1 text-sm text-gray-500">
                                                                        Add a message in the middle of the form to keep things from feeling monotonous.
                                                                    </p>
                                                                </div>
                                                            </button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </transition>
                                    </div>
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
