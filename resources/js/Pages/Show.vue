<template>
    <div class="h-screen" :style="cssProps">
        <div class="h-full flex overflow-hidden bg-white">
            <!-- Show if subscribed -->
            <div v-if="this.onTrial || this.subscribed" class="flex flex-col w-0 flex-1 overflow-hidden">
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
                                            <img class="h-40 w-40 rounded-full object-cover shadow-md lg:fixed" :src="$page.props.profile_photo_url" :alt="$page.props.name" />
                                        </div>
                                    </div>

                                </div>

                                <!-- Content -->
                                <div class="relative py-4 md:py-8  px-4 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
                                    <div v-if="layout===2" class="lg:mx-8"/>
                                    <div :class="layout===2 ? 'lg:pl-8 justify-self-center' : 'lg:pr-8'">

                                        <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                                            <h2 class="text-center text-3xl font-extrabold tracking-tight sm:text-4xl">
                                                {{ $page.props.name }}
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
                                                                                class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm"
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

                                            <div class="flex justify-center">
                                                <div class="my-5 mb-10 w-20 h-1 border-b border-gray-500"/>
                                            </div>

                                            <!--Listings-->
                                            <div class="overflow-hidden relative w-full text-gray-700">
                                                <div class="flex overflow-scroll items-start py-px pr-12">
                                                    <div v-for="(property) in $page['props']['properties']"
                                                         @click="$inertia.get(route('property.show', property.uuid))"
                                                         class="flex flex-col flex-none self-stretch pr-6 w-11/12">
                                                        <a
                                                            :href="route('property.show', property.uuid)"
                                                            class="rounded-lg inline-block overflow-hidden max-w-1/2 no-underline hover:bg-gray-50 bg-white border"
                                                        >
                                                            <img :src="property.property_photo"/>
                                                            <div class="flex-1 p-6">
                                                                <div class="mb-4">

                                                                    <div class="sm:flex sm:items-start sm:justify-between">
                                                                        <h2
                                                                            class="mt-0 mb-1 text-lg font-medium text-gray-900 tracking-tight leading-tight"
                                                                        >
                                                                            {{ property.street_address }}
                                                                        </h2>
                                                                        <div
                                                                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm"
                                                                            :style="'background: ' + colors + '; color: ' + getContrastYIQ(colors)"
                                                                        >
                                                                            Go
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="flex items-center w-full box-border">

                                                                    <!--                                                            <div class="leading-5 box-border">$22</div>-->
                                                                </div>
                                                            </div>
                                                        </a
                                                        >
                                                    </div>
                                                </div>
                                            </div>

                                            <!--Article-->
                                            <div class="relative py-16 pt-8 bg-white overflow-hidden">
                                                <div class="relative px-4 sm:px-6 lg:px-8">
                                                    <div class="text-lg max-w-prose mx-auto">
                                                        <h1>
                                                            <span class="block text-base text-center text-blue-600 font-semibold tracking-wide uppercase" :style="'color: ' + colors">Welcome</span>
                                                            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$page.props.site.section_header}}</span>
                                                        </h1>
                                                        <p class="mt-8 text-xl text-gray-500 leading-8">{{$page.props.site.section_content}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Social Media -->
                                            <div v-show="$page.props.site.facebook !== null || $page.props.site.instagram !== null || $page.props.site.twitter !== null"
                                                 class="flex justify-center space-x-6 pb-16">
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

                                            <!-- Contact -->
                                            <div class="pb-24 leading-6 text-gray-900 bg-gray-100 rounded-lg" style="border-radius: 10px">
                                                <div class="mx-auto w-full text-gray-900">
                                                    <div class="w-full">
                                                        <div class="flex flex-col items-center mb-20 text-center"></div>
                                                    </div>
                                                    <div class="w-full">
                                                        <div class="sm:ml-20 m-0">
                                                            <flow-form v-on:submit="onSubmit">
                                                                <question type="sectionbreak" title="Open a line of communication, and we can be in touch."></question>
                                                                <question type="text" placeholder="Type here..." title="What is your name?" v-model="contactName" required></question>
                                                                <question type="sectionbreak" :title="'Nice to meet you, ' + contactName + '.'" subtitle="I'd love to get to know you. Fill out some contact information and I'll reach out shortly."></question>
                                                                <question type="email" placeholder="Type here..." title="What is your email?" v-model="email" required></question>
                                                                <question type="number" placeholder="Type here..." tagline="Just one more piece of contact!" title="And your phone number?" v-model="phone" required></question>
                                                                <question type="text"placeholder="Type here..."  tagline="Great!" title="Anything you'd like me to know before we speak?" v-model="message" required></question>
                                                            </flow-form>
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
                                        <img class="z-10 -mt-16 justify-self-center items-center h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32 object-cover" :src="$page.props.profile_photo_url" :alt="$page.props.name" />
                                    </div>
                                </div>

                                <!--Name and message-->
                                <div class="relative pb-1 px-4 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:w-1/2 justify-center">
                                    <div class="2xl:block mt-3 min-w-0 flex-1">
                                        <h1 class="text-2xl font-bold text-gray-900 truncate text-center">
                                            {{ $page.props.name }}
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
                                                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm"
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

                                    <div class="flex justify-center">
                                        <div class="my-5 mb-10 w-20 h-1 border-b border-gray-500"/>
                                    </div>

                                    <!--Listings-->
                                    <div class="overflow-hidden relative w-full text-gray-700">
                                        <div class="flex overflow-scroll items-start py-px pr-12">
                                            <div v-for="(property) in $page['props']['properties']"
                                                 @click="$inertia.get(route('property.show', property.uuid))"
                                                 class="flex flex-col flex-none self-stretch pr-6 w-11/12">
                                                <a
                                                    :href="route('property.show', property.uuid)"
                                                    class="rounded-lg inline-block overflow-hidden max-w-1/2 no-underline hover:bg-gray-50 bg-white border"
                                                >
                                                    <img :src="property.property_photo"/>
                                                    <div class="flex-1 p-6">
                                                        <div class="mb-4">

                                                            <div class="sm:flex sm:items-start sm:justify-between">
                                                                <h2
                                                                    class="mt-0 mb-1 text-lg font-medium text-gray-900 tracking-tight leading-tight"
                                                                >
                                                                    {{ property.street_address }}
                                                                </h2>
                                                                <div
                                                                    class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm"
                                                                    :style="'background: ' + colors + '; color: ' + getContrastYIQ(colors)"
                                                                >
                                                                    Go
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex items-center w-full box-border">

                                                            <!--                                                            <div class="leading-5 box-border">$22</div>-->
                                                        </div>
                                                    </div>
                                                </a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Article-->
                                <div class="relative py-16 pt-8 bg-white overflow-hidden">
                                    <div class="relative px-4 sm:px-6 lg:px-8">
                                        <div class="text-lg max-w-prose mx-auto">
                                            <h1>
                                                <span class="block text-base text-center text-blue-600 font-semibold tracking-wide uppercase" :style="'color: ' + colors">Welcome</span>
                                                <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{$page.props.site.section_header}}</span>
                                            </h1>
                                            <p class="mt-8 text-xl text-gray-500 leading-8">{{$page.props.site.section_content}}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Media -->
                                <div v-show="$page.props.site.facebook !== null || $page.props.site.instagram !== null || $page.props.site.twitter !== null"
                                     class="flex justify-center space-x-6 pb-16">
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

                                <!-- Contact -->
                                <div class="pb-24 leading-6 text-gray-900 bg-gray-100">
                                    <div class="px-6 mx-auto w-full text-gray-900" style="max-width: 1344px;">
                                        <div class="mx-auto w-full box-border">
                                            <div class="flex flex-col items-center mx-auto mb-20 text-center"></div>
                                        </div>
                                        <div class="mx-auto w-full box-border"
                                             style="max-width: 879px; direction: ltr;">
                                            <div class="sm:ml-20 m-0 box-border">
                                                <flow-form v-on:submit="onSubmit">
                                                    <question type="sectionbreak" title="If you'd rather just open a line of communication instead of filling out forms, feel free to do so here."></question>
                                                    <question type="text" placeholder="Type here..." title="What is your name?" v-model="contactName" required></question>
                                                    <question type="sectionbreak" :title="'Nice to meet you, ' + contactName + '.'" subtitle="I'd love to get to know you. Fill out some contact information and I'll reach out shortly."></question>
                                                    <question type="email" placeholder="Type here..." title="What is your email?" v-model="email" required></question>
                                                    <question type="number" placeholder="Type here..." tagline="Just one more piece of contact!" title="And your phone number?" v-model="phone" required></question>
                                                    <question type="text" placeholder="Type here..." tagline="Great!" title="Anything you'd like me to know before we speak?" v-model="message" required></question>
                                                </flow-form>
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
                                                        :src="$page.props.profile_photo_url"
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
                                                    {{ $page.props.name }}
                                                </h1>
                                                <div class="box-border">
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

                                        <div class="overflow-hidden relative w-full text-gray-700 box-border">
                                            <div class="flex overflow-scroll items-start py-px pr-12">
                                                <!-- List of forms -->
                                                <div v-for="(form) in $page['props']['forms']"
                                                     @click="$inertia.get(route('form.show', form.uuid))"
                                                     class="flex flex-col flex-none self-stretch pr-6 w-11/12">
                                                    <a
                                                        :href="route('form.show', form.uuid)"
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

                                    <div class="pt-6 px-12 mx-auto w-full text-gray-700" style="max-width: 648px;">
                                        <div class="flex justify-between items-center pb-3 mb-6 border-b border-gray-400 border-solid box-border">
                                            <h2 class="my-0 font-sans text-base tracking-normal text-black box-border"
                                                style="line-height: 1.35;">
                                                Listings
                                            </h2>
                                        </div>

                                        <!--Listings-->
                                        <div class="overflow-hidden relative w-full text-gray-700">
                                            <div class="flex overflow-scroll items-start py-px pr-12">
                                                <div v-for="(property) in $page['props']['properties']"
                                                     @click="$inertia.get(route('property.show', property.uuid))"
                                                     class="flex flex-col flex-none self-stretch pr-6 w-11/12">
                                                    <a
                                                        :href="route('property.show', property.uuid)"
                                                        class="rounded-lg inline-block overflow-hidden max-w-1/2 no-underline hover:bg-gray-50 bg-white border"
                                                    >
                                                        <img :src="property.property_photo"/>
                                                        <div class="flex-1 p-6">
                                                            <div class="mb-4">

                                                                <div class="sm:flex sm:items-start sm:justify-between">
                                                                    <h2
                                                                        class="mt-0 mb-1 text-lg font-medium text-gray-900 tracking-tight leading-tight"
                                                                    >
                                                                        {{ property.street_address }}
                                                                    </h2>
                                                                    <div
                                                                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm"
                                                                        :style="'background: ' + colors + '; color: ' + getContrastYIQ(colors)"
                                                                    >
                                                                        Go
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex items-center w-full box-border">

                                                                <!--                                                            <div class="leading-5 box-border">$22</div>-->
                                                            </div>
                                                        </div>
                                                    </a
                                                    >
                                                </div>
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
                                                                class="tracking-tighter leading-7 no-underline bg-transparent hover:text-black"
                                                                style="transition: border-color 200ms ease-in-out 0s, color 200ms ease-in-out 0s; list-style: outside none none;"
                                                            >{{ $page.props.site.section_header }}</span
                                                            >
                                                    </h3>
                                                    <div class="box-border">{{ $page.props.site.section_content }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Contact -->
                                <div class="pb-24 leading-6 text-gray-900 bg-gray-100" style="border-radius: 10px">
                                    <div class="mx-auto w-full text-gray-900">
                                        <div class="w-full">
                                            <div class="flex flex-col items-center mb-20 text-center"></div>
                                        </div>
                                        <div class="w-full">
                                            <div class="sm:ml-20 m-0">
                                                <flow-form v-on:submit="onSubmit">
                                                    <question type="sectionbreak" title="Open a line of communication, and we can be in touch."></question>
                                                    <question type="text" placeholder="Type here..." title="What is your name?" v-model="contactName" required></question>
                                                    <question type="sectionbreak" :title="'Nice to meet you, ' + contactName + '.'" subtitle="I'd love to get to know you. Fill out some contact information and I'll reach out shortly."></question>
                                                    <question type="email" placeholder="Type here..." title="What is your email?" v-model="email" required></question>
                                                    <question type="number" placeholder="Type here..." tagline="Just one more piece of contact!" title="And your phone number?" v-model="phone" required></question>
                                                    <question type="text"placeholder="Type here..."  tagline="Great!" title="Anything you'd like me to know before we speak?" v-model="message" required></question>
                                                </flow-form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Minimalist -->
                        <div v-if="this.layout === 5" class="bg-gray-50 min-h-screen" :style="cssProps">
                            <div
                                style="grid-auto-rows: 1fr; grid-template-columns: 1fr 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 5vh 4vw; padding-top: 0vh; padding-bottom: 5vh; grid-auto-columns: 1fr;"
                                class=" sm:grid sm:grid-flow-col sm:h-auto sm:min-h-screen sm:leading-6 text-gray-800 items-center justify-center"
                            >

                                <!-- Profile Photo Mobile -->
                                <div class="sm:hidden pb-4 lg:absolute lg:inset-0 z-0">
                                    <!--Cover photo-->
                                    <div class="lg:fixed lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-56 overflow-hidden lg:h-screen"
                                         :class="layout===1 ? 'lg:right-0' : 'lg:left-0'">
                                        <img class="h-56 w-full object-cover lg:absolute lg:h-full" :src="$page.props.profile_photo_url" alt="Profile Photo" />
                                    </div>
                                </div>

                                <!-- Profile Photo Desktop -->
                                <div
                                    class="hidden sm:block flex relative flex-col row-span-1 justify-center"
                                    style="grid-area: span 2 / span 1 / span 2 / span 1;"
                                >
                                    <div class="relative box-border">
                                        <div
                                            style="width: 100%; height: 5px; background-color: rgba(0, 0, 0, 0); top: 48%;"
                                            class="absolute w-full h-1 bg-white box-border"
                                        ></div>
                                        <img
                                            :src="$page.props.profile_photo_url"
                                            loading="Loading..."
                                            width="320"
                                            style="opacity: 1; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1) rotateX(0deg) rotateY(0deg) rotateZ(0deg) skew(0deg, 0deg); transform-style: preserve-3d; z-index: 1;"
                                            alt="Profile Photo"
                                            class="inline-block max-w-full align-middle border-0 opacity-100"
                                        />
                                    </div>
                                </div>

                                <!-- Name -->
                                <div
                                    class="px-9 sm:px-0 flex relative flex-col row-span-1 justify-center items-start"
                                    style="place-self: end start;"
                                >
                                    <div
                                        style="width: 100%; height: 5px; background-color: rgba(0, 0, 0, 0);"
                                        class="w-full h-1 bg-white box-border"
                                    ></div>
                                    <div
                                        style="opacity: 1;"
                                        class="opacity-100 box-border"
                                    >
                                        <h1
                                            class="mx-0 mt-0 mb-2 text-5xl font-bold tracking-tight text-left"
                                            style="line-height: 100%;"
                                        >
                                            {{ name.split(" ")[0] }}
                                            <strong
                                                class="px-1 text-5xl font-extrabold tracking-tighter text-gray-100 bg-gray-900 rounded-sm box-border"
                                                :style="'line-height: 51.2px; background-color:' + this.colors"
                                            >{{ name.split(" ")[1] }}</strong
                                            >
                                        </h1>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div
                                    class="px-9 sm:px-0 flex flex-col justify-center items-start max-h-screen"
                                    style="place-self: start;"
                                >
                                    <p
                                        style="opacity: 1; line-height: 150%;"
                                        class="mt-0 mb-5 text-lg opacity-100"
                                    >
                                        {{
                                            $page.props.site.message
                                        }}
                                    </p>
                                    <div
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
                                            style="width: 100%; height: 5px; background-color: rgba(0, 0, 0, 0); top: 48%;"
                                            class="absolute w-full h-1 bg-white box-border"
                                        ></div>

                                        <!-- Forms -->
                                        <div v-for="(form, index) in $page.props.forms" class="flex mb-4 items-baseline box-border">
                                            <div class="text-sm" style="min-width: 40px;">{{index + 1 + '.'}}</div>
                                            <a
                                                class="minimalistFormItem"
                                                :href="route('form.show', form.uuid)"
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
                                                    <div class="leading-4 box-border">{{ $page.props.email }}</div>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            </div>

            <!-- Else show alert -->
            <div v-else class="relative flex items-top justify-center min-h-screen w-screen sm:items-center sm:pt-0">
                <div class="font-medium leading-7 text-gray-700">
                    <div
                        class="flex flex-col mx-0 mt-0 mb-4 w-full leading-7 text-center box-border"
                    >
                        <h2
                            class="mt-0 mb-5 font-sans text-5xl tracking-normal leading-4 text-gray-900 uppercase"
                        >
                            404 - Page Not Found
                        </h2>
                        <div class="text-center mt-4 box-border">
                            The page you are looking for doesn't exist or has been moved.
                        </div>
                        <div class="flex mx-auto mt-8 text-center">
                            <a
                                :href="route('welcome')"
                                class="inline-block overflow-hidden relative py-3 px-5 max-w-full text-base font-semibold leading-6 text-white no-underline bg-gray-900 rounded cursor-pointer"
                                style="transition: transform 200ms ease 0s, -webkit-transform 200ms ease 0s;"
                            ><div class="box-border">Back to Home</div>
                                <div class="absolute top-0 left-0 h-full bg-white box-border"></div
                                ></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import Welcome from '@/Jetstream/Welcome'
import {Chrome, Swatches} from 'vue-color'
import FlowForm, {Question} from '@ditdot-dev/vue-flow-form';

export default {
    components: {
        AppLayout,
        Welcome,
        FlowForm,
        Question,
        'chrome-picker': Chrome,
        'swatches-picker': Swatches,
    },

    props: ['profile_photo_url', 'name', 'onTrial', 'subscribed', 'site'],

    data() {
        return {
            contactName: "",
            email: "",
            phone: "",
            message: "",
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
                site: this.site.slug,
            }),
        };
    },

    methods: {
        // submits the contact form
        onSubmit(questionList) {
            let data = {
                'firstName': this.contactName.split(" ")[0],
                'lastName': this.contactName.split(" ").filter((char, index) => {
                    if (index !== 0) {
                        return char;
                    } else {
                        return null;
                    }
                }).join(),
                'email': this.email,
                'phone': this.phone,
                'message': this.message,
                site: this.site.slug,
            }
            this.$inertia.post('/contact', data)
        },

        // returns black or white depending on the appropriate 'logo' color
        getContrastYIQ(hexcolor) {
            hexcolor = hexcolor.replace("#", "");
            var r = parseInt(hexcolor.substr(0, 2), 16);
            var g = parseInt(hexcolor.substr(2, 2), 16);
            var b = parseInt(hexcolor.substr(4, 2), 16);
            var yiq = ((r * 299) + (g * 587) + (b * 114)) / 1000;
            return (yiq >= 128) ? 'black' : 'white';
        },
    },

    computed: {
        cssProps() {
            return {
                '--bg-accent-color': this.colors,
                '--correct-text-color': this.getContrastYIQ(this.colors),
            }
        }
    }
}
</script>

<style lang="css">
@import '../../css/flow-form-text.css';
@import'../../css/flow-form-white-bg.css';

div.vff-footer {
    display: none !important;
}

button.o-btn-action {
    background-color: var(--bg-accent-color) !important;
    color: var(--correct-text-color) !important;
}
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

.minimalistFormItem:hover {
    background-color: var(--bg-accent-color) !important;
}
</style>
