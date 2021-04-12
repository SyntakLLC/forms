<template>
    <edit :form="$page['props']['form']" :questions="$page['props']['questions']">
        <div class="bg-white rounded-md h-screen">
            <header class="vff-header rounded-t-md" :style="accentColor">
                <div class="f-container">
                    <!-- Add custom logo here -->
                    <svg class="f-logo" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMid meet" viewBox="0 0 35.606 11.211">
                        <path d="M.134.837H3.21V8.01h4.203v2.18H.134V.837z"/>
                        <path d="M11.875.59c1.48 0 2.668.448 3.567 1.344s1.35 2.052 1.35 3.47c0 1.48-.445 2.7-1.336 3.632S13.38 10.45 11.9 10.45c-1.678 0-2.954-.54-3.827-1.622-.717-.9-1.08-2.022-1.09-3.397-.01-1.36.39-2.484 1.193-3.374C9.06 1.08 10.292.59 11.875.59zm0 2.283c-.563 0-1.003.222-1.323.662-.338.467-.507 1.124-.507 1.972 0 .865.162 1.524.487 1.978a1.58 1.58 0 0 0 1.369.682c.588 0 1.04-.223 1.355-.668s.474-1.07.474-1.875c0-1.834-.62-2.75-1.855-2.75z"/>
                        <path d="M21.565 7.078V5.055h4.217v5.163h-1.986l-.13-.908c-.693.76-1.617 1.142-2.777 1.142-1.383 0-2.488-.437-3.313-1.3s-1.243-2.03-1.252-3.464c-.01-1.462.385-2.65 1.18-3.567.875-1.012 2.11-1.518 3.7-1.518 1.21 0 2.207.303 3 .907s1.264 1.457 1.447 2.556h-2.92c-.207-.787-.73-1.182-1.57-1.182-.553 0-.988.236-1.303.707s-.475 1.153-.475 2.043c0 1.695.652 2.542 1.96 2.542.363 0 .695-.103.998-.306a1.29 1.29 0 0 0 .572-.784h-1.35v.002z"/>
                        <path d="M30.556.59c1.48 0 2.668.448 3.568 1.344s1.348 2.052 1.348 3.47c0 1.48-.443 2.7-1.336 3.632S32.06 10.45 30.58 10.45c-1.678 0-2.953-.54-3.826-1.622-.72-.892-1.082-2.022-1.1-3.398-.008-1.357.39-2.48 1.193-3.372C27.74 1.08 28.974.59 30.556.59zm0 2.283c-.563 0-1.002.222-1.322.662-.336.467-.506 1.125-.506 1.972 0 .865.162 1.524.486 1.978s.78.682 1.37.682 1.04-.223 1.355-.668.475-1.07.475-1.875c-.002-1.834-.62-2.75-1.857-2.75z"/>
                    </svg>
                </div>
            </header>


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
                                            <span class="f-text"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Question" @input="updateTitle">{{ question.title }}</span>
                                            </span>

                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Subtitle (optional)" @input="updateSubtitle">{{ question.subtitle }}</span>
                                            </span>

                                            <span class="f-sub"><!----> <!---->
                                                <span class="f-help">{{ question.multiple ? 'Choose as many as you like' : 'Choose only one answer' }}</span>
                                            </span>

                                            <div class="f-answer f-full-width">
                                                <div class="f-radios-wrap">
                                                    <ul v-if="question.options.length" v-for="(option, index) in question.options" role="listbox" class="f-radios">
                                                        <li :aria-label="'Press ' + mcLetters[index] + ' to select'" role="option" class=""><!---->
                                                            <div class="f-label-wrap">
                                                                <span class="f-key">{{ mcLetters[index] }}</span>
                                                                <span class="f-label">{{ option.title }}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>
                                    <div class="vff-animate f-fade-in f-enter">
                                        <button type="button" href="#" aria-label="Press to continue" class="o-btn-action">
                                            <span>OK</span>
                                        </button>
                                        <a href="#" class="f-enter-desc">Press <span class="f-string-em">Enter</span></a>
                                    </div> <!---->
                                </div>
                            </div>
                        </div>

                        <!--SECTION BREAK-->
                        <div v-if="question.type === 'Section Break'">
                            <div class="vff-animate q-form q-is-active f-fade-in-up field-sectionbreak">
                                <div class="q-inner">
                                    <div class="f-section-wrap">
                                        <div class=""><!----> <!----> <!---->
                                            <div class="f-answer f-full-width">
                                                <div class="f-content">
                                                    <span contenteditable class="f-section-text">{{ question.content == null ? "Message" : question.content }}</span>
                                                </div>
                                            </div>
                                        </div> <!---->
                                    </div>
                                    <div class="vff-animate f-fade-in f-enter">
                                        <button type="button" href="#" aria-label="Press to continue" class="o-btn-action">
                                            <span>Continue</span>
                                        </button>
                                        <a href="#" class="f-enter-desc">Press <span class="f-string-em">Enter</span></a>
                                    </div> <!---->
                                </div>
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

