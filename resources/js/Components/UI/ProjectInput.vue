<template>
    <div>
        <label v-if="label" class="text-[16px] mr-4 text-gray-700 inline-block mb-2" :for="id">{{ label }}:</label>
        <input :id="id" v-bind="$attrs" 
        class="h-10 border-transparent bg-white py-2 px-4 w-full outline-none focus:ring-2 focus:ring-indigo-400 rounded" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input" :class="{ error: error }">
    </div>
</template>

<script>
import uniqueId from 'lodash.uniqueid';

export default {
    name: 'project-input',
    emits: ['update:modelValue'],
    inheritAttrs: false,
    props: {
        id: {
            type: String,
                default() {
                    return `input-${uniqueId()}`
            },
        },
        modelValue: String,
        label: String,
        error: String,
    },
    methods: {
        focus() {
            this.$refs.input.focus()
        }
    }
}
</script>