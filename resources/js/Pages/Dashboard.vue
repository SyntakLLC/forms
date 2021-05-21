<template>
    <app-layout>

        <div class="h-screen">
            <div class="flex items-center flex-shrink-0 border-b border-gray-200">
                <!-- Search header -->
                <div class="relative z-10 flex-shrink-0 flex h-16 bg-white lg:hidden">
                    <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->


<!--                    @click="showingQuestionsDropdown=!showingQuestionsDropdown"-->
                    <button class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                        <!-- Heroicon name: outline/menu-alt-1 -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </button>
                </div>

                <div class="relative min-w-0 px-6">
                    <h1 class="pt-4 text-lg font-medium leading-6 text-gray-900 sm:truncate pb-4">
                        Edit My Site
                    </h1>
                </div>

                <div class="flex-1 " />

                <div class="flex sm:ml-4 px-6">
                    <inertia-link :href="route('site.show', $page.props.site.uuid)"
                                  class="truncate hover:text-gray-600 block">
                        <button type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                            Preview
                        </button>
                    </inertia-link>
                </div>
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
                                <div v-show="showingQuestionsDropdown" class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-white">
                                    <div class="absolute top-0 right-0 -mr-12 pt-20">
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
                                            Edit My Site
                                        </h1>
                                    </div>
                                    <div class="mt-5 flex-1 h-0 overflow-y-auto">
                                        <nav class="px-2">
                                            <div class="space-y-1">

                                                <!--HOME-->

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

                                    <!-- HOMEPAGE -->

                                    <div class="pt-2 pb-4 border-b border-gray-200 mx-4">
                                        <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                            Accent Color
                                        </a>
                                        <chrome-picker :value="colors" @input="updateColor" />
                                    </div>

                                    <div class="pt-2 pb-4 border-b border-gray-200 mx-4">
                                        <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                            Cover Photo
                                        </a>

                                        <input type="file" class="hidden"
                                               ref="photo"
                                               @change="updatePhotoPreview">

                                        <div class="mt-2 mr-2">
                                            <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                                                    type="button" @click="selectNewPhoto">
                                                Select A New Photo
                                            </button>
                                        </div>

                                        <div class="mt-2 mr-2">
                                            <button v-if="$page.props.user.cover_photo_url"
                                                    class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150"
                                                    type="button" @click="removePhoto">
                                                Remove Photo
                                            </button>
                                        </div>
                                    </div>

                                    <div class="pt-2 pb-4 border-b border-gray-200 mx-4">
                                        <a href="#" class="text-gray-600 group flex items-center px-2 py-2 text-base font-medium rounded-md">
                                            Layout
                                        </a>

                                        <fieldset>
                                            <legend class="sr-only">
                                                Layouts
                                            </legend>
                                            <div class="relative bg-white rounded-md -space-y-px">
                                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                                <label class="border-gray-200 rounded-tl-md rounded-tr-md relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6">
                                                    <div class="flex w-full items-center text-sm">
                                                        <input type="radio" :checked="layout===1" @input="updateLayout(1)" name="pricing_plan" value="Layout1" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-0-label" aria-describedby="pricing-plans-0-description-0 pricing-plans-0-description-1">
                                                        <span v-if="layout===1" id="layout-1-label-checked" class="ml-3 font-medium text-indigo-700">Left Align</span>
                                                        <span v-else id="layout-1-label" class="ml-3 font-medium text-gray-900">Left Align</span>
                                                    </div>

                                                    <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                                </label>

                                                <!-- Checked: "bg-indigo-50 border-indigo-200 z-10", Not Checked: "border-gray-200" -->
                                                <label class="border-gray-200 relative border p-4 flex flex-col cursor-pointer md:pl-4 md:pr-6">
                                                    <div class="flex items-center text-sm">
                                                        <input type="radio" :checked="layout===2" @input="updateLayout(2)" name="pricing_plan" value="Layout2" class="h-4 w-4 text-indigo-600 border-gray-300 focus:ring-indigo-500" aria-labelledby="pricing-plans-1-label" aria-describedby="pricing-plans-1-description-0 pricing-plans-1-description-1">
                                                        <span v-if="layout===2" id="layout-2-label-checked" class="ml-3 font-medium text-indigo-700">Right Align</span>
                                                        <span v-else id="layout-2-label" class="ml-3 font-medium text-gray-900">Right Align</span>
                                                    </div>

                                                    <!-- Checked: "text-indigo-700", Not Checked: "text-gray-500" -->
                                                </label>
                                            </div>
                                        </fieldset>

                                    </div>

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
                            <div class="shadow-md h-screen">

                                <!--Left align and right align-->
                                <div v-if="$page.props.site.layout === 1 || $page.props.site.layout === 2" class="h-screen bg-white rounded-md">
                                    <div class="relative ">
                                        <div class="lg:absolute lg:inset-0">

                                            <div v-if="$page.props.user.cover_photo_url==null"
                                                 class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 lg:h-screen"
                                                 :class="layout===1 ? 'lg:right-0' : 'lg:left-0'"
                                                 :style="this.getURL"
                                                 id="pattern">

                                                <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center">
                                                    <img class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                                </div>
                                            </div>

                                            <div v-else class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 bg-white h-28 overflow-hidden lg:h-screen"
                                                :class="layout===1 ? 'lg:right-0' : 'lg:left-0'">
                                                <img class="h-56 w-full object-cover lg:absolute lg:h-full" :src="'http://localhost:9600/forms-bucket/' + $page.props.user.cover_photo_url" />

                                                <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:mt-0 -mt-56">
                                                    <img class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                                </div>
                                            </div>

                                        </div>


                                        <div class="relative py-16 px-4 sm:py-24 sm:px-6 lg:px-8 lg:max-w-7xl lg:mx-auto lg:py-32 lg:grid lg:grid-cols-2">
                                            <div v-if="layout===2" class="lg:mx-8"/>
                                            <div :class="layout===2 ? 'lg:pl-8 justify-self-center' : 'lg:pr-8'">

                                                <div class="max-w-md mx-auto sm:max-w-lg lg:mx-0">
                                                    <h2 class="text-3xl font-extrabold tracking-tight sm:text-4xl">
                                                        {{$page['props']['user']['name']}}
                                                    </h2>
                                                    <p contenteditable placeholder="Message (optional)" @input="updateMessage" class="font-medium mt-4 text-lg text-gray-500 sm:mt-3">
                                                        {{$page['props']['site']['message']}}
                                                    </p>

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
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--Top align-->
                                <div v-if="$page.props.site.layout === 3">

                                    <div>
