<template>
    <app-layout>
        <div class="flex items-center flex-shrink-0 border-b border-gray-200">
            <div class="w-full bg-white border-gray-200 border-b px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 md-bottom-20 lg:px-8 lg:fixed lg:mt-16 z-20">
                <!-- Edit Site title -->
                <div class="flex-1 min-w-0">
                    <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                        Property Page
                    </h1>
                </div>

                <!-- Cover photo dropdown -->
                <div class="relative mt-2 sm:mt-0 sm:ml-3">
                    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                    <button @click="showingCoverPhotoDropdown=!showingCoverPhotoDropdown; showingLayoutDropdown=false; showingAccentColorDropdown=false; showingSocialDropdown=false"
                            :class="showingCoverPhotoDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-expanded="false">
                        <span>Change Background Photo</span>

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

                <!-- Social media dropdown -->
                <div class="relative mt-2 sm:mt-0 sm:ml-3">
                    <!-- Item active: "text-gray-900", Item inactive: "text-gray-500" -->
                    <button @click="showingSocialDropdown=!showingSocialDropdown; showingLayoutDropdown=false; showingAccentColorDropdown=false; showingCoverPhotoDropdown=false"
                            :class="showingSocialDropdown ? 'text-gray-900' : 'text-gray-500'" type="button" class="text-gray-500 group bg-white rounded-md inline-flex items-center text-base font-medium hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" aria-expanded="false">
                        <span>Add Media</span>

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
                                <form @submit.prevent="updateLinksForm.post('/update-matterport')">

                                    <!-- Video -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Video</label>
                                        <div class="mt-1">
                                            <input v-model="updateLinksForm.video" type="text" name="url" id="url1" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.video.com/xxxxxxxxxxx">
                                        </div>
                                    </div>

                                    <!-- Matterport 3D -->
                                    <div class="mt-3">
                                        <label class="block text-sm font-medium text-gray-700">Matterport 3D</label>
                                        <div class="mt-1">
                                            <input v-model="updateLinksForm.matterport" type="text" name="url" id="url2" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="www.my.matterport.com/show/?m=xxxxxxxxxxx">
                                        </div>
                                    </div>

                                    <button type="submit" class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        {{ updateLinksForm.recentlySuccessful ? "Saved" : updateLinksForm.processing ? "Saving..." : "Save" }}
                                    </button>

                                </form>

                            </div>
                        </div>
                    </transition>
                </div>

                <!-- Change domain & Preview -->
                <div class="mt-4 flex sm:mt-0 sm:ml-4">
                    <button @click="showingDeleteModal=!showingDeleteModal"
                            type="button"
                            class="truncate inline-flex items-center px-4 py-2 border border-red-500 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        Delete Listing
                    </button>
                    <inertia-link :href="route('property.show', $page.props.property.uuid)" type="button" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:order-1 ml-3">
                        Preview
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
                                                Delete listing
                                            </h3>
                                            <div class="mt-2">
                                                <p class="text-sm text-gray-500">
                                                    Are you sure you want to delete this listing? Any leads generated from
                                                    this listing will not be deleted. This action cannot be undone.
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
                                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                </transition>
            </div>
        </div>

        <div :style="cssProps">
            <!-- Photo -->
            <div class="leading-6 text-white bg-gray-900 box-border">
                <div
                    class="relative mx-auto text-white box-border"
                    style="max-width: 1680px;">
                    <img
                        loading="lazy"
                        :src="this.property.property_photo"
                        alt=""
                        sizes="100vw"
                        class="inline-block object-cover w-full max-w-full align-middle border-0 box-border"
                        style="max-height: 650px;"
                    />
                </div>
            </div>

            <!-- Details -->
            <div class="pt-24 pb-20 leading-6 text-gray-900">
                <div class="px-6 mx-auto w-full text-gray-900" style="max-width: 1344px;">
                    <div class="mx-auto w-full box-border" style="max-width: 584px;">
                        <div class="flex flex-col items-center text-center box-border">
                            <h6 contenteditable placeholder="Town or State" @input="updateTownAndState" class="mt-0 mb-1 font-sans text-lg italic font-normal leading-7">
                                {{this.property.town_and_state}}
                            </h6>
                            <h3 contenteditable placeholder="Street Address" @input="updateStreetAddress"
                                class="mt-0 mb-6 font-sans text-5xl font-normal"
                                style="line-height: 60px;"
                            >
                                {{ this.property.street_address }}
                            </h3>
                            <div class="flex flex-wrap justify-center items-center mb-12">
                                <div class="flex items-center my-1 mx-6">
                                    <svg class="h-6 w-6 inline-block mr-3 max-w-full align-middle border-0 box-border" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M482,233.539V117.007c0-49.626-40.374-90-90-90h-94.5c-5.523,0-10,4.477-10,10s4.477,10,10,10H392    c38.598,0,70,31.402,70,70v106.005c-7.532-2.59-15.6-4.017-24-4.017h-2v-57.333c0-21.321-17.346-38.667-38.667-38.667H284.667    c-11.358,0-21.586,4.924-28.667,12.747c-7.081-7.823-17.309-12.747-28.667-12.747H114.667C93.346,122.995,76,140.341,76,161.661    v57.333h-2c-8.4,0-16.468,1.427-24,4.017V117.007c0-38.598,31.402-70,70-70h96.5c5.523,0,10-4.477,10-10s-4.477-10-10-10H120    c-49.626,0-90,40.374-90,90v116.533c-18.188,13.495-30,35.12-30,59.456v128c0,5.523,4.477,10,10,10h20v44c0,5.523,4.477,10,10,10    h54.012c5.523,0,10-4.477,10-10v-44h303.976v44c0,5.523,4.477,10,10,10H472c5.523,0,10-4.477,10-10v-44h20c5.523,0,10-4.477,10-10    v-128C512,268.659,500.188,247.034,482,233.539z M266,161.661c0-10.293,8.374-18.667,18.667-18.667h112.667    c10.293,0,18.667,8.374,18.667,18.667v57.333H266V161.661z M96,161.661c0-10.293,8.374-18.667,18.667-18.667h112.667    c10.293,0,18.667,8.374,18.667,18.667v57.333H96V161.661z M84.012,464.995H50v-34h34.012V464.995z M462,464.995h-34.012v-34H462    V464.995z M492,362.995H91.921c-5.523,0-10,4.477-10,10s4.477,10,10,10H492v28h-19.758c-0.081-0.002-0.16-0.012-0.242-0.012    h-54.012c-0.082,0-0.161,0.01-0.242,0.012H94.254c-0.081-0.002-0.16-0.012-0.242-0.012H40c-0.082,0-0.161,0.01-0.242,0.012H20    v-118c0-29.776,24.224-54,54-54h12h170h170h12c29.776,0,54,24.224,54,54V362.995z"/>
                                            </g>
                                        </g> <g>
                                            <g>
                                                <path d="M263.07,29.935c-1.86-1.86-4.44-2.93-7.07-2.93s-5.21,1.07-7.07,2.93s-2.93,4.44-2.93,7.07s1.07,5.21,2.93,7.07    s4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93s2.93-4.43,2.93-7.07C266,34.375,264.93,31.794,263.07,29.935z"/>
                                            </g>
                                        </g> <g>
                                            <g>
                                                <path d="M59.15,365.924c-1.86-1.86-4.44-2.93-7.07-2.93c-2.64,0-5.21,1.07-7.07,2.93s-2.93,4.44-2.93,7.07s1.07,5.21,2.93,7.07    c1.86,1.86,4.44,2.93,7.07,2.93s5.21-1.07,7.07-2.93c1.86-1.86,2.93-4.44,2.93-7.07S61.01,367.784,59.15,365.924z"/>
                                            </g>
                                        </g>
                                    </svg>
                                    <div contenteditable placeholder="0" @input="updateBed" class="box-border">{{this.property.bed}}</div>
                                    <div class="box-border">&nbsp;Bed</div>
                                </div>
                                <div class="flex items-center my-1 mx-6">
                                    <svg class="h-6 w-6 inline-block mr-3 max-w-full align-middle border-0 box-border" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48">
                                        <path fill="#000000" id="i-465" d="M25,34h2v4h-2V34z M25,45h2v-4h-2V45z M17,31h2v-4h-2V31z M17,45h2v-4h-2V45z M17,38h2v-4h-2V38z M25,31h2v-4h-2V31z M33,38 h2v-4h-2V38z M41,31h2v-4h-2V31z M48,23v1H12v-1c0-8.471,4.407-12.33,15-12.912V10c0-2.131,1.022-2.746,1.964-2.926 C28.6,2.221,25.194,2,18,2h-5C5.393,2,2,4.467,2,10v38H0V10C0,0,9.785,0,13,0h5c6.685,0,12.48,0.02,12.954,7.061 C31.917,7.219,33,7.807,33,10v0.109C45.3,11.006,48,17.492,48,23z M45.966,22C45.505,15.273,40.27,12,30,12 c-12.657,0-15.706,3.799-15.979,10H45.966z M41,38h2v-4h-2V38z M33,31h2v-4h-2V31z M33,45h2v-4h-2V45z M41,45h2v-4h-2V45z"/>
                                    </svg>
                                    <div contenteditable placeholder="0" @input="updateBath" class="box-border">{{this.property.bath}}</div>
                                    <div class="box-border">&nbsp;Bath</div>
                                </div>
                                <div class="flex items-center my-1 mx-6">
                                    <svg class="h-6 w-6 inline-block mr-3 max-w-full align-middle border-0 box-border" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                        <path d="M0.586,34L16,49.414L49.414,16L34,0.586L0.586,34z M16,46.586L3.414,34L5.5,31.914l4.793,4.793l1.414-1.414L6.914,30.5   l3.586-3.586l2.793,2.793l1.414-1.414L11.914,25.5l3.586-3.586l4.793,4.793l1.414-1.414L16.914,20.5l3.586-3.586l2.793,2.793   l1.414-1.414L21.914,15.5l3.586-3.586l4.793,4.793l1.414-1.414L26.914,10.5L30.5,6.914l2.793,2.793l1.414-1.414L31.914,5.5   L34,3.414L46.586,16L16,46.586z"/>
                                    </svg>
                                    <div contenteditable placeholder="0" @input="updateSquareFeet" class="box-border">{{this.property.square_feet}}</div>
                                    <div class="box-border">&nbsp;Sq Ft</div>
                                </div>
                            </div>
                            <div contenteditable placeholder="Description" @input="updateDescription" class="text-xl box-border leading-7">
                                {{ this.property.description == '' ? "Description" : this.property.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Photos -->
            <div class="mx-auto pb-20 max-w-7xl ">
                <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                    <input type="file" class="hidden"
                           ref="createPhotoButton"
                           @change="addPhoto">

                    <div>
                    <div @click="addNewPhoto" class="group block w-full aspect-w-10 aspect-h-7 rounded-lg hover:bg-gray-50 border-2 border-gray-300 border-dashed rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-8 -8 40 40"
                             stroke="currentColor" class="text-gray-300">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                  d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                    </div>
                        <div class="mt-4 text-lg leading-6 font-medium text-center text-gray-500 space-y-1">
                            <h3>Add Photo</h3>
                        </div>
                    </div>

                    <li class="relative" v-for="(photo) in $page['props']['photos']">
                        <div @click="openPhoto(photo.photo)" class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                            <img :src="photo.photo" alt="" class="object-cover group-hover:opacity-75">
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Video -->
            <iframe width="853" height="480" class="pb-20 mx-auto" v-if="$page.props.property.video_url"
                     :src="videoHttps === 'https://' ? $page.props.property.video_url.replace('watch?v=', 'embed/').split('&ab_channel')[0] : videoHttp.replace('watch?v=', 'embed/').split('&ab_channel')[0] === 'http://' ? $page.props.property.video_url.replace('watch?v=', 'embed/').split('&ab_channel')[0] : '//' + $page.props.property.video_url.replace('watch?v=', 'embed/').split('&ab_channel')[0]"
                     frameborder="0" allowfullscreen allow="xr-spatial-tracking"></iframe>

            <!-- Matterport -->
            <iframe width="853" height="480" class="pb-20 mx-auto" v-if="$page.props.property.matterport_url"
                    :src="matterportHttps === 'https://' ? $page.props.property.matterport_url : matterportHttp === 'http://' ? $page.props.property.matterport_url : '//' + $page.props.property.matterport_url"
                    frameborder="0" allowfullscreen allow="xr-spatial-tracking"></iframe>

            <!-- Contact -->
            <div class="pb-24 leading-6 text-gray-900 bg-gray-100">
                <div class="px-6 mx-auto w-full text-gray-900" style="max-width: 1344px;">
                    <div class="mx-auto w-full box-border">
                        <div class="flex flex-col items-center mx-auto mb-20 text-center"></div>
                    </div>
                    <div
                        class="mx-auto w-full box-border"
                        style="max-width: 879px; direction: ltr;"
                    >
                        <div class="sm:ml-20 m-0 box-border">
                            <flow-form>
                                <question type="sectionbreak" title="If you'd like to request a visit, hit continue and we can be in touch."></question>
                                <question type="text" title="What is your name?" v-model="name" required></question>
                                <question type="sectionbreak" :title="'Nice to meet you, ' + name + '.'" subtitle="I'd love to talk about this property. Fill out some contact information and I'll reach out shortly."></question>
                                <question type="email" title="What is your email?" v-model="email" required></question>
                                <question type="number" tagline="Just one more piece of contact!" title="And your phone number?" v-model="phone" required></question>
                                <question type="text" tagline="Great!" title="Anything you'd like me to know before we speak?" v-model="message" required></question>
                            </flow-form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Loading screen -->
            <div v-show="showingLoadingScreen" class="fixed z-50 inset-0 overflow-y-auto ">
                <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                          aria-hidden="true">&#8203;</span>

                    <div class="inline-block align-bottom rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; display: block; shape-rendering: auto;" width="121px" height="121px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <circle cx="50" cy="50" fill="none" stroke="#c8c8c8" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"/>
                            </circle>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Single Image screen -->
            <div v-show="showingPhotoScreen" class="fixed z-50 inset-0 overflow-y-auto w-screen">
                <div class="flex items-end justify-center min-h-screen text-center sm:block sm:p-0 w-screen">

                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div @click="showingPhotoScreen=!showingPhotoScreen" class="absolute inset-0 bg-gray-900 opacity-75"></div>
                    </div>

                    <svg @click="showingPhotoScreen=!showingPhotoScreen" class="h-20 w-20 right-0 text-white p-5 absolute" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                    <!-- This element is to trick the browser into centering the modal contents. -->
<!--                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen "-->
<!--                          aria-hidden="true">&#8203;</span>-->

<!--                    <div class="inline-block text-left transform sm:align-middle sm:max-w-lg sm:w-full w-screen h-screen bg-green-500">-->
                        <img :src="showPhotoUrl" alt="" class="inline-block transform h-screen align-middle">
<!--                    </div>-->
                </div>
            </div>

        </div>
    </app-layout>
</template>

<script>
import FlowForm, {Question} from '@ditdot-dev/vue-flow-form';
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Edit.vue",
    components: {
        AppLayout,
        FlowForm,
        Question
    },

    props: ['site', 'property'],

    data() {
        return {
            name: "",
            email: "",
            phone: "",
            message: "",
            showingCoverPhotoDropdown: false,
            showingLoadingScreen: false,
            showingPhotoScreen: false,
            timeoutId: 0,
            showingDeleteModal: false,
            showingSocialDropdown: false,
            showPhotoUrl: '',

            matterportHttps: this.property.matterport_url == null ? "" : this.property.matterport_url.length > 7 ? this.property.matterport_url.substring(0, 8) : this.property.matterport_url,
            matterportHttp: this.property.matterport_url == null ? "" : this.property.matterport_url.length > 6 ? this.property.matterport_url.substring(0, 7) : this.property.matterport_url,

            videoHttps: this.property.video_url == null ? "" : this.property.video_url.length > 7 ? this.property.video_url.substring(0, 8).replace('watch?v=', 'embed/').split('&ab_channel')[0] : this.property.video_url.replace('watch?v=', 'embed/').split('&ab_channel')[0],
            videoHttp: this.property.video_url == null ? "" : this.property.video_url.length > 6 ? this.property.video_url.substring(0, 7).replace('watch?v=', 'embed/').split('&ab_channel')[0] : this.property.video_url.replace('watch?v=', 'embed/').split('&ab_channel')[0],

            updateLinksForm: this.$inertia.form({
                property: this.property.uuid,
                video: this.property.video_url,
                matterport: this.property.matterport_url,
            }),
        }
    },
    methods: {
        openPhoto(photo) {
            this.showingPhotoScreen=!this.showingPhotoScreen;
            this.showPhotoUrl=photo;
        },
        /**
         * Add another photo
         */
        addNewPhoto() {
            this.$refs.createPhotoButton.click();
        },
        async addPhoto() {
            const reader = new FileReader();
            let photo = null;
            reader.onload = (e) => {
                this.photoPreview = e.target.result;
                photo = e.target.result;
            };

            reader.readAsDataURL(this.$refs.createPhotoButton.files[0]);

            this.showingLoadingScreen = true;

            await Vapor.store(this.$refs.createPhotoButton.files[0], {
                visibility: 'public-read'
            }).then(async(response) => {
                await this.$inertia.post('/add-property-picture', {
                    uuid: response.uuid,
                    key: response.key,
                    extension: response.extension,
                    property: this.property.uuid,
                })
            });

            this.showingLoadingScreen = false;
        },

        /**
         * Destroy property
         */
        async deleteForm() {
            let data = {'property_uuid': this.property.uuid}
            this.$inertia.post('/delete-listing', data)
        },

        /**
         * Update fields
         */
        async updateTownAndState(e) {
            clearTimeout(this.timeoutId)
            let data = {
                'text': e.target.innerText,
                'property': this.property.uuid,
            }
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-town-and-state', data)
            })
        },

        async updateStreetAddress(e) {
            clearTimeout(this.timeoutId)
            let data = {
                'text': e.target.innerText,
                'property': this.property.uuid,
            }
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-street-address', data)
            })
        },

        async updateBed(e) {
            clearTimeout(this.timeoutId)
            let data = {
                'text': e.target.innerText,
                'property': this.property.uuid,
            }
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-bed', data)
            })
        },

        async updateBath(e) {
            clearTimeout(this.timeoutId)
            let data = {
                'text': e.target.innerText,
                'property': this.property.uuid,
            }
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-bath', data)
            })
        },

        async updateSquareFeet(e) {
            clearTimeout(this.timeoutId)
            let data = {
                'text': e.target.innerText,
                'property': this.property.uuid,
            }
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-square-feet', data)
            })
        },

        async updateDescription(e) {
            clearTimeout(this.timeoutId)
            let data = {
                'text': e.target.innerText,
                'property': this.property.uuid,
            }
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-description', data)
            })
        },


        /**
         * Update Cover photo
         */
        selectNewPhoto() {
            this.$refs.photo.click();
        },
        removePhoto() {
            this.$inertia.post('remove-property-picture', {
                property: this.property,
            })
        },
        async updatePhotoPreview() {
            const reader = new FileReader();
            let photo = null;
            reader.onload = (e) => {
                this.photoPreview = e.target.result;
                photo = e.target.result;
            };

            reader.readAsDataURL(this.$refs.photo.files[0]);

            this.showingLoadingScreen = true;

            await Vapor.store(this.$refs.photo.files[0], {
                visibility: 'public-read'
            }).then(async(response) => {
                await this.$inertia.post('/update-property-picture', {
                    uuid: response.uuid,
                    key: response.key,
                    extension: response.extension,
                    property: this.property.uuid,
                })
            });

            this.showingLoadingScreen = false;
        },

        // submits the contact form
        onSubmit(questionList) {
            let data = {
                'firstName': this.name.split(" ")[0],
                'lastName': this.name.split(" ").filter((char, index) => {
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
                '--bg-accent-color': '#' + this.site.accent_color,
                '--correct-text-color': this.getContrastYIQ(this.site.accent_color),
            }
        }
    }
}
</script>

<style lang="css">
@import '../../../css/flow-form-text.css';
@import'../../../css/flow-form-white-bg.css';

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

[contenteditable]:hover {
    border-radius: 5px;
    box-shadow: 0px 0px 0px 2px #2563EB;
}

[contenteditable]:empty:before {
    color: #999999;
    content: attr(placeholder);
}
</style>
