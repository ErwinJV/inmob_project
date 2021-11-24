require('./bootstrap')

import Alpine from 'alpinejs'
import 'animate.css'
import Sortable from 'sortablejs/modular/sortable.complete.esm.js'

window.Alpine = Alpine
window.Swal = require('sweetalert2')

Alpine.start()



//==========================
//  Preview de Imageres
//==========================

const preview = document.getElementById('preview-images')

 Sortable.create(preview, {
     
     animation: 150,
     
     group: 'image-group',
     store: {
     
        //Guardamos el orden de la lista
        set: (sortable) => {
        
           let order = sortable.toArray()
          
           Livewire.emit('orderImages', order)
           
          console.log(order)
           
        },
     }
     
    
})





Livewire.on('preview-edit', function () {

 const previewEdit = document.getElementById('preview-images-edit')
 
 Sortable.create(previewEdit, {
     
     animation: 150,
     
     group: 'image-group',
     store: {
     
        //Guardamos el orden de la lista
        set: (sortable) => {
        
           let order = sortable.toArray()
          
           Livewire.emit('orderImagesEdit', order)
           
          console.log(order)
           
        },
     }
     
    
})
      
})

 


//==========================
//  Emtir alertas 
//==========================

Livewire.on('alert', function (message) {

Swal.fire({
  
  icon: 'success',
  title: message,
  showConfirmButton: false,
  timer: 2500
})   

})

Livewire.on('alert-delete', inmueble => {

Swal.fire({
  title: 'Estas seguro?',
  text: "No podras revertir esto despues!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, eliminalo!'
}).then((result) => {
  if (result.isConfirmed) {
   
   Livewire.emitTo('inmuebles', 'delete', inmueble)
   
    Swal.fire(
      'Deleted!',
      'El registro ha sido eliminado.',
      'success'
    )
  }
})

} )



 