<!--                                        <img class="h-32 w-full object-cover lg:h-48" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="">-->
                                        <div v-if="$page.props.user.cover_photo_url==null"
                                             class="h-32 w-full object-cover lg:h-48"
                                             :style="this.getURL"
                                             id="pattern3">
<!--                                            <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center">-->
<!--                                                <img class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />-->
<!--                                            </div>-->
                                        </div>
                                        <div v-else>
                                            <img class="h-32 w-full object-cover lg:h-48" :src="'http://localhost:9600/forms-bucket/' + $page.props.user.cover_photo_url" />

<!--                                            <div class="lg:absolute flex lg:inset-y-0 lg:right-0 lg:w-full h-full justify-center items-center lg:mt-0 -mt-56">-->
<!--                                                <img class="sm:h-60 sm:w-60 h-20 w-20 rounded-full object-cover shadow-md" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />-->
<!--                                            </div>-->
                                        </div>

                                    </div>
                                            <div class="flex">
<!--                                                <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">-->
                                                <img class="h-24 w-24 rounded-full ring-4 ring-white sm:h-32 sm:w-32" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name" />
                                            </div>
                                            <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
                                                <div class="sm:hidden 2xl:block mt-6 min-w-0 flex-1">
                                                    <h1 class="text-2xl font-bold text-gray-900 truncate">
                                                        Ricardo Cooper
                                                    </h1>
                                                </div>
                                            </div>
                                            <div class="relative py-16 bg-white overflow-hidden">
                                                <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
                                                    <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                                                        <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                                            <defs>
                                                                <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                                </pattern>
                                                            </defs>
                                                            <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                                                        </svg>
                                                        <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                                            <defs>
                                                                <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                                </pattern>
                                                            </defs>
                                                            <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                                                        </svg>
                                                        <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                                                            <defs>
                                                                <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                                                </pattern>
                                                            </defs>
                                                            <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="relative px-4 sm:px-6 lg:px-8">
                                                    <div class="text-lg max-w-prose mx-auto">
                                                        <h1>
                                                            <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Introducing</span>
                                                            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">JavaScript for Beginners</span>
                                                        </h1>
                                                        <p class="mt-8 text-xl text-gray-500 leading-8">Aliquet nec orci mattis amet quisque ullamcorper neque, nibh sem. At arcu, sit dui mi, nibh dui, diam eget aliquam. Quisque id at vitae feugiat egestas ac. Diam nulla orci at in viverra scelerisque eget. Eleifend egestas fringilla sapien.</p>
                                                    </div>
                                                    <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                                                        <p>Faucibus commodo massa rhoncus, volutpat. <strong>Dignissim</strong> sed <strong>eget risus enim</strong>. Mattis mauris semper sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque erat velit. Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. <a href="#">Mattis mauris semper</a> sed amet vitae sed turpis id.</p>
                                                        <ul>
                                                            <li>Quis elit egestas venenatis mattis dignissim.</li>
                                                            <li>Cras cras lobortis vitae vivamus ultricies facilisis tempus.</li>
                                                            <li>Orci in sit morbi dignissim metus diam arcu pretium.</li>
                                                        </ul>
                                                        <p>Quis semper vulputate aliquam venenatis egestas sagittis quisque orci. Donec commodo sit viverra aliquam porttitor ultrices gravida eu. Tincidunt leo, elementum mattis elementum ut nisl, justo, amet, mattis. Nunc purus, diam commodo tincidunt turpis. Amet, duis sed elit interdum dignissim.</p>
                                                        <h2>From beginner to expert in 30 days</h2>
                                                        <p>Id orci tellus laoreet id ac. Dolor, aenean leo, ac etiam consequat in. Convallis arcu ipsum urna nibh. Pharetra, euismod vitae interdum mauris enim, consequat vulputate nibh. Maecenas pellentesque id sed tellus mauris, ultrices mauris. Tincidunt enim cursus ridiculus mi. Pellentesque nam sed nullam sed diam turpis ipsum eu a sed convallis diam.</p>
                                                        <blockquote>
                                                            <p>Sagittis scelerisque nulla cursus in enim consectetur quam. Dictum urna sed consectetur neque tristique pellentesque. Blandit amet, sed aenean erat arcu morbi.</p>
                                                        </blockquote>
                                                        <p>Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque erat velit.</p>
                                                        <figure>
                                                            <img class="w-full rounded-lg" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=facearea&w=1310&h=873&q=80&facepad=3" alt="" width="1310" height="873">
                                                            <figcaption>Sagittis scelerisque nulla cursus in enim consectetur quam.</figcaption>
                                                        </figure>
                                                        <h2>Everything you need to get up and running</h2>
                                                        <p>Purus morbi dignissim senectus mattis <a href="#">adipiscing</a>. Amet, massa quam varius orci dapibus volutpat cras. In amet eu ridiculus leo sodales cursus tristique. Tincidunt sed tempus ut viverra ridiculus non molestie. Gravida quis fringilla amet eget dui tempor dignissim. Facilisis auctor venenatis varius nunc, congue erat ac. Cras fermentum convallis quam.</p>
                                                        <p>Faucibus commodo massa rhoncus, volutpat. Dignissim sed eget risus enim. Mattis mauris semper sed amet vitae sed turpis id. Id dolor praesent donec est. Odio penatibus risus viverra tellus varius sit neque erat velit.</p>
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

        <div class="h-screen">
            <main class="flex-auto ">

                <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
                    <div class="flex-1 min-w-0">
                        <h1 class="pt-2 text-lg font-medium leading-6 text-gray-900 sm:truncate">
                            Choose a Page Template
                        </h1>

                        <p class="text-sm text-gray-500 mt-2">Don't worry — you can always change this later.</p>
                    </div>
                </div>

                <div id="components" class="px-4 sm:px-6 lg:px-8">
                    <section id="product-marketing" class="divide-y divide-gray-200">
                        <!-- Page title & actions -->
                        <div id="product-marketing-sections" class="grid grid-cols-3 xl:grid-cols-4 py-8 gap-x-8 gap-y-6">
                                <h3 class="text-gray-900 font-semibold col-span-3 xl:col-span-1">Templates</h3>
                                <div class="col-span-3 grid sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-y-8 lg:gap-x-8">
                                    <a href="/components/marketing/sections/heroes" class="group relative bg-white rounded-lg shadow-sm overflow-hidden ring-1 ring-black ring-opacity-5">
                                        <figure>
                                            <div class="relative bg-gray-100 pt-[50%] overflow-hidden">
                                                <div class="absolute inset-0 w-full h-full rounded-t-lg overflow-hidden">
