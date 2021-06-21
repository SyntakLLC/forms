<template>
    <edit :form="$page['props']['form']" :questions="$page['props']['questions']">
        <div class="bg-white rounded-md h-screen">

            <img class="absolute h-full w-full max-h-screen max-w-screen object-cover top-0" :src="site.cover_photo"/>
            <div class="absolute h-full w-full max-h-screen max-w-screen object-cover top-0 bg-black opacity-60"/>


            <!-- Global notification live region, render this permanently at the end of the document -->
            <div aria-live="assertive" class="fixed sm:relative inset-0 flex items-end px-4 py-6 pointer-events-none sm:p-6 sm:items-start">
                <div class="w-full flex flex-col items-center space-y-4 sm:items-end relative">

                    <transition
                        enter-active-class="transform ease-out duration-300 transition"
                        enter-class="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                        enter-to-class="translate-y-0 opacity-100 sm:translate-x-0"
                        leave-active-class="transition ease-in duration-100"
                        leave-class="opacity-100"
                        leave-to-class="opacity-0">
                        <div v-show="showingAutosaveNotification" class="max-w-sm z-50 sm:absolute w-full bg-white shadow-lg rounded-lg pointer-events-auto ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="p-4 z-50">
                                <div class="flex items-center z-50">
                                    <div class="w-0 z-50 flex-1 flex justify-between">
                                        <p class="w-0 z-50 flex-1 text-sm font-medium text-gray-900">
                                            Any changes you make will automatically be saved.
                                        </p>
                                        <button @click="dontShowNotifAgain" class="ml-3 z-50 flex-shrink-0 bg-white rounded-md text-sm font-medium text-blue-600 hover:text-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Don't Show Again
                                        </button>
                                    </div>
                                    <div class="ml-4 z-50 flex-shrink-0 flex">
                                        <button @click="showingAutosaveNotification=!showingAutosaveNotification" class="bg-white z-50 rounded-md inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <span class="sr-only z-50">Close</span>
                                            <!-- Heroicon name: solid/x -->
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </transition>
                </div>
            </div>


            <div class="vff">
                <div class="f-container">
                    <div class="f-form-wrap">

                        <!--MULTIPLE CHOICE-->
                        <div v-if="question.type === 'Multiple Choice'">
                            <div class="vff-animate q-form q-is-active f-fade-in-up f-has-value field-multiplechoice">
                                <div class="q-inner">
                                    <div class="">
                                        <div class="fh2"><!---->
                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Tagline (optional)" @input="updateTagline">{{ question.tagline }}</span>
                                            </span>

<!--                                            <span class="f-text">-->
<!--                                                <span contenteditable placeholder="Title" @input="updateTitle">-->
<!--                                                    {{ question.title }}&nbsp;-->
<!--                                                    <span aria-label="This step is required" role="note" class="f-required">-->
<!--                                                        <span aria-hidden="true">*</span>-->
<!--                                                    </span> &lt;!&ndash;&ndash;&gt;-->
<!--                                                </span> &lt;!&ndash;&ndash;&gt;-->
<!--                                            </span>-->
                                            <span
                                                class="f-sub"
                                                contenteditable="true"
                                                placeholder="Question"
                                                @input="updateTitle"
                                                :class="'text-left border-0 border-gray-300 border-solid'"
                                                style='font-family: "Inter var"; font-size: 2.25rem; line-height: 2.5rem; font-weight: 900; outline: transparent solid 0px; line-height: 51.456px; overflow-wrap: break-word;'
                                            >{{ question.title }}</span>

                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Subtitle (optional)" @input="updateSubtitle">{{ question.subtitle }}</span>
                                            </span>

                                            <span class="f-sub"><!----> <!---->
                                                <span class="f-help">{{ question.multiple ? 'Choose as many as you like' : 'Choose only one answer' }}</span>
                                            </span>

                                            <div class="f-answer f-full-width">
                                                <div class="f-radios-wrap">
                                                    <ul v-if="question.options.length" v-for="(option, index) in optionsList" role="listbox" class="f-radios">
                                                        <li :aria-label="'Press ' + mcLetters[index] + ' to select'" role="option" class=""><!---->
                                                            <div class="f-label-wrap">
                                                                <span class="f-key" :style="accentColorStyle">{{ mcLetters[index] }}</span>
                                                                <span contenteditable @input="updateOption($event, option.id)" :placeholder="'Type in option ' + mcLetters[index]" class="f-label" :class="'h-full w-full'">{{ option.title }}</span>

                                                                <!--DELETE OPTION-->
<!--                                                                <button -->
<!--                                                                        class="w-5 pr-10 text-gray-500 hover:text-gray-600 focus:outline-none">-->
                                                                    <svg @click="deleteOption(option.uuid)" v-on:click.stop class="text-white right-3 h-5 w-5 pt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                    </svg>
