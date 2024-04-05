@props(['name', 'routeName'])

<div class="mb-12 flex flex-wrap md:mb-0">
  <div class="w-full md:w-2/12 shrink-0 grow-0 basis-auto">
    <img src="https://source.unsplash.com/random?electricity&{{rand(1, 1000)}}"
      class="mb-6 w-full rounded-lg shadow-lg dark:shadow-black/20" alt="Avatar" />
  </div>

  <div class="w-full md:w-10/12 shrink-0 grow-0 basis-auto md:pl-6">
    <a href="{{route($routeName)}}" class="mb-3 font-semibold text-yellow-600 hover:text-yellow-400">{{$name}}</a>
    <p>
      @if($name == 'Electricity')
      Electricity in our houses powers essential appliances and lighting, providing convenience and comfort in our daily lives.
      It is distributed through a network of wires and circuits, controlled by switches and circuit breakers to ensure safety
      and efficient usage.
      @elseif($name == 'Water')
      ....
      @else
        Custom Service
      @endif
    </p>
  </div>
</div>