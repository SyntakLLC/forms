<template>
    <app-layout :forms="$page['props']['forms']">
        <div tabindex="0"
             @keydown.esc="showingQuestionTypeDropdown=false; showingQuestionsDropdown=false; showingDeleteModal=false">
            <div class="flex items-center flex-shrink-0 border-b border-gray-200">
                <!-- Search header -->
                <div class="relative z-0 flex-shrink-0 flex h-16 bg-white lg:hidden">
                    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
                    <button @click="showingQuestionsDropdown=!showingQuestionsDropdown"
                            class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 lg:hidden">
                        <!-- Heroicon name: outline/menu-alt-1 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>
                </div>

                <div class="relative min-w-0 py-2 px-6">
                    <h1 contenteditable @input="updateTitle" placeholder="Untitled Form"
                        class="pt-4 text-lg font-medium leading-6 text-gray-900 truncate pb-4 pr-10">
                        {{ $page['props']['form']['title'] }}

                        <!--Edit pen icon-->
                        <span class="absolute inset-y-0 right-10 pl-3 flex items-center pointer-events-none text-gray-400">
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path
                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                            </svg>
                        </span>
                    </h1>
                </div>

                <div class="flex-1 "/>

                <!--the two header buttons-->
                <div class="flex sm:ml-4 px-6">
                    <button @click="showingDeleteModal=!showingDeleteModal"
                            type="button"
                            class="truncate inline-flex items-center px-4 py-2 border border-red-500 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Delete Form
                    </button>

                    <inertia-link :href="route('form.show', form.uuid)"
                                  class="truncate hover:text-gray-600 block h-full">
                        <button type="button"
                                class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:order-1 ml-3">
                            Preview
                        </button>
                    </inertia-link>
                </div>

                <!--the delete modal-->
                <transition
                    enter-active-class="transition ease-out duration-300"
                    enter-class="opacity-0"
                    enter-to-class="opacity-100"
                    leave-active-class="transition ease-in duration-200"
                    leave-class="opacity-100"
                    leave-to-class="opacity-0">
                    <div class="fixed z-10 inset-0 overflow-y-auto " v-show="showingDeleteModal">
                        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                            <!-- The gray background -->
                            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>

                            <!-- This element is to trick the browser into centering the modal contents. -->
                            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                  aria-hidden="true">&#8203;</span>

                            <transition
                                enter-active-class="transition ease-out duration-300"
                                enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                                leave-active-class="transition ease-in duration-200"
                                leave-class="opacity-100 translate-y-0 sm:scale-100"
                                leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                <!--
                                  Modal panel, show/hide based on modal state.
                                  Entering: "ease-out duration-300"
                                    From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                    To: "opacity-100 translate-y-0 sm:scale-100"
                                  Leaving: "ease-in duration-200"
                                    From: "opacity-100 translate-y-0 sm:scale-100"
                                    To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                -->
                                <div v-if="showingDeleteModal"
                                     class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                    <div class="sm:flex sm:items-start">
                                        <div
                                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <!-- Heroicon name: outline/exclamation -->
                                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                Delete form
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">
                                                    Are you sure you want to delete this form? Any leads generated from
                                                    this form will not be deleted. This action cannot be undone.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                        <button @click="this.deleteForm"
                                                type="button"
                                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Delete
                                        </button>
                                        <button @click="showingDeleteModal=!showingDeleteModal"
                                                type="button"
                                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                </transition>
            </div>

            <div class="h-full flex overflow-hidden bg-white">
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
                                <div v-show="showingQuestionsDropdown"
                                     class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                                    <div class="absolute top-0 right-0 -mr-12 pt-20">
                                        <button @click="showingQuestionsDropdown=!showingQuestionsDropdown"
                                                class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                                            <span class="sr-only">Close sidebar</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg"
                                                 fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                 aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M6 18L18 6M6 6l12 12"/>
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


                                                <!--ADD QUESTION-->
                                                <div class="relative">

                                                    <button @click="showingQuestionTypeDropdown=!showingQuestionTypeDropdown; showingQuestionsDropdown=!showingQuestionsDropdown"
                                                            type="button"
                                                            class="px-2 sm:ml-0 my-4 left-1/2 inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                                                        + Add Question
                                                    </button>

                                                </div>

                                                <!--QUESTIONS-->
                                                <inertia-link :key="index"
                                                              v-for="(question, index) in $page['props']['questions']"
                                                              :href="route('form.question.edit', {
                                                            form:  $page['props']['form'],
                                                            question: question
                                                        })">
                                                    <a v-if="route().current('form.question.edit', {
                                                        form:  $page['props']['form'],
                                                        question: question
                                                    })" href="#"
                                                       class="bg-gray-100 text-gray-900 group flex items-center px-2 py-3 text-base leading-5 font-medium h-15 truncate"
                                                       aria-current="page">

                                                        <!--                                                        <svg class="text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
                                                        <!--                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
                                                        <!--                                                        </svg>-->
                                                        {{
                                                            question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content
                                                        }}
                                                    </a>
                                                    <a v-else href="#"
                                                       class="text-gray-600 hover:text-gray-900 hover:bg-gray-50 group flex items-center px-2 py-3 text-base leading-5 font-medium h-15 truncate">

                                                        <!--                                                        <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
                                                        <!--                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />-->
                                                        <!--                                                        </svg>-->
                                                        {{
                                                            question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content
                                                        }}
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
                    <!--below thing used to be pt-5 and pb-4-->
                    <div class="flex flex-col w-64 border-r border-gray-200 pt-0 pb-0 bg-white">

                        <!-- Sidebar component, swap this element with another sidebar if you like -->
                        <div class="h-0 flex-1 flex flex-col overflow-y-auto">

                            <!-- Navigation, below nav before was mt-6 -->
                            <nav class="mt-0">
                                <div class="space-y-1">

                                    <!--ADD QUESTION-->
                                    <div class="w-full absolute hover:bg-gray-50 relative inline-block text-left">
                                        <div>
                                            <button @click="showingQuestionTypeDropdown=!showingQuestionTypeDropdown"
                                                    type="button"
                                                    class="inline-flex justify-center w-full border-b border-gray-300 shadow-sm px-4 py-4 bg-white text-sm font-medium text-indigo-500 hover:bg-gray-50 focus:outline-none"
                                                    id="options-menu" aria-expanded="true" aria-haspopup="true">
                                                <h3>Add Question</h3>
                                            </button>
                                        </div>


                                        <!--                                        <transition-->
                                        <!--                                            enter-active-class="transition ease-out duration-100"-->
                                        <!--                                            enter-class="transform opacity-0 scale-95"-->
                                        <!--                                            enter-to-class="transform opacity-100 scale-100"-->
                                        <!--                                            leave-active-class="transition ease-in duration-75"-->
                                        <!--                                            leave-class="transform opacity-100 scale-100"-->
                                        <!--                                            leave-to-class="transform opacity-0 scale-95">-->
                                        <!--                                            <div v-if="showingQuestionTypeDropdown" class="origin-top absolute mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">-->
                                        <!--                                                <div class="py-1" role="none">-->

                                        <!--                                                    <button @click="addText"-->
                                        <!--                                                            type="submit"-->
                                        <!--                                                            class="group flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none" role="menuitem">-->

                                        <!--                                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                                        <!--                                                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />-->
                                        <!--                                                        </svg>-->
                                        <!--                                                        Text-->
                                        <!--                                                    </button>-->


                                        <!--                                                    <button @click="addEmail"-->
                                        <!--                                                            type="submit"-->
                                        <!--                                                            class="group flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none" role="menuitem">-->

                                        <!--                                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                                        <!--                                                            <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd" />-->
                                        <!--                                                        </svg>-->
                                        <!--                                                        Email-->
                                        <!--                                                    </button>-->


                                        <!--                                                    <button @click="addPhone"-->
                                        <!--                                                            type="submit"-->
                                        <!--                                                            class="group flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none" role="menuitem">-->

                                        <!--                                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                                        <!--                                                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />-->
                                        <!--                                                        </svg>-->
                                        <!--                                                        Phone Number-->
                                        <!--                                                    </button>-->

                                        <!--                                                    <button @click="addMultipleChoice"-->
                                        <!--                                                            type="submit"-->
                                        <!--                                                            class="group flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none" role="menuitem">-->

                                        <!--                                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                                        <!--                                                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />-->
                                        <!--                                                        </svg>-->
                                        <!--                                                        Multiple Choice-->
                                        <!--                                                    </button>-->

                                        <!--                                                    <button @click="addSectionBreak"-->
                                        <!--                                                            type="submit"-->
                                        <!--                                                            class="group flex w-full items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none" role="menuitem">-->

                                        <!--                                                        <svg class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
                                        <!--                                                            <path d="M2 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H3a1 1 0 01-1-1V4zM8 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1H9a1 1 0 01-1-1V4zM15 3a1 1 0 00-1 1v12a1 1 0 001 1h2a1 1 0 001-1V4a1 1 0 00-1-1h-2z" />-->
                                        <!--                                                        </svg>-->
                                        <!--                                                        Section Break-->
                                        <!--                                                    </button>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                        <!--                                        </transition>-->
                                    </div>

                                    <!-- Questions -->
                                    <inertia-link v-for="(question, index) in questionList" :key="index" :href="route('form.question.edit', {
                                            form:  $page['props']['form'],
                                            question: question
                                        })">
                                        <a v-if="route().current('form.question.edit', {
                                            form:  $page['props']['form'],
                                            question: question
                                        })" href="#"
                                           class="bg-gray-200 text-gray-900 group flex items-center py-4 text-sm font-medium h-15 truncate">
                                            <!--both used to be px-3-->
                                            <div class="pl-3 w-5">
                                                <svg class="text-gray-500 mr-3 h-6 w-6"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" :d="returnQuestionSvg(question.type)"/>
                                                </svg>
                                            </div>
                                            <div class="pl-6 pr-3 w-5/6 truncate">
                                                {{
                                                    question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content
                                                }}
                                            </div>


                                            <!--UP ICON-->
                                            <button v-if="index > 0" @click="moveUp(question.uuid)" v-on:click.stop
                                                    class="w-5 pr-10 text-gray-500 hover:text-gray-600 focus:outline-none">
                                                <svg class="text-gray-500 right-3 h-5 w-5"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                                </svg>
                                            </button>

                                            <!--DOWN ICON-->
                                            <button v-if="index < questionList.length - 1"
                                                    @click="moveDown(question.uuid)" v-on:click.stop
                                                    class="w-5 pr-10 text-gray-500 hover:text-gray-600 focus:outline-none">
                                                <svg class="text-gray-500 right-3 h-5 w-5"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                                                </svg>
                                            </button>

                                            <!--DELETE ICON-->
                                            <button v-if="question.type !== 'Name'"
                                                    @click="deleteQuestion(question.uuid)" v-on:click.stop
                                                    class="w-5 pr-10 text-gray-500 hover:text-gray-600 focus:outline-none">
                                                <svg class="text-gray-500 right-3 h-5 w-5"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>

                                        </a>
                                        <a v-else href="#"
                                           class="text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center py-4 text-sm font-medium h-15 truncate">
                                            <div class="pl-3 w-5">
                                                <svg class="text-gray-400 group-hover:text-gray-500 mr-3 h-6 w-6"
                                                     xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2" :d="returnQuestionSvg(question.type)"/>
                                                </svg>
                                            </div>
                                            <div class="pl-6 pr-3 w-5/6 truncate">
                                                {{ question.title == "" && question.content == "" || question.title == "" && question.content == null ? "Default: " + question.type : question.content == null ? question.title : question.title + question.content }}
                                            </div>

                                            <button v-if="question.type !== 'Name'"
                                                    @click="deleteQuestion(question.uuid)" v-on:click.stop
                                                    class="w-5 pr-10 text-gray-400 hover:text-gray-500 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                     viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </inertia-link>

                                    <!-- Decoy -->
