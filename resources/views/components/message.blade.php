@if(session()->has('message.create'))
     <div x-data="{show: true}"
          x-init="setTimeout(() => show = false, 4000)"
          x-show="show"
          class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50"
     >
          {{ session('message.create') }}
     </div>
@endif

@if(session()->has('message.update'))
     <div x-data="{show: true}"
          x-init="setTimeout(() => show = false, 4000)"
          x-show="show"
          class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50"
     >
          {{ session('message.update') }}
     </div>
@endif

@if(session()->has('message.destroy'))
     <div x-data="{show: true}"
          x-init="setTimeout(() => show = false, 4000)"
          x-show="show"
          class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50"
     >
          {{ session('message.destroy') }}
     </div>
@endif