<template>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 bg-gray-900 bg-blue-100 bg-blueGray-200 sm:items-center sm:pt-0">
        <div class="bg-white bg-white">
            <div class="relative overflow-hidden">
                <header class="relative">
                    <div class="bg-gray-900 bg-blue-100 bg-blueGray-200 w-screen pt-12">
                        <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">
                            <div class="flex items-center flex-1">
                                <div class="flex items-center justify-between w-full md:w-auto">
                                    <a href="#">
                                        <span class="sr-only">AboutContact</span>
                                        <img class="h-8 w-auto sm:h-10" :src="$page.props.logoTextURL" alt="">
                                    </a>
                                    <div class="-mr-2 flex items-center md:hidden">
                                        <button @click="showingMenu=!showingMenu" type="button" class="bg-blue-500 bg-blueGray-700 rounded-md p-2 inline-flex items-center justify-center text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" aria-expanded="false">
                                            <span class="sr-only">Open main menu</span>
                                            <!-- Heroicon name: outline/menu -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:flex md:items-center md:space-x-6">
                                <a :href="route('login')" class="text-base font-medium text-blue-500 text-blueGray-500 hover:text-blue-600 hover:text-blueGray-600">
                                    Log in
                                </a>
                                <a :href="route('register')" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 bg-blueGray-700 hover:bg-blue-600 hover:bg-blueGray-900">
                                    Register
                                </a>
                            </div>
                        </nav>
                    </div>

                    <transition
                        enter-active-class="duration-150 ease-out"
                        enter-class="opacity-0 scale-95"
                        enter-to-class="opacity-100 scale-100"
                        leave-active-class="duration-100 ease-in"
                        leave-class="opacity-100 scale-100"
                        leave-to-class="opacity-0 scale-95">
                        <div v-show="showingMenu" class="absolute top-0 z-20 inset-x-0 p-2 transition transform origin-top md:hidden">
                            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">
                                <div class="px-5 pt-4 flex items-center justify-between">
                                    <div>
                                        <span class="sr-only">AboutContact</span>
                                        <img class="h-8 w-auto" :src="$page.props.logoImageURL" alt="">
                                    </div>
                                    <div class="-mr-2">
                                        <button @click="showingMenu=!showingMenu" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600">
                                            <span class="sr-only">Close menu</span>
                                            <!-- Heroicon name: outline/x -->
                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="pt-5 pb-6">
                                    <div class="mt-6 px-5">
                                        <a :href="route('register')" class="block text-center w-full py-3 px-4 rounded-md shadow bg-blue-500 bg-blueGray-700 text-white font-medium hover:bg-blue-600 hover:bg-blueGray-900">Join Us</a>
                                    </div>
                                    <div class="mt-6 px-5">
                                        <p class="text-center text-base font-medium text-gray-600">Existing customer? <a :href="route('login')" class="text-gray-900 hover:underline">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </header>
                <main>
                    <div class="pt-10 bg-gray-900 bg-blue-100 bg-blueGray-200 sm:pt-16 lg:pt-8 lg:pb-14 relative overflow-hidden">
                        <div class="mx-auto max-w-7xl lg:px-8">
                            <div class="lg:grid lg:grid-cols-2 lg:gap-8">
                                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">
                                    <div class="opacity-10">
                                        <img class="swirlingBgImage" :class="'h-30 w-30 absolute left-0 mb-32 pointer-events-none hidden sm:flex'" :src="$page.props.logoImageURL" alt="">
                                    </div>

                                    <div class="lg:py-24 z-10">
                                        <h1 class="mt-4 text-4xl tracking-tight font-bold sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">
                                            <span class="block">Your landing page</span>
                                            <span class="pb-3 block bg-clip-text mt-3 sm:pb-5">can do more</span>
                                        </h1>
                                        <p class="text-base text-gray-800 sm:text-xl lg:text-lg xl:text-xl md:mr-10">
                                            Don’t lose your leads at the finish line. Incentivize your following to reach out with inviting, valuable forms and beautiful listing presentations. Social leads have never converted better.
                                        </p>
                                        <div class="mt-10 sm:mt-12">
                                                <div class="sm:flex sm:justify-center lg:justify-start">
                                                    <a :href="route('register')" class="my-3 sm:mt-0">
                                                        <button type="submit" class="block w-full py-4 px-6 rounded-md shadow bg-blue-500 bg-blueGray-700 text-white font-medium hover:bg-blue-600 hover:bg-blueGray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 focus:ring-offset-gray-900">Join Us</button>
                                                    </a>
                                                </div>
                                                <p class="mt-3 text-sm text-gray-800 pb-4 sm:pb-0 sm:mt-4 md:mr-10">No credit card necessary. By providing your email, you agree to our <a :href="route('terms.show')" class="font-medium text-blue-500 text-blueGray-500">terms of service</a>.</p>
