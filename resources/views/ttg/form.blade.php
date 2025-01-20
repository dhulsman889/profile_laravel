<x-layout>
   
    <form method="POST" action="{{ $type == 'add' ? route('ttg.store') : route('ttg.update', $ttg->id) }}" class="p-4">
        @csrf
        @if($type == 'edit')
            @method('PUT')
            <input type="hidden" name="id" value="{{ $ttg->id }}">
        @endif
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ $type == 'edit' ? $ttg->name : '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
            <textarea name="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $type == 'edit' ? $ttg->description : '' }}</textarea>
        </div>
        <div class="mb-4">
            <label for="numberofplayers" class="block text-gray-700 text-sm font-bold mb-2">Playercount</label>
            <input type="number" name="numberofplayers" id="numberofplayers" value="{{ $type == 'edit' ? $ttg->numberofplayers : '' }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        {{-- <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image</label>
            <input type="file" name="image" id="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div> --}}
        <button type="submit" class="p-2 bg-blue-500 hover:bg-blue-600 transition rounded font-bold text-white">{{ $type == 'add' ? 'Add' : 'Update' }}</button>
    </form>
</x-layout>