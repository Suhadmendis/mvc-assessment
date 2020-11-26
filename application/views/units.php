<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Assessment</title>

	<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

</head>
<body>

<div class="container mx-auto" id="app">

        <div class="hidden sm:block">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>
        
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">{{ headline }}</h3>
                        <p class="mt-1 text-sm leading-5 text-gray-600">
                            {{ description }}


                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">

                <?php echo form_open('Unit/enterUnits'); ?>
                    <!-- <form action="#" method="POST"> -->
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Units</label>
                                        <input v-model.number="input_value" type="number"
                                            class="mt-1 form-input block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5" name="units">
                                    </div>
                                    <div class="col-span-6 sm:col-span-2">
                                        <label for="first_name" class="">&nbsp;</label>


                                            <?php
                                                if($this->session->flashdata('amount')){
                                                    echo "<h1 class='mt-1'><b>Amount:</b> ".$this->session->flashdata('amount')."</h1>"; 
                                                }
                                            ?>
                                        

                                        
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                              
                            
                            <button :disabled="button_validation"
                                    :class="button_validation == false ? 'py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out' : 'py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 shadow-sm focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out'">
                                    Send
                                </button>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>




</div>



<script>
var app = new Vue({
  el: '#app',
  data: {
    headline: 'Bill Calculator',
    description: 'Please enter the number of units',
    input_value: '',
    button_validation: true
  },
  mounted: function () {
  this.button_validation = false;
  },
  watch: {
    // whenever question changes, this function will run
    input_value: function (newValue, oldQuestion) {
      var valueInt = parseInt(newValue);
      var valueFloat = parseFloat(newValue);

      var diff = valueFloat-valueInt;

      if (diff != 0) {
        this.description = "Please enter only integer values";
        this.button_validation = true;
      }else{
        this.description = "Please press the send button";
        this.button_validation = false;
      }
     

    }
  },
}) 
</script>

</body>
</html>