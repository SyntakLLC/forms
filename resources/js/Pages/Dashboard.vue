<template>
    <app-layout>

        <!-- Initialized -->
        <div v-if="$page.props.site.initialized" class="h-full">
            <div class="flex items-center flex-shrink-0 border-b border-gray-200">
                <!-- Search header -->
<!--                <div class="relative z-10 flex-shrink-0 flex h-16 bg-white lg:hidden">-->
<!--                    &lt;!&ndash; Sidebar toggle, controls the 'sidebarOpen' sidebar state. &ndash;&gt;-->
<!--                    <button @click="showingQuestionsDropdown=!showingQuestionsDropdown"-->
<!--                            class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">-->
<!--                        <span class="sr-only">Open sidebar</span>-->
<!--                        &lt;!&ndash; Heroicon name: outline/menu-alt-1 &ndash;&gt;-->
<!--                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"-->
<!--                             stroke="currentColor" aria-hidden="true">-->
<!--                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"-->
<!--                                  d="M4 6h16M4 12h8m-8 6h16"/>-->
<!--                        </svg>-->
<!--                    </button>-->
<!--                </div>-->

                <div class="w-full border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <!-- Edit Site title -->
                    <div class="flex-1 min-w-0">
                        <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Edit Site
                        </h1>
                    </div>

                    <!-- Accent Color dropdown -->
                    <div class="relative mt-2 sm:mt-0 sm:ml-3">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="showingAccentColorDropdown=!showingAccentColorDropdown; showingLayoutDropdown=false; showingCoverPhotoDropdown=false; showingSocialDropdown=false"
                                :class="showingAccentColorDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                            <span>Change Accent Color</span>

                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                 :class="showingAccentColorDropdown ? 'text-gray-600' : 'text-gray-400'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <transition
                            enter-active-class="transition ease-out duration-200"
                            enter-class="opacity-0 translate-y-1"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition ease-in duration-150"
                            leave-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-1">
                            <div v-show="showingAccentColorDropdown" class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white">
<!--                                    <div class="relative grid gap-6 bg-white px-1 py-1 sm:gap-8 sm:p-8">-->
                                        <chrome-picker :value="colors" @input="updateColor" />
