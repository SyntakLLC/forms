<template>
    <app-layout :forms="$page['props']['forms']">

        <div
            width="100%"
            height="100%"
            class="flex justify-center items-start w-full h-full font-sans text-sm leading-5 text-gray-900 pt-8"
        >
            <div
                orientation="vertical"
                class="flex flex-col w-4/5 h-full text-sm text-gray-900"
            >
                <div class="flex flex-none w-full leading-5">
                    <div
                        class="inline-block text-gray-900"
                        style="animation: 0.5s ease-in-out 0s 1 normal none running jBcSpD; transition: all 0.3s ease-in 0s;"
                    >
                                                        <form @submit.prevent="customForm.post('/form/custom')">
<!--                                                        <inertia-link @click="customForm.type = 'custom'"-->
<!--                                                                      :href="route('form.edit', $page['props']['user'])">-->
                        <button
                            type="submit"
                            data-qa="start-from-scratch-button"
                            class="inline-flex overflow-visible relative justify-center items-center py-2 px-4 m-0 text-base leading-6 text-center text-white no-underline normal-case bg-blue-600 rounded border-0 cursor-pointer whitespace-no-wrap hover:bg-gray-600"
                            style="outline: none;"
                        >
                            <div orientation="horizontal" class="flex">
                                <span font-family="sans" class="block flex-none">Start from scratch</span>
                            </div>
                        </button>
<!--                                                        </inertia-link>-->
                                                        </form>
                    </div>
                </div>

                <div class="overflow-auto flex-none pb-6 leading-5" style="height: 80%;">
                    <div
                        class="pb-6 w-full text-gray-900"
                        style="animation: 0.5s ease-in-out 0s 1 normal none running jBcSpD; transition: all 0.3s ease-in 0s;"
                    >