<!--                                                    <img src="/img/category-thumbnails/sections/heroes.png" alt="" class="absolute inset-0 w-full h-full">-->
                                                </div>
                                            </div>
                                            <figcaption class="py-3 px-4">
                                                <p class="text-sm font-medium text-gray-900 mb-1">
                                                    Left Align
                                                </p>
                                                <p class="text-xs font-medium text-gray-500">A simple layout that balances you with your forms.</p>
                                            </figcaption>
                                        </figure>
                                    </a>
                                    <a href="/components/marketing/sections/feature-sections" class="group relative bg-white rounded-lg shadow-sm overflow-hidden ring-1 ring-black ring-opacity-5">
                                        <figure>
                                            <div class="relative bg-gray-100 pt-[50%] overflow-hidden">
                                                <div class="absolute inset-0 w-full h-full rounded-t-lg overflow-hidden">
<!--                                                    <img src="/img/category-thumbnails/sections/feature-sections.png" alt="" class="absolute inset-0 w-full h-full">-->
                                                </div>
                                            </div>
                                            <figcaption class="py-3 px-4">
                                                <p class="text-sm font-medium text-gray-900 mb-1">
                                                    Right Align
                                                </p>
                                                <p class="text-xs font-medium text-gray-500">Similar to left align, but reversed.</p>
                                            </figcaption>
                                        </figure>
                                    </a>
                                    <a href="/components/marketing/sections/cta-sections" class="group relative bg-white rounded-lg shadow-sm overflow-hidden ring-1 ring-black ring-opacity-5">
                                        <figure>
                                            <div class="relative bg-gray-100 pt-[50%] overflow-hidden">
                                                <div class="absolute inset-0 w-full h-full rounded-t-lg overflow-hidden">
