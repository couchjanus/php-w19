/* globals Chart:false, feather:false */
(function () {
  'use strict';
  feather.replace();
  
}())

$(document).ready(function(){

  $image_crop = $('#image_crop').croppie({
     enableExif: true,
     viewport: {
       width:250,
       height:250,
       type:'square' //circle
     },
     boundary:{
       width:300,
       height:300
     }    
   });
 
   $('#insert_image').on('change', function(){
     var reader = new FileReader();
     reader.onload = function (event) {
       $image_crop.croppie('bind', {
         url: event.target.result
       }).then(function(){
         console.log('jQuery bind complete');
       });
     }
     reader.readAsDataURL(this.files[0]);
     $('#insertimageModal').modal('show');
   });
   
   $('.crop_image').click(function(event){
     const model = $(event.target).attr('data-model');
     $image_crop.croppie('result', {
       type: 'canvas',
       size: 'viewport'
     }).then(function(response){
 
       $.ajax({
         url:'/api/'+model+'/insert_image',
         type:'POST',
         data:{"image":response},
         success:function(data){
           $('#insertimageModal').modal('hide');
           output = `
           <input type="hidden" name="file_name" value="${data}">
           <div class="row">
             <div class="col-md-2" style="margin-bottom:16px;">
               <img src="/assets/images/${model}/${data}" />
             </div>
           </div>`;
         $('#store_image').html(output);
 
         }
       })
     });
   });
  
 });  
 

function readURL(input, id) {
  if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function (e) {
          document.getElementById(id).setAttribute('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
      document.getElementById(id).classList.remove('hidden');
  }
}