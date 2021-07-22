<template>
    <div v-if="$page.props.onTrial || $page.props.subscribed" :style="cssProps">
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
                            <h6 class="mt-0 mb-1 font-sans text-lg italic font-normal leading-7">
                                {{ this.property.town_and_state }}
                            </h6>
                            <h3
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
                                    <div class="box-border">{{ this.property.bed }}</div>
                                    <div class="box-border">&nbsp;Bed</div>
                                </div>
                                <div class="flex items-center my-1 mx-6">
                                    <svg class="h-6 w-6 inline-block mr-3 max-w-full align-middle border-0 box-border" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48">
                                        <path fill="#000000" id="i-465" d="M25,34h2v4h-2V34z M25,45h2v-4h-2V45z M17,31h2v-4h-2V31z M17,45h2v-4h-2V45z M17,38h2v-4h-2V38z M25,31h2v-4h-2V31z M33,38 h2v-4h-2V38z M41,31h2v-4h-2V31z M48,23v1H12v-1c0-8.471,4.407-12.33,15-12.912V10c0-2.131,1.022-2.746,1.964-2.926 C28.6,2.221,25.194,2,18,2h-5C5.393,2,2,4.467,2,10v38H0V10C0,0,9.785,0,13,0h5c6.685,0,12.48,0.02,12.954,7.061 C31.917,7.219,33,7.807,33,10v0.109C45.3,11.006,48,17.492,48,23z M45.966,22C45.505,15.273,40.27,12,30,12 c-12.657,0-15.706,3.799-15.979,10H45.966z M41,38h2v-4h-2V38z M33,31h2v-4h-2V31z M33,45h2v-4h-2V45z M41,45h2v-4h-2V45z"/>
                                    </svg>
                                    <div class="box-border">{{ this.property.bath }}</div>
                                    <div class="box-border">&nbsp;Bath</div>
                                </div>
                                <div class="flex items-center my-1 mx-6">
                                    <svg class="h-6 w-6 inline-block mr-3 max-w-full align-middle border-0 box-border" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                        <path d="M0.586,34L16,49.414L49.414,16L34,0.586L0.586,34z M16,46.586L3.414,34L5.5,31.914l4.793,4.793l1.414-1.414L6.914,30.5   l3.586-3.586l2.793,2.793l1.414-1.414L11.914,25.5l3.586-3.586l4.793,4.793l1.414-1.414L16.914,20.5l3.586-3.586l2.793,2.793   l1.414-1.414L21.914,15.5l3.586-3.586l4.793,4.793l1.414-1.414L26.914,10.5L30.5,6.914l2.793,2.793l1.414-1.414L31.914,5.5   L34,3.414L46.586,16L16,46.586z"/>
                                    </svg>
                                    <div class="box-border">{{ this.property.square_feet }}</div>
                                    <div class="box-border">&nbsp;Sq Ft</div>
                                </div>
                            </div>
                            <div class="text-xl leading-7">
                                {{ this.property.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <!-- Photos -->
        <div class="mx-auto pb-20 max-w-7xl">
            <ul role="list" class="grid grid-cols-2 gap-x-4 gap-y-8 sm:grid-cols-3 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
                <li class="relative" v-for="(photo) in $page['props']['photos']">
                    <div @click="openPhoto(photo.photo)"  class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
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
                :src="matterportHttps === 'https://' ? $page.props.property.matterport_url : twitterHttp === 'http://' ? $page.props.property.matterport_url : '//' + $page.props.property.matterport_url"
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
                            <flow-form v-on:submit="onSubmit">
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

</template>

<script>
import FlowForm, {Question} from '@ditdot-dev/vue-flow-form';
import AppLayout from "@/Layouts/AppLayout";
export default {
name: "Show.vue",
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
            showingPhotoScreen: false,

            matterportHttps: this.property.matterport_url == null ? "" : this.property.matterport_url.length > 7 ? this.property.matterport_url.substring(0, 8) : this.property.matterport_url,
            matterportHttp: this.property.matterport_url == null ? "" : this.property.matterport_url.length > 6 ? this.property.matterport_url.substring(0, 7) : this.property.matterport_url,

            videoHttps: this.property.video_url == null ? "" : this.property.video_url.length > 7 ? this.property.video_url.substring(0, 8).replace('watch?v=', 'embed/').split('&ab_channel')[0] : this.property.video_url.replace('watch?v=', 'embed/').split('&ab_channel')[0],
            videoHttp: this.property.video_url == null ? "" : this.property.video_url.length > 6 ? this.property.video_url.substring(0, 7).replace('watch?v=', 'embed/').split('&ab_channel')[0] : this.property.video_url.replace('watch?v=', 'embed/').split('&ab_channel')[0],

        }
    },
    methods: {
        openPhoto(photo) {
            this.showingPhotoScreen=!this.showingPhotoScreen;
            this.showPhotoUrl=photo;
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
                'message': "Regarding " + this.property.street_address + ": " + this.message,
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
</style>
