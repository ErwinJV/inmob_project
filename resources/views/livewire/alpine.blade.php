<div> 
   
   <p>Count: {{$count}}</p>
  
  
   <div x-data="{ count: $wire.count }">
    
     <p>Count dentro de alpine: <span x-text="count"></span> </p>
   
   </div>
   
</div>
