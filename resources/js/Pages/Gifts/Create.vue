<template>
    <div class="w-11/12 mx-auto mt-8 p-6 bg-white rounded-md shadow-md">
    <ValidationErrors/>
    {{ $page.props.flash.message || ''}} 
      <form @submit.prevent="submitForm" class="flex flex-col gap-6">

  {{ props.categories }}

        <div class="flex flex-col">
          <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
          <input v-model="formData.title" type="text" id="title" name="title" class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:border-blue-500" />
        </div>
  
        <div class="flex flex-col">
          <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
          <textarea v-model="formData.description" id="description" name="description" rows="4" class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:border-blue-500"></textarea>
        </div>
  
        <div class="flex flex-col">
          <label for="picture" class="block text-sm font-medium text-gray-700">Picture</label>
          <input type="file" @change="handleFileChange" id="picture" name="picture" class="mt-1 p-2 border rounded-md w-full focus:outline-none focus:border-blue-500" />
        </div>
  
        <button type="submit" class="px-4 py-2 bg-blue-500 w-[150px] self-end text-white rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">Submit</button>
      </form>
    </div>
  </template>
  
  <script setup>
  import { ref, defineProps } from 'vue';
  import { useForm } from '@inertiajs/vue3'
  import ValidationErrors from '@/Components/ValidationErrors.vue'


  const props = defineProps({
    categories: {
      required: true,
      type: Object,
    }
  })
  
  const formData = useForm({
    title: '',
    description: '',
    picture: null,
    category_id: 3,
  });
  
  const submitForm = () => {
    formData.post(route('gifts.store'), {
        preserveScroll: true,
        onSuccess: () => {
                formData.reset();
            },
            onError: errors => {
                
            },
            onFinish: () => {},
    }

    )
  };
  
  const handleFileChange = (event) => {
    formData.picture = event.target.files[0];
  };
  </script>
  

  