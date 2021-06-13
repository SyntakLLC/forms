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
                                <div class="lg:absolute lg:inset-0 lg:fixed">

                                    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-56 overflow-hidden lg:h-screen"
                                         :class="layout===1 ? 'lg:right-0' : 'lg:left-0 lg:w-1/2 overflow-hidden'">
                                        <img class="h-56 w-full object-cover lg:h-full lg:fixed" :class="layout===2 ? 'lg:w-1/2' : 'lg:w-1/2'" :src="$page.props.site.cover_photo" />

                                        <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:mt-0 -mt-56">
                                            <img class="h-40 w-40 rounded-full object-cover shadow-md lg:fixed" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                        </div>
                                    </div>

                                </div>

                                <!-- Content -->
                                <div class="relative py-4 md:py-8  px-4 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
                                    <div v-if="layout===2" class="lg:mx-8"/>
                                    <div :class="layout===2 ? 'lg:pl-8 justify-self-center' : 'lg:pr-8'">

                                        <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                                            <h2 class="text-center text-3xl font-extrabold tracking-tight sm:text-4xl">
                                                {{$page['props']['user']['name']}}
                                            </h2>
                                            <p class="text-center font-medium mt-4 text-lg text-gray-500 sm:mt-3">
                                                {{$page['props']['site']['message']}}
                                            </p>

                                            <!-- Forms -->
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
                                <div>
                                    <img class="h-64 w-screen object-cover lg:h-96" :src="$page.props.site.cover_photo" />
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
                                            <p class="font-medium mt-4 text-lg text-gray-500 sm:mt-3 text-center">
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
            facebookHttps: this.site.facebook == null ? "" : this.site.facebook.length > 7 ? this.site.facebook.substring(0, 8) : this.site.facebook,
            instagramHttps: this.site.instagram == null ? "" : this.site.instagram.length > 7 ? this.site.instagram.substring(0, 8) : this.site.instagram,
            twitterHttps: this.site.twitter == null ? "" : this.site.twitter.length > 7 ? this.site.twitter.substring(0, 8) : this.site.twitter,
            facebookHttp: this.site.facebook == null ? "" : this.site.facebook.length > 6 ? this.site.facebook.substring(0, 7) : this.site.facebook,
            instagramHttp: this.site.instagram == null ? "" : this.site.instagram.length > 6 ? this.site.instagram.substring(0, 7) : this.site.instagram,
            twitterHttp: this.site.twitter == null ? "" : this.site.twitter.length > 6 ? this.site.twitter.substring(0, 7) : this.site.twitter,
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
