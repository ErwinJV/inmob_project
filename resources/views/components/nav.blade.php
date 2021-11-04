
  <!-- This example requires Tailwind CSS v2.0+ -->
<nav x-data="{open:false}" class="bg-white fixed z-10 w-full ">
  <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="relative flex items-center justify-between transition-all duration-500 ease-in-out h-10 ">
      
    <!-- Mobile menu button-->
      <div  class="absolute inset-y-0 left-0 flex items-center sm:hidden ">
       
        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-blue-800  " aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          
          <svg @click="$dispatch('menu-sm')" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
         
         
        </button>
      </div>
     
      <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
       
       {{--Logotipo--}}
       
        <a href="{{route('welcome')}}" class="flex-shrink-0 flex text-white items-center">
          <i class="fas fa-key text-blue-800"></i>
        </a>
       
       {{--Menu lg--}}
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
           
            @foreach($categories as $category)
             
              <a href="{{route('inmuebles.category', $category )}}" class="text-blue-800 capitalize hover:bg-blue-700  px-3 py-2  rounded-md text-xl font-medium">{{$category->name}}</a>
             
            @endforeach
            
            
          </div>
        </div>
      </div>
      
    
      

         
        </div>
      </div>
    </div>
  </div>
  
  {{--Menu SM--}}

  <!-- Mobile menu, show/hide based on menu state. -->
  <div x-data="{open:false}"   @menu-sm.window="open = !open"  class="hidden md:hidden " :class="{'hidden': !open}"  id="mobile-menu">
    <div class="px-2 pt-2 pb-3 ">
      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->

            @foreach($categories as $category)
             
             <a href="{{route('inmuebles.category', $category)}}" class="text-white capitalize hover:bg-blue-900  block px-3 py-2 rounded-md text-base font-medium">{{$category->name}}</a>

             
            @endforeach
      

     

    </div>
  </div>
</nav>