<!--                                    </div>-->
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Cover photo dropdown -->
                    <div class="relative mt-2 sm:mt-0 sm:ml-3">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="showingCoverPhotoDropdown=!showingCoverPhotoDropdown; showingLayoutDropdown=false; showingAccentColorDropdown=false; showingSocialDropdown=false"
                                :class="showingCoverPhotoDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                            <span>Select Background Photo</span>

                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                 :class="showingCoverPhotoDropdown ? 'text-gray-600' : 'text-gray-400'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <transition
                            enter-active-class="transition ease-out duration-200"
                            enter-class="opacity-0 translate-y-1"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition ease-in duration-150"
                            leave-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-1">
                            <div v-show="showingCoverPhotoDropdown" class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="relative grid bg-white py-1 items-center">
                                        <input type="file" class="hidden"
                                               ref="photo"
                                               @change="updatePhotoPreview">

                                        <a @click="selectNewPhoto" href="#" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 font-medium text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Select A New Photo</a>

                                        <a @click="removePhoto" v-if="$page.props.user.cover_photo_url" href="#" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 font-medium text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Remove Photo</a>

                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Layout dropdown -->
                    <div class="relative mt-2 sm:mt-0 sm:ml-3">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="showingLayoutDropdown=!showingLayoutDropdown; showingCoverPhotoDropdown=false; showingAccentColorDropdown=false; showingSocialDropdown=false"
                                :class="showingLayoutDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                            <span>Change Layout</span>

                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                 :class="showingLayoutDropdown ? 'text-gray-600' : 'text-gray-400'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <transition
                            enter-active-class="transition ease-out duration-200"
                            enter-class="opacity-0 translate-y-1"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition ease-in duration-150"
                            leave-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-1">
                            <div v-show="showingLayoutDropdown" class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <!--                                    <div class="relative grid gap-6 bg-white px-1 py-1 sm:gap-8 sm:p-8">-->
                                    <fieldset>
                                        <legend class="sr-only">
                                            Layouts
                                        </legend>
                                        <div class="relative bg-white rounded-md -space-y-px">

                                            <label class="border-gray-200 rounded-tl-md rounded-tr-md relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6">
                                                <div class="flex w-full items-center text-sm">
                                                    <input type="radio" :checked="layout===1" @input="updateLayout(1)" name="pricing_plan" value="Layout1" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-0-label" aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                                    <span v-if="layout===1" id="layout-1-label-checked" class="ml-3 font-medium text-indigo-700">Left Align</span>
                                                    <span v-else id="layout-1-label" class="ml-3 font-medium text-gray-900">Left Align</span>
                                                </div>

                                            </label>


                                            <label class="border-gray-200 relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6">
                                                <div class="flex items-center text-sm">
                                                    <input type="radio" :checked="layout===2" @input="updateLayout(2)" name="pricing_plan" value="Layout2" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-1-label" aria-describedby="pricing-plans-1-description-0 pricing-plans-1-description-1">
                                                    <span v-if="layout===2" id="layout-2-label-checked" class="ml-3 font-medium text-indigo-700">Right Align</span>
                                                    <span v-else id="layout-2-label" class="ml-3 font-medium text-gray-900">Right Align</span>
                                                </div>

                                            </label>


                                            <label class="border-gray-200 relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6">
                                                <div class="flex items-center text-sm">
                                                    <input type="radio" :checked="layout===3" @input="updateLayout(3)" name="pricing_plan" value="Layout3" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-1-label" aria-describedby="pricing-plans-1-description-0 pricing-plans-1-description-1">
                                                    <span v-if="layout===3" id="layout-3-label-checked" class="ml-3 font-medium text-indigo-700">Top Align</span>
                                                    <span v-else id="layout-3-label" class="ml-3 font-medium text-gray-900">Top Align</span>
                                                </div>

                                            </label>
                                        </div>
                                    </fieldset>
                                    <!--                                    </div>-->
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Social media dropdown -->
                    <div class="relative mt-2 sm:mt-0 sm:ml-3">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="showingSocialDropdown=!showingSocialDropdown; showingLayoutDropdown=false; showingAccentColorDropdown=false; showingCoverPhotoDropdown=false"
                                :class="showingSocialDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" aria-expanded="false">
                            <span>Add Social Links</span>

                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                 :class="showingSocialDropdown ? 'text-gray-600' : 'text-gray-400'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <transition
                            enter-active-class="transition ease-out duration-200"
                            enter-class="opacity-0 translate-y-1"
                            enter-to-class="opacity-100 translate-y-0"
                            leave-active-class="transition ease-in duration-150"
                            leave-class="opacity-100 translate-y-0"
                            leave-to-class="opacity-0 translate-y-1">
                            <div v-show="showingSocialDropdown" class="absolute z-10 left-1/2 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0">
                                <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white p-5">
                                    <form @submit.prevent="updateSocialForm.post('/update-social')">

                                    <!-- Facebook -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Facebook</label>
                                        <div class="mt-1">
                                            <input v-model="updateSocialForm.facebook" type="text" name="url" id="url1" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.facebook.com/yourpage">
                                        </div>
                                    </div>

                                    <!-- Instagram -->
                                    <div class="mt-3">
                                        <label class="block text-sm font-medium text-gray-700">Instagram</label>
                                        <div class="mt-1">
                                            <input v-model="updateSocialForm.instagram" type="text" name="url" id="url2" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.instagram.com/yourpage">
                                        </div>
                                    </div>

                                    <!-- Twitter -->
                                    <div class="mt-3">
                                        <label class="block text-sm font-medium text-gray-700">Twitter</label>
                                        <div class="mt-1">
                                            <input v-model="updateSocialForm.twitter" type="text" name="url" id="url3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.twitter.com/yourpage">
                                        </div>
                                    </div>

                                    <button type="submit" class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        {{ updateSocialForm.recentlySuccessful ? "Saved" : updateSocialForm.processing ? "Saving..." : "Save" }}
                                    </button>

                                    </form>

                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Preview -->
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <inertia-link :href="route('site.show', $page.props.site.uuid)"
                                      class="truncate hover:text-gray-600 block">
                            <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:order-1 sm:ml-3">
                                Preview
                            </button>
                        </inertia-link>
                    </div>
                </div>
            </div>

            <div class="flex overflow-hidden bg-white">

                <!-- Main column -->
                <div class="flex flex-col w-0 flex-1 overflow-hidden">
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">

                        <!-- Global notification live region, render this permanently at the end of the document -->
                        <div aria-live="assertive" class="fixed inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-30">
                            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">

                                <transition
                                    enter-active-class="transform ease-out duration-300 transition"
                                    enter-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                                    enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                                    leave-active-class="transition ease-in duration-100"
                                    leave-class="opacity-100"
                                    leave-to-class="opacity-0">
                                    <div v-show="showingAutosaveNotification" class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="p-4">
                                            <div class="flex items-center">
                                                <div class="w-0 flex-1 flex justify-between">
                                                    <p class="w-0 flex-1 text-sm font-medium text-gray-900">
                                                        Any changes you make will automatically be saved.
                                                    </p>
                                                    <button @click="dontShowNotifAgain" class="ml-3 flex-shrink-0 bg-white rounded-md text-sm font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        Don't Show Again
                                                    </button>
                                                </div>
                                                <div class="ml-4 flex-shrink-0 flex">
                                                    <button @click="showingAutosaveNotification=!showingAutosaveNotification" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                        <span class="sr-only">Close</span>
                                                        <!-- Heroicon name: solid/x -->
                                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </transition>
                            </div>
                        </div>


                        <!--Left align and right align-->
                                <div v-if="this.layout === 1 || this.layout === 2" class="bg-white">
                                    <div class="relative ">
                                        <div class="lg:absolute lg:inset-0">

                                            <!--Pattern background-->
                                            <div v-if="$page.props.user.cover_photo_url==null"
                                                 class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 lg:h-screen"
                                                 :class="layout===1 ? 'lg:right-0' : 'lg:left-0'"
                                                 :style="this.getURL"
                                                 id="pattern">

                                                <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center">
                                                    <img class="sm:h-40 sm:w-40 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                                </div>
                                            </div>

                                            <!--Cover photo-->
                                            <div v-else class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 overflow-hidden lg:h-screen"
                                                :class="layout===1 ? 'lg:right-0' : 'lg:left-0'">
                                                <img class="h-56 w-full object-cover lg:absolute lg:h-full" :src="'http://localhost:9600/forms-bucket/' + $page.props.user.cover_photo_url" />

                                                <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:mt-0 -mt-56">
                                                    <img class="sm:h-40 sm:w-40 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                                </div>
                                            </div>

                                        </div>


                                        <div class="relative py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
                                            <div v-if="layout===2" class="lg:mx-8"/>
                                            <div :class="layout===2 ? 'lg:pl-8 justify-self-center' : 'lg:pr-8'">

                                                <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                                                    <h2 class="text-center text-3xl font-extrabold tracking-tight sm:text-4xl">
                                                        {{$page['props']['user']['name']}}
                                                    </h2>
                                                    <p contenteditable placeholder="Message (optional)" @input="updateMessage" class="text-center font-medium mt-4 text-lg text-gray-500 sm:mt-3">
                                                        {{$page['props']['site']['message']}}
                                                    </p>

                                                    <!--Forms-->
                                                    <ul class="mt-2" v-if="$page['props']['forms'].length">
                                                        <li v-for="(form) in $page['props']['forms']"
                                                            class="group">
                                                            <inertia-link :href="route('form.edit', form.uuid)">
                                                                <div class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border">
                                                                    <div class="px-4 py-5 sm:p-6">
                                                                        <div class="sm:flex sm:items-start sm:justify-between">
                                                                            <div>
                                                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                                    {{ form.title }}
                                                                                </h3>
                                                                            </div>
                                                                            <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                                                                                <button type="button"
                                                                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                                                                                        :style="'background: ' + colors + '; color: ' + getContrastYIQ(colors)">
                                                                                    Edit Form
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </inertia-link>
                                                        </li>
                                                    </ul>
                                                    <inertia-link :href="route('form.index')">
                                                        <div class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border-2 border-gray-300 border-dashed">
                                                            <div class="px-4 py-5 sm:p-6">
                                                                <div class="sm:flex sm:items-start sm:justify-between">
                                                                    <div>
                                                                        <h3 class="text-lg leading-6 font-medium text-gray-400">
                                                                            Make a New Form
                                                                        </h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </inertia-link>

                                                    <!--Article-->
                                                    <div class="relative py-16 pt-8 bg-white overflow-hidden">
                                                        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
                                                            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                                                                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-28" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                                                    <defs>
                                                                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                                        </pattern>
                                                                    </defs>
                                                                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="relative px-4 sm:px-6 lg:px-8">
                                                            <div class="text-lg max-w-prose mx-auto">
                                                                <h1>
                                                                    <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase" :style="'color: ' + colors">Welcome</span>
                                                                    <span contenteditable placeholder="Title" @input="updateTitle" class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$page.props.site.section_header}}</span>
                                                                </h1>
                                                                <p contenteditable placeholder="Describe a little about yourself and your goals here." @input="updateContent" class="mt-8 text-xl text-gray-500 leading-8">{{$page.props.site.section_content}}</p>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!-- Social Media -->
                                                    <div v-show="$page.props.site.facebook !== null || $page.props.site.instagram !== null || $page.props.site.twitter !== null"
                                                         class="flex justify-center space-x-6">
                                                        <a v-show="$page.props.site.facebook !== null" target="_blank" :href="facebookHttps === 'https://' ? $page.props.site.facebook : facebookHttp === 'http://' ? $page.props.site.facebook : '//' + $page.props.site.facebook" class="text-gray-300" :style="'color: ' + colors">
                                                            <span class="sr-only">Facebook</span>
                                                            <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>

                                                        <a v-show="$page.props.site.instagram !== null" target="_blank" :href="instagramHttps === 'https://' ? $page.props.site.instagram : instagramHttp === 'http://' ? $page.props.site.instagram : '//' + $page.props.site.instagram" class="text-gray-300" :style="'color: ' + colors">
                                                            <span class="sr-only">Instagram</span>
                                                            <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                                            </svg>
                                                        </a>

                                                        <a v-show="$page.props.site.twitter !== null" target="_blank" :href="twitterHttps === 'https://' ? $page.props.site.twitter : twitterHttp === 'http://' ? $page.props.site.twitter : '//' + $page.props.site.twitter" class="text-gray-300" :style="'color: ' + colors">
                                                            <span class="sr-only">Twitter</span>
                                                            <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                                            </svg>
                                                        </a>
                                                    </div>

                                                    <!--Normal Contact Section-->
                                                    <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
                                                        <div class="relative max-w-xl mx-auto">
                                                            <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                                                                <defs>
                                                                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                                    </pattern>
                                                                </defs>
                                                                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                                                            </svg>
                                                            <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                                                                <defs>
                                                                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                                    </pattern>
                                                                </defs>
                                                                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                                                            </svg>
                                                            <div class="text-center">
                                                                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                                                    Contact Me
                                                                </h2>
                                                                <p class="mt-4 text-lg leading-6 text-gray-500">
                                                                    If you'd rather just open a line of communication instead of filling out forms, feel free to do so here.
                                                                </p>
                                                            </div>
                                                            <div class="mt-12">
