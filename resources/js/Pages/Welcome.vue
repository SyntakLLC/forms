<template>
    <!--    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 bg-gray-900 bg-blue-100 bg-blueGray-200 sm:items-center sm:pt-0">-->
    <!--        <div class="bg-white bg-white">-->
    <!--            <div class="relative overflow-hidden">-->
    <!--                <header class="relative">-->
    <!--                    <div class="bg-gray-900 bg-blue-100 bg-blueGray-200 w-screen pt-12">-->
    <!--                        <nav class="relative max-w-7xl mx-auto flex items-center justify-between px-4 sm:px-6" aria-label="Global">-->
    <!--                            <div class="flex items-center flex-1">-->
    <!--                                <div class="flex items-center justify-between w-full md:w-auto">-->
    <!--                                    <a href="#">-->
    <!--                                        <span class="sr-only">AboutContact</span>-->
    <!--                                        <img class="h-8 w-auto sm:h-10" :src="$page.props.logoTextURL" alt="">-->
    <!--                                    </a>-->
    <!--                                    <div class="-mr-2 flex items-center md:hidden">-->
    <!--                                        <button @click="showingMenu=!showingMenu" type="button" class="bg-blue-500 bg-blueGray-700 rounded-md p-2 inline-flex items-center justify-center text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus-ring-inset focus:ring-white" aria-expanded="false">-->
    <!--                                            <span class="sr-only">Open main menu</span>-->
    <!--                                            &lt;!&ndash; Heroicon name: outline/menu &ndash;&gt;-->
    <!--                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
    <!--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />-->
    <!--                                            </svg>-->
    <!--                                        </button>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="hidden md:flex md:items-center md:space-x-6">-->
    <!--                                <a :href="route('login')" class="text-base font-medium text-blue-500 text-blueGray-500 hover:text-blue-600 hover:text-blueGray-600">-->
    <!--                                    Log in-->
    <!--                                </a>-->
    <!--                                <a :href="route('register')" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-blue-500 bg-blueGray-700 hover:bg-blue-600 hover:bg-blueGray-900">-->
    <!--                                    Register-->
    <!--                                </a>-->
    <!--                            </div>-->
    <!--                        </nav>-->
    <!--                    </div>-->

    <!--                    <transition-->
    <!--                        enter-active-class="duration-150 ease-out"-->
    <!--                        enter-class="opacity-0 scale-95"-->
    <!--                        enter-to-class="opacity-100 scale-100"-->
    <!--                        leave-active-class="duration-100 ease-in"-->
    <!--                        leave-class="opacity-100 scale-100"-->
    <!--                        leave-to-class="opacity-0 scale-95">-->
    <!--                        <div v-show="showingMenu" class="absolute top-0 z-20 inset-x-0 p-2 transition transform origin-top md:hidden">-->
    <!--                            <div class="rounded-lg shadow-md bg-white ring-1 ring-black ring-opacity-5 overflow-hidden">-->
    <!--                                <div class="px-5 pt-4 flex items-center justify-between">-->
    <!--                                    <div>-->
    <!--                                        <span class="sr-only">AboutContact</span>-->
    <!--                                        <img class="h-8 w-auto" :src="$page.props.logoImageURL" alt="">-->
    <!--                                    </div>-->
    <!--                                    <div class="-mr-2">-->
    <!--                                        <button @click="showingMenu=!showingMenu" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-cyan-600">-->
    <!--                                            <span class="sr-only">Close menu</span>-->
    <!--                                            &lt;!&ndash; Heroicon name: outline/x &ndash;&gt;-->
    <!--                                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
    <!--                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />-->
    <!--                                            </svg>-->
    <!--                                        </button>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="pt-5 pb-6">-->
    <!--                                    <div class="mt-6 px-5">-->
    <!--                                        <a :href="route('register')" class="block text-center w-full py-3 px-4 rounded-md shadow bg-blue-500 bg-blueGray-700 text-white font-medium hover:bg-blue-600 hover:bg-blueGray-900">Join Us</a>-->
    <!--                                    </div>-->
    <!--                                    <div class="mt-6 px-5">-->
    <!--                                        <p class="text-center text-base font-medium text-gray-600">Existing customer? <a :href="route('login')" class="text-gray-900 hover:underline">Login</a></p>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </transition>-->
    <!--                </header>-->
    <!--                <main>-->
    <!--                    <div class="pt-10 bg-gray-900 bg-blue-100 bg-blueGray-200 sm:pt-16 lg:pt-8 lg:pb-14 relative overflow-hidden">-->
    <!--                        <div class="mx-auto max-w-7xl lg:px-8">-->
    <!--                            <div class="lg:grid lg:grid-cols-2 lg:gap-8">-->
    <!--                                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 sm:text-center lg:px-0 lg:text-left lg:flex lg:items-center">-->
    <!--                                    <div class="opacity-10">-->
    <!--                                        <img class="swirlingBgImage" :class="'h-30 w-30 absolute left-0 mb-32 pointer-events-none hidden sm:flex'" :src="$page.props.logoImageURL" alt="">-->
    <!--                                    </div>-->

    <!--                                    <div class="lg:py-24 z-10">-->
    <!--                                        <h1 class="mt-4 text-4xl tracking-tight font-bold sm:mt-5 sm:text-6xl lg:mt-6 xl:text-6xl">-->
    <!--                                            <span class="block">Your landing page</span>-->
    <!--                                            <span class="pb-3 block bg-clip-text mt-3 sm:pb-5">can do more</span>-->
    <!--                                        </h1>-->
    <!--                                        <p class="text-base text-gray-800 sm:text-xl lg:text-lg xl:text-xl md:mr-10">-->
    <!--                                            Don’t lose your leads at the finish line. Incentivize your following to reach out with inviting, valuable forms and beautiful listing presentations. Social leads have never converted better.-->
    <!--                                        </p>-->
    <!--                                        <div class="mt-10 sm:mt-12">-->
    <!--                                                <div class="sm:flex sm:justify-center lg:justify-start">-->
    <!--                                                    <a :href="route('register')" class="my-3 sm:mt-0">-->
    <!--                                                        <button type="submit" class="block w-full py-4 px-6 rounded-md shadow bg-blue-500 bg-blueGray-700 text-white font-medium hover:bg-blue-600 hover:bg-blueGray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-400 focus:ring-offset-gray-900">Join Us</button>-->
    <!--                                                    </a>-->
    <!--                                                </div>-->
    <!--                                                <p class="mt-3 text-sm text-gray-800 pb-4 sm:pb-0 sm:mt-4 md:mr-10">No credit card necessary. By providing your email, you agree to our <a :href="route('terms.show')" class="font-medium text-blue-500 text-blueGray-500">terms of service</a>.</p>-->
    <!--&lt;!&ndash;                                                <p class="mt-3 text-sm text-gray-800 pb-4 sm:pb-0 sm:mt-4 md:mr-10">Start your free 7-day trial, no credit card necessary. By providing your email, you agree to our <a :href="route('terms.show')" class="font-medium text-blue-500 text-blueGray-500">terms of service</a>.</p>&ndash;&gt;-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->

    <!--                                <div class="hidden sm:block mt-12 -mb-16 sm:m-0 sm:my-10 lg:mt-40 sm:relative pb-10 sm:pb-0">-->
    <!--                                    <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:max-w-none lg:px-0">-->
    <!--                                        <video autoplay="autoplay" muted loop="loop" playsinline="playsinline" preload="auto" class="rounded-lg shadow-xl">-->
    <!--                                            <source :src="$page.props.marketingVideo" type="video/mp4">-->
    <!--                                        </video>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash;Little Message&ndash;&gt;-->
    <!--                    <div class="relative px-4 py-8 sm:py-12 lg:py-16">-->
    <!--                        <div class="flex justify-center items-center h-56 leading-5 text-center text-gray-900 lg:m-0 xl:my-0 xl:-mx-8 md:h-56 md:my-0 md:-mx-6"-->
    <!--                            style="grid-column: 1 / -1;">-->
    <!--                            <h2 class="m-0 text-3xl font-light leading-9 text-gray-900 lg:text-5xl lg:tracking-normal md:text-4xl md:max-w-none"-->
    <!--                                style="text-rendering: optimizespeed; max-width: 700px;">-->
    <!--&lt;!&ndash;                                Create a landing page your followers will want to engage with&ndash;&gt;-->
    <!--                                To close deals you need to close leads-->
    <!--                            </h2>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash; Codeless site building, mt-10 if we do crooked &ndash;&gt;-->
    <!--                    &lt;!&ndash; What's wrong with linktree? &ndash;&gt;-->
    <!--                    <div class="relative bg-gray-50 pt-8 sm:pt-12 lg:pt-16 pb-32">-->
    <!--                        <div class="mx-auto max-w-md px-4 text-center sm:px-6 sm:max-w-3xl lg:px-8 lg:max-w-7xl">-->
    <!--                            <div>-->
    <!--&lt;!&ndash;                                <h2 class="text-base font-semibold tracking-wider text-blue-500 uppercase">Codeless</h2>&ndash;&gt;-->
    <!--                                <p class="mt-2 text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">-->
    <!--                                    What's Wrong With Linktree?-->
    <!--                                </p>-->
    <!--                                <p class="mt-5 max-w-prose mx-auto text-xl text-gray-600">-->
    <!--                                    A link tree is very useful for sharing social links between friends. For professionals, though, it can be underwhelming. When a potential client views your landing page, you need them to be incentivized to reach out and to feel that they can trust you. You need a more powerful landing page, one that can display all your information while collecting leads passively. See the difference for yourself below.-->
    <!--                                </p>-->
    <!--                            </div>-->
    <!--&lt;!&ndash;                            used to have  -mb-10 sm:-mb-24 lg:-mb-80 &ndash;&gt;-->
    <!--                            <div class="mt-12">-->
    <!--                                <img-comparison-slider class="slider-example-split-line">-->
    <!--                                    <figure slot="first" class="before">-->
    <!--                                    <img width="100%" class="rounded-lg ring-1 ring-black ring-opacity-5" :src="$page.props.linktree" alt="Linktree's interface">-->
    <!--                                        <figcaption>Linktree</figcaption>-->
    <!--                                    </figure>-->

    <!--                                    <figure slot="second" class="after">-->
    <!--                                    <img width="100%" class="rounded-lg ring-1 ring-black ring-opacity-5" :src="$page.props.us" alt="Our interface">-->
    <!--                                        <figcaption>Us</figcaption>-->
    <!--                                    </figure>-->

    <!--                                    <svg slot="handle" class="bg-gray-900 rounded-md" xmlns="http://www.w3.org/2000/svg" width="100" viewBox="-8 -3 16 6">-->
    <!--                                        <path stroke="#fff" d="M -5 -2 L -7 0 L -5 2 M -5 -2 L -5 2 M 5 -2 L 7 0 L 5 2 M 5 -2 L 5 2" stroke-width="1" fill="#fff" vector-effect="non-scaling-stroke"></path>-->
    <!--                                    </svg>-->
    <!--                                </img-comparison-slider>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash; Testimonial section #1 &ndash;&gt;-->
    <!--                    <div class="pb-16 bg-blueGray-200 lg:pb-0 lg:z-10 lg:relative">-->
    <!--                        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">-->
    <!--                            <div class="relative lg:-my-8">-->
    <!--                                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/3 bg-white lg:hidden"></div>-->
    <!--                                <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">-->
    <!--                                    <div class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">-->
    <!--                                        <img class="object-cover object-top lg:h-full lg:w-full" :src="$page.props.davidTran" alt="">-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">-->
    <!--                                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">-->
    <!--                                    <blockquote>-->
    <!--                                        <div>-->
    <!--                                            <svg class="h-12 w-12 text-gray-900 opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">-->
    <!--                                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />-->
    <!--                                            </svg>-->
    <!--                                            <p class="mt-6 text-2xl font-medium text-gray-900">-->
    <!--                                                “I have been using it for 5 months now and I love the form’s aesthetic. I have had others in my office ask if I made the website and how long it took me and I just send them here.”-->
    <!--                                            </p>-->
    <!--                                        </div>-->
    <!--                                        <footer class="mt-6">-->
    <!--                                            <p class="text-base font-medium text-gray-900">David Tran</p>-->
    <!--                                            <p class="text-base font-medium text-blue-900">Realtor in Boston</p>-->
    <!--                                        </footer>-->
    <!--                                    </blockquote>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash; Forms &ndash;&gt;-->
    <!--                    <div class="relative bg-gray-50 bg-white pt-16 pb-32 overflow-hidden">-->
    <!--                        <div class="mt-24 relative">-->
    <!--                            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">-->
    <!--                                <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0">-->
    <!--                                    <div>-->
    <!--                                        <div>-->
    <!--                                            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-blue-600">-->
    <!--                                                &lt;!&ndash; Heroicon name: outline/sparkles &ndash;&gt;-->
    <!--                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
    <!--                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />-->
    <!--                                                </svg>-->
    <!--                                            </span>-->
    <!--                                        </div>-->
    <!--                                        <div class="mt-6">-->
    <!--                                            <h2 class="text-3xl font-bold tracking-tight text-gray-900">-->
    <!--                                                Build beautiful forms-->
    <!--                                            </h2>-->
    <!--                                            <p class="mt-4 text-lg text-gray-600">-->
    <!--                                                Don't lose your client at the finish line. Create forms that engage them by asking them questions conversationally to increase your conversion rate and generate social leads.-->
    <!--                                            </p>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="mt-12 sm:mt-16 lg:mt-0">-->
    <!--                                    <div class="pl-4 -mr-48 sm:pl-6 md:-mr-16 lg:px-0 lg:m-0 lg:relative lg:h-full">-->
    <!--                                        <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:left-0 lg:h-full lg:w-auto lg:max-w-none" :src="$page.props.beautifulForms" alt="Conversational Forms interface">-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--&lt;!&ndash;                                <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">&ndash;&gt;-->
    <!--&lt;!&ndash;                                        <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" :src="$page.props.leads" alt="List of leads interface">&ndash;&gt;-->
    <!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
    <!--&lt;!&ndash;                                </div>&ndash;&gt;-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                        <div class="mt-24">-->
    <!--                            <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:grid-flow-col-dense lg:gap-24">-->
    <!--                                <div class="px-4 max-w-xl mx-auto sm:px-6 lg:py-32 lg:max-w-none lg:mx-0 lg:px-0 lg:col-start-2">-->
    <!--                                    <div>-->
    <!--                                        <div>-->
    <!--                                            <span class="h-12 w-12 rounded-md flex items-center justify-center bg-blue-600">-->
    <!--                                                &lt;!&ndash; Heroicon name: outline/inbox &ndash;&gt;-->
    <!--                                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">-->
    <!--                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />-->
    <!--                                                </svg>-->
    <!--                                            </span>-->
    <!--                                        </div>-->
    <!--                                        <div class="mt-6">-->
    <!--                                            <h2 class="text-3xl font-bold tracking-tight text-gray-900">-->
    <!--                                                Manage all your leads in one place.-->
    <!--                                            </h2>-->
    <!--                                            <p class="mt-4 text-lg text-gray-600">-->
    <!--                                                Never lose information on a lead again. We compile responses and contact information in an easy-to-use CRM that ensures everyone is always just a phone call away. Manage your leads by leaving notes based on where they are in your sales funnel.-->
    <!--                                            </p>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                                <div class="mt-12 sm:mt-16 lg:mt-0 lg:col-start-1">-->
    <!--                                    <div class="pr-4 -ml-48 sm:pr-6 md:-ml-16 lg:px-0 lg:m-0 lg:relative lg:h-full">-->
    <!--                                        <img class="w-full rounded-xl shadow-xl ring-1 ring-black ring-opacity-5 lg:absolute lg:right-0 lg:h-full lg:w-auto lg:max-w-none" :src="$page.props.leads" alt="List of leads interface">-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash; Testimonial section #2 &ndash;&gt;-->
    <!--                    <div class="pb-16 bg-blueGray-200 lg:pb-0 lg:z-10 lg:relative">-->
    <!--                        <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">-->
    <!--                            <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">-->
    <!--                                <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">-->
    <!--                                    <blockquote>-->
    <!--                                        <div>-->
    <!--                                            <svg class="h-12 w-12 text-gray-900 opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">-->
    <!--                                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />-->
    <!--                                            </svg>-->
    <!--                                            <p class="mt-6 text-2xl font-medium text-gray-900">-->
    <!--                                                “The form templates are great and I am able to promote them with stories and posts. By advertising the form 'Get a free home appraisal' I've already gotten 6 leads this month.”-->
    <!--                                            </p>-->
    <!--                                        </div>-->
    <!--                                        <footer class="mt-6">-->
    <!--                                            <p class="text-base font-medium text-gray-900">Chris Whalen</p>-->
    <!--                                            <p class="text-base font-medium text-blue-900">Realtor in Tucson</p>-->
    <!--                                        </footer>-->
    <!--                                    </blockquote>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="relative lg:-my-8 right-0">-->
    <!--                                <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/3 bg-white lg:hidden"></div>-->
    <!--                                <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">-->
    <!--                                    <div class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">-->
    <!--                                        <img class="object-cover object-top lg:h-full lg:w-full" :src="$page.props.chrisWhalen" alt="">-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash; Blog section &ndash;&gt;-->
    <!--                    <div class="relative bg-gray-50 py-16 sm:py-24 lg:py-32">-->
    <!--                        <div class="relative">-->
    <!--                            <div class="text-center mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl">-->
    <!--                                <h2 class="text-base font-semibold tracking-wider text-blue-500 uppercase">Take a look</h2>-->
    <!--                                <p class="mt-2 text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">-->
    <!--                                    View Actual Sites-->
    <!--                                </p>-->
    <!--                                <p class="mt-5 mx-auto max-w-prose text-xl text-gray-600">-->
    <!--                                    Here's a few sites that have been built using our technology. We'd love for you to take a look!-->
    <!--                                </p>-->
    <!--                            </div>-->
    <!--                            <div class="mt-12 mx-auto max-w-md px-4 grid gap-8 sm:max-w-lg sm:px-6 lg:px-8 lg:grid-cols-3 lg:max-w-7xl">-->

    <!--                                <a href="http://about.contact/ExampleOne" class="hover:opacity-75">-->
    <!--                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">-->
    <!--                                        <div class="flex-shrink-0">-->
    <!--                                            <img class="h-48 w-full object-cover" :src="$page.props.standard" alt="">-->
    <!--                                        </div>-->
    <!--                                        <div class="flex-1 bg-white p-6 flex flex-col justify-between bg-gray-100">-->
    <!--                                            <div class="flex-1">-->
    <!--                                                <p class="text-xl font-semibold text-gray-900">-->
    <!--                                                    <a href="http://about.contact/ExampleOne" class="hover:underline">-->
    <!--                                                        Uses the Standard Layout-->
    <!--                                                    </a>-->
    <!--                                                </p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </a>-->

    <!--                                <a href="http://about.contact/ExampleTwo" class="hover:opacity-75">-->
    <!--                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">-->
    <!--                                        <div class="flex-shrink-0">-->
    <!--                                            <img class="h-48 w-full object-cover" :src="$page.props.loganMiller" alt="">-->
    <!--                                        </div>-->
    <!--                                        <div class="flex-1 bg-white p-6 flex flex-col justify-between bg-gray-100">-->
    <!--                                            <div class="flex-1">-->
    <!--                                                <p class="text-xl font-semibold text-gray-900">-->
    <!--                                                    <a href="http://about.contact/ExampleTwo" class="hover:underline">-->
    <!--                                                        Uses the Mobile Profile Layout-->
    <!--                                                    </a>-->
    <!--                                                </p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </a>-->

    <!--                                <a href="http://about.contact/ExampleThree" class="hover:opacity-75">-->
    <!--                                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">-->
    <!--                                        <div class="flex-shrink-0">-->
    <!--                                            <img class="h-48 w-full object-cover" :src="$page.props.ricardoCooper" alt="">-->
    <!--                                        </div>-->
    <!--                                        <div class="flex-1 bg-white p-6 flex flex-col justify-between bg-gray-100">-->
    <!--                                            <div class="flex-1">-->
    <!--                                                <p class="text-xl font-semibold text-gray-900">-->
    <!--                                                    <a href="http://about.contact/ExampleThree" class="hover:underline">-->
    <!--                                                        Uses the Branded Left Layout-->
    <!--                                                    </a>-->
    <!--                                                </p>-->
    <!--                                            </div>-->
    <!--                                        </div>-->
    <!--                                    </div>-->
    <!--                                </a>-->

    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->

    <!--                    &lt;!&ndash; CTA Section &ndash;&gt;-->
    <!--                    <div class="relative bg-gray-900">-->
    <!--                        <div class="relative h-56 bg-blue-600 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">-->
    <!--                            <img class="w-full h-full object-cover" :src="$page.props.twoPeopleAroundLaptop" alt="">-->
    <!--                            <div aria-hidden="true" class="absolute inset-0 bg-blue-500 opacity-50 mix-blend-multiply"></div>-->
    <!--                        </div>-->
    <!--                        <div class="relative mx-auto max-w-md px-4 py-12 sm:max-w-7xl sm:px-6 sm:py-20 md:py-28 lg:px-8 lg:py-32">-->
    <!--                            <div class="md:ml-auto md:w-1/2 md:pl-10">-->
    <!--                                <p class="mt-2 text-white text-3xl font-bold tracking-tight sm:text-4xl">-->
    <!--                                    We’re here to help-->
    <!--                                </p>-->
    <!--                                <p class="mt-3 text-lg text-gray-300">-->
    <!--                                    Marketing your brand is complicated enough. Let us take the stress out of designing an entire website by filling in our professionally built templates. If you're not satisfied with the product, no worries! You can cancel your trial at any time.-->
    <!--                                </p>-->
    <!--                                <div class="mt-8">-->
    <!--                                    <div class="inline-flex rounded-md shadow">-->
    <!--                                        <a :href="route('register')" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">-->
    <!--                                            Join Us-->
    <!--                                            &lt;!&ndash; Heroicon name: solid/external-link &ndash;&gt;-->
    <!--                                            <svg class="-mr-1 ml-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">-->
    <!--                                                <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" />-->
    <!--                                                <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" />-->
    <!--                                            </svg>-->
    <!--                                        </a>-->
    <!--                                    </div>-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </main>-->

    <!--                <footer class="bg-gray-50" aria-labelledby="footerHeading">-->
    <!--                    <h2 id="footerHeading" class="sr-only">Footer</h2>-->
    <!--                    <div class="max-w-md mx-auto px-4 sm:max-w-7xl sm:px-6 lg:px-8">-->
    <!--                        <div class="xl:grid xl:grid-cols-3 xl:gap-8">-->
    <!--                        </div>-->
    <!--                        <div class="mt-12 border-t border-gray-200 py-8">-->
    <!--                            <p class="text-base text-gray-400 xl:text-center">-->
    <!--                                &copy; 2021 AboutContact. All rights reserved.-->
    <!--                            </p>-->
    <!--                            <p class="text-base text-gray-400 xl:text-center">-->
    <!--                                help@about.contact-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </footer>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->


    <!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
      require('@tailwindcss/aspect-ratio'),
    ],
  }
  ```
-->
    <div class="bg-white">

        <!-- Hero section -->
        <div class="relative bg-gray-900">
            <!-- Decorative image and overlay -->
            <div aria-hidden="true" class="absolute inset-0 overflow-hidden">
                <img src="https://tailwindui.com/img/ecommerce-images/home-page-01-hero-full-width.jpg" alt=""
                     class="w-full h-full object-center object-cover">
            </div>
            <div aria-hidden="true" class="absolute inset-0 bg-gray-900 opacity-50"></div>

            <!-- Navigation -->
            <header class="relative z-10">
                <nav aria-label="Top">

                    <!-- Secondary navigation -->
                    <div class="backdrop-blur-md backdrop-filter bg-opacity-10 bg-white">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div>
                                <div class="h-16 flex items-center justify-between">
                                    <!-- Logo (lg+) -->
                                    <div class="hidden lg:flex-1 lg:flex lg:items-center">
                                        <a href="#">
                                            <span class="sr-only">Workflow</span>
                                            <img class="h-8 w-auto"
                                                 src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white"
                                                 alt="">
                                        </a>
                                    </div>

                                    <div class="hidden h-full lg:flex">
                                    </div>

                                    <!-- Logo (lg-) -->
                                    <a href="#" class="lg:hidden">
                                        <span class="sr-only">Workflow</span>
                                        <img src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt=""
                                             class="h-8 w-auto">
                                    </a>

                                    <div class="flex-1 flex items-center justify-end">
                                        <a :href="route('login')" class="text-sm font-medium text-white block">
                                            Login
                                        </a>

                                        <div class="flex items-center ml-8">
                                            <a :href="route('register')" class="text-sm font-medium text-white block">Register</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="relative max-w-3xl mx-auto py-32 px-6 flex flex-col items-center text-center sm:py-64 lg:px-0">
                <h1 class="text-4xl font-extrabold tracking-tight text-white lg:text-6xl">Own your leads</h1>
                <p class="mt-4 text-xl text-white">More than 80% of people leave your website before
                    submitting any contact information. Implement conversational lead-gen forms to grow your lead base
                    organically.</p>
                <a :href="route('register')"
                   class="mt-8 inline-block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100">Join
                    Us</a>
            </div>
        </div>

        <main>
            <!--Little Message-->
            <div class="relative px-4 py-8 sm:py-12 lg:py-16">
                <div
                    class="flex justify-center items-center h-56 leading-5 text-center text-gray-900 lg:m-0 xl:my-0 xl:-mx-8 md:h-56 md:my-0 md:-mx-6"
                    style="grid-column: 1 / -1;">
                    <h2 class="m-0 text-3xl font-light leading-9 text-gray-900 lg:text-5xl lg:tracking-normal md:text-4xl md:max-w-none"
                        style="text-rendering: optimizespeed; max-width: 700px;">
                        <!--                                Create a landing page your followers will want to engage with-->
                        To close deals you need to close leads
                    </h2>
                </div>
            </div>

            <!-- content -->
            <div class="bg-blueGray-100">

                <!-- 3 steps -->
                <div
                    class="grid justify-center py-0 px-8 leading-5 text-gray-900 bg-blueGray-100"
                    style="grid-template-columns: repeat(4, 1fr); gap: 0px 24px;"
                >
                    <div
                        class="grid content-center items-center pt-24 text-gray-900 xl:not-italic md:text-center"
                        style="grid-column: 1 / -1;"
                    >
                        <div
                            class="my-0 mx-auto font-medium text-center lg:text-base lg:leading-6 md:text-sm md:leading-5"
                            style="max-width: 440px; grid-column: 1 / -1;"
                        >
                            <div
                                class="my-5 mx-0 tracking-widest leading-6 uppercase md:mx-0 md:my-5"
                                style="grid-column: 1 / -1;"
                            >
                                What's different?
                            </div>
                            <p
                                size="1"
                                class="mx-0 mt-0 mb-5 text-xl font-light tracking-normal leading-7 md:text-2xl md:leading-8"
                            >
                                Let's face it — no one wants to fill out a stack of text boxes.
                                Conversational forms engages your audience while exuding an aura
                                of professionalism.
                            </p>

                            <div class="mt-8">
<!--                                <img-->
<!--                                    src="https://tailwindui.com/img/ecommerce-images/home-page-01-feature-section-02.jpg"-->
<!--                                    alt="" class="w-full h-full object-center object-cover rounded-lg">-->
                                <img
                                    :src="$page.props.whatsDifferent"
                                    alt="" class="w-full h-full object-center object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-center my-0 mx-auto text-gray-900"
                        style="grid-column: 1 / -1;"
                    ></div>
                    <div
                        class="grid content-center items-center pt-24 text-gray-900 xl:not-italic md:text-center"
                        style="grid-column: 1 / -1;"
                    >
                        <div
                            class="my-0 mx-auto font-medium text-center lg:text-base lg:leading-6 md:text-sm md:leading-5"
                            style="max-width: 440px; grid-column: 1 / -1;"
                        >
                            <div
                                class="my-5 mx-0 tracking-widest leading-6 uppercase md:mx-0 md:my-5"
                                style="grid-column: 1 / -1;"
                            >
                                Built for leads
                            </div>
                            <p
                                size="1"
                                class="mx-0 mt-0 mb-5 text-xl font-light tracking-normal leading-7 md:text-2xl md:leading-8"
                            >
                                Never lose someone in your sales funnel again. When a form is
                                filled out, the information gets compiled into a
                                lead in our easy-to-use CRM.
                            </p>

                            <div class="mt-8">
<!--                                <img-->
<!--                                    src="https://tailwindui.com/img/ecommerce-images/home-page-01-feature-section-02.jpg"-->
<!--                                    alt="" class="w-full h-full object-center object-cover rounded-lg">-->
                                <img
                                    :src="$page.props.leads"
                                    alt="" class="w-full h-full object-center object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                    <div
                        class="grid content-center items-center pt-24 text-gray-900 xl:not-italic md:text-center"
                        style="grid-column: 1 / -1;"
                    >
                        <div
                            class="my-0 mx-auto font-medium text-center lg:text-base lg:leading-6 md:text-sm md:leading-5"
                            style="max-width: 440px; grid-column: 1 / -1;"
                        >
                            <div
                                class="my-5 mx-0 tracking-widest leading-6 uppercase md:mx-0 md:my-5"
                                style="grid-column: 1 / -1;"
                            >
                                Usable anywhere
                            </div>
                            <p
                                size="1"
                                class="mx-0 mt-0 mb-5 text-xl font-light tracking-normal leading-7 md:text-2xl md:leading-8"
                            >
                                Break free from the Google Form. Whether you want
                                to embed your Homeform on a website or share it
                                through a link, we've got you covered.
                            </p>

                            <div class="mt-8">
<!--                                <img-->
<!--                                    src="https://tailwindui.com/img/ecommerce-images/home-page-01-feature-section-02.jpg"-->
<!--                                    alt="" class="w-full h-full object-center object-cover rounded-lg">-->
                                <img
                                    :src="$page.props.usableAnywhere"
                                    alt="" class="w-full h-full object-center object-cover rounded-lg">
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex justify-center my-0 mx-auto text-gray-900"
                        style="grid-column: 1 / -1;"
                    ></div>
                </div>

                <!-- Testimonial section #1 -->
                <div class="pb-16 mt-32 bg-blueGray-200 lg:pb-0 lg:z-10 lg:relative">
                    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
                        <div class="relative lg:-my-8">
                            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/3 lg:hidden"></div>
                            <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                                <div
                                    class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                                    <img class="object-cover object-top lg:h-full lg:w-full"
                                         :src="$page.props.davidTran"
                                         alt="">
                                </div>
                            </div>
                        </div>
                        <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                                <blockquote>
                                    <div>
                                        <svg class="h-12 w-12 text-gray-900 opacity-25" fill="currentColor"
                                             viewBox="0 0 32 32" aria-hidden="true">
                                            <path
                                                d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/>
                                        </svg>
                                        <p class="mt-6 text-2xl font-medium text-gray-900">
                                            “I have been using it for 5 months now and I love the form’s aesthetic. I
                                            have
                                            had others in my office ask if I made the form and how long it took me
                                            and I
                                            just send them here.”
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

                <!-- Example Homeform section -->
                <div class="relative py-16 sm:py-24 lg:py-32">
                    <div class="relative">
<!--                        <div class="text-center mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl"-->
<!--                             style="max-width: 440px; grid-column: 1 / -1;">-->
<!--                            <h2 class="text-base font-semibold tracking-wider text-gray-900 uppercase">Take a look</h2>-->
<!--                            <p class="mt-2 text-3xl font-bold text-gray-900 tracking-tight sm:text-4xl">-->
<!--                                View a Homeform-->
<!--                            </p>-->
<!--                            <p class="mt-5 mx-auto max-w-prose text-xl text-gray-600">-->
<!--                                Try out a homeform - we promise you'll have a far more enjoyable experience than a-->
<!--                                normal form, and you'll be much more likely to complete it!-->
<!--                            </p>-->
<!--                        </div>-->

                        <div
                            class="grid justify-center py-0 px-8 leading-5 text-gray-900 bg-blueGray-100"
                            style="grid-template-columns: repeat(4, 1fr); gap: 0px 24px;"
                        >
                            <div
                                class="grid content-center items-center text-gray-900 xl:not-italic md:text-center"
                                style="grid-column: 1 / -1;"
                            >
                                <div
                                    class="my-0 mx-auto font-medium text-center lg:text-base lg:leading-6 md:text-sm md:leading-5"
                                    style="max-width: 440px; grid-column: 1 / -1;"
                                >
                                    <div
                                        class="my-5 mx-0 tracking-widest leading-6 uppercase md:mx-0"
                                        style="grid-column: 1 / -1;"
                                    >
                                        View a Homeform
                                    </div>
                                    <p
                                        size="1"
                                        class="mx-0 mt-0 mb-5 text-xl font-light tracking-normal leading-7 md:text-2xl md:leading-8"
                                    >
                                        Try out a Homeform - we promise you'll have a far more enjoyable experience than a
                                        normal form, and you'll be much more likely to complete it!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div
                            class="mt-8 mx-auto max-w-md px-4 grid gap-8 sm:max-w-lg sm:px-6 lg:px-8 lg:grid-cols-1 lg:max-w-7xl">
                            <div
                                style="width: 400px; height: 400px; position:relative; justify-self: center; align-self: center; border-radius: 0.5rem; overflow: hidden">
                                <iframe src="https://homeform.app/form/f6792790-044b-11ec-a776-a1c4202b6261"
                                        style="position:absolute; top:0px; left:0px; width: 100%; height: 100%; border: none; overflow: hidden;"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial section #2 -->
                <div class="pb-16 bg-blueGray-200 lg:pb-0 lg:z-10 lg:relative">
                    <div class="lg:mx-auto lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
                        <div class="mt-12 lg:m-0 lg:col-span-2 lg:pl-8">
                            <div class="mx-auto max-w-md px-4 sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none">
                                <blockquote class="mb-4 lg:mb-0">
                                    <div>
                                        <svg class="h-12 w-12 text-gray-900 opacity-25" fill="currentColor"
                                             viewBox="0 0 32 32" aria-hidden="true">
                                            <path
                                                d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"/>
                                        </svg>
                                        <p class="mt-6 text-2xl font-medium text-gray-900">
                                            “The form templates are great and I am able to promote them with stories and
                                            posts. By advertising the form 'Get a free home appraisal' I've already
                                            gotten 6
                                            leads this month.”
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
                            <div aria-hidden="true" class="absolute inset-x-0 top-0 h-1/3 lg:hidden"></div>
                            <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full">
                                <div
                                    class="aspect-w-10 aspect-h-6 rounded-xl shadow-xl overflow-hidden sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full">
                                    <img class="object-cover lg:h-full lg:w-full"
                                         :src="$page.props.chrisWhalen"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Featured section -->
                <div class="bg-blueGray-100">
                    <section aria-labelledby="comfort-heading"
                             class="max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                        <div class="relative rounded-lg overflow-hidden">
                            <div class="absolute inset-0">
                                <img
                                    src="https://tailwindui.com/img/ecommerce-images/home-page-01-feature-section-02.jpg"
                                    alt="" class="w-full h-full object-center object-cover">
                            </div>
                            <div class="relative bg-gray-900 bg-opacity-75 py-32 px-6 sm:py-40 sm:px-12 lg:px-16">
                                <div class="relative max-w-3xl mx-auto flex flex-col items-center text-center">
                                    <h2 id="comfort-heading"
                                        class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl">We're here to help</h2>
                                    <p class="mt-3 text-xl text-white">Lead-gen companies sell you low quality contacts
                                        that they've also sold to hundreds of other real estate agents. Take control of your
                                        click funnel by using Homeform to gather organic leads. Sign up for free and only pay
                                        when you publish.</p>
                                    <a :href="route('register')"
                                       class="mt-8 w-full block bg-white border border-transparent rounded-md py-3 px-8 text-base font-medium text-gray-900 hover:bg-gray-100 sm:w-auto">
                                        Join Us</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </main>

        <footer aria-labelledby="footer-heading" class="bg-gray-900">
            <h2 id="footer-heading" class="sr-only">Footer</h2>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
<!--                <div class="py-20 xl:grid xl:grid-cols-3 xl:gap-8">-->
<!--                    <div class="grid grid-cols-2 gap-8 xl:col-span-2">-->
<!--                        <div class="space-y-12 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">-->
<!--                            <div>-->
<!--                                <h3 class="text-sm font-medium text-white">-->
<!--                                    Shop-->
<!--                                </h3>-->
<!--                                <ul role="list" class="mt-6 space-y-6">-->
<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Bags-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Tees-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Objects-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Home Goods-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Accessories-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div>-->
<!--                                <h3 class="text-sm font-medium text-white">-->
<!--                                    Company-->
<!--                                </h3>-->
<!--                                <ul role="list" class="mt-6 space-y-6">-->
<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Who we are-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Sustainability-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Press-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Careers-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Terms &amp; Conditions-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Privacy-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="space-y-12 md:space-y-0 md:grid md:grid-cols-2 md:gap-8">-->
<!--                            <div>-->
<!--                                <h3 class="text-sm font-medium text-white">-->
<!--                                    Account-->
<!--                                </h3>-->
<!--                                <ul role="list" class="mt-6 space-y-6">-->
<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Manage Account-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Returns &amp; Exchanges-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Redeem a Gift Card-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                            <div>-->
<!--                                <h3 class="text-sm font-medium text-white">-->
<!--                                    Connect-->
<!--                                </h3>-->
<!--                                <ul role="list" class="mt-6 space-y-6">-->
<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Contact Us-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Twitter-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Instagram-->
<!--                                        </a>-->
<!--                                    </li>-->

<!--                                    <li class="text-sm">-->
<!--                                        <a href="#" class="text-gray-300 hover:text-white">-->
<!--                                            Pinterest-->
<!--                                        </a>-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="mt-12 md:mt-16 xl:mt-0">-->
<!--                        <h3 class="text-sm font-medium text-white">Sign up for our newsletter</h3>-->
<!--                        <p class="mt-6 text-sm text-gray-300">The latest deals and savings, sent to your inbox-->
<!--                            weekly.</p>-->
<!--                        <form class="mt-2 flex sm:max-w-md">-->
<!--                            <label for="email-address" class="sr-only">Email address</label>-->
<!--                            <input id="email-address" type="text" autocomplete="email" required-->
<!--                                   class="appearance-none min-w-0 w-full bg-white border border-white rounded-md shadow-sm py-2 px-4 text-base text-gray-900 placeholder-gray-500 focus:outline-none focus:border-white focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-white">-->
<!--                            <div class="ml-4 flex-shrink-0">-->
<!--                                <button type="submit"-->
<!--                                        class="w-full bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 flex items-center justify-center text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-900 focus:ring-indigo-500">-->
<!--                                    Sign up-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->

                <div class="border-t border-gray-800 py-10">
                    <p class="text-sm text-gray-400">Copyright &copy; 2021 Syntak LLC.</p>
                </div>
            </div>
        </footer>
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
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
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
