<x-admin-layout>
  <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('All Comment') }}
      </h2>
  </x-slot>
  @section('content')
	<div class="row mt-5">
    <form class="mb-3" action="??" type="get" >
              <div class="box" >
                <input  name="query" type="text" id="myInput" placeholder="Search.." title="Type in a name">
                <button type="submit" class="btn btn-dark">Search</button>
              </div>
            </form>
		<div class="col-md-12">
		</div>
	</div>


	<table class="table">
	<thead class="table-dark">
		<tr>
			<th class="py-3 px-6 text-center">No.</th>
			<th class="py-3 px-6 text-center">userID</th>
			<th class="py-3 px-6 text-center">restaurantID</th>
			<th class="py-3 px-6 text-center">Comment</th>
			<th width="280px" class="py-3 px-6 text-center">Action</th>
		</tr>
		</thead>

  @foreach ($data as $key => $value)
	<tr>
		<td class="py-3 px-6 text-center">{{ ++$i }}</td>
		<td class="py-3 px-6 text-center">{{ $value->userID }}</td>	
		<td class="py-3 px-6 text-center">{{ $value->restaurantID }}</td>
		<td class="py-3 px-6 text-center">{{ $value->reviews }}</td>

    
    
	<td class="py-3 px-6 text-center">
										@csrf
										@method('DELETE')
                                        <div class="w-6 mr-5 transform hover:text-purple-500 hover:scale-110">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 23 24" stroke="currentColor">
												<a xlink:href="{{ route('deleteComment', $value->id) }}">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
												</a>
                                            </svg>
											
                                        </div>
                                    </div>
									
                                </td>
	<tr>
  @endforeach
  </table>
 
  
  {!! $data->links() !!}
  @endsection

</x-admin-layout>