<!--                                    <a v-if="showingDecoyQuestion" href="#" class="bg-gray-200 text-gray-900 group flex items-center py-4 text-sm font-medium h-15 truncate">-->
<!--                                        &lt;!&ndash;both used to be px-3&ndash;&gt;-->
<!--                                        <div class="pl-3 w-5">-->
<!--                                            <svg class="text-gray-500 mr-3 h-6 w-6"-->
<!--                                                 xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                                                 stroke="currentColor" aria-hidden="true">-->
<!--                                                <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                      stroke-width="2" :d="returnQuestionSvg(decoyType)"/>-->
<!--                                            </svg>-->
<!--                                        </div>-->
<!--                                        <div class="pl-6 pr-3 w-5/6 truncate">-->
<!--                                            New Question-->
<!--                                        </div>-->
<!--                                    </a>-->

                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Main column -->
                <div class="flex flex-col w-0 flex-1 overflow-hidden">
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                        <!-- Page title & actions -->
                        <div class="p-5 bg-gray-50">

                            <!--New Question dropdown-->
                            <transition
                                enter-active-class="transition ease-out duration-300"
                                enter-class="opacity-0"
                                enter-to-class="opacity-100"
                                leave-active-class="transition ease-in duration-200"
                                leave-class="opacity-100"
                                leave-to-class="opacity-0">
                                <div class="fixed z-10 inset-0 overflow-y-auto " v-show="showingQuestionTypeDropdown">
                                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                            <div @click="showingQuestionTypeDropdown=!showingQuestionTypeDropdown" class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>

                                        <!-- This element is to trick the browser into centering the modal contents. -->
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                              aria-hidden="true">&#8203;</span>

                                        <transition
                                            enter-active-class="transition ease-out duration-300"
                                            enter-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            enter-to-class="opacity-100 translate-y-0 sm:scale-100"
                                            leave-active-class="transition ease-in duration-200"
                                            leave-class="opacity-100 translate-y-0 sm:scale-100"
                                            leave-to-class="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                            <!--
                                              Modal panel, show/hide based on modal state.
                                              Entering: "ease-out duration-300"
                                                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                To: "opacity-100 translate-y-0 sm:scale-100"
                                              Leaving: "ease-in duration-200"
                                                From: "opacity-100 translate-y-0 sm:scale-100"
                                                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            -->
                                            <div v-if="showingQuestionTypeDropdown"
                                                 class="z-20 inline-block align-bottom rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 left-1/2 transform mt-3 mx-2 max-w-md sm:px-0 lg:max-w-3xl">

                                                <div class="hidden sm:block absolute top-0 right-0 pt-10 pr-4">
                                                    <button @click="showingQuestionTypeDropdown=!showingQuestionTypeDropdown"
                                                            type="button" class="rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <span class="sr-only">Close</span>
                                                        <!-- Heroicon name: outline/x -->
                                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>

                                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">

                                                    <div class="p-5 bg-gray-50 sm:p-8">
                                                            <span class="flex items-center">
                                                                <span class="text-base font-medium text-gray-900">
                                                                    Add Question
                                                                </span>
                                                            </span>
                                                        <span class="mt-1 block text-sm text-gray-500">
                                                                There are five different types of questions. Pick the one best suited for your need.
                                                            </span>
                                                    </div>
                                                    <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">
                                                        <button @click="addText"
                                                                type="submit"
                                                                class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                            <!--                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
                                                            <div
                                                                class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                <!-- TEXT ICON -->
                                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">
                                                                    Text
                                                                </p>
                                                                <p class="mt-1 text-sm text-gray-500 hidden md:block">
                                                                    Sufficient for most uses, this question allows for plain text
                                                                    input from the lead.
                                                                </p>
                                                            </div>
                                                            <!--                                </a>-->
                                                        </button>

                                                        <!--EMAIL-->
                                                        <button @click="addEmail"
                                                                type="submit"
                                                                class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                            <div
                                                                class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                <!-- EMAIL ICON -->
                                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          stroke-width="2"
                                                                          d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">
                                                                    Email
                                                                </p>
                                                                <p class="mt-1 text-sm text-gray-500 hidden md:block">
                                                                    The most common way to communicate with a lead.
                                                                </p>
                                                            </div>
                                                        </button>

                                                        <!--PHONE-->
                                                        <button @click="addPhone"
                                                                type="submit"
                                                                class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                            <div
                                                                class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                <!-- PHONE ICON -->
                                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          stroke-width="2"
                                                                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">
                                                                    Phone Number
                                                                </p>
                                                                <p class="mt-1 text-sm text-gray-500 hidden md:block">
                                                                    Useful if you want to contact the lead via phone number.
                                                                </p>
                                                            </div>
                                                        </button>

                                                        <!--MC-->
                                                        <button @click="addMultipleChoice"
                                                                type="submit"
                                                                class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                            <div
                                                                class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                <!-- MC ICON -->
                                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          stroke-width="2"
                                                                          d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">
                                                                    Multiple Choice
                                                                </p>
                                                                <p class="mt-1 text-sm text-gray-500 hidden md:block">
                                                                    If you want the lead to choose from a few options.
                                                                </p>
                                                            </div>
                                                        </button>

                                                        <!--SECTION BREAK-->
                                                        <button @click="addSectionBreak"
                                                                type="submit"
                                                                class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">
                                                            <div
                                                                class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">
                                                                <!-- BREAK ICON -->
                                                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          stroke-width="2"
                                                                          d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                                                                </svg>
                                                            </div>
                                                            <div class="ml-4">
                                                                <p class="text-base font-medium text-gray-900">
                                                                    Section Break
                                                                </p>
                                                                <p class="mt-1 text-sm text-gray-500 hidden md:block">
                                                                    Add a message in the middle of the form to keep things from
                                                                    feeling monotonous.
                                                                </p>
                                                            </div>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </transition>