<!--        <span-->
<!--            font-family="sans"-->
<!--            font-weight="semibold"-->
<!--            class="block text-xs font-semibold tracking-widest leading-4 pt-8"-->
<!--        >FUN HOMEPAGE TEASERS</span>-->
<!--                        <div class="mt-2 w-full h-px bg-gray-300"></div>-->
<!--                        <div class="mb-8"></div>-->
<!--                        <div-->
<!--                            data-qa="template-gallery-templates-feedback"-->
<!--                            class="grid overflow-auto pb-6 w-auto"-->
<!--                            style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); justify-items: center;"-->
<!--                        >-->
<!--                            <div class="mx-2 mb-8">-->
<!--                                <div-->
<!--                                    class="relative bg-white rounded-lg cursor-pointer shadow-md hover:shadow-lg  hover:shadow-lg"-->
<!--                                    style="animation: 0.5s ease-in-out 0s 1 normal none running jBcSpD; transition: all 0.3s ease-in 0s;"-->
<!--                                >-->
<!--                                    <button-->
<!--                                        data-qa-form-id="mEzKnY"-->
<!--                                        class="overflow-visible relative p-0 m-0 text-center text-black normal-case bg-none appearance-none"-->
<!--                                        style="font-family: sans-serif; font-size: 128%; line-height: 1.15; outline: none;"-->
<!--                                    >-->
<!--                                        <div-->
<!--                                            height="192px"-->
<!--                                            orientation="vertical"-->
<!--                                            width="192px"-->
<!--                                            class="flex w-48 h-48 leading-4"-->
<!--                                            style="flex-flow: column nowrap; font-family: sans-serif;"-->
<!--                                        >-->
<!--                                            <div-->
<!--                                                height="120px"-->
<!--                                                class="flex-shrink-0 h-32"-->
<!--                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"-->
<!--                                            >-->
<!--                                                <img-->
<!--                                                    alt="thumbs14 employee evaluation"-->
<!--                                                    src="//images.ctfassets.net/zkqwmjl9nf4n/7BZlk4xq1iyiQcGSOUau8C/0e280a0e29c9c89a751180951c2ab33d/thumbs14_employee_evaluation.jpg"-->
<!--                                                    class="w-full h-full border-none"-->
<!--                                                    style="border-radius: 4px 4px 0px 0px; font-family: sans-serif;"-->
<!--                                                />-->
<!--                                            </div>-->
<!--                                            <div-->
<!--                                                height="remaining"-->
<!--                                                class="flex-1"-->
<!--                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"-->
<!--                                            >-->
<!--                                                <div-->
<!--                                                    width="100%"-->
<!--                                                    height="100%"-->
<!--                                                    class="flex justify-start items-center w-full h-full"-->
<!--                                                    style="font-family: sans-serif;"-->
<!--                                                >-->
<!--                                                    <div class="mx-4" style="font-family: sans-serif;">-->
<!--                        <span-->
<!--                            color="highContrast"-->
<!--                            font-family="sans"-->
<!--                            class="block text-left text-sm text-sm"-->
<!--                        >Employee Evaluation Form Template</span>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="mx-2 mb-8">-->
<!--                                <div-->
<!--                                    class="relative bg-white rounded-lg cursor-pointer shadow-md hover:shadow-lg  hover:shadow-lg"-->
<!--                                    style="animation: 0.5s ease-in-out 0s 1 normal none running jBcSpD; transition: all 0.3s ease-in 0s;"-->
<!--                                >-->
<!--                                    <button-->
<!--                                        data-qa-form-id="zlQY2E"-->
<!--                                        class="overflow-visible relative p-0 m-0 text-center text-black normal-case bg-none appearance-none"-->
<!--                                        style="font-family: sans-serif; font-size: 128%; line-height: 1.15; outline: none;"-->
<!--                                    >-->
<!--                                        <div-->
<!--                                            height="192px"-->
<!--                                            orientation="vertical"-->
<!--                                            width="192px"-->
<!--                                            class="flex w-48 h-48 leading-4"-->
<!--                                            style="flex-flow: column nowrap; font-family: sans-serif;"-->
<!--                                        >-->
<!--                                            <div-->
<!--                                                height="120px"-->
<!--                                                class="flex-shrink-0 h-32"-->
<!--                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"-->
<!--                                            >-->
<!--                                                <img-->
<!--                                                    alt="thumbs41 candidate experience"-->
<!--                                                    src="//images.ctfassets.net/zkqwmjl9nf4n/3BFo5PxIVqU0WsMsQW2s0M/d599478c68dd0cfd7ad15ddac4dceec8/thumbs41_candidate_experience.jpg"-->
<!--                                                    class="w-full h-full border-none"-->
<!--                                                    style="border-radius: 4px 4px 0px 0px; font-family: sans-serif;"-->
<!--                                                />-->
<!--                                            </div>-->
<!--                                            <div-->
<!--                                                height="remaining"-->
<!--                                                class="flex-1"-->
<!--                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"-->
<!--                                            >-->
<!--                                                <div-->
<!--                                                    width="100%"-->
<!--                                                    height="100%"-->
<!--                                                    class="flex justify-start items-center w-full h-full"-->
<!--                                                    style="font-family: sans-serif;"-->
<!--                                                >-->
<!--                                                    <div class="mx-4" style="font-family: sans-serif;">-->
<!--                        <span-->
<!--                            color="highContrast"-->
<!--                            font-family="sans"-->
<!--                            class="block text-left text-sm"-->
<!--                        >Candidate Experience Survey Template</span-->
<!--                        >-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        i added pt-8 to this below-->
                        <span
                            font-family="sans"
                            font-weight="semibold"
                            class="block text-xs font-semibold tracking-widest leading-4 pt-8"
                        >QUESTIONNAIRES</span
                        >
                        <div class="mt-2 w-full h-px bg-gray-300"></div>
                        <div class="mb-8"></div>
                        <div
                            data-qa="template-gallery-templates-research"
                            class="grid overflow-auto pb-6 w-auto"
                            style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); justify-items: center;"
                        >
                            <div class="mx-2 mb-8">
                                <div
                                    class="relative bg-white rounded-lg cursor-pointer shadow-md hover:shadow-lg  hover:shadow-lg"
                                    style="animation: 0.5s ease-in-out 0s 1 normal none running jBcSpD; transition: all 0.3s ease-in 0s;"
                                >
                                    <form @submit.prevent="homeWorthForm.post('/form/home_worth')">
                                    <button
                                        data-qa-form-id="sQt6ZB"
                                        type="submit"
                                        class="overflow-visible relative p-0 m-0 text-center text-black normal-case bg-none appearance-none"
                                        style="font-family: sans-serif; font-size: 128%; line-height: 1.15; outline: none;"
                                    >
                                        <div
                                            height="192px"
                                            orientation="vertical"
                                            width="192px"
                                            class="flex w-48 h-48 leading-4"
                                            style="flex-flow: column nowrap; font-family: sans-serif;"
                                        >
                                            <div
                                                height="120px"
                                                class="flex-shrink-0 h-32"
                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"
                                            >
                                                <img
                                                    alt="home worth form icon"
                                                    :src="$page.props.homeWorthIcon"
                                                    class="w-full h-full border-none"
                                                    style="border-radius: 4px 4px 0px 0px; font-family: sans-serif;"
                                                />
                                            </div>
                                            <div
                                                height="remaining"
                                                class="flex-1"
                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"
                                            >
                                                <div
                                                    width="100%"
                                                    height="100%"
                                                    class="flex justify-start items-center w-full h-full"
                                                    style="font-family: sans-serif;"
                                                >
                                                    <div class="mx-4" style="font-family: sans-serif;">
                        <span
                            color="highContrast"
                            font-family="sans"
                            class="block text-left text-sm"
                        >Home Appraisal Template</span
                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                    </form>
                                </div>
                            </div>
                            <div class="mx-2 mb-8">
                                <div
                                    class="relative bg-white rounded-lg cursor-pointer shadow-md hover:shadow-lg  hover:shadow-lg"
                                    style="animation: 0.5s ease-in-out 0s 1 normal none running jBcSpD; transition: all 0.3s ease-in 0s;"
                                >
                                    <form @submit.prevent="apartmentForm.post('/form/apartment')">
                                    <button
                                        data-qa-form-id="Nlh6G0"
                                        type="submit"
                                        class="overflow-visible relative p-0 m-0 text-center text-black normal-case bg-none appearance-none"
                                        style="font-family: sans-serif; font-size: 128%; line-height: 1.15; outline: none;"
                                    >
                                        <div
                                            height="192px"
                                            orientation="vertical"
                                            width="192px"
                                            class="flex w-48 h-48 leading-4"
                                            style="flex-flow: column nowrap; font-family: sans-serif;"
                                        >
                                            <div
                                                height="120px"
                                                class="flex-shrink-0 h-32"
                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"
                                            >
                                                <img
                                                    alt="apartment search form icon"
                                                    :src="$page.props.apartmentIcon"
                                                    class="w-full h-full border-none"
                                                    style="border-radius: 4px 4px 0px 0px; font-family: sans-serif;"
                                                />
                                            </div>
                                            <div
                                                height="remaining"
                                                class="flex-1"
                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"
                                            >
                                                <div
                                                    width="100%"
                                                    height="100%"
                                                    class="flex justify-start items-center w-full h-full"
                                                    style="font-family: sans-serif;"
                                                >
                                                    <div class="mx-4" style="font-family: sans-serif;">
                        <span
                            color="highContrast"
                            font-family="sans"
                            class="block text-left text-sm"
                        >Apartment Search Template</span
                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <span
                            font-family="sans"
                            font-weight="semibold"
                            class="block text-xs font-semibold tracking-widest leading-4"
                        >REGISTRATION</span
                        >
                        <div class="mt-2 w-full h-px bg-gray-300"></div>
                        <div class="mb-8"></div>
                        <div
                            data-qa="template-gallery-templates-registration"
                            class="grid overflow-auto pb-6 w-auto"
                            style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); justify-items: center;"
                        >
                            <div class="mx-2 mb-8">
                                <div
                                    class="relative bg-white rounded-lg cursor-pointer shadow-md hover:shadow-lg  hover:shadow-lg"
                                    style="animation: 0.5s ease-in-out 0s 1 normal none running jBcSpD; transition: all 0.3s ease-in 0s;"
                                >
                                    <form @submit.prevent="openHouseForm.post('/form/open_house')">
                                    <button
                                        data-qa-form-id="Bu4ZIK"
                                        class="overflow-visible relative p-0 m-0 text-center text-black normal-case bg-none appearance-none"
                                        style="font-family: sans-serif; font-size: 128%; line-height: 1.15; outline: none;"
                                    >
                                        <div
                                            height="192px"
                                            orientation="vertical"
                                            width="192px"
                                            class="flex w-48 h-48 leading-4"
                                            style="flex-flow: column nowrap; font-family: sans-serif;"
                                        >
                                            <div
                                                height="120px"
                                                class="flex-shrink-0 h-32"
                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"
                                            >
                                                <img
                                                    alt="open house form icon"
                                                    :src="$page.props.openHouseIcon"
                                                    class="w-full h-full border-none"
                                                    style="border-radius: 4px 4px 0px 0px; font-family: sans-serif;"
                                                />
                                            </div>
                                            <div
                                                height="remaining"
                                                class="flex-1"
                                                style="min-width: 0px; min-height: 0px; font-family: sans-serif;"
                                            >
                                                <div
                                                    width="100%"
                                                    height="100%"
                                                    class="flex justify-start items-center w-full h-full"
                                                    style="font-family: sans-serif;"
                                                >
                                                    <div class="mx-4" style="font-family: sans-serif;">
                        <span
                            color="highContrast"
                            font-family="sans"
                            class="block text-left text-sm"
                        >Open House Registration Template</span
                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--        <div>-->
        <!--            <div class="mx-auto">-->
        <!--                <div class="space-y-12">-->

        <!--                    &lt;!&ndash; Page title & actions &ndash;&gt;-->
        <!--                    <div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">-->
        <!--                        <div class="flex-1 min-w-0">-->
        <!--                            <h1 class="py-2 text-lg font-medium leading-6 text-gray-900 sm:truncate">-->
        <!--                                New Form-->
        <!--                            </h1>-->
        <!--                        </div>-->
        <!--                    </div>-->

        <!--                    <div class="px-4 sm:px-6 lg:px-8">-->

        <!--                        <ul class="space-y-12 grid grid-cols-2 gap-x-6 gap-y-12 space-y-0 sm:grid-cols-3 sm:gap-x-6 md:grid-cols-4 lg:grid-cols-5">-->
        <!--&lt;!&ndash;                        <ul class="grid grid-cols-2 gap-x-6 gap-y-12 space-y-0 sm:grid sm:grid-cols-3 sm:gap-x-6 sm:gap-y-12 sm:space-y-0 md:grid-cols-4 lg:grid-cols-5">&ndash;&gt;-->

        <!--                            &lt;!&ndash;CUSTOM FORM BUTTON&ndash;&gt;-->
        <!--                            <li>-->
        <!--                                <form @submit.prevent="customForm.post('/form/custom')">-->
        <!--&lt;!&ndash;                                <inertia-link @click="customForm.type = 'custom'"&ndash;&gt;-->
        <!--&lt;!&ndash;                                              :href="route('form.edit', $page['props']['user'])">&ndash;&gt;-->
        <!--                                    <button type="submit" class="focus:outline-none w-full h-full">-->
        <!--                                    <div class="space-y-4">-->
        <!--                                        <div class="aspect-w-10 aspect-h-10 hover:bg-gray-50 border-2 border-gray-300 border-dashed rounded-lg">-->
        <!--                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-8 -8 40 40"-->
        <!--                                                 stroke="currentColor" class="text-gray-300">-->
        <!--                                                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}-->
        <!--                                                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>-->
        <!--                                            </svg>-->
        <!--                                        </div>-->

        <!--                                        <div class="space-y-2">-->
        <!--                                            <div class="text-lg leading-6 font-medium space-y-1">-->
        <!--                                                <h3>Blank Form</h3>-->
        <!--                                                &lt;!&ndash;                                            <p class="text-blue-600">Preset Form</p>&ndash;&gt;-->
        <!--                                            </div>-->

        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--&lt;!&ndash;                                </inertia-link>&ndash;&gt;-->
        <!--                                    </button>-->
        <!--                                </form>-->
        <!--                            </li>-->
        <!--                            &lt;!&ndash;How Much is Your Home Worth&ndash;&gt;-->
        <!--                            <li>-->
        <!--                                <form @submit.prevent="homeWorthForm.post('/form/home_worth')">-->
        <!--                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">-->
        <!--                                        <div class="space-y-4">-->
        <!--                                            <div class="aspect-w-10 aspect-h-10">-->
        <!--                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.homeWorthIcon" alt="Form Icon">-->
        <!--                                            </div>-->

        <!--                                            <div class="space-y-2">-->
        <!--                                                <div class="text-lg leading-6 font-medium space-y-1">-->
        <!--                                                    <h3>Home Quote Template</h3>-->
        <!--&lt;!&ndash;                                                    <p class="text-blue-600">Premade Form</p>&ndash;&gt;-->
        <!--                                                </div>-->

        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                    </button>-->
        <!--                                </form>-->
        <!--                            </li>-->
        <!--                            &lt;!&ndash;Are You Looking for an Apartment&ndash;&gt;-->
        <!--                            <li>-->
        <!--                                <form @submit.prevent="apartmentForm.post('/form/apartment')">-->
        <!--                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">-->
        <!--                                        <div class="space-y-4">-->
        <!--                                            <div class="aspect-w-10 aspect-h-10">-->
        <!--                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.apartmentIcon" alt="Form Icon">-->
        <!--                                            </div>-->

        <!--                                            <div class="space-y-2">-->
        <!--                                                <div class="text-lg leading-6 font-medium space-y-1">-->
        <!--                                                    <h3>Apartment Search Template</h3>-->
        <!--&lt;!&ndash;                                                    <p class="text-blue-600">Premade Form</p>&ndash;&gt;-->
        <!--                                                </div>-->

        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                    </button>-->
        <!--                                </form>-->
        <!--                            </li>-->
        <!--                            &lt;!&ndash;Do You Need a New Agent&ndash;&gt;-->
        <!--&lt;!&ndash;                            <li>&ndash;&gt;-->
        <!--&lt;!&ndash;                                <form @submit.prevent="newAgentForm.post('/form/new-agent')">&ndash;&gt;-->
        <!--&lt;!&ndash;                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">&ndash;&gt;-->
        <!--&lt;!&ndash;                                        <div class="space-y-4">&ndash;&gt;-->
        <!--&lt;!&ndash;                                            <div class="aspect-w-10 aspect-h-10">&ndash;&gt;-->
        <!--&lt;!&ndash;                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.apartmentIcon" alt="Form Icon">&ndash;&gt;-->
        <!--&lt;!&ndash;                                            </div>&ndash;&gt;-->

        <!--&lt;!&ndash;                                            <div class="space-y-2">&ndash;&gt;-->
        <!--&lt;!&ndash;                                                <div class="text-lg leading-6 font-medium space-y-1">&ndash;&gt;-->
        <!--&lt;!&ndash;                                                    <h3>Do You Need a New Agent?</h3>&ndash;&gt;-->
        <!--&lt;!&ndash;                                                    <p class="text-blue-600">Premade Form</p>&ndash;&gt;-->
        <!--&lt;!&ndash;                                                </div>&ndash;&gt;-->

        <!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
        <!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
        <!--&lt;!&ndash;                                    </button>&ndash;&gt;-->
        <!--&lt;!&ndash;                                </form>&ndash;&gt;-->
        <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
        <!--                            &lt;!&ndash;Are You Planning on Buying a Home?&ndash;&gt;-->
        <!--&lt;!&ndash;                            <li>&ndash;&gt;-->
        <!--&lt;!&ndash;                                <form @submit.prevent="buyingHomeForm.post('/form/selling-home')">&ndash;&gt;-->
        <!--&lt;!&ndash;                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">&ndash;&gt;-->
        <!--&lt;!&ndash;                                        <div class="space-y-4">&ndash;&gt;-->
        <!--&lt;!&ndash;                                            <div class="aspect-w-10 aspect-h-10">&ndash;&gt;-->
        <!--&lt;!&ndash;                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.apartmentIcon" alt="Form Icon">&ndash;&gt;-->
        <!--&lt;!&ndash;                                            </div>&ndash;&gt;-->

        <!--&lt;!&ndash;                                            <div class="space-y-2">&ndash;&gt;-->
        <!--&lt;!&ndash;                                                <div class="text-lg leading-6 font-medium space-y-1">&ndash;&gt;-->
        <!--&lt;!&ndash;                                                    <h3>Are You Planning On Buying a Home?</h3>&ndash;&gt;-->
        <!--&lt;!&ndash;                                                    <p class="text-blue-600">Premade Form</p>&ndash;&gt;-->
        <!--&lt;!&ndash;                                                </div>&ndash;&gt;-->

        <!--&lt;!&ndash;                                            </div>&ndash;&gt;-->
        <!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
        <!--&lt;!&ndash;                                    </button>&ndash;&gt;-->
        <!--&lt;!&ndash;                                </form>&ndash;&gt;-->
        <!--&lt;!&ndash;                            </li>&ndash;&gt;-->
        <!--                            &lt;!&ndash;Contact Me&ndash;&gt;-->
        <!--                            <li>-->
        <!--                                <form @submit.prevent="contactForm.post('/form/contact-me')">-->
        <!--                                    <button type="submit" class="focus:outline-none w-full h-full -mt-12">-->
        <!--                                        <div class="space-y-4">-->
        <!--                                            <div class="aspect-w-10 aspect-h-10">-->
        <!--                                                <img class="object-cover shadow-lg rounded-lg hover:opacity-75" :src="$page.props.contactIcon" alt="Form Icon">-->
        <!--                                            </div>-->

        <!--                                            <div class="space-y-2">-->
        <!--                                                <div class="text-lg leading-6 font-medium space-y-1">-->
        <!--                                                    <h3>Contact Form Template</h3>-->
        <!--&lt;!&ndash;                                                    <p class="text-blue-600">Premade Form</p>&ndash;&gt;-->
        <!--                                                </div>-->

        <!--                                            </div>-->
        <!--                                        </div>-->
        <!--                                    </button>-->
        <!--                                </form>-->
        <!--                            </li>-->

        <!--                            &lt;!&ndash; And More Soon &ndash;&gt;-->
        <!--                            <li class="hover:opacity-90">-->
        <!--                                <div class="space-y-4">-->
        <!--                                    <div class="aspect-w-10 aspect-h-10 items-center rounded-lg cursor-default">-->
        <!--                                        <div class="text-lg leading-6 font-medium text-center items-end justify-end">-->
        <!--                                            <h3 class="mt-20">More Templates Coming Soon!</h3>-->
        <!--                                        </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </li>-->

        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->

    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Button from "@/Jetstream/Button";
