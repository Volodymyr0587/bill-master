<div class="container my-12 mx-auto md:px-6">
  <!-- Section: Design Block -->
  <section class="mb-32">
    <h5 class="mb-10 text-center text-xl font-semibold md:mb-6">
      Choose a service or <a href="{{ route('service.create') }}" class="text-blue-500 font-bold hover:underline">create one</a>
    </h5>

    <!-- Service -->
    <x-service name='Electricity' routeName='electricity'/>

  </section>
  <!-- Section: Design Block -->
</div>