<!--                                            <transition-->
<!--                                                enter-active-class="transition ease-out duration-200"-->
<!--                                                enter-class="opacity-0 translate-y-1"-->
<!--                                                enter-to-class="opacity-100 translate-y-0"-->
<!--                                                leave-active-class="transition ease-in duration-150"-->
<!--                                                leave-class="opacity-100 translate-y-0"-->
<!--                                                leave-to-class="opacity-0 translate-y-1">-->
<!--                                                <div v-if="showingQuestionTypeDropdown"-->
<!--                                                    class="absolute z-10 w-full left-1/2 transform -translate-x-1/2 mt-3 mx-2 max-w-md sm:px-0 lg:max-w-3xl">-->

<!--                                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">-->

<!--                                                        <div class="p-5 bg-gray-50 sm:p-8">-->
<!--                                                            <span class="flex items-center">-->
<!--                                                                <span class="text-base font-medium text-gray-900">-->
<!--                                                                    Add Question-->
<!--                                                                </span>-->
<!--                                                            </span>-->
<!--                                                            <span class="mt-1 block text-sm text-gray-500">-->
<!--                                                                There are five different types of questions. Pick the one best suited for your need.-->
<!--                                                            </span>-->
<!--                                                        </div>-->
<!--                                                        <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-8 lg:grid-cols-2">-->
<!--                                                            <button @click="addText"-->
<!--                                                                    type="submit"-->
<!--                                                                    class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
<!--                                                                &lt;!&ndash;                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">&ndash;&gt;-->
<!--                                                                <div-->
<!--                                                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">-->
<!--                                                                    &lt;!&ndash; TEXT ICON &ndash;&gt;-->
<!--                                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                                              stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>-->
<!--                                                                    </svg>-->
<!--                                                                </div>-->
<!--                                                                <div class="ml-4">-->
<!--                                                                    <p class="text-base font-medium text-gray-900">-->
<!--                                                                        Text-->
<!--                                                                    </p>-->
<!--                                                                    <p class="mt-1 text-sm text-gray-500">-->
<!--                                                                        Sufficient for most uses, this question allows for plain text-->
<!--                                                                        input from the lead.-->
<!--                                                                    </p>-->
<!--                                                                </div>-->
<!--                                                                &lt;!&ndash;                                </a>&ndash;&gt;-->
<!--                                                            </button>-->