import Input from "@/Jetstream/Input";

export default {
    name: "Index.vue",
    components: {Input, Button, AppLayout},

    props: ['user'],

    data: function () {

        return {
            formColor: Math.floor(Math.random() * 16777215).toString(16),

            customForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
                type: 'custom'
            }),
            homeWorthForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
                type: 'homeWorth'
            }),
            apartmentForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
                type: 'apartment'
            }),
            openHouseForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
                type: 'openHouse'
            }),
            newAgentForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
                type: 'newAgent'
            }),
            buyingHomeForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
                type: 'buyingHome'
            }),
            contactForm: this.$inertia.form({
                formColor: this.getNewIdColor(),
                type: 'contact'
            }),
        };
    },

    methods: {
        getNewIdColor() {
            let shades = [50, 100, 200, 300, 400, 500, 600, 700, 800];
            let colors = ['gray', 'red', 'blue', 'purple', 'green', 'yellow', 'blue', 'pink'];

            return 'bg-' + colors[this.randomIntFromInterval(0, 7)] + '-500'
        },
        randomIntFromInterval(min, max) { // min and max included
            return Math.floor(Math.random() * (max - min + 1) + min);
        },
        async apiTest() {
            let response = await axios.get('/api/api-example')
            console.log(response.data)
        }
    }
}
</script>

<style scoped>

</style>
