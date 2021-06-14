<template>
        <div :style="cssProps">
            <header class="vff-header" :style="accentColor">
                <div class="f-container">
                    <!-- Add custom logo here -->
<!--                    <svg class="f-logo" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMid meet" viewBox="0 0 200 11.211">-->
<!--                        &lt;!&ndash;                        <path d="M.134.837H3.21V8.01h4.203v2.18H.134V.837z"/>&ndash;&gt;-->
<!--                        &lt;!&ndash;                        <path d="M11.875.59c1.48 0 2.668.448 3.567 1.344s1.35 2.052 1.35 3.47c0 1.48-.445 2.7-1.336 3.632S13.38 10.45 11.9 10.45c-1.678 0-2.954-.54-3.827-1.622-.717-.9-1.08-2.022-1.09-3.397-.01-1.36.39-2.484 1.193-3.374C9.06 1.08 10.292.59 11.875.59zm0 2.283c-.563 0-1.003.222-1.323.662-.338.467-.507 1.124-.507 1.972 0 .865.162 1.524.487 1.978a1.58 1.58 0 0 0 1.369.682c.588 0 1.04-.223 1.355-.668s.474-1.07.474-1.875c0-1.834-.62-2.75-1.855-2.75z"/>&ndash;&gt;-->
<!--                        &lt;!&ndash;                        <path d="M21.565 7.078V5.055h4.217v5.163h-1.986l-.13-.908c-.693.76-1.617 1.142-2.777 1.142-1.383 0-2.488-.437-3.313-1.3s-1.243-2.03-1.252-3.464c-.01-1.462.385-2.65 1.18-3.567.875-1.012 2.11-1.518 3.7-1.518 1.21 0 2.207.303 3 .907s1.264 1.457 1.447 2.556h-2.92c-.207-.787-.73-1.182-1.57-1.182-.553 0-.988.236-1.303.707s-.475 1.153-.475 2.043c0 1.695.652 2.542 1.96 2.542.363 0 .695-.103.998-.306a1.29 1.29 0 0 0 .572-.784h-1.35v.002z"/>&ndash;&gt;-->
<!--                        &lt;!&ndash;                        <path d="M30.556.59c1.48 0 2.668.448 3.568 1.344s1.348 2.052 1.348 3.47c0 1.48-.443 2.7-1.336 3.632S32.06 10.45 30.58 10.45c-1.678 0-2.953-.54-3.826-1.622-.72-.892-1.082-2.022-1.1-3.398-.008-1.357.39-2.48 1.193-3.372C27.74 1.08 28.974.59 30.556.59zm0 2.283c-.563 0-1.002.222-1.322.662-.336.467-.506 1.125-.506 1.972 0 .865.162 1.524.486 1.978s.78.682 1.37.682 1.04-.223 1.355-.668.475-1.07.475-1.875c-.002-1.834-.62-2.75-1.857-2.75z"/>&ndash;&gt;-->
<!--                        <text y="11">-->
<!--                            <tspan font-weight="bold" class="font-extrabold	" :fill="this.getContrastYIQ(this.site.accent_color)">{{ $page.props.user.name.toUpperCase() }}</tspan>-->
<!--                        </text>-->
<!--                    </svg>-->
                </div>
            </header>

            <flow-form
                ref="flowform"
                v-on:complete="onComplete"
                v-on:submit="onSubmit"
                v-bind:questions="questions"
                v-bind:language="language"
                v-bind:standalone="true"
            >
                <!-- Custom content for the Complete/Submit screen slots in the FlowForm component -->
                <!-- We've overriden the default "complete" slot content -->
<!--                <template v-slot:complete>-->
<!--                    <div class="f-section-wrap">-->
<!--                        <p>-->
<!--                            <span class="fh2">Thank you.</span>-->
<!--                            <span class="f-section-text">-->
<!--                      We'll be in touch soon. You can review your answers or press submit.-->
<!--                    </span>-->
<!--                        </p>-->
<!--                        <p class="f-description">Note: You can find my email back on my homepage. Feel free to contact me that way if you have any questions.</p>-->
<!--                    </div>-->
<!--                </template>-->

<!--                &lt;!&ndash; We've overriden the default "completeButton" slot content &ndash;&gt;-->
<!--                <template v-slot:completeButton>-->
<!--                    <div class="f-submit" v-if="!submitted">-->
<!--                        <button-->
<!--                            class="o-btn-action"-->
<!--                            ref="button"-->
<!--                            type="submit"-->
<!--                            href="#"-->
<!--                            v-on:click.prevent="onSendData()"-->
<!--                            aria-label="Press to submit"-->
<!--                        >-->
<!--                            <span>{{ language.submitText }}</span>-->
<!--                        </button>-->
<!--                        <a class="f-enter-desc"-->
<!--                           href="#"-->
<!--                           v-on:click.prevent="onSendData()"-->
<!--                           v-html="language.formatString(language.pressEnter)">-->
<!--                        </a>-->
<!--                    </div>-->

