<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-end">
                    <a href="{{route('admin.roles.create')}}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md mb-4">Create Role</a>
                  </div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
      
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            
            @foreach ($roles as $role)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{$role->name}}</a>
                </td>
                <td class="px-6 py-4">
                    <div class="flex justify-end">
                        <div class="flex spaxe-x-2">
                            <a href="{{route('admin.roles.edit',$role->id)}}" class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                            <form action="{{route('admin.roles.destroy',$role->id)}}" method="post" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method("DELETE")
                                <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
        
            </tr>   
            @endforeach
 
        
        </tbody>
    </table>
</div>

            </div>
        </div>
    </div>
</x-admin-layout>
