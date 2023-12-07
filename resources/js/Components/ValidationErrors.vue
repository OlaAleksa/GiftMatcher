<template>
    <div v-if="hasErrors" class="flex gap-4 bg-black p-4 rounded-lg mt-7 relative">
        <div class="space-y-1 text-sm">
            <h6 class="font-bold text-primary-red text-base text-left">Błąd</h6>
            <ul class="text-primary-red leading-tight">
                <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
            </ul>
        </div>
    </div>      
</template>

<script>
export default {
    computed: {
        errors() {
            return this.$page.props.errors
        },

        hasErrors() {
            return Object.keys(this.errors).length > 0
        },
    }
}
</script>