<!--                                                    <img src="/img/category-thumbnails/sections/cta-sections.png" alt="" class="absolute inset-0 w-full h-full">-->
                                                </div>
                                            </div>
                                            <figcaption class="py-3 px-4">
                                                <p class="text-sm font-medium text-gray-900 mb-1">
                                                    Top Align
                                                </p>
                                                <p class="text-xs font-medium text-gray-500">Lets the user focus on your own brand before looking at the forms.</p>
                                            </figcaption>
                                        </figure>
                                    </a>
                                    <a href="/components/marketing/sections/pricing" class="group relative bg-white rounded-lg shadow-sm overflow-hidden ring-1 ring-black ring-opacity-5">
                                        <figure>
                                            <div class="relative bg-gray-100 pt-[50%] overflow-hidden">
                                                <div class="absolute inset-0 w-full h-full rounded-t-lg overflow-hidden">
<!--                                                    <img src="/img/category-thumbnails/sections/pricing.png" alt="" class="absolute inset-0 w-full h-full">-->
                                                </div>
                                            </div>
                                            <figcaption class="py-3 px-4">
                                                <p class="text-sm font-medium text-gray-900 mb-1">
                                                    Middle Align
                                                </p>
                                                <p class="text-xs font-medium text-gray-500">Relegates the focus to the forms, with your brand subtly in the background.</p>
                                            </figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                    </section>

                </div>

            </main>
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
                photoPreview: null,
                layout: this.site.layout,
                showingAccentColorDropdown: false,
                showingLayoutDropdown: false,
                showingQuestionsDropdown: false,
                colors: '#' + this.site.accent_color,

                getURL: {
                    'background-image': 'url("data:image/svg+xml,%3Csvg width=\'80\' height=\'80\' viewBox=\'0 0 80 80\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23' + this.site.accent_color + '\' fill-opacity=\'1\'%3E%3Cpath d=\'M50 50c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10s-10-4.477-10-10 4.477-10 10-10zM10 10c0-5.523 4.477-10 10-10s10 4.477 10 10-4.477 10-10 10c0 5.523-4.477 10-10 10S0 25.523 0 20s4.477-10 10-10zm10 8c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8zm40 40c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 3.582-8 8 3.582 8 8 8z\' /%3E%3C/g%3E%3C/g%3E%3C/svg%3E")',
                },
            };
        },

        methods: {
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
