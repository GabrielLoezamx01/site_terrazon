 <div class="col-md-12 bg-white">
     <div class="m-3">
         <h2 class="sub-title mt-4">
             Mis favoritos
         </h2>
         @include('user.admin.alerts')
         <div class="row">
             @foreach ($data as $index => $card)
                 <div class="col-md-6 mt-5">
                     <x-card :card="$card" />
                 </div>
             @endforeach
         </div>

     </div>
 </div>