<!--                                            <span class="f-text">-->
<!--                                                <span contenteditable class="f-text" placeholder="Title" @input="updateTitle">-->
<!--                                                    {{ question.title }}-->
<!--&lt;!&ndash;                                                    <span aria-label="This step is required" role="note" class="f-required">&ndash;&gt;-->
<!--&lt;!&ndash;                                                        <span aria-hidden="true">*</span>&ndash;&gt;-->
<!--&lt;!&ndash;                                                    </span> &lt;!&ndash;&ndash;&gt;&ndash;&gt;-->
<!--                                                </span> &lt;!&ndash;&ndash;&gt;-->
<!--                                            </span>-->
                                            <span class="f-text"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Question" @input="updateTitle">{{ question.title }}</span>
                                            </span>

                                            <span class="f-sub"><!----> <!---->
                                                <span contenteditable class="f-help" placeholder="Subtitle (optional)" @input="updateSubtitle">{{ question.subtitle }}</span>
                                            </span>

                                            <div class="f-answer f-full-width">
                                                <span>
                                                    <input :type="question.type === 'Text' ? 'text' : question.type === 'Email' ? 'email' : 'text'" required="required" :placeholder="question.type === 'Text' ? 'Start typing here...' : question.type === 'Email' ? 'jane@doe.com' : question.type === 'Phone' ? '(###)-###-####' : 'Start typing here...'">
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

    props: ['question', 'options', 'user'],

    data() {
        return {
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
                'background-color': '#' + this.user.accent_color,
            },
        }
    },
    mounted() {
        this.focusField()
        this.dataValue = this.question.answer
        this.$refs.qanimate.addEventListener('animationend', this.onAnimationEnd)
    },
    beforeDestroy() {
        this.$refs.qanimate.removeEventListener('animationend', this.onAnimationEnd)
    },
    methods: {
        /**
         * Update fields
         */
        async updateTagline(e) {
            let data = {'type': 'tagline', 'tagline': e.target.innerText, 'question_id': this.question.id, 'form_id': this.question.form_id}
            // this.$inertia.post('/form/update_tagline', data)
            let response = await axios.post('/api/update-form-question', data)
        },
        async updateTitle(e) {
            let data = {'type': 'title', 'title': e.target.innerText, 'question_id': this.question.id, 'form_id': this.question.form_id}
            // this.$inertia.post('/form/update_tagline', data)
            let response = await axios.post('/api/update-form-question', data)
        },
        async updateSubtitle(e) {
            let data = {'type': 'subtitle', 'subtitle': e.target.innerText, 'question_id': this.question.id, 'form_id': this.question.form_id}
            // this.$inertia.post('/form/update_tagline', data)
            let response = await axios.post('/api/update-form-question', data)
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
        }
    }
}
</script>

<style lang="css">
    @import '~@ditdot-dev/vue-flow-form/dist/vue-flow-form.css';
    @import'../../../css/flow-form-amaan.css';

    .f-tagline[contenteditable="true"]:focus {
        /*background-color: rgba(217, 245, 255,0.5);*/
        /*margin: 2px;*/
        /*border-width: 0px;*/
        /*border-color: #cbd5e0;*/
        /*border-radius: 8px;*/
    }
    [contenteditable] {
        outline: 0px solid transparent;
    }

    [contenteditable]:empty:before {
        color: #999999;
        content: attr(placeholder);
    }

    input {
        outline: 0px solid transparent;
    }
</style>
