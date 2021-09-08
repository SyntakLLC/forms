<template>
    <app-layout>
        <div class="">
            <main>
                <!-- Side-by-side grid -->
<!--                <div class="bg-white">-->
<!--                    <div class="max-w-md mx-auto py-12 px-4 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-7xl lg:px-8">-->
<!--                        <div class="divide-y divide-gray-200">-->
<!--                            <section class="lg:grid lg:grid-cols-3 lg:gap-8" aria-labelledby="contactHeading">-->
<!--                                <h2 id="contactHeading" class="text-2xl font-extrabold text-gray-900 sm:text-3xl">-->
<!--                                    Get in touch-->
<!--                                </h2>-->
<!--                                <div class="mt-8 grid grid-cols-1 gap-12 sm:grid-cols-2 sm:gap-x-8 sm:gap-y-12 lg:mt-0 lg:col-span-2">-->
<!--                                    <div>-->
<!--                                        <h3 class="text-lg font-medium text-gray-900">-->
<!--                                            Collaborate-->
<!--                                        </h3>-->
<!--                                        <dl class="mt-2 text-base text-gray-500">-->
<!--                                            <div>-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Email-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    support@example.com-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                            <div class="mt-1">-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Phone number-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    +1 (555) 123-4567-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                        </dl>-->
<!--                                    </div>-->

<!--                                    <div>-->
<!--                                        <h3 class="text-lg font-medium text-gray-900">-->
<!--                                            Press-->
<!--                                        </h3>-->
<!--                                        <dl class="mt-2 text-base text-gray-500">-->
<!--                                            <div>-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Email-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    support@example.com-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                            <div class="mt-1">-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Phone number-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    +1 (555) 123-4567-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                        </dl>-->
<!--                                    </div>-->

<!--                                    <div>-->
<!--                                        <h3 class="text-lg font-medium text-gray-900">-->
<!--                                            Join our team-->
<!--                                        </h3>-->
<!--                                        <dl class="mt-2 text-base text-gray-500">-->
<!--                                            <div>-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Email-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    support@example.com-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                            <div class="mt-1">-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Phone number-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    +1 (555) 123-4567-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                        </dl>-->
<!--                                    </div>-->

<!--                                    <div>-->
<!--                                        <h3 class="text-lg font-medium text-gray-900">-->
<!--                                            Say hello-->
<!--                                        </h3>-->
<!--                                        <dl class="mt-2 text-base text-gray-500">-->
<!--                                            <div>-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Email-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    support@example.com-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                            <div class="mt-1">-->
<!--                                                <dt class="sr-only">-->
<!--                                                    Phone number-->
<!--                                                </dt>-->
<!--                                                <dd>-->
<!--                                                    +1 (555) 123-4567-->
<!--                                                </dd>-->
<!--                                            </div>-->
<!--                                        </dl>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </section>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

                <!-- FAQ -->
                <div class="">
                    <div class="max-w-md mx-auto py-12 px-4 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-7xl lg:px-8">
                        <div class="lg:grid lg:grid-cols-3 lg:gap-8">
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900">
                                    Frequently asked questions
                                </h2>
                                <p class="mt-4 text-lg text-gray-500">Can’t find the answer you’re looking for? Reach out to our customer support team at help@homeform.app.</p>
                            </div>
                            <div class="mt-12 lg:mt-0 lg:col-span-2">
                                <dl class="space-y-12">
                                    <div>
                                        <dt class="text-lg font-medium text-gray-900">
                                            How do I save my form?
                                        </dt>
                                        <dd class="mt-2 text-base text-gray-500">
                                            You don't need to manually save your forms. We automatically save for you as you edit them.
                                        </dd>
                                    </div>

                                    <div>
                                        <dt class="text-lg font-medium text-gray-900">
                                            What happens to my leads if I delete a form?
                                        </dt>
                                        <dd class="mt-2 text-base text-gray-500">
                                            Don't worry––your leads will never be deleted, even if you delete the form they came from!
                                        </dd>
                                    </div>

                                    <div>
                                        <dt class="text-lg font-medium text-gray-900">
                                            Will you be adding new form templates?
                                        </dt>
                                        <dd class="mt-2 text-base text-gray-500">
                                            Of course! As we grow, we will continue to focus on adding functional new form templates for your convenience!
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    name: "Help.vue",
    components: {AppLayout}
}
</script>

<style scoped>

</style>