<!--                                                            &lt;!&ndash;EMAIL&ndash;&gt;-->
<!--                                                            <button @click="addEmail"-->
<!--                                                                    type="submit"-->
<!--                                                                    class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
<!--                                                                <div-->
<!--                                                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">-->
<!--                                                                    &lt;!&ndash; EMAIL ICON &ndash;&gt;-->
<!--                                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                                              stroke-width="2"-->
<!--                                                                              d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>-->
<!--                                                                    </svg>-->
<!--                                                                </div>-->
<!--                                                                <div class="ml-4">-->
<!--                                                                    <p class="text-base font-medium text-gray-900">-->
<!--                                                                        Email-->
<!--                                                                    </p>-->
<!--                                                                    <p class="mt-1 text-sm text-gray-500">-->
<!--                                                                        The most common way to communicate with a lead.-->
<!--                                                                    </p>-->
<!--                                                                </div>-->
<!--                                                            </button>-->

<!--                                                            &lt;!&ndash;PHONE&ndash;&gt;-->
<!--                                                            <button @click="addPhone"-->
<!--                                                                    type="submit"-->
<!--                                                                    class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
<!--                                                                <div-->
<!--                                                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">-->
<!--                                                                    &lt;!&ndash; PHONE ICON &ndash;&gt;-->
<!--                                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                                              stroke-width="2"-->
<!--                                                                              d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>-->
<!--                                                                    </svg>-->
<!--                                                                </div>-->
<!--                                                                <div class="ml-4">-->
<!--                                                                    <p class="text-base font-medium text-gray-900">-->
<!--                                                                        Phone Number-->
<!--                                                                    </p>-->
<!--                                                                    <p class="mt-1 text-sm text-gray-500">-->
<!--                                                                        Useful if you want to contact the lead via phone number.-->
<!--                                                                    </p>-->
<!--                                                                </div>-->
<!--                                                            </button>-->