<!--                    <p class="text-success" v-if="submitted">Submitted successfully.</p>-->
<!--                </template>-->
            </flow-form>

<!--            <form @submit.prevent="submitForm.post('/form/submit_results')" />-->
        </div>
</template>

<script>
import FlowForm, { QuestionModel, QuestionType, ChoiceOption, LanguageModel } from '@ditdot-dev/vue-flow-form';
import AppLayout from "@/Layouts/AppLayout";
import Edit from "@/Pages/Forms/Edit";

export default {
    name: "Show.vue",

    components: {
        FlowForm,
        AppLayout,
        Edit
    },

    props: ['form', 'questionlist', 'options', 'user', 'site'],

    data() {
        return {
            submitted: false,
            completed: false,
            language: new LanguageModel(),
            thing: [new ChoiceOption({
                    label: 'option.title'
                })],
            // Create question list with QuestionModel instances
            questions: Object.entries(this.questionlist).map(function (question, key) {
                question = question[1];
                return new QuestionModel({
                    id: 'first_name',
                    tagline: question.tagline,
                    title: question.title,
                    subtitle: question.subtitle,
                    content: question.content,
                    options: question.type == "Multiple Choice" ? question.options.map(function (option, key) {
                            return new ChoiceOption({
                                label: option.title
                            })
                        })
                    : null,
                    allowOther: question.allow_other,
                    type: question.type == "Text" ? QuestionType.Text : question.type == "Section Break" ? QuestionType.SectionBreak : question.type == "Multiple Choice" ? QuestionType.MultipleChoice : question.type == "Email" ? QuestionType.Email : QuestionType.Phone,
                    multiple: question.type == "Multiple Choice" ? question.multiple : false,
                    required: true,
                    placeholder: question.type == "Text" ? 'Start typing here...' : question.type == "Section Break" ? '' : question.type == "Multiple Choice" ? '' : question.type == "Email" ? 'jane@doe.com' : question.type == "Name" ? "Start typing here..." : '(###)-###-####',
                })
            }),
            accentColor: {
                'background-color': '#' + this.site.accent_color,
            },
        }
    },
    mounted() {
        document.addEventListener('keyup', this.onKeyListener)
    },
    beforeDestroy() {
        document.removeEventListener('keyup', this.onKeyListener)
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

        onKeyListener($event) {
            // We've overriden the default "complete" slot so
            // we need to implement the "keyup" listener manually.
            if ($event.key === 'Enter' && this.completed && !this.submitted) {
                this.onSendData()
            }
        },
        /* eslint-disable-next-line no-unused-vars */
        onComplete(completed, questionList) {
            // This method is called whenever the "completed" status is changed.
            this.completed = completed
        },
        /* eslint-disable-next-line no-unused-vars */
        onSubmit(questionList) {
            // This method will only be called if you don't override the
            // completeButton slot.
            this.onSendData()
        },

        onSendData() {
            // Set `submitted` to true so the form knows not to allow back/forward
            // navigation anymore.
            this.$refs.flowform.submitted = true
            this.submitted = true
            /* eslint-disable-next-line no-unused-vars */
            const data = this.getData()
            // data is an object of {questions, answers} where each is an array
            // what we want is one array of 3 objects, [{question, array}, {question, array}, {question, array}]
            console.log(data);
            let formattedData = this.questionlist.filter((question) => question.type !== "Section Break").map((question, index) => {
                return {question: question.title, answer: data.answers.filter((data) => data !== null)[index], type: question.type}
            })
            formattedData.unshift({form_id: this.form.uuid});
            this.$inertia.post('/form/submit_results', {data: formattedData})
        },
        getData() {
            const data = {
                questions: [],
                answers: []
            }
            this.questions.forEach(question => {
                // if (question.title) {
                    let answer = question.answer
                    if (Array.isArray(answer)) {
                        answer = answer.join(', ')
                    }
                    data.questions.push(question.title)
                    data.answers.push(answer)
                // }
            })
            return data
        }
    },
    computed: {
        cssProps() {
            return {
                '--bg-accent-color': '#' + this.site.accent_color,
            }
        }
    }
}
</script>

<style lang="css">
@import '~@ditdot-dev/vue-flow-form/dist/vue-flow-form.css';
@import'../../../css/flow-form-amaan.css';

button.o-btn-action {
    background-color: var(--bg-accent-color) !important;
}

* {
    font-family: "Inter var";
}

.f-key {
    color: var(--bg-accent-color) !important;
}

</style>