<!--                                                                <form @submit.prevent="submitContactForm.post('/contact')"-->
                                                                      <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                                                    <div>
                                                                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                                                        <div class="mt-1">
                                                                            <input v-model="submitContactForm.firstName" type="text" name="first_name" id="first_name" autocomplete="given-name" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                                                        <div class="mt-1">
                                                                            <input v-model="submitContactForm.lastName" type="text" name="last_name" id="last_name" autocomplete="family-name" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                                        </div>
                                                                    </div>
                                                                    <div class="sm:col-span-2">
                                                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                                        <div class="mt-1">
                                                                            <input v-model="submitContactForm.email" id="email" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                                        </div>
                                                                    </div>
                                                                    <div class="sm:col-span-2">
                                                                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                                                        <div class="mt-1 relative rounded-md shadow-sm">
                                                                            <input v-model="submitContactForm.phone" type="text" name="phone_number" id="phone_number" autocomplete="tel" class="py-3 px-4 block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="+1 (555) 987-6543">
                                                                        </div>
                                                                    </div>
                                                                    <div class="sm:col-span-2">
                                                                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                                                        <div class="mt-1">
                                                                            <textarea v-model="submitContactForm.message" id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"></textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="sm:col-span-2">
                                                                        <button class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                                :style="'background: ' + colors">
                                                                            Let's talk
                                                                        </button>
                                                                    </div>
                                                                      </div>
<!--                                                                </form>-->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Top align-->
                                <div v-if="this.layout === 3" class="bg-white">

                                    <!--Cover photo-->
                                    <div>
                                        <div v-if="$page.props.user.cover_photo_url==null"
                                             class="h-64 w-full object-cover lg:h-96"
                                             :style="this.getURL"
                                             id="pattern3">
<!--                                            <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center">-->
<!--                                                <img class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />-->
<!--                                            </div>-->
                                        </div>
                                        <div v-else>
                                            <img class="h-64 w-full object-cover lg:h-96" :src="'http://localhost:9600/forms-bucket/' + $page.props.user.cover_photo_url" />
                                        </div>

                                    </div>


                                    <!--Profile Picture-->
                                    <div class="-mt-16 flex space-x-5 justify-center flex-col">
                                        <div class="flex justify-center content-center">
                                            <img class="justify-self-center items-center h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </div>
                                    </div>

                                    <!--Name and message-->
                                    <div class="relative pb-1 px-4 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:w-3/4 justify-center">
                                        <div class="2xl:block mt-3 min-w-0 flex-1">
                                            <h1 class="text-2xl font-bold text-gray-900 truncate text-center">
                                                {{ $page.props.user.name }}
                                            </h1>

                                            <div class="items-end">
                                                <p contenteditable placeholder="Message (optional)" @input="updateMessage" class="font-medium mt-4 text-lg text-gray-500 sm:mt-3 text-center pl-10">
                                                    {{$page['props']['site']['message']}}
                                                </p>

                                                <!--Edit pen icon-->
                                                <span class="absolute inset-y-0 right-10 pl-3 flex items-end pointer-events-none text-gray-400 pb-2.5">
                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                         fill="currentColor" aria-hidden="true">
                                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Forms-->
                                    <div class="relative pb-8 px-4 sm:pb-12 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:pb-16 lg:w-3/4 justify-center pt-4 sm:pt-6 lg:pt-8">
                                        <ul class="mt-2" v-if="$page['props']['forms'].length">
                                        <li v-for="(form) in $page['props']['forms']"
                                            class="group">
                                            <inertia-link :href="route('form.edit', form.uuid)">
                                                <div class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border">
                                                    <div class="px-4 py-5 sm:p-6">
                                                        <div class="sm:flex sm:items-start sm:justify-between">
                                                            <div>
                                                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                    {{ form.title }}
                                                                </h3>
                                                            </div>
                                                            <div class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                                                                <button type="button"
                                                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                                                                        :style="'background: ' + colors + '; color: ' + getContrastYIQ(colors)">
                                                                    Edit Form
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </inertia-link>
                                        </li>
                                        <inertia-link :href="route('form.index')">
                                            <div class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border-2 border-gray-300 border-dashed">
                                                <div class="px-4 py-5 sm:p-6">
                                                    <div class="sm:flex sm:items-start sm:justify-between">
                                                        <div>
                                                            <h3 class="text-lg leading-6 font-medium text-gray-400">
                                                                Make a New Form
                                                            </h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </inertia-link>
                                        </ul>
                                    </div>

                                    <!--Article-->
                                    <div class="relative py-16 pt-8 bg-white overflow-hidden">
                                        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
                                            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                                                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-28" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                                    <defs>
                                                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                        </pattern>
                                                    </defs>
                                                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="relative px-4 sm:px-6 lg:px-8">
                                            <div class="text-lg max-w-prose mx-auto">
                                                <h1>
                                                    <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase" :style="'color: ' + colors">Welcome</span>
                                                    <span contenteditable placeholder="Title" @input="updateTitle" class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$page.props.site.section_header}}</span>
                                                </h1>
                                                <p contenteditable placeholder="Describe a little about yourself and your goals here." @input="updateContent" class="mt-8 text-xl text-gray-500 leading-8">{{$page.props.site.section_content}}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Social Media -->
                                    <div v-show="$page.props.site.facebook !== null || $page.props.site.instagram !== null || $page.props.site.twitter !== null"
                                         class="flex justify-center space-x-6">
                                        <a v-show="$page.props.site.facebook !== null" target="_blank" :href="facebookHttps === 'https://' ? $page.props.site.facebook : facebookHttp === 'http://' ? $page.props.site.facebook : '//' + $page.props.site.facebook" class="text-gray-300" :style="'color: ' + colors">
                                            <span class="sr-only">Facebook</span>
                                            <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                        <a v-show="$page.props.site.instagram !== null" target="_blank" :href="instagramHttps === 'https://' ? $page.props.site.instagram : instagramHttp === 'http://' ? $page.props.site.instagram : '//' + $page.props.site.instagram" class="text-gray-300" :style="'color: ' + colors">
                                            <span class="sr-only">Instagram</span>
                                            <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                            </svg>
                                        </a>

                                        <a v-show="$page.props.site.twitter !== null" target="_blank" :href="twitterHttps === 'https://' ? $page.props.site.twitter : twitterHttp === 'http://' ? $page.props.site.twitter : '//' + $page.props.site.twitter" class="text-gray-300" :style="'color: ' + colors">
                                            <span class="sr-only">Twitter</span>
                                            <svg class="h-10 w-10" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                                <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                                            </svg>
                                        </a>
                                    </div>

                                    <!--Normal Contact Section-->
                                    <div class="bg-white py-16 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-24">
                                        <div class="relative max-w-xl mx-auto">
                                            <svg class="absolute left-full transform translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                                                <defs>
                                                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                    </pattern>
                                                </defs>
                                                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                                            </svg>
                                            <svg class="absolute right-full bottom-0 transform -translate-x-1/2" width="404" height="404" fill="none" viewBox="0 0 404 404" aria-hidden="true">
                                                <defs>
                                                    <pattern id="85737c0e-0916-41d7-917f-596dc7edfa27" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                    </pattern>
                                                </defs>
                                                <rect width="404" height="404" fill="url(#85737c0e-0916-41d7-917f-596dc7edfa27)" />
                                            </svg>
                                            <div class="text-center">
                                                <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                                                    Contact Me
                                                </h2>
                                                <p class="mt-4 text-lg leading-6 text-gray-500">
                                                    If you'd rather just open a line of communication instead of filling out forms, feel free to do so here.
                                                </p>
                                            </div>
                                            <div class="mt-12">