<!--                                                            &lt;!&ndash;MC&ndash;&gt;-->
<!--                                                            <button @click="addMultipleChoice"-->
<!--                                                                    type="submit"-->
<!--                                                                    class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
<!--                                                                <div-->
<!--                                                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">-->
<!--                                                                    &lt;!&ndash; MC ICON &ndash;&gt;-->
<!--                                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                                              stroke-width="2"-->
<!--                                                                              d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>-->
<!--                                                                    </svg>-->
<!--                                                                </div>-->
<!--                                                                <div class="ml-4">-->
<!--                                                                    <p class="text-base font-medium text-gray-900">-->
<!--                                                                        Multiple Choice-->
<!--                                                                    </p>-->
<!--                                                                    <p class="mt-1 text-sm text-gray-500">-->
<!--                                                                        If you want the lead to choose from a few options.-->
<!--                                                                    </p>-->
<!--                                                                </div>-->
<!--                                                            </button>-->

<!--                                                            &lt;!&ndash;SECTION BREAK&ndash;&gt;-->
<!--                                                            <button @click="addSectionBreak"-->
<!--                                                                    type="submit"-->
<!--                                                                    class="focus:outline-none -m-3 p-3 flex items-start text-left rounded-lg hover:bg-gray-100 transition ease-in-out duration-150">-->
<!--                                                                <div-->
<!--                                                                    class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-indigo-500 text-white sm:h-12 sm:w-12">-->
<!--                                                                    &lt;!&ndash; BREAK ICON &ndash;&gt;-->
<!--                                                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"-->
<!--                                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
<!--                                                                        <path stroke-linecap="round" stroke-linejoin="round"-->
<!--                                                                              stroke-width="2"-->
<!--                                                                              d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>-->
<!--                                                                    </svg>-->
<!--                                                                </div>-->
<!--                                                                <div class="ml-4">-->
<!--                                                                    <p class="text-base font-medium text-gray-900">-->
<!--                                                                        Section Break-->
<!--                                                                    </p>-->
<!--                                                                    <p class="mt-1 text-sm text-gray-500">-->
<!--                                                                        Add a message in the middle of the form to keep things from-->
<!--                                                                        feeling monotonous.-->
<!--                                                                    </p>-->
<!--                                                                </div>-->
<!--                                                            </button>-->

