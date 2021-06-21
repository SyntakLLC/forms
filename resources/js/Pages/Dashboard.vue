<template>
    <app-layout>
        <!-- Initialized -->
        <div v-if="$page.props.site.initialized" class="h-full">
            <div class="flex items-center flex-shrink-0 border-b border-gray-200">

                <div class="w-full bg-white border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8 lg:fixed lg:mt-16 z-20">
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
                                :class="showingAccentColorDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-expanded="false">
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
                            <div v-show="showingAccentColorDropdown" class="absolute z-10 left-3/4 transform -translate-x-1/2 mt-3 px-2 w-screen max-w-xs sm:px-0">
                                <div class="w-1/2 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white">
<!--                                    <div class="relative grid gap-6 bg-white px-1 py-1 sm:gap-8 sm:p-8">-->
                                        <chrome-picker :value="colors" @input="updateColor" />
<!--                                    </div>-->
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Cover photo dropdown -->
                    <div v-show="this.layout !== 5" class="relative mt-2 sm:mt-0 sm:ml-3">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="showingCoverPhotoDropdown=!showingCoverPhotoDropdown; showingLayoutDropdown=false; showingAccentColorDropdown=false; showingSocialDropdown=false"
                                :class="showingCoverPhotoDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-expanded="false">
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

<!--                                        <a @click="removePhoto" v-if="$page.props.site.cover_photo_url" href="#" class="block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 font-medium text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Remove Photo</a>-->

                                    </div>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Layout dropdown -->
                    <div class="relative mt-2 sm:mt-0 sm:ml-3">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="showingLayoutDropdown=!showingLayoutDropdown; showingCoverPhotoDropdown=false; showingAccentColorDropdown=false; showingSocialDropdown=false"
                                :class="showingLayoutDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-expanded="false">
                            <span>Change Layout</span>

                            <svg class="text-gray-400 ml-2 h-5 w-5 group-hover:text-gray-500"
                                 :class="showingLayoutDropdown ? 'text-gray-600' : 'text-gray-400'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>


                        <!--New Question dropdown-->
                        <transition
                            enter-active-class="transition ease-out duration-300"
                            enter-class="opacity-0"
                            enter-to-class="opacity-100"
                            leave-active-class="transition ease-in duration-200"
                            leave-class="opacity-100"
                            leave-to-class="opacity-0">
                            <div class="fixed z-10 inset-0 overflow-y-auto " v-show="showingLayoutDropdown">
                                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                                        <div @click="showingLayoutDropdown=!showingLayoutDropdown" class="absolute inset-0 bg-gray-500 opacity-75"></div>
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

                                        <div v-show="showingLayoutDropdown"
                                             class="z-20 inline-block align-bottom rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6 left-1/2 transform mt-3 mx-2 max-w-md sm:px-0 lg:max-w-3xl">

                                            <div class="hidden sm:block absolute top-0 right-0 pt-10 pr-4">
                                                <button @click="showingLayoutDropdown=!showingLayoutDropdown"
                                                        type="button" class="rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                                                                    Change Layout
                                                                </span>
                                                            </span>
                                                    <span class="mt-1 block text-sm text-gray-500">
                                                                More layouts will be coming soon!
                                                            </span>
                                                </div>
                                                <div class="relative bg-white">
                                                    <div class="min-h-full flex overflow-hidden w-full">
                                                        <div class="max-w-7xl py-8 px-4 sm:px-6 bg-white w-full">

                                                            <div class="">
                                                                <div class="">
                                                                    <div class="space-y-12">

                                                                        <ul class="gap-x-6 gap-y-12 space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-3">

                                                                            <!-- Top align -->
                                                                            <li @click="updateLayout(3)" class="hover:opacity-90">
                                                                                <div class="space-y-4">
                                                                                    <div class="aspect-w-3 aspect-h-2">
                                                                                        <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.standard" alt="">
                                                                                    </div>

                                                                                    <div class="space-y-2">
                                                                                        <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                                                            <h3>Standard</h3>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <!-- Mobile-first -->
                                                                            <li @click="updateLayout(4)" class="hover:opacity-90">
                                                                                <div class="space-y-4">
                                                                                    <div class="aspect-w-3 aspect-h-2">
                                                                                        <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.mobileProfile" alt="">
                                                                                    </div>

                                                                                    <div class="space-y-2">
                                                                                        <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                                                            <h3>Mobile Profile</h3>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <!-- Minimalist -->
                                                                            <li @click="updateLayout(5)" class="hover:opacity-90">
                                                                                <div class="space-y-4">
                                                                                    <div class="aspect-w-3 aspect-h-2">
                                                                                        <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.minimalist" alt="">
                                                                                    </div>

                                                                                    <div class="space-y-2">
                                                                                        <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                                                            <h3>Minimalist</h3>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <!-- Left align -->
                                                                            <li @click="updateLayout(2)" class="hover:opacity-90">
                                                                                <div class="space-y-4">
                                                                                    <div class="aspect-w-3 aspect-h-2">
                                                                                        <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.brandedLeft" alt="">
                                                                                    </div>

                                                                                    <div class="space-y-2">
                                                                                        <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                                                            <h3>Branded Left</h3>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </li>

                                                                            <!-- Right align -->
                                                                            <li @click="updateLayout(1)" class="hover:opacity-90">
                                                                                <div class="space-y-4">
                                                                                    <div class="aspect-w-3 aspect-h-2">
                                                                                        <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.brandedRight" alt="">
                                                                                    </div>

                                                                                    <div class="space-y-2">
                                                                                        <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                                                            <h3>Branded Right</h3>
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
                                            </div>
                                        </div>
                                    </transition>
                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Social media dropdown -->
                    <div class="relative mt-2 sm:mt-0 sm:ml-3">
                        <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                        <button @click="showingSocialDropdown=!showingSocialDropdown; showingLayoutDropdown=false; showingAccentColorDropdown=false; showingCoverPhotoDropdown=false"
                                :class="showingSocialDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-expanded="false">
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
                                            <input v-model="updateSocialForm.facebook" type="text" name="url" id="url1" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.facebook.com/yourpage">
                                        </div>
                                    </div>

                                    <!-- Instagram -->
                                    <div class="mt-3">
                                        <label class="block text-sm font-medium text-gray-700">Instagram</label>
                                        <div class="mt-1">
                                            <input v-model="updateSocialForm.instagram" type="text" name="url" id="url2" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.instagram.com/yourpage">
                                        </div>
                                    </div>

                                    <!-- Twitter -->
                                    <div class="mt-3">
                                        <label class="block text-sm font-medium text-gray-700">Twitter</label>
                                        <div class="mt-1">
                                            <input v-model="updateSocialForm.twitter" type="text" name="url" id="url3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.twitter.com/yourpage">
                                        </div>
                                    </div>

                                    <button type="submit" class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        {{ updateSocialForm.recentlySuccessful ? "Saved" : updateSocialForm.processing ? "Saving..." : "Save" }}
                                    </button>

                                    </form>

                                </div>
                            </div>
                        </transition>
                    </div>

                    <!-- Change domain & Preview -->
                    <div class="mt-4 flex sm:mt-0 sm:ml-4">
                        <button @click="showingChangeDomainModal=!showingChangeDomainModal" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Customize Domain
                        </button>

