<template>
    <Link :href="route('gifts.create')">
        Dodaj prezent
    </Link> 
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link,
    },
}


</script>