<!--                                                <p class="mt-3 text-sm text-gray-800 pb-4 sm:pb-0 sm:mt-4 md:mr-10">Start your free 7-day trial, no credit card necessary. By providing your email, you agree to our <a :href="route('terms.show')" class="font-medium text-blue-500 text-blueGray-500">terms of service</a>.</p>-->
                                        </div>
                                    </div>
                                </div>

                                <div class="hidden sm:block mt-12 -mb-16 sm:m-0 sm:my-10 lg:mt-40 sm:relative pb-10 sm:pb-0">
                                    <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">
                                        <video autoplay="autoplay" muted loop="loop" playsinline="playsinline" preload="auto" class="rounded-lg shadow-xl">
                                            <source :src="$page.props.marketingVideo" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Little Message-->
                    <div class="relative px-4 py-8 sm:py-12 lg:py-16">
                        <div class="flex justify-center items-center h-56 leading-5 text-center text-gray-900 lg:m-0 xl:my-0 xl:-mx-8 md:h-56 md:my-0 md:-mx-6"
                            style="grid-column: 1 / -1;">
                            <h2 class="m-0 text-3xl font-light leading-9 text-gray-900 lg:text-5xl lg:tracking-normal md:text-4xl md:max-w-none"
                                style="text-rendering: optimizespeed; max-width: 700px;">
<!--                                Create a landing page your followers will want to engage with-->
                                To close deals you need to close leads
                            </h2>
                        </div>
                    </div>

                    <!-- Codeless site building, mt-10 if we do crooked -->
                    <!-- What's wrong with linktree? -->
                    <div class="relative bg-gray-50 pt-8 sm:pt-12 lg:pt-16 pb-32">
                        <div class="mx-auto max-w-md px-4 text-center sm:px-6 sm:max-w-3xl lg:px-8 lg:max-w-7xl">
                            <div>
<!--                                <h2 class="text-base font-semibold tracking-wider text-blue-500 uppercase">Codeless</h2>-->
                                <p class="mt-2 text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">
                                    What's Wrong With Linktree?
                                </p>
                                <p class="mt-5 max-w-prose mx-auto text-xl text-gray-600">
                                    A link tree is very useful for sharing social links between friends. For professionals, though, it can be underwhelming. When a potential client views your landing page, you need them to be incentivized to reach out and to feel that they can trust you. You need a more powerful landing page, one that can display all your information while collecting leads passively. See the difference for yourself below.
                                </p>
                            </div>
<!--                            used to have  -mb-10 sm:-mb-24 lg:-mb-80 -->
                            <div class="mt-12">
                                <img-comparison-slider class="slider-example-split-line">
                                    <figure slot="first" class="before">
                                    <img width="100%" class="rounded-lg ring-1 ring-black ring-opacity-5" :src="$page.props.linktree" alt="Linktree's interface">
                                        <figcaption>Linktree</figcaption>
                                    </figure>

                                    <figure slot="second" class="after">
                                    <img width="100%" class="rounded-lg ring-1 ring-black ring-opacity-5" :src="$page.props.us" alt="Our interface">
                                        <figcaption>Us</figcaption>
                                    </figure>

                                    <svg slot="handle" class="bg-gray-900 rounded-md" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">
                                        <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>
                                    </svg>
                                </img-comparison-slider>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial section #1 -->
                    <div class="pb-16 bg-blueGray-200 lg:pb-0 lg:z-10 lg:relative">
                        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
                            <div class="relative lg:-my-8">
                                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/3 bg-white lg:hidden"></div>
                                <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                                    <div class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                                        <img class="object-cover object-top lg:h-full lg:w-full" :src="$page.props.davidTran" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                                    <blockquote>
                                        <div>
                                            <svg class="h-12 w-12 text-gray-900 opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                            </svg>
                                            <p class="mt-6 text-2xl font-medium text-gray-900">
                                                “I have been using it for 5 months now and I love the form’s aesthetic. I have had others in my office ask if I made the website and how long it took me and I just send them here.”
                                            </p>
                                        </div>
                                        <footer class="mt-6">
                                            <p class="text-base font-medium text-gray-900">David Tran</p>
                                            <p class="text-base font-medium text-blue-900">Realtor in Boston</p>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Forms -->
                    <div class="relative bg-gray-50 bg-white pt-16 pb-32 overflow-hidden">
                        <div class="mt-24 relative">
                            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                                <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0">
                                    <div>
                                        <div>
                                            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-blue-600">
                                                <!-- Heroicon name: outline/sparkles -->
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="mt-6">
                                            <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                                                Build beautiful forms
                                            </h2>
                                            <p class="mt-4 text-lg text-gray-600">
                                                Don't lose your client at the finish line. Create forms that engage them by asking them questions conversationally to increase your conversion rate and generate social leads.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-12 sm:mt-16 lg:mt-0">
                                    <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                                        <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none" :src="$page.props.beautifulForms" alt="Conversational Forms interface">
                                    </div>
                                </div>
<!--                                <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">-->
<!--                                    <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">-->
<!--                                        <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" :src="$page.props.leads" alt="List of leads interface">-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>
                        </div>
                        <div class="mt-24">
                            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">
                                <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">
                                    <div>
                                        <div>
                                            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-blue-600">
                                                <!-- Heroicon name: outline/inbox -->
                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="mt-6">
                                            <h2 class="text-3xl font-bold tracking-tight text-gray-900">
                                                Manage all your leads in one place.
                                            </h2>
                                            <p class="mt-4 text-lg text-gray-600">
                                                Never lose information on a lead again. We compile responses and contact information in an easy-to-use CRM that ensures everyone is always just a phone call away. Manage your leads by leaving notes based on where they are in your sales funnel.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">
                                    <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">
                                        <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" :src="$page.props.leads" alt="List of leads interface">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Testimonial section #2 -->
                    <div class="pb-16 bg-blueGray-200 lg:pb-0 lg:z-10 lg:relative">
                        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
                            <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                                    <blockquote>
                                        <div>
                                            <svg class="h-12 w-12 text-gray-900 opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
                                            </svg>
                                            <p class="mt-6 text-2xl font-medium text-gray-900">
                                                “The form templates are great and I am able to promote them with stories and posts. By advertising the form 'Get a free home appraisal' I've already gotten 6 leads this month.”
                                            </p>
                                        </div>
                                        <footer class="mt-6">
                                            <p class="text-base font-medium text-gray-900">Chris Whalen</p>
                                            <p class="text-base font-medium text-blue-900">Realtor in Tucson</p>
                                        </footer>
                                    </blockquote>
                                </div>
                            </div>
                            <div class="relative lg:-my-8 right-0">
                                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/3 bg-white lg:hidden"></div>
                                <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                                    <div class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                                        <img class="object-cover object-top lg:h-full lg:w-full" :src="$page.props.chrisWhalen" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blog section -->
                    <div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">
                        <div class="relative">
                            <div class="text-center mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">
                                <h2 class="text-base font-semibold tracking-wider text-blue-500 uppercase">Take a look</h2>
                                <p class="mt-2 text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">
                                    View Actual Sites
                                </p>
                                <p class="mt-5 mx-auto max-w-prose text-xl text-gray-600">
                                    Here's a few sites that have been built using our technology. We'd love for you to take a look!
                                </p>
                            </div>
                            <div class="mt-12 mx-auto max-w-md px-4 grid gap-8 sm:max-w-lg sm:px-6 lg:px-8 lg:grid-cols-3 lg:max-w-7xl">

                                <a href="http://about.contact/ExampleOne" class="hover:opacity-75">
                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                                        <div class="flex-shrink-0">
                                            <img class="h-48 w-full object-cover" :src="$page.props.standard" alt="">
                                        </div>
                                        <div class="flex-1 bg-white p-6 flex flex-col justify-between bg-gray-100">
                                            <div class="flex-1">
                                                <p class="text-xl font-semibold text-gray-900">
                                                    <a href="http://about.contact/ExampleOne" class="hover:underline">
                                                        Uses the Standard Layout
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="http://about.contact/ExampleTwo" class="hover:opacity-75">
                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                                        <div class="flex-shrink-0">
                                            <img class="h-48 w-full object-cover" :src="$page.props.loganMiller" alt="">
                                        </div>
                                        <div class="flex-1 bg-white p-6 flex flex-col justify-between bg-gray-100">
                                            <div class="flex-1">
                                                <p class="text-xl font-semibold text-gray-900">
                                                    <a href="http://about.contact/ExampleTwo" class="hover:underline">
                                                        Uses the Mobile Profile Layout
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                                <a href="http://about.contact/ExampleThree" class="hover:opacity-75">
                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                                        <div class="flex-shrink-0">
                                            <img class="h-48 w-full object-cover" :src="$page.props.ricardoCooper" alt="">
                                        </div>
                                        <div class="flex-1 bg-white p-6 flex flex-col justify-between bg-gray-100">
                                            <div class="flex-1">
                                                <p class="text-xl font-semibold text-gray-900">
                                                    <a href="http://about.contact/ExampleThree" class="hover:underline">
                                                        Uses the Branded Left Layout
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- CTA Section -->
                    <div class="relative bg-gray-900">
                        <div class="relative h-56 bg-blue-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
                            <img class="w-full h-full object-cover" :src="$page.props.twoPeopleAroundLaptop" alt="">
                            <div aria-hidden="true" class="absolute inset-0 bg-blue-500 opacity-50 mix-blend-multiply"></div>
                        </div>
                        <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">
                            <div class="md:ml-auto md:w-1/2 md:pl-10">
                                <p class="mt-2 text-white text-3xl font-bold tracking-tight sm:text-4xl">
                                    We’re here to help
                                </p>
                                <p class="mt-3 text-lg text-gray-300">
                                    Marketing your brand is complicated enough. Let us take the stress out of designing an entire website by filling in our professionally built templates. If you're not satisfied with the product, no worries! You can cancel your trial at any time.
                                </p>
                                <div class="mt-8">
                                    <div class="inline-flex rounded-md shadow">
                                        <a :href="route('register')" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">
                                            Join Us
                                            <!-- Heroicon name: solid/external-link -->
                                            <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />
                                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <footer class="bg-gray-50" aria-labelledby="footerHeading">
                    <h2 id="footerHeading" class="sr-only">Footer</h2>
                    <div class="max-w-md mx-auto px-4 sm:max-w-7xl sm:px-6 lg:px-8">
                        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                        </div>
                        <div class="mt-12 border-t border-gray-200 py-8">
                            <p class="text-base text-gray-400 xl:text-center">
                                &copy; 2021 AboutContact. All rights reserved.
                            </p>
                            <p class="text-base text-gray-400 xl:text-center">
                                help@about.contact
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

    </div>