<!--                        <inertia-link :href="route('site.show', $page.props.site.uuid)"-->
<!--                                      class="truncate hover:text-gray-600 block">-->
                            <inertia-link :href="route('site.show', $page.props.site.slug)" type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:order-1 ml-3">
                                Preview
                            </inertia-link>
<!--                        </inertia-link>-->
                    </div>

                    <!--the change domain modal-->
                    <transition
                        enter-active-class="transition ease-out duration-300"
                        enter-class="opacity-0"
                        enter-to-class="opacity-100"
                        leave-active-class="transition ease-in duration-200"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0">
                        <div class="fixed z-50 inset-0 overflow-y-auto " v-show="showingChangeDomainModal">
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
                                    <div v-if="showingChangeDomainModal"
                                         class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                                        <form @submit.prevent="tryToUpdateDomain">
                                            <div class="sm:flex sm:items-start">
                                                <div
                                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 text-blue-600 :mx-0 sm:h-10 sm:w-10">
                                                    <!-- Heroicon name: outline/exclamation -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                                                    </svg>
                                                </div>
                                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full flex-col">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900 block" id="modal-title">
                                                        Change Domain
                                                    </h3>
                                                    <div class="mt-2 block">

                                                        <div>
                                                            <!--                                                        <label for="company_website" class="block text-sm font-medium text-gray-700">-->
                                                            <!--                                                            Company Website-->
                                                            <!--                                                        </label>-->
                                                            <div class="mt-1 flex rounded-md shadow-sm">
                                                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                                              about.contact/
                                                            </span>
                                                                <input v-model="wantsThisNewDomain" type="text" name="company_website" id="company_website" class="flex-1 min-w-0 block w-full px-3 py-2 pr-10 rounded-none rounded-r-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300" :class="this.initialSiteUUID === this.possiblyChangedSiteUUID ? 'border-red-300' : 'border-gray-300'" :placeholder="site.slug">
                                                            </div>
                                                            <p v-show="errors.slug" class="mt-2 text-sm text-red-600" id="email-error">This domain ending has already been taken.</p>
                                                        </div>



                                                        <!--                                                    <p class="text-sm text-gray-500">-->
                                                        <!--                                                        Are you sure you want to delete this form? Any leads generated from-->
                                                        <!--                                                        this form will not be deleted. This action cannot be undone.-->
                                                        <!--                                                    </p>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                                <button type="submit"
                                                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                    {{ domainSavingText }}
                                                </button>
                                                <button @click="showingChangeDomainModal=!showingChangeDomainModal"
                                                        type="button"
                                                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </transition>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>

            <div class="flex overflow-hidden bg-white">
                <!-- Main column -->
                <div class="flex flex-col w-0 flex-1 overflow-hidden">
                    <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">

                        <!-- Notifications -->
                        <div aria-live="assertive" class="fixed sm:relative inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start z-30">
                            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">

                                <!-- Billing notif -->
                                <transition
                                    enter-active-class="transform ease-out duration-300 transition"
                                    enter-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                                    enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                                    leave-active-class="transition ease-in duration-100"
                                    leave-class="opacity-100"
                                    leave-to-class="opacity-0">
                                    <div v-show="showingBillingNotification" class="sm:mt-12 max-w-sm sm:absolute w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                        <div class="p-4">
                                            <div class="flex items-center">
                                                <div class="w-0 flex-1 flex justify-between">
                                                    <p class="w-0 flex-1 text-sm font-medium text-gray-900">
                                                        Your billing plan is inactive. Your site will remain offline <a :href="route('spark.portal')" class="font-medium text-blue-600 hover:underline">until you resubscribe.</a>
                                                    </p>
                                                    <!--                                                    <button @click="dontShowNotifAgain" class="ml-3 flex-shrink-0 bg-white rounded-md text-sm font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">-->
                                                    <!--                                                        Don't Show Again-->
                                                    <!--                                                    </button>-->
                                                </div>
                                                <div class="ml-4 flex-shrink-0 flex">
                                                    <button @click="showingBillingNotification=!showingBillingNotification" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
                        <div aria-live="assertive" class="fixed sm:relative inset-0 flex items-end px-4 py-6 pointer-events-none sm:px-6 sm:py-0 sm:items-start z-30">
                            <div class="w-full flex flex-col items-center space-y-4 sm:items-end">
                            <!-- Autosave notif -->
                            <transition
                                enter-active-class="transform ease-out duration-300 transition"
                                enter-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                                enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                                leave-active-class="transition ease-in duration-100"
                                leave-class="opacity-100"
                                leave-to-class="opacity-0">
                                <div v-show="showingAutosaveNotification && !showingBillingNotification" class="sm:mt-6 max-w-sm sm:absolute w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                                    <div class="p-4">
                                        <div class="flex items-center">
                                            <div class="w-0 flex-1 flex justify-between">
                                                <p class="w-0 flex-1 text-sm font-medium text-gray-900">
                                                    Any changes you make will automatically be saved.
                                                </p>
                                                <button @click="dontShowNotifAgain" class="ml-3 flex-shrink-0 bg-white rounded-md text-sm font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    Don't Show Again
                                                </button>
                                            </div>
                                            <div class="ml-4 flex-shrink-0 flex">
                                                <button @click="showingAutosaveNotification=!showingAutosaveNotification" class="bg-white rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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

                                <!-- Background Image -->
                                <div class="lg:absolute bg-white lg:inset-0 z-0">
                                    <!--Cover photo-->
                                    <div class="lg:fixed lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-56 overflow-hidden lg:h-screen"
                                         :class="layout===1 ? 'lg:right-0' : 'lg:left-0'">
                                        <img class="h-56 w-full object-cover lg:absolute lg:h-full" :src="site.cover_photo" />

                                        <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:mt-20 -mt-56">
                                            <img class="h-40 w-40 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Actual Content -->
                                <div class="relative py-4 md:py-8 px-4 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
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
                                                                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm"
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

                                            <!-- Make a new form -->
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
                                                            <span class="block text-base text-center text-blue-600 font-semibold tracking-wide uppercase" :style="'color: ' + colors">Welcome</span>
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
                                                        <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                                            <div>
                                                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                                                <div class="mt-1">
                                                                    <input v-model="submitContactForm.firstName" type="text" name="first_name" id="first_name" autocomplete="given-name" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                                                <div class="mt-1">
                                                                    <input v-model="submitContactForm.lastName" type="text" name="last_name" id="last_name" autocomplete="family-name" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                                                </div>
                                                            </div>
                                                            <div class="sm:col-span-2">
                                                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                                <div class="mt-1">
                                                                    <input v-model="submitContactForm.email" id="email" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                                                </div>
                                                            </div>
                                                            <div class="sm:col-span-2">
                                                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                                                <div class="mt-1 relative rounded-md shadow-sm">
                                                                    <input v-model="submitContactForm.phone" type="text" name="phone_number" id="phone_number" autocomplete="tel" class="py-3 px-4 block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md" placeholder="+1 (555) 987-6543">
                                                                </div>
                                                            </div>
                                                            <div class="sm:col-span-2">
                                                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                                                <div class="mt-1">
                                                                    <textarea v-model="submitContactForm.message" id="message" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="sm:col-span-2">
                                                                <button class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                                                        :style="'background: ' + colors">
                                                                    Let's talk
                                                                </button>
                                                            </div>
                                                        </div>
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
                            <!--Background Image-->
                            <div class="z-0">
                                <!--Cover photo-->
                                <div>
                                    <img class="h-64 w-full object-cover lg:h-96 lg:fixed lg:-mt-96" :src="site.cover_photo" />
                                </div>

                            </div>

                            <div class="bg-white lg:relative lg:mt-96 lg:pt-16 lg:z-10">

                            <!--Profile Picture-->
                            <div class="-mt-16 lg:-mt-32 flex space-x-5 justify-center flex-col">
                                <div class="flex justify-center content-center">
                                    <img class="z-30 justify-self-center items-center h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32 object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                </div>
                            </div>

                            <!--Name and message-->
                            <div class="relative pb-1 px-4 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:w-1/2 justify-center">
                                <div class="2xl:block mt-3 min-w-0 flex-1">
                                    <h1 class="text-2xl font-bold text-gray-900 truncate text-center">
                                        {{ $page.props.user.name }}
                                    </h1>

                                    <div class="items-end">
                                        <p contenteditable placeholder="Message (optional)" @input="updateMessage" class="font-medium mt-4 text-lg text-gray-500 sm:mt-3 text-center">
                                            {{$page['props']['site']['message']}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!--Forms-->
                            <div class="relative pb-8 px-4 sm:pb-12 sm:px-6 lg:px-8 md:max-w-7xl md:mx-auto md:pb-16 lg:w-1/2 md:w-3/4 justify-center pt-4 sm:pt-6 lg:pt-8">
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
                                                                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm"
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
                                            <span class="block text-base text-center text-blue-600 font-semibold tracking-wide uppercase" :style="'color: ' + colors">Welcome</span>
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
                                        <div class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                                            <div>
                                                <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                                                <div class="mt-1">
                                                    <input v-model="submitContactForm.firstName" type="text" name="first_name" id="first_name2" autocomplete="given-name" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                            <div>
                                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                                                <div class="mt-1">
                                                    <input v-model="submitContactForm.lastName" type="text" name="last_name" id="last_name2" autocomplete="family-name" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                                <div class="mt-1">
                                                    <input v-model="submitContactForm.email" id="email2" name="email" type="email" autocomplete="email" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                                <div class="mt-1 relative rounded-md shadow-sm">
                                                    <input v-model="submitContactForm.phone" type="text" name="phone_number" id="phone_number2" autocomplete="tel" class="py-3 px-4 block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md" placeholder="+1 (555) 987-6543">
                                                </div>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                                                <div class="mt-1">
                                                    <textarea v-model="submitContactForm.message" id="message2" name="message" rows="4" class="py-3 px-4 block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md"></textarea>
                                                </div>
                                            </div>

                                            <div class="sm:col-span-2">
                                                <button class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                                                        :style="'background: ' + colors">
                                                    Let's talk
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>

                        <!-- Mobile Profile -->
                        <div v-if="this.layout === 4" :style="'background-color: ' + colors">
                            <div class="flex-col mx-auto min-h-screen font-medium leading-6 text-gray-700 bg-white"
                                 style="max-width: 600px;">

                                <!-- Cover photo, profile photo, social links -->
                                <div class="leading-6 box-border">
                                    <div class="mb-6 text-gray-700 box-border">
                                        <img
                                            :src="site.cover_photo"
                                            loading="Loading..."
                                            alt="Background Photo"
                                            sizes="(max-width: 767px) 100vw, 600px"
                                            class="inline-block object-cover w-full max-w-full h-40 align-middle border-0 box-border"
                                        />
                                        <div class="px-12 mx-auto w-full" style="max-width: 648px;">
                                            <div class="flex justify-between items-end mb-6 -mt-12 box-border">
                                                <div class="box-border">
                                                    <img
                                                        :src="$page.props.user.profile_photo_url"
                                                        loading="Loading..."
                                                        alt="Profile Photo"
                                                        class="inline-block object-cover mr-3 -ml-px w-24 max-w-full h-24 align-middle border-2 border-white border-solid"
                                                        style="border-radius: 14px;"
                                                    />
                                                </div>
                                                <div class="flex items-center -mx-3 box-border">
                                                    <div
                                                        v-show="$page.props.site.facebook !== null || $page.props.site.instagram !== null || $page.props.site.twitter !== null"
                                                        class="flex justify-center space-x-6">
                                                        <a v-show="$page.props.site.facebook !== null" target="_blank"
                                                           :href="facebookHttps === 'https://' ? $page.props.site.facebook : facebookHttp === 'http://' ? $page.props.site.facebook : '//' + $page.props.site.facebook"
                                                           class="text-gray-700">
                                                            <span class="sr-only">Facebook</span>
                                                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"
                                                                 aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                      d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                                      clip-rule="evenodd"/>
                                                            </svg>
                                                        </a>

                                                        <a v-show="$page.props.site.instagram !== null" target="_blank"
                                                           :href="instagramHttps === 'https://' ? $page.props.site.instagram : instagramHttp === 'http://' ? $page.props.site.instagram : '//' + $page.props.site.instagram"
                                                           class="text-gray-700">
                                                            <span class="sr-only">Instagram</span>
                                                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"
                                                                 aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                      d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                                      clip-rule="evenodd"/>
                                                            </svg>
                                                        </a>

                                                        <a v-show="$page.props.site.twitter !== null" target="_blank"
                                                           :href="twitterHttps === 'https://' ? $page.props.site.twitter : twitterHttp === 'http://' ? $page.props.site.twitter : '//' + $page.props.site.twitter"
                                                           class="text-gray-700">
                                                            <span class="sr-only">Twitter</span>
                                                            <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"
                                                                 aria-hidden="true">
                                                                <path
                                                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Name & Message -->
                                <div class="pb-12 leading-6 box-border">
                                    <div class="text-gray-700 box-border">
                                        <div class="px-12 mx-auto w-full" style="max-width: 648px;">
                                            <div class="box-border">
                                                <h1
                                                    class="mx-0 mt-0 mb-2 font-sans text-5xl font-normal tracking-tighter text-black box-border"
                                                    style="line-height: 1.1;"
                                                >
                                                    {{ $page.props.user.name }}
                                                </h1>
                                                <div contenteditable placeholder="Message (optional)"
                                                     @input="updateMessage" class="box-border">
                                                    {{ $page.props.site.message }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Forms -->
                                <div class="pb-12 leading-6 box-border">
                                    <div class="px-12 mx-auto w-full text-gray-700" style="max-width: 648px;">
                                        <div
                                            class="flex justify-between items-center pb-3 mb-6 border-b border-gray-400 border-solid box-border"
                                        >
                                            <h2
                                                class="my-0 font-sans text-base tracking-normal text-black box-border"
                                                style="line-height: 1.35;"
                                            >
                                                Forms
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="overflow-hidden relative w-full text-gray-700 box-border">
                                        <div class="flex overflow-scroll items-start py-px px-12">
                                            <!-- Make a new form -->
                                            <div class="flex flex-col flex-none self-stretch pr-6 w-11/12">
                                                <a
                                                    :href="route('form.index')"
                                                    class="inline-block overflow-hidden w-full max-w-full text-sm text-black no-underline  cursor-pointer box-border hover:text-black hover:no-underline border-dashed border-2 rounded-md hover:bg-gray-100"
                                                    style="border-radius: 14px; transition: transform 150ms ease-in-out 0s, -webkit-transform 150ms ease-in-out 0s;"
                                                >
                                                    <div class="flex-1 p-6">
                                                        <div class="mb-4 box-border">
                                                            <h2
                                                                class="mt-0 mb-1 font-sans text-2xl font-normal tracking-tight leading-tight"
                                                            >
                                                                Make a New Form
                                                            </h2>
                                                            <!--                                                            <div class="leading-5 box-border">-->
                                                            <!--                                                                Display your physical products through this beautiful template-->
                                                            <!--                                                                made for Photoshop, Sketch &amp; Figma.-->
                                                            <!--                                                            </div>-->
                                                        </div>
                                                        <div class="flex items-center w-full box-border">
                                                            <div
                                                                class="inline-block py-1 px-4 mr-5 font-semibold leading-5 text-center text-white bg-black border-2 border-black border-solid hover:shadow-xs hover:text-white"
                                                                style="border-radius: 40px; transition: box-shadow 200ms ease-in-out 0s;"
                                                            >
                                                                Go
                                                            </div>
                                                            <!--                                                            <div class="leading-5 box-border">$22</div>-->
                                                        </div>
                                                    </div>
                                                </a
                                                >
                                            </div>

                                            <!-- List of forms -->
                                            <div v-for="(form) in $page['props']['forms']"
                                                 @click="$inertia.get(route('form.edit', form.uuid))"
                                                 class="flex flex-col flex-none self-stretch pr-6 w-11/12">
                                                <a
                                                    :href="route('form.edit', form.uuid)"
                                                    class="inline-block overflow-hidden w-full max-w-full text-sm text-black no-underline  cursor-pointer box-border hover:text-black hover:no-underline"
                                                    :style="'background-color: ' + colors"
                                                    style="border-radius: 14px; transition: transform 150ms ease-in-out 0s, -webkit-transform 150ms ease-in-out 0s;"
                                                >
                                                    <div class="flex-1 p-6">
                                                        <div class="mb-4 box-border">
                                                            <h2
                                                                class="mt-0 mb-1 font-sans text-2xl font-normal tracking-tight leading-tight"
                                                            >
                                                                {{ form.title }}
                                                            </h2>
                                                            <!--                                                            <div class="leading-5 box-border">-->
                                                            <!--                                                                Display your physical products through this beautiful template-->
                                                            <!--                                                                made for Photoshop, Sketch &amp; Figma.-->
                                                            <!--                                                            </div>-->
                                                        </div>
                                                        <div class="flex items-center w-full box-border">
                                                            <div
                                                                class="inline-block py-1 px-4 mr-5 font-semibold leading-5 text-center text-white bg-black border-2 border-black border-solid hover:shadow-xs hover:text-white"
                                                                style="border-radius: 40px; transition: box-shadow 200ms ease-in-out 0s;"
                                                            >
                                                                Go
                                                            </div>
                                                            <!--                                                            <div class="leading-5 box-border">$22</div>-->
                                                        </div>
                                                    </div>
                                                </a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="pb-6 leading-6 box-border">
                                    <div class="px-12 mx-auto w-full text-gray-700" style="max-width: 648px;">
                                        <div class="box-border">
                                            <div
                                                class="flex justify-between items-center pb-3 mb-6 border-b border-gray-400 border-solid box-border">
                                                <h2
                                                    class="my-0 font-sans text-base tracking-normal text-black box-border"
                                                    style="line-height: 1.35;"
                                                >
                                                    Welcome
                                                </h2>
                                            </div>
                                            <div
                                                class="flex justify-between items-center pb-10 mb-6 border-b border-gray-400 border-solid box-border">
                                                <div class="box-border" style="list-style: outside none none;">
                                                    <h3
                                                        class="mt-0 mb-2 font-sans text-2xl font-normal tracking-tight text-black box-border"
                                                        style="line-height: 1.2; list-style: outside none none;"
                                                    >
                                                            <span
                                                                contenteditable placeholder="Title" @input="updateTitle"
                                                                class="tracking-tighter leading-7 no-underline bg-transparent border-b-2 border-transparent border-solid box-border"
                                                                style="transition: border-color 200ms ease-in-out 0s, color 200ms ease-in-out 0s; list-style: outside none none;"
                                                            >{{ $page.props.site.section_header }}</span
                                                            >
                                                    </h3>
                                                    <div contenteditable placeholder="Content" @input="updateContent"
                                                         class="box-border">{{ $page.props.site.section_content }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact Us! -->
                                <div
                                    id="Get-in-Touch"
                                    class="pb-12 font-medium leading-6 text-gray-700 box-border"
                                >
                                    <div class="px-12 mx-auto w-full leading-6" style="max-width: 648px;">
                                        <div class="mb-8 text-gray-700 box-border">
                                            <h2
                                                class="mt-0 mb-2 font-sans text-3xl font-normal tracking-tight text-black box-border"
                                                style="line-height: 1.1;"
                                            >
                                                Contact Me
                                            </h2>
                                            <div class="box-border">
                                                If you'd rather just open a line of communication instead of filling out
                                                forms, feel free to do so here.
                                            </div>
                                        </div>
                                        <div class="mx-0 mt-0 mb-4 text-gray-700 box-border">
                                            <form
                                                id="wf-form-Message-Form"
                                                name="wf-form-Message-Form"
                                                data-name="Message Form"
                                                class="grid gap-4 box-border"
                                                style="justify-items: start; grid-auto-columns: 1fr; grid-template-columns: 1fr; grid-template-rows: auto auto;"
                                            >
                                                <div
                                                    class="grid gap-4 w-full box-border"
                                                    style="grid-template-columns: 1fr 1fr; grid-auto-columns: 1fr; grid-template-rows: auto;"
                                                >
                                                    <div class="w-full box-border">
                                                        <label
                                                            for="name-1"
                                                            class="block mb-1 text-sm cursor-default box-border"
                                                            style="line-height: 1.1;"
                                                        >First Name</label
                                                        ><input
                                                        v-model="submitContactForm.firstName"
                                                        type="text"
                                                        placeholder="First"
                                                        class="block py-2 px-5 m-0 w-full h-12 text-sm text-gray-800 align-middle bg-gray-200 border border-gray-400 border-none cursor-text box-border focus:bg-gray-200 focus:border-blue-500"
                                                        :style="'background-color: ' + colors"
                                                        maxlength="256"
                                                        name="name-1"
                                                        data-name="Name 1"
                                                        id="name-1"
                                                        style="line-height: 1.42857; border-radius: 14px;"
                                                    />
                                                    </div>
                                                    <div class="w-full box-border">
                                                        <label
                                                            for="name-2"
                                                            class="block mb-1 text-sm cursor-default box-border"
                                                            style="line-height: 1.1;"
                                                        >Last Name</label
                                                        ><input
                                                        v-model="submitContactForm.lastName"
                                                        type="text"
                                                        placeholder="Last"
                                                        class="block py-2 px-5 m-0 w-full h-12 text-sm text-gray-800 align-middle bg-gray-200 border border-gray-400 border-none cursor-text box-border focus:bg-gray-200 focus:border-blue-500"
                                                        :style="'background-color: ' + colors"
                                                        maxlength="256"
                                                        name="name-2"
                                                        data-name="Name 2"
                                                        id="name-2"
                                                        required=""
                                                        style="line-height: 1.42857; border-radius: 14px;"
                                                    />
                                                    </div>
                                                </div>


                                                <div class="w-full box-border">
                                                    <label
                                                        for="name-2"
                                                        class="block mb-1 text-sm cursor-default box-border"
                                                        style="line-height: 1.1;"
                                                    >Email</label
                                                    ><input
                                                    v-model="submitContactForm.email"
                                                    type="email"
                                                    placeholder="Email"
                                                    class="block py-2 px-5 m-0 w-full h-12 text-sm text-gray-800 align-middle bg-gray-200 border border-gray-400 border-none cursor-text box-border focus:bg-gray-200 focus:border-blue-500"
                                                    :style="'background-color: ' + colors"
                                                    maxlength="256"
                                                    name="email"
                                                    data-name="Email"
                                                    id="email-2"
                                                    required=""
                                                    style="line-height: 1.42857; border-radius: 14px;"
                                                />
                                                </div>

                                                <div class="w-full box-border">
                                                    <label
                                                        for="name-2"
                                                        class="block mb-1 text-sm cursor-default box-border"
                                                        style="line-height: 1.1;"
                                                    >Phone Number</label
                                                    ><input
                                                    v-model="submitContactForm.phone"
                                                    type="phone"
                                                    class="block py-2 px-5 m-0 w-full h-12 text-sm text-gray-800 align-middle bg-gray-200 border border-gray-400 border-none cursor-text box-border focus:bg-gray-200 focus:border-blue-500"
                                                    :style="'background-color: ' + colors"
                                                    maxlength="256"
                                                    name="phone"
                                                    placeholder="Phone"
                                                    data-name="Phone"
                                                    id="phone"
                                                    required=""
                                                    style="line-height: 1.42857; border-radius: 14px;"
                                                />
                                                </div>

                                                <div class="w-full box-border">
                                                    <label
                                                        for="Message"
                                                        class="block mb-1 text-sm cursor-default box-border"
                                                        style="line-height: 1.1;"
                                                    >Message</label
                                                    ><textarea
                                                    maxlength="5000"
                                                    id="field-2"
                                                    placeholder="Message"
                                                    name="field-2"
                                                    data-name="Field 2"
                                                    class="block overflow-auto p-5 m-0 w-full h-auto text-sm text-gray-800 align-middle whitespace-pre-wrap bg-gray-200 border border-gray-400 border-solid cursor-text box-border focus:bg-white focus:border-blue-500"
                                                    :style="'background-color: ' + colors"
                                                    style="line-height: 1.42857; min-height: 120px; border-radius: 14px; overflow-wrap: break-word;"
                                                ></textarea>
                                                </div>
                                                <input
                                                    type="submit"
                                                    value="Submit"
                                                    data-wait="Please wait..."
                                                    class="inline-block px-5 pt-3 pb-2 m-0 text-base font-semibold leading-5 text-center text-white no-underline whitespace-pre bg-black border-2 border-black border-solid cursor-pointer hover:shadow-xs hover:text-white"
                                                    style="border-radius: 40px; transition: box-shadow 200ms ease-in-out 0s;"
                                                />
                                            </form>
                                            <div
                                                class="hidden p-5 text-center text-black bg-gray-200 box-border"
                                                :style="'background-color: ' + colors"
                                                style="border-radius: 10px;"
                                            >
                                                <div class="box-border">
                                                    Thank you! Your submission has been received!
                                                </div>
                                            </div>
                                            <div
                                                class="hidden p-2 mt-2 text-sm text-center text-white bg-black box-border"
                                                style="border-radius: 10px;"
                                            >
                                                <div class="box-border">
                                                    Oops! Something went wrong while submitting the form.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Minimalist -->
                        <div v-if="this.layout === 5" class="bg-gray-50" :style="cssProps">
                            <div
                                style="grid-auto-rows: 1fr; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 5vh 4vw; padding-top: 0vh; padding-bottom: 5vh; grid-auto-columns: 1fr;"
                                class=" sm:grid sm:grid-flow-col sm:h-auto sm:min-h-screen sm:leading-6 text-gray-800 items-center justify-center"
                            >

                                <!-- Profile Photo Mobile -->
                                <div class="sm:hidden pb-4 lg:absolute lg:inset-0 z-0">
                                    <!--Cover photo-->
                                    <div class="lg:fixed lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-56 overflow-hidden lg:h-screen"
                                         :class="layout===1 ? 'lg:right-0' : 'lg:left-0'">
                                        <img class="h-56 w-full object-cover lg:absolute lg:h-full" :src="$page.props.user.profile_photo_url" alt="Profile Photo" />
                                    </div>
                                </div>

                                <!-- Profile Photo Desktop -->
                                <div
                                    id="w-node-e780bffd-1b1e-cec8-6962-aa84e68fe8a1-e83ee4b6"
                                    class="hidden sm:block flex relative flex-col row-span-1 justify-center"
                                    style="grid-area: span 2 / span 1 / span 2 / span 1;"
                                >
                                    <div class="relative box-border">
                                        <div
                                            data-w-id="961a2f2d-fa59-7add-ca52-35b650a7274e"
                                            style="width: 100%; height: 5px; background-color: rgba(0, 0, 0, 0); top: 48%;"
                                            class="absolute w-full h-1 bg-white box-border"
                                        ></div>
                                        <img
                                            :src="$page.props.user.profile_photo_url"
                                            loading="Loading..."
                                            width="320"
                                            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; z-index: 1;"
                                            data-w-id="feab8d6b-cfb1-ded5-4a2a-9b18c078d245"
                                            alt="Profile Photo"
                                            class="inline-block max-w-full align-middle border-0 opacity-100"
                                        />
                                    </div>
                                </div>

                                <!-- Name -->
                                <div
                                    id="w-node-_8b30c3db-b8b0-e584-26e9-b3f745ae2b61-e83ee4b6"
                                    class="px-9 sm:px-0 flex relative flex-col row-span-1 justify-center items-start"
                                    style="place-self: end start;"
                                >
                                    <div
                                        data-w-id="ac85ee92-2652-8b4f-ebd3-7848d8555e94"
                                        style="width: 100%; height: 5px; background-color: rgba(0, 0, 0, 0);"
                                        class="w-full h-1 bg-white box-border"
                                    ></div>
                                    <div
                                        data-w-id="12e3718c-bed6-7828-7d45-4289f2524471"
                                        style="opacity: 1;"
                                        class="opacity-100 box-border"
                                    >
                                        <h1
                                            data-w-id="51fe3e59-5c71-b028-8a26-5448d27eaf8e"
                                            class="mx-0 mt-0 mb-2 text-5xl font-bold tracking-tight text-left"
                                            style="line-height: 100%;"
                                        >
                                            {{ user.name.split(" ")[0] }}
                                            <strong
                                                class="px-1 text-5xl font-extrabold tracking-tighter text-gray-100 bg-gray-900 rounded-sm box-border"
                                                :style="'line-height: 51.2px; background-color:' + this.colors"
                                            >{{ user.name.split(" ")[1] }}</strong
                                            >
                                        </h1>
                                        <div class="flex items-center box-border">
                                            <div
                                                v-show="$page.props.site.facebook !== null || $page.props.site.instagram !== null || $page.props.site.twitter !== null"
                                                class="flex justify-center space-x-3">
                                                <a v-show="$page.props.site.facebook !== null" target="_blank"
                                                   :href="facebookHttps === 'https://' ? $page.props.site.facebook : facebookHttp === 'http://' ? $page.props.site.facebook : '//' + $page.props.site.facebook"
                                                   class="text-gray-700">
                                                    <span class="sr-only">Facebook</span>
                                                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"
                                                         aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                              d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </a>

                                                <a v-show="$page.props.site.instagram !== null" target="_blank"
                                                   :href="instagramHttps === 'https://' ? $page.props.site.instagram : instagramHttp === 'http://' ? $page.props.site.instagram : '//' + $page.props.site.instagram"
                                                   class="text-gray-700">
                                                    <span class="sr-only">Instagram</span>
                                                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"
                                                         aria-hidden="true">
                                                        <path fill-rule="evenodd"
                                                              d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                                              clip-rule="evenodd"/>
                                                    </svg>
                                                </a>

                                                <a v-show="$page.props.site.twitter !== null" target="_blank"
                                                   :href="twitterHttps === 'https://' ? $page.props.site.twitter : twitterHttp === 'http://' ? $page.props.site.twitter : '//' + $page.props.site.twitter"
                                                   class="text-gray-700">
                                                    <span class="sr-only">Twitter</span>
                                                    <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 24 24"
                                                         aria-hidden="true">
                                                        <path
                                                            d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div
                                    id="w-node-_02336c61-71c8-dcdc-e77c-0342814f8ff1-e83ee4b6"
                                    class="px-9 sm:px-0 flex flex-col justify-center items-start max-h-screen"
                                    style="place-self: start;"
                                >
                                    <p
                                        contenteditable
                                        placeholder="Message"
                                        @input="updateMessage"
                                        data-w-id="252e3c3d-faf3-f1f0-14c2-47b370a669d2"
                                        style="opacity: 1; line-height: 150%;"
                                        class="mt-0 mb-5 text-lg opacity-100"
                                    >
                                        {{
                                            $page.props.site.message
                                        }}
                                    </p>
                                    <div
                                        data-w-id="b9bcebd4-1f2f-6829-6474-4dba689c215e"
                                        style="width: 160%; height: 5px; background-color: rgba(0, 0, 0, 0);"
                                        class="relative h-1 bg-white box-border"
                                    ></div>
                                </div>

                                <!-- Forms -->
                                <div
                                    class="px-9 sm:px-0 flex relative flex-col row-span-1 justify-center"
                                    style="grid-area: span 2 / span 1 / span 2 / span 1;"
                                >
                                    <div class="relative box-border">
                                        <div
                                            data-w-id="961a2f2d-fa59-7add-ca52-35b650a7274e"
                                            style="width: 100%; height: 5px; background-color: rgba(0, 0, 0, 0); top: 48%;"
                                            class="absolute w-full h-1 bg-white box-border"
                                        ></div>

                                            <!-- Make a New Form -->
                                            <div class="flex mb-4 items-baseline box-border">
                                                <div class="text-sm" style="min-width: 40px;">→</div>
                                                <a :href="route('form.index')" class="minimalistFormItem" :class="'flex items-center py-1 px-2 -ml-3 max-w-full text-lg font-medium tracking-tight no-underline bg-transparent rounded-sm cursor-pointer hover:text-gray-100'"
                                                      style="grid-auto-columns: 1fr; grid-template-columns: auto 1fr; grid-template-rows: auto; transition: background-color 400ms ease 0s, color 100ms ease 0s; line-height: 100%;">
                                                        <div class="leading-4 box-border">Make a New Form</div>
                                                    </a>
                                            </div>

                                            <!-- Forms -->
                                            <div v-for="(form, index) in $page.props.forms" class="flex mb-4 items-baseline box-border">
                                                <div class="text-sm" style="min-width: 40px;">{{index + 1 + '.'}}</div>
                                                <a
                                                    class="minimalistFormItem"
                                                    :href="route('form.edit', form.uuid)"
                                                    :class="'flex items-center py-1 px-2 -ml-3 max-w-full text-lg font-medium tracking-tight no-underline bg-transparent rounded-sm cursor-pointer hover:bg-gray-900 hover:text-gray-100'"
                                                    style="grid-auto-columns: 1fr; grid-template-columns: auto 1fr; grid-template-rows: auto; transition: background-color 400ms ease 0s, color 100ms ease 0s; line-height: 100%;"
                                                >
                                                    <div class="leading-4 box-border">{{ form.title }}</div>
                                                </a
                                                >
                                            </div>

                                            <!-- Email -->
                                            <div class="flex mb-4 items-baseline box-border">
                                                <div class="text-sm" style="min-width: 40px;">→</div>
                                                <span class="minimalistFormItem" :class="'flex items-center py-1 px-2 -ml-3 max-w-full text-lg font-medium tracking-tight no-underline bg-transparent rounded-sm cursor-pointer hover:text-gray-100'"
                                                      style="grid-auto-columns: 1fr; grid-template-columns: auto 1fr; grid-template-rows: auto; transition: background-color 400ms ease 0s, color 100ms ease 0s; line-height: 100%;">
                                                    <div class="leading-4 box-border">{{ $page.props.user.email }}</div>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <div class="max-w-7xl py-8 px-4 sm:px-6">

                    <div class="bg-white">
                        <div class="">
                            <div class="space-y-12">

                                <ul class="grid grid-cols-2 gap-x-6 gap-y-12 space-y-0 sm:grid sm:grid-cols-3 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 lg:grid-cols-4">

                                    <!-- Top align -->
                                    <li @click="createSite(3)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.standard" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Standard</h3>
                                                    <p class="text-blue-600">A standard site layout</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <!-- Mobile-first -->
                                    <li @click="createSite(4)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.mobileProfile" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Mobile Profile</h3>
                                                    <p class="text-blue-600">A mobile-first personal page</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <!-- Minimalist -->
                                    <li @click="createSite(5)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.minimalist" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Minimalist</h3>
                                                    <p class="text-blue-600">For a sleek, modern look</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <!-- Left align -->
                                    <li @click="createSite(2)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.brandedLeft" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Branded Left</h3>
                                                    <p class="text-blue-600">Let your brand stand out</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <!-- Right align -->
                                    <li @click="createSite(1)" class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2">
                                                <img class="object-cover shadow-sm rounded-lg border-gray-100 border" :src="$page.props.brandedRight" alt="">
                                            </div>

                                            <div class="space-y-2">
                                                <div class="text-lg leading-6 font-medium space-y-1 text-center">
                                                    <h3>Branded Right</h3>
                                                    <p class="text-blue-600">An alternative to branded-left</p>
                                                </div>

                                            </div>
                                        </div>
                                    </li>

                                    <!-- And More Soon -->
                                    <li class="hover:opacity-90">
                                        <div class="space-y-4">
                                            <div class="aspect-w-3 aspect-h-2 items-center rounded-lg cursor-default">
                                                <div class="text-lg leading-6 font-medium text-center items-end justify-end">
                                                    <h3 class="mt-20">More Templates Coming Soon!</h3>
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
    import Show from "@/Pages/Show";

    export default {
        components: {
            Show,
            AppLayout,
            Welcome,
            'chrome-picker': Chrome,
            'swatches-picker': Swatches,
        },

        props: ['user', 'site', 'logoImageURL', 'logoTextURL', 'errors', 'onTrial', 'subscribed'],

        data() {
            return {
                showingBillingNotification: this.onTrial===false && this.subscribed===false,
                timeoutId: 0,
                domainSavingText: "Save",
                wantsThisNewDomain: "",
                showingChangeDomainModal: false,
                initialSiteUUID: this.site.uuid,
                possiblyChangedSiteUUID: 0,
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

        watch: {
            site: {
                deep: true,
                handler: function(newVal, oldVal){
                    this.layout = newVal.layout;
                    this.colors = '#' + newVal.accent_color;
                    this.possiblyChangedSiteUUID = newVal.slug;
                }
            }
        },

        methods: {
            // attempts to update the user's domain
            async tryToUpdateDomain() {
                if (this.wantsThisNewDomain === "") {
                    this.possiblyChangedSiteUUID = this.initialSiteUUID;
                }
                else {
                    this.domainSavingText = "Saving..."

                    let data = {
                        'slug': this.wantsThisNewDomain,
                    }
                    // let response = await axios.post('/api/tryToUpdateDomain', data)
                    await this.$inertia.post('/tryToUpdateDomain/' + this.$page.props.site.slug, data)

                    if(!this.errors.slug) {
                        this.showingChangeDomainModal = false;
                    }

                    this.wantsThisNewDomain = "";
                    this.domainSavingText = "Save";
                }
            },

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
                this.showingLayoutDropdown = false;

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

                Vapor.store(this.$refs.photo.files[0], {
                    visibility: 'public-read'
                }).then(response => {
                    this.$inertia.post('/update-cover-picture', {
                        uuid: response.uuid,
                        key: response.key,
                        extension: response.extension
                    })
                });

                // let response = await axios.post('/api/update-cover-picture', {photo: this.$refs.photo.files[0]})
                // this.$inertia.post('update-cover-picture', {photo: this.$refs.photo.files[0]})
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
                clearTimeout(this.timeoutId)
                let data = {
                    'message': e.target.innerText,
                    'site': this.site.id,
                }
                this.timeoutId = setTimeout(async function() {
                    let response = await axios.post('/api/update-message', data)
                })
            },

            async updateContent(e) {
                clearTimeout(this.timeoutId)
                let data = {
                    'content': e.target.innerText,
                    'site': this.site.id,
                }
                this.timeoutId = setTimeout(async function() {
                    let response = await axios.post('/api/update-content', data)
                })
            },

            async updateTitle(e) {
                clearTimeout(this.timeoutId)
                let data = {
                    'title': e.target.innerText,
                    'site': this.site.id,
                }
                this.timeoutId = setTimeout(async function() {
                    let response = await axios.post('/api/update-section-header', data)
                })
            },
        },

        computed: {
            cssProps() {
                return {
                    '--bg-accent-color': this.colors,
                }
            }
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

[contenteditable]:hover {
    border-radius: 5px;
    box-shadow: 0px 0px 0px 2px #2563EB;
}

[contenteditable]:empty:before {
    color: #999999;
    content: attr(placeholder);
}

li {
    cursor: pointer;
}

.minimalistFormItem:hover {
    background-color: var(--bg-accent-color) !important;
}
</style>