<!--                                                                </button>-->
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>

                                    <div class="vff-animate f-fade-in f-enter">
                                        <button @click="addOption" type="button" href="#" aria-label="Press to continue" class="o-btn-action-custom" :class="'text-white'"
                                                :style="'background-color: #' + site.accent_color + '; color: ' + getContrastYIQ(site.accent_color)">
                                            <span>Add Option</span>
                                        </button>
<!--                                        <a href="#" class="f-enter-desc">Press <span class="f-string-em">Enter</span></a>-->
                                    </div> <!---->
                                </div>
                            </div>
                        </div>

                        <!--SECTION BREAK-->
                        <div v-if="question.type === 'Section Break'">
                            <div class="vff-animate q-form q-is-active f-fade-in-up field-sectionbreak">
                                <div class="q-inner">
                                    <div class="f-section-wrap">
                                        <div class="fh2">
<!--                                            <span class="f-tagline" contenteditable placeholder="Tagline (optional)" @input="updateTagline">{{ question.tagline }}</span>-->
<!--                                            <span class="fh2" contenteditable placeholder="Message" @input="updateTitle">{{ question.title }}</span>-->
<!--                                            <span class="f-sub" contenteditable placeholder="Subtitle (optional)" @input="updateSubtitle">-->
<!--                                                <span placeholder="Subtitle (optional)">{{ question.subtitle }}</span>-->
<!--                                            </span>-->

                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Tagline (optional)" @input="updateTagline">{{ question.tagline }}</span>
                                            </span>


                                            <span contenteditable class="f-sub"
                                                  :class="'text-left border-0 border-gray-300 border-solid'"
                                                  style='font-family: "Inter var"; font-size: 2.25rem; line-height: 2.5rem; font-weight: 900; outline: transparent solid 0px; line-height: 51.456px; overflow-wrap: break-word;'
                                                  placeholder="Message"
                                                  @input="updateTitle">{{ question.title }}</span>


                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Subtitle (optional)" @input="updateSubtitle">{{ question.subtitle }}</span>
                                            </span>

                                            <div class="f-answer f-full-width"><!---->
                                            </div>
                                        </div> <!---->
                                    </div>
                                    <div class="vff-animate f-fade-in f-enter">
                                        <button type="button" href="#" aria-label="Press to continue" class="o-btn-action-custom" :class="'text-white'" :style="accentColor">
                                            <span>Continue</span>
                                        </button>
                                        <a href="#" class="f-enter-desc">Press <span class="f-string-em">Enter</span></a></div> <!----></div>
                            </div>
                        </div>

                        <!--TEXT/EMAIL/PHONE/NAME-->
                        <div v-if="question.type === 'Name' || question.type === 'Text' || question.type === 'Email' || question.type === 'Phone Number'">
                            <div class="vff-animate q-form q-is-active f-fade-in-up field-text">
                                <div class="q-inner">
                                    <div class="">
                                        <div class="fh2">

                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Tagline (optional)" @input="updateTagline">{{ question.tagline }}</span>
                                            </span>
<!--                                            <span class="f-text">&lt;!&ndash;&ndash;&gt; &lt;!&ndash;&ndash;&gt;-->
<!--                                                <span contenteditable class="f-help" placeholder="Question" @input="updateTitle">{{ question.title }}</span>-->
<!--                                            </span>-->
                                            <span
                                                class="f-sub"
                                                contenteditable="true"
                                                placeholder="Question"
                                                @input="updateTitle"
                                                :class="'text-left border-0 border-gray-300 border-solid'"
                                                style='font-family: "Inter var"; font-size: 2.25rem; line-height: 2.5rem; font-weight: 900; outline: transparent solid 0px; line-height: 51.456px; overflow-wrap: break-word;'
                                            >{{ question.title }}</span>


                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Subtitle (optional)" @input="updateSubtitle">{{ question.subtitle }}</span>
                                            </span>

                                            <div class="f-answer f-full-width">
                                                <span>
                                                    <input disabled class="focus:outline-none" :type="question.type === 'Text' ? 'text' : question.type === 'Email' ? 'email' : 'text'" required="required" :placeholder="question.type === 'Text' ? 'Start typing here...' : question.type === 'Email' ? 'jane@doe.com' : question.type === 'Phone' ? '(###)-###-####' : 'Start typing here...'">
                                                </span>
                                            </div>

                                        </div> <!---->
                                    </div> <!----> <!---->
                                </div>
                            </div>  <!---->
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </edit>
</template>

<script>
import FlowForm, { QuestionModel, QuestionType, ChoiceOption, LanguageModel } from '@ditdot-dev/vue-flow-form';
import AppLayout from "@/Layouts/AppLayout";
import Edit from "@/Pages/Forms/Edit";