<!--                                                <form @submit.prevent="submitContactForm.post('/contact')"-->
                                                      <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                                    <div>
                                                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                                        <div class="mt-1">
                                                            <input v-model="submitContactForm.firstName" type="text" name="first_name" id="first_name2" autocomplete="given-name" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                                        <div class="mt-1">
                                                            <input v-model="submitContactForm.lastName" type="text" name="last_name" id="last_name2" autocomplete="family-name" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                        </div>
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                        <div class="mt-1">
                                                            <input v-model="submitContactForm.email" id="email2" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                                                        </div>
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                                        <div class="mt-1 relative rounded-md shadow-sm">
                                                            <input v-model="submitContactForm.phone" type="text" name="phone_number" id="phone_number2" autocomplete="tel" class="py-3 px-4 block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md" placeholder="+1 (555) 987-6543">
                                                        </div>
                                                    </div>
                                                    <div class="sm:col-span-2">
                                                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                                        <div class="mt-1">
                                                            <textarea v-model="submitContactForm.message" id="message2" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="sm:col-span-2">
                                                        <button class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                :style="'background: ' + colors">
                                                            Let's talk
                                                        </button>
                                                    </div>
                                                      </div>
<!--                                                </form>-->
                                            </div>
                                        </div>
                                    </div>


                                </div>

