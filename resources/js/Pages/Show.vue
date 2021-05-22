<template>
    <div class="h-screen">
        <div class="h-full flex overflow-hidden bg-white">
            <!-- Main column -->
            <div class="flex flex-col w-0 flex-1 overflow-hidden">
                <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0">
                    <!-- Page title & actions -->
                    <div class="h-screen bg-white rounded-md">

                        <!--Left align and right align-->
                        <div v-if="this.layout === 1 || this.layout === 2" class="h-screen bg-white rounded-md">
                            <div class="relative ">
                                <div class="lg:absolute lg:inset-0">

                                    <!-- Pattern background -->
                                    <div v-if="$page.props.user.cover_photo_url==null"
                                         class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 lg:h-screen"
                                         :class="layout===1 ? 'lg:right-0 lg:fixed' : 'lg:left-0 lg:fixed'"
                                         :style="this.getURL"
                                         id="pattern">

                                        <div
                                            class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:fixed">
                                            <img
                                                class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md lg:fixed"
                                                :src="$page.props.user.profile_photo_url"
                                                :alt="$page.props.user.name"/>
                                        </div>
                                    </div>
                                    <!-- Cover photo -->
                                    <div v-else
                                         class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 overflow-hidden lg:h-screen"
                                         :class="layout===1 ? 'lg:right-0 lg:fixed' : 'lg:left-0 lg:fixed'">
                                        <img class="h-56 w-full object-cover lg:h-full lg:fixed"
                                             :src="'http://localhost:9600/forms-bucket/' + $page.props.user.cover_photo_url"/>

                                        <div
                                            class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:mt-0 -mt-56 lg:fixed">
                                            <img
                                                class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md lg:fixed"
                                                :src="$page.props.user.profile_photo_url"
                                                :alt="$page.props.user.name"/>
                                        </div>
                                    </div>

                                </div>

                                <!-- Main info -->
                                <div class="relative py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
                                    <div v-if="layout===2" class="lg:mx-8"/>
                                    <div :class="layout===2 ? 'lg:pl-8 justify-self-center' : 'lg:pr-8'">

                                        <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                                            <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                                                {{ $page['props']['user']['name'] }}
                                            </h2>
                                            <p class="font-medium mt-4 text-lg text-gray-500 sm:mt-3">
                                                {{ $page['props']['site']['message'] }}
                                            </p>

                                            <!-- The list of forms -->
                                            <ul class="mt-2" v-if="$page['props']['forms'].length">
                                                <li v-for="(form) in $page['props']['forms']"
                                                    class="group">
                                                    <inertia-link :href="route('form.show', form.uuid)">
                                                        <div
                                                            class="mb-5 bg-white hover:bg-gray-50 sm:rounded-lg sm:mb-4 border">
                                                            <div class="px-4 py-5 sm:p-6">
                                                                <div
                                                                    class="sm:flex sm:items-start sm:justify-between">
                                                                    <div>
                                                                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                                            {{ form.title }}
                                                                        </h3>
                                                                    </div>
                                                                    <div
                                                                        class="mt-5 sm:mt-0 sm:ml-6 sm:flex-shrink-0 sm:flex sm:items-center">
                                                                        <button type="button"
                                                                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm"
                                                                                :style="'background: ' + colors + '; color: ' + getContrastYIQ(colors)">
                                                                            Go
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </inertia-link>
                                                </li>
                                            </ul>

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
                                                            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$page.props.site.section_header}}</span>
                                                        </h1>
                                                        <p class="mt-8 text-xl text-gray-500 leading-8">{{$page.props.site.section_content}}</p>
                                                    </div>
                                                </div>
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
                                                        <form @submit.prevent="submitContactForm.post('/contact')"
                                                              class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
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
                                                                <button v-if="submitContactForm.processing"  class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                        :style="'background: ' + colors">
                                                                    Submitting...
                                                                </button>

                                                                <button v-else-if="submitContactForm.recentlySuccessful"  class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                        :style="'background: ' + colors">
                                                                    Done!
                                                                </button>

                                                                <button v-else type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                                        :style="'background: ' + colors">
                                                                    Let's talk
                                                                </button>
                                                            </div>
                                                        </form>
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
                            <div class="fixed z-0 pointer-events-none top-0">
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

                            <div class="bg-white relative mt-64 lg:mt-96 lg:top-16">

                                <!--Profile Picture-->
                                <div class="-mt-16 flex space-x-5 justify-center flex-col">
                                    <div class="flex justify-center content-center">
                                        <img class="z-10 -mt-16 justify-self-center items-center h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                    </div>
                                </div>

                                <!--Name and message-->
                                <div class="relative pb-1 px-4 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:w-1/2 justify-center">
                                    <div class="2xl:block mt-3 min-w-0 flex-1">
                                        <h1 class="text-2xl font-bold text-gray-900 truncate text-center">
                                            {{ $page.props.user.name }}
                                        </h1>

                                        <div class="items-end">
                                            <p class="font-medium mt-4 text-lg text-gray-500 sm:mt-3 text-center pl-10">
                                                {{$page['props']['site']['message']}}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!--Forms-->
                                <div class="relative pb-8 px-4 sm:pb-12 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:pb-16 lg:w-1/2 justify-center pt-4 sm:pt-6 lg:pt-8">
                                    <ul class="mt-2" v-if="$page['props']['forms'].length">
                                        <li v-for="(form) in $page['props']['forms']"
                                            class="group">
                                            <inertia-link :href="route('form.show', form.uuid)">
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
                                                                    Go
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </inertia-link>
                                        </li>
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
                                                <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$page.props.site.section_header}}</span>
                                            </h1>
                                            <p class="mt-8 text-xl text-gray-500 leading-8">{{$page.props.site.section_content}}</p>
                                        </div>
                                    </div>
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
                                            <form @submit.prevent="submitContactForm.post('/contact')"
                                                  class="grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
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
                                                    <button v-if="submitContactForm.processing"  class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            :style="'background: ' + colors">
                                                        Submitting...
                                                    </button>

                                                    <button v-else-if="submitContactForm.recentlySuccessful"  class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            :style="'background: ' + colors">
                                                        Done!
                                                    </button>

                                                    <button v-else type="submit" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                                            :style="'background: ' + colors">
                                                        Let's talk
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import {Chrome, Swatches} from 'vue-color'

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
            photoPreview: null,
            layout: this.site.layout,
            showingAccentColorDropdown: false,
            showingLayoutDropdown: false,
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
        };
    },

    methods: {
        // returns black or white depending on the appropriate 'logo' color
        getContrastYIQ(hexcolor) {
            hexcolor = hexcolor.replace("#", "");
            var r = parseInt(hexcolor.substr(0, 2), 16);
            var g = parseInt(hexcolor.substr(2, 2), 16);
            var b = parseInt(hexcolor.substr(4, 2), 16);
            var yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;
            return (yiq >= 128) ? 'black' : 'white';
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
</style>
