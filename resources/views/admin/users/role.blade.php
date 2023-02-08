<x-admin-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-dark overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex p-2">
                    <a href="{{route('admin.users.index')}}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md mb-4">Back to Permission</a>
                  </div>
                  <div class="flex flex-col">
                 <div>  User Name :  {{$user->name}}</div>
                 <div>  User Email : {{$user->email}}</div>  
               
                  </div>
                  <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->roles)
                        @foreach ($user->roles as $user_role)
                        <form action="{{route('admin.users.roles.remove',[$user->id,$user_role->id])}}" method="post" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method("DELETE")
                            <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">{{$user_role->name}}</button>
                        </form>
                        @endforeach
                    @endif
                    </div>

                    <div class="max-w-xl mt-6">
                        <form action="{{route('admin.users.roles',$user->id)}}" method="POST" >
                            @csrf
                           <div class="sm:col-span-6">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Permission</label>
                            <select id="permission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="role">
                            <option selected>Choose a Role</option>
                            @foreach($roles as $role)
                            <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                            </select>
                            @error('role')
                            <p class="text-red-400 text-sm">{{$message}}</p>  
                          @enderror
                           </div>
                           <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign Role</button>
                           </div>
              
                          </form>
                    </div>
                   
      
                  </div>
                  <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold"> Permissions</h2>
                    <div class="flex space-x-2 mt-4 p-2">
                        @if ($user->permissions)
                        @foreach ($user->permissions as $user_permission)
                        <form action="{{route('admin.users.permissions.revoke',[$user->id,$user_permission->id])}}" method="post" onsubmit="return confirm('Are you sure?')">
                            @csrf
                         
                            <button class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md" type="submit">{{$user_permission->name}}</button>
                        </form>
                        @endforeach
                    @endif
                    </div>

                    <div class="max-w-xl mt-6">
                        <form action="{{route('admin.users.permissions',$user->id)}}" method="POST" >
                            @csrf
                           <div class="sm:col-span-6">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Permission</label>
                            <select id="permission" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="permission">
                            <option selected>Choose a country</option>
                            @foreach($permissions as $permission)
                            <option value="{{$permission->name}}">{{$permission->name}}</option>
                            @endforeach
                            </select>
                            @error('permission')
                            <p class="text-red-400 text-sm">{{$message}}</p>  
                          @enderror
                           </div>
                           <div class="sm:col-span-6 pt-5">
                            <button type="submit" class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign Permission</button>
                           </div>
              
                          </form>
                    </div>
                   
      
                  </div>
                          
                  
             
              </div>

            </div>
        </div>
    </div>
</x-admin-layout>