<!--                            </div>-->
<!--                        </div>-->
                    </main>
                </div>
            </div>
        </div>

        <!-- Not initialized -->
        <div v-else class="h-full">
            <div class="flex items-center flex-shrink-0 border-b border-gray-200">

                <div class="w-full border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="pt-2 pb-1 text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Choose a Layout
                        </h1>

                        <p class="text-sm text-gray-500">Don't worry, you can always change this later.</p>
                    </div>
                </div>
            </div>

            <div class="min-h-full flex overflow-hidden bg-white">
                <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

                    <div class="bg-white">
                        <div class="mx-auto">
                            <div class="space-y-12">

                                <ul class="grid grid-cols-2 gap-x-6 gap-y-12 space-y-0 sm:grid sm:grid-cols-3 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3 lg:gap-x-8">

                                    <!-- Top align -->
                                    <li @click="createSite(1)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Top Align</h3>
                                                    <p class="text-indigo-600">A standard site layout</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <!-- Left align -->
                                    <li @click="createSite(2)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Left Align</h3>
                                                    <p class="text-indigo-600">Let your brand stand out</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <!-- Right align -->
                                    <li @click="createSite(3)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixqx=5XGNHivJgT&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Right Align</h3>
                                                    <p class="text-indigo-600">An alternative to left-align</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import { Chrome, Swatches } from 'vue-color'

    export default {
        components: {
            AppLayout,
            Welcome,
            'chrome-picker': Chrome,
            'swatches-picker': Swatches,
        },

        props: ['user', 'site'],

        data() {
            return {
                showingAutosaveNotification: !this.site.saw_autosave_message_on_site,
                facebookHttps: this.site.facebook == null ? "" : this.site.facebook.length > 7 ? this.site.facebook.substring(0, 8) : this.site.facebook,
                instagramHttps: this.site.instagram == null ? "" : this.site.instagram.length > 7 ? this.site.instagram.substring(0, 8) : this.site.instagram,
                twitterHttps: this.site.twitter == null ? "" : this.site.twitter.length > 7 ? this.site.twitter.substring(0, 8) : this.site.twitter,
                facebookHttp: this.site.facebook == null ? "" : this.site.facebook.length > 6 ? this.site.facebook.substring(0, 7) : this.site.facebook,
                instagramHttp: this.site.instagram == null ? "" : this.site.instagram.length > 6 ? this.site.instagram.substring(0, 7) : this.site.instagram,
                twitterHttp: this.site.twitter == null ? "" : this.site.twitter.length > 6 ? this.site.twitter.substring(0, 7) : this.site.twitter,
                photoPreview: null,
                layout: this.site.layout,
                showingAccentColorDropdown: false,
                showingCoverPhotoDropdown: false,
                showingLayoutDropdown: false,
                showingSocialDropdown: false,
                showingQuestionsDropdown: false,
                colors: '#' + this.site.accent_color,

                getURL: {
                    'background-image': 'url("data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23' + this.site.accent_color + '\' fill-opacity=\'1\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E")',
                },

                submitContactForm: this.$inertia.form({
                    firstName: '',
                    lastName: '',
                    email: '',
                    phone: '',
                    message: '',
                    site: this.site.uuid,
                }),

                updateSocialForm: this.$inertia.form({
                    facebook: this.site.facebook,
                    instagram: this.site.instagram,
                    twitter: this.site.twitter,
                    site: this.site.uuid,
                }),
            };
        },

        methods: {
            // don't show the notif again
            async dontShowNotifAgain() {
                this.showingAutosaveNotification=!this.showingAutosaveNotification;

                let data = {
                    'site': this.site.uuid,
                }
                let response = await axios.post('/api/dontshowsitenotif', data)
            },

            // initialize the site
            createSite(layout) {
                let data = {
                    'layout': layout,
                    'site': this.site.uuid,
                }
                this.$inertia.post('/create-site', data)
                // let response = await axios.post('/api/create-site', data)
            },

            // returns black or white depending on the appropriate 'logo' color
            getContrastYIQ(hexcolor){
                hexcolor = hexcolor.replace("#", "");
                var r = parseInt(hexcolor.substr(0,2),16);
                var g = parseInt(hexcolor.substr(2,2),16);
                var b = parseInt(hexcolor.substr(4,2),16);
                var yiq = ((r*299)+(g*587)+(b*114))/1000;
                return (yiq >= 128) ? 'black' : 'white';
            },

            /**
             * to update the layout
             */
            async updateLayout(newLayout) {
                this.layout = newLayout;

                let data = {
                    'layout': newLayout,
                    'site': this.site.id,
                }
                let response = await axios.post('/api/update-layout', data)
            },

            /**
             * Update Cover photo
             */
            selectNewPhoto() {
                this.$refs.photo.click();
            },
            removePhoto() {
                this.$inertia.post('remove-cover-picture')
            },
            updatePhotoPreview() {
                const reader = new FileReader();
                let photo = null;
                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                    photo = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);

                // let response = await axios.post('/api/update-cover-picture', {photo: this.$refs.photo.files[0]})
                this.$inertia.post('update-cover-picture', {photo: this.$refs.photo.files[0]})
            },

            /**
             * Update fields
             */
            async updateColor(e) {
                this.colors = e.hex;
                this.getURL = {
                    'background-image': 'url("data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23' + e.hex.replace('#', '') + '\' fill-opacity=\'1\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E")',
                };

                let data = {
                    'color': e.hex.replace('#', ''),
                    'site': this.site.id,
                }
                let response = await axios.post('/api/update-color', data)
            },

            async updateMessage(e) {
                let data = {
                    'message': e.target.innerText,
                    'site': this.site.id,
                }
                let response = await axios.post('/api/update-message', data)
            },

            async updateContent(e) {
                let data = {
                    'content': e.target.innerText,
                    'site': this.site.id,
                }
                let response = await axios.post('/api/update-content', data)
            },

            async updateTitle(e) {
                let data = {
                    'title': e.target.innerText,
                    'site': this.site.id,
                }
                let response = await axios.post('/api/update-section-header', data)
            },
        }
    }
</script>

<style lang="css">
img {
    user-drag: none;
    user-select: none;
    -moz-user-select: none;
    -webkit-user-drag: none;
    -webkit-user-select: none;
    -ms-user-select: none;
}

#coverPhoto {
    opacity: 0.4;
}

/*#pattern {*/
/*    background-color: #ffffff;*/
/*    background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%238b5cf6' fill-opacity='1'%3E%3Cpath d='M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E");*/
/*}*/
[contenteditable] {
    outline: 0px solid transparent;
}

[contenteditable]:empty:before {
    color: #999999;
    content: attr(placeholder);
}

li {
    cursor: pointer;
}
</style>