export default {
    name: "EditSingle.vue",

    components: {
        FlowForm,
        AppLayout,
        Edit
    },

    props: ['question', 'options', 'user', 'site'],

    data() {
        return {
            timeoutId: 0,
            showingAutosaveNotification: !this.site.saw_autosave_message_on_form,
            optionsList: this.options.map((option) => {
                return option
            }),
            mcLetters: ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'],
            QuestionType: QuestionType,
            dataValue: null,
            debounced: false,
            submitted: false,
            completed: false,
            language: new LanguageModel(),
            // Create question list with QuestionModel instances
            questions: [
                new QuestionModel({
                    id: 'first_name',
                    tagline: this.question.tagline,
                    title: this.question.title,
                    subtitle: this.question.subtitle,
                    content: this.question.content,
                    options: this.question.type == "Multiple Choice" ? this.options.map(function (option, key) {
                        return new ChoiceOption({
                            label: option.title
                        })
                    }) : null,
                    allowOther: this.question.allow_other,
                    type: this.question.type == "Text" ? QuestionType.Text : this.question.type == "Section Break" ? QuestionType.SectionBreak : this.question.type == "Multiple Choice" ? QuestionType.MultipleChoice : this.question.type == "Email" ? QuestionType.Email : QuestionType.Phone,
                    multiple: this.question.type == "Multiple Choice" ? this.question.multiple : false,
                        required: true,
                    placeholder: this.question.type == "Text" ? 'Start typing here...' : this.question.type == "Section Break" ? '' : this.question.type == "Multiple Choice" ? '' : this.question.type == "Email" ? 'jane@doe.com' : '(###)-###-####',
                }),
            ],
            accentColor: {
                'background-color': '#' + this.site.accent_color,
            },
        }
    },

    watch: {
        options: function(newVal, oldVal) { // watch it
            this.optionsList = this.options.map((option) => {
                return option
            });
        }
    },

    mounted() {
        this.focusField()
        this.dataValue = this.question.answer
        // this.$refs.qanimate.addEventListener('animationend', this.onAnimationEnd)
    },
    beforeDestroy() {
        // this.$refs.qanimate.removeEventListener('animationend', this.onAnimationEnd)
    },
    methods: {
        // don't show the notif again
        async dontShowNotifAgain() {
            this.showingAutosaveNotification=!this.showingAutosaveNotification;

            let data = {
                'site': this.site.uuid,
            }
            let response = await axios.post('/api/dontshowformnotif', data)
        },

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
         * Add an Option, delete an option, updating an option
         */
        addOption() {

            let data = {'index': this.question.options[this.question.options.length - 1].index + 1, 'question_id': this.question.id, 'form_id': this.question.form_id}
            // let response = await axios.post('add-option', data)
            this.$inertia.post('/form/add_option', data)
        },
        async updateOption(e, optionID) {
            clearTimeout(this.timeoutId)
            let data = {'title': e.target.innerText, 'option_id': optionID, 'question_id': this.question.id, 'form_id': this.question.form_id}
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-option', data)
            })
        },

        // deleting a question
        async deleteOption(deletedUuid) {
            let newOptions = this.optionsList.filter((option) => {
                return option.uuid !== deletedUuid;
            });
            this.optionsList = newOptions;

            let data = {'question_id': this.question.id, 'deletedUUID': deletedUuid, 'form_id': this.question.form_id}

            let response = await axios.post('/api/delete-option', data)
        },

        /**
         * Update fields
         */
        async updateTagline(e) {
            clearTimeout(this.timeoutId)
            let data = {'type': 'tagline', 'tagline': e.target.innerText, 'question_id': this.question.id, 'form_id': this.question.form_id}
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-form-question', data)
            })
        },
        async updateTitle(e) {
            clearTimeout(this.timeoutId)
            let data = {'type': 'title', 'title': e.target.innerText, 'question_id': this.question.id, 'form_id': this.question.form_id}
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-form-question', data)
            })
        },
        async updateSubtitle(e) {
            clearTimeout(this.timeoutId)
            let data = {'type': 'subtitle', 'subtitle': e.target.innerText, 'question_id': this.question.id, 'form_id': this.question.form_id}
            this.timeoutId = setTimeout(async function() {
                let response = await axios.post('/api/update-form-question', data)
            })
        },

        /**
         * Autofocus the input box of the current question
         */
        focusField() {
            const el = this.$refs.questionComponent

            el && el.focus()
        },
        onAnimationEnd() {
            this.focusField()
        },
        shouldFocus() {
            const q = this.$refs.questionComponent
            return q && q.canReceiveFocus && !q.focused
        },
        returnFocus() {
            const q = this.$refs.questionComponent
            if (this.shouldFocus()) {
                this.focusField()
            }
        },
        /**
         * Emits "answer" event and calls "onEnter" method on Enter press
         */
        onEnter($event) {
            this.checkAnswer(this.emitAnswer)
        },
        onTab($event) {
            this.checkAnswer(this.emitAnswerTab)
        },
        checkAnswer(fn) {
            const q = this.$refs.questionComponent
            if (q.isValid() && this.question.nextStepOnAnswer && !this.question.multiple) {
                this.debounce(() => fn(q), 350)
            } else {
                fn(q)
            }
        },
        emitAnswer(q) {
            if (q) {
                if (!q.focused) {
                    this.$emit('answer', q)
                }
                q.onEnter()
            }
        },
        emitAnswerTab(q) {
            if (q && this.question.type !== QuestionType.Date) {
                this.returnFocus()
                this.$emit('answer', q)

                q.onEnter()
            }
        },
        debounce(fn, delay) {
            let debounceTimer
            this.debounced = true

            return (() => {
                clearTimeout(debounceTimer)
                debounceTimer = setTimeout(fn, delay)
            })()
        },

        /**
         * Check if the "OK" button should be shown.
         */
        showOkButton() {
            const q = this.$refs.questionComponent
            if (this.question.type === QuestionType.SectionBreak) {
                return this.active
            }
            if (!this.question.required) {
                return true
            }
            if (this.question.allowOther && this.question.other) {
                return true
            }
            if (QuestionType.MultipleChoice && !this.question.multiple && this.question.nextStepOnAnswer) {
                return false
            }

            // If there is no question referenced, or dataValue is still set to its default (null).
            // This allows a ChoiceOption value of false, but will not allow you to use null as a value.
            if (!q || this.dataValue === null) {
                return false
            }
            return q.hasValue && q.isValid()
        },
        showSkip() {
            const q = this.$refs.questionComponent
            // We might not have a reference to the question component at first
            // but we know that if we don't, it's definitely empty
            return !this.question.required && (!q || !q.hasValue)
        },
        /**
         * Determins if the invalid message should be shown.
         */
        showInvalid() {
            const q = this.$refs.questionComponent
            if (!q || this.dataValue === null) {
                return false
            }
            return q.showInvalid()
        }
    },
    computed: {
        accentColorStyle() {
            return 'color: #' + this.site.accent_color;
        },
        mainClasses: {
            cache: false,
            get() {
                const classes = {
                    'q-is-active': this.active,
                    'q-is-inactive': !this.active,
                    'f-fade-in-down': this.reverse,
                    'f-fade-in-up': !this.reverse,
                    'f-focused': this.$refs.questionComponent && this.$refs.questionComponent.focused,
                    'f-has-value': this.$refs.questionComponent && this.$refs.questionComponent.hasValue
                }
                classes['field-' + this.question.type.toLowerCase().substring(8, this.question.type.length - 4)] = true
                return classes
            }
        },
        showHelperText() {
            if (this.question.subtitle) {
                return true
            }
            if (this.question.type === QuestionType.LongText || this.question.type === QuestionType.MultipleChoice) {
                return this.question.helpTextShow
            }
            return false
        },
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

    [contenteditable]:hover {
        border-radius: 5px;
        box-shadow: 0px 0px 0px 2px #2563EB;
    }

    [contenteditable]:hover {
        cursor: text;
    }

    [contenteditable]:empty:before {
        color: #999999;
        content: attr(placeholder);
    }

    textarea:focus, input:focus{
        outline: none !important;
    }

    .vff input[type=date]:focus, .vff input[type=email]:focus, .vff input[type=number]:focus, .vff input[type=password]:focus, .vff input[type=tel]:focus, .vff input[type=text]:focus, .vff input[type=url]:focus, .vff textarea:focus {
        border: 0;
        border-bottom: 1px solid;
        border-bottom-color: var(--bg-accent-color) !important;
        border-radius: 0;
        outline: none !important;
    }

    .vff .o-btn-action-custom {
        z-index: 1;
        line-height: 1.2;
        font-weight: 900;
        text-transform: lowercase
    }

    .vff .o-btn-action-custom span {
        font-size: 1em;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        text-decoration: none;
        -webkit-transition: all .4s ease 0s;
        transition: all .4s ease 0s
    }
    .vff .o-btn-action-custom {
        color: var(--vff-button-text-color);
        background-color: var(--vff-button-color);
    }

    .vff .o-btn-action-custom:hover,
    .vff .o-btn-action-custom:focus {
        background-color: var(--vff-button-hover-color);
        opacity: .9;
    }

    .vff span.f-text-2 {
        color: black;
        text-align: left;
        /*text-4xl;*/
        font-family: "Inter var";
        outline: transparent solid 0px;
        line-height: 51.456px;
        overflow-wrap: break-word;
    }

</style>