</template>

<style scoped>
    .bg-gray-100 {
        background-color: #f7fafc;
        background-color: rgba(247, 250, 252, var(--tw-bg-opacity));
    }

    .border-gray-200 {
        border-color: #edf2f7;
        border-color: rgba(237, 242, 247, var(--tw-border-opacity));
    }

    .text-gray-400 {
        color: #cbd5e0;
        color: rgba(203, 213, 224, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #a0aec0;
        color: rgba(160, 174, 192, var(--tw-text-opacity));
    }

    .text-gray-600 {
        color: #718096;
        color: rgba(113, 128, 150, var(--tw-text-opacity));
    }

    .text-gray-700 {
        color: #4a5568;
        color: rgba(74, 85, 104, var(--tw-text-opacity));
    }

    .text-gray-900 {
        color: #1a202c;
        color: rgba(26, 32, 44, var(--tw-text-opacity));
    }

    @media (prefers-color-scheme: dark) {
        .dark\:bg-gray-800 {
            background-color: #2d3748;
            background-color: rgba(45, 55, 72, var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            background-color: #1a202c;
            background-color: rgba(26, 32, 44, var(--tw-bg-opacity));
        }

        .dark\:border-gray-700 {
            border-color: #4a5568;
            border-color: rgba(74, 85, 104, var(--tw-border-opacity));
        }

        .dark\:text-white {
            color: #fff;
            color: rgba(255, 255, 255, var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--tw-text-opacity));
        }
    }

    @keyframes spin {
        from {transform:rotate(0deg);}
        to {transform:rotate(360deg);}
    }

    .swirlingBgImage {
        animation-name: spin;
        animation-duration: 200000ms;
        animation-iteration-count: infinite;
        animation-timing-function: linear;
        z-index: -30;
        /*transform-origin: top left;*/
    }

    .before,
    .after {
        margin: 0;
    }

    .before figcaption,
    .after figcaption {
        background: #fff;
        border: 1px solid #c0c0c0;
        border-radius: 12px;
        color: #2e3452;
        opacity: 0.8;
        padding: 12px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        line-height: 100%;
    }

    .before figcaption {
        left: 12px;
    }

    .after figcaption {
        right: 12px;
    }

    .slider-example-split-line {
        --divider-width: 4px;
        --divider-color: rgb(0, 0, 0);
        --default-handle-color: rgb(0, 0, 0);
    }

    .slider-example-opacity-and-size:focus {
        outline: none
    }
</style>

<script>
    import HTMLImgComparisonSliderElement from 'img-comparison-slider';
    export default {
        props: [],

        data() {
            return {
                showingMenu: false,
            };
        },
    }
</script>