<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </transition>-->
                                    </div>
                                </div>
                            </transition>

                            <slot class="shadow-md"/>
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
            showingQuestionsDropdown: false,
            showingDeleteModal: false,
            questionList: this.questions.map((question) => {
                return question
            }),
            // showingDecoyQuestion: false,
            // decoyType: "",
        }
    },

    watch: {
        questions: function(newVal, oldVal) { // watch it
            this.questionList = this.questions.map((question) => {
                return question
            });
        }
    },

    computed: {
        sortedQuestions() {
            return this.$props.questions.sort((a, b) => (a.index > b.index) ? 1 : -1);
        }
    },

    methods: {
        // deleting the entire form
        async deleteForm() {
            let data = {'form_uuid': this.form.uuid}
            this.$inertia.post('/delete-form', data)
            // let response = await axios.post('/api/delete-form', data)
        },

        // moving the questions up/down
        async moveUp(movingUUID) {
            var newQuestions = this.questionList;

            let currentQuestion = newQuestions.filter((question) => {
                return question.uuid === movingUUID;
            })[0];
            let currentIndex = newQuestions.indexOf(currentQuestion);
            let previousQuestion = newQuestions[currentIndex - 1];
            previousQuestion.index = currentIndex;
            currentQuestion.index = currentIndex - 1;

            var sortedQuestions = newQuestions.sort((a, b) => {
                return a.index - b.index;
            });
            this.questionList = sortedQuestions

            let data = {'form_uuid': this.form.uuid, 'currentIndex': currentIndex, 'previousIndex': currentIndex - 1};

            let response = await axios.post('/api/move-up', data)
        },
        async moveDown(movingUUID) {
            var newQuestions = this.questionList;

            let currentQuestion = newQuestions.filter((question) => {
                return question.uuid === movingUUID;
            })[0];
            let currentIndex = newQuestions.indexOf(currentQuestion);
            let nextQuestion = newQuestions[currentIndex + 1];
            nextQuestion.index = currentIndex;
            currentQuestion.index = currentIndex + 1;

            var sortedQuestions = newQuestions.sort((a, b) => {
                return a.index - b.index;
            });
            this.questionList = sortedQuestions

            let data = {'form_uuid': this.form.uuid, 'currentIndex': currentIndex, 'nextIndex': currentIndex + 1};
            let response = await axios.post('/api/move-down', data)
        },

        // deleting a question
        deleteQuestion(deletedUuid) {
            let newQuestions = this.questionList.filter((question) => {
                return question.uuid !== deletedUuid;
            });
            this.questionList = newQuestions;

            let data = {'deletedUUID': deletedUuid, 'form_uuid': this.form.uuid}
            // let response = await axios.post('/api/delete-question', data)
            this.$inertia.post('/form/delete-question', data)
        },

        // changing the title of the question
        async updateTitle(e) {
            let data = {'title': e.target.innerText, 'form_id': this.form.id}
            let response = await axios.post('/api/update-title', data)
        },

        // adding questions
        addName() {
            let data = {
                'index': this.$page.props.questions[this.$page.props.questions.length - 1].index + 1,
                'form_id': this.form.id,
                'form_uuid': this.form.uuid
            }
            this.$data.showingQuestionTypeDropdown = !this.$data.showingQuestionTypeDropdown;
            this.$inertia.post('/form/add_name', data)
        },
        addText() {
            let data = {
                'index': this.$page.props.questions[this.$page.props.questions.length - 1].index + 1,
                'form_id': this.form.id,
                'form_uuid': this.form.uuid
            }
            this.$data.showingQuestionTypeDropdown = !this.$data.showingQuestionTypeDropdown;
            this.$inertia.post('/form/add_text', data)
        },
        addEmail() {
            let data = {
                'index': this.$page.props.questions.length,
                'form_id': this.form.id,
                'form_uuid': this.form.uuid
            }
            this.$data.showingQuestionTypeDropdown = !this.$data.showingQuestionTypeDropdown;
            this.$inertia.post('/form/add_email', data)
        },
        addPhone() {
            let data = {
                'index': this.$page.props.questions.length,
                'form_id': this.form.id,
                'form_uuid': this.form.uuid
            }
            this.$data.showingQuestionTypeDropdown = !this.$data.showingQuestionTypeDropdown;
            this.$inertia.post('/form/add_phone', data)
        },
        addMultipleChoice() {
            let data = {
                'index': this.$page.props.questions.length,
                'form_id': this.form.id,
                'form_uuid': this.form.uuid
            }
            this.$data.showingQuestionTypeDropdown = !this.$data.showingQuestionTypeDropdown;
            this.$inertia.post('/form/add_multiple_choice', data)
        },
        addSectionBreak() {
            let data = {
                'index': this.$page.props.questions.length,
                'form_id': this.form.id,
                'form_uuid': this.form.uuid
            }
            this.$data.showingQuestionTypeDropdown = !this.$data.showingQuestionTypeDropdown;
            this.$inertia.post('/form/add_section_break', data)
        },

        convertToLetter(number) {
            let alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

            if (number > alphabet.length) {
                return "A";
            } else {
                return alphabet[number];
            }
        },

        // returns the appropriate icon svg for each question
        returnQuestionSvg(questionType) {
            if (questionType === "Name") {
                return "M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z";
            }
            if (questionType === "Text") {
                return "M4 6h16M4 12h8m-8 6h16";
            }
            if (questionType === "Email") {
                return "M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207";
            }
            if (questionType === "Phone Number") {
                return "M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z";
            }
            if (questionType === "Multiple Choice") {
                return "M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z";
            }
            if (questionType === "Section Break") {
                return "M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2";
            }

        }
    }
}
</script>

<style scoped>

[contenteditable] {
    outline: 0px solid transparent;
}

[contenteditable]:empty:before {
    content: attr(placeholder);
    color: #999999;
}

[contenteditable]:focus {
    border-width: 0px;
    border-color: #cbd5e0;
    border-radius: 8px;
}
</style>
