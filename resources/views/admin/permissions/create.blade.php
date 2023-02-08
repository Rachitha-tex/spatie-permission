<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{route('admin.permissions.index')}}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md mb-4">Back to Permission</a>
                  </div>
                  <div class="flex flex-col">
                    <div class="space-y-8 divide-y w-50 mt-10">
                        <form action="{{route('admin.permissions.store')}}" method="POST" >
                            @csrf
                           <div class="sm:col-span-6">
                            <label for="" class="block text-sm font-meium text-gray-700">Post Name</label>
                            <div class="mt-1">
                                <input type="text" name="name" class="block w-full appearance-none bg-white rounded-md">
                                @error('name')
                                  <p class="text-red-400 text-sm">{{$message}}</p>  
                                @enderror
                            </div>
                           </div>
                           <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Submit</button>
                           </div>
              
                          </form>
                    </div>
                  </div>
                   
                          

            </div>
        </div>
    </div>
</x-admin-layout>
