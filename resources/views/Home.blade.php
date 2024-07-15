<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="flex justify-center items-center">
        <form class="mt-6" action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Create Product</h2>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                        <div class="mt-2">
                            <input name="title" id="title" autocomplete="title"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></input>
                            @if ($errors->has('title'))
                                <p class="text-red-600">{{ $errors->first('title') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="description"
                            class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" autocomplete="description"
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                        <div
                            class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                            <div class="text-center">
                                <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                    <label for="file-upload"
                                        class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="image" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                @if ($errors->has('image'))
                                    <p class="text-red-600">{{ $errors->first('image') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <button class="bg-green-600" type="submit">Create</button>
            </div>
        </form>
    </div>
    <div class="">
        <div class="flex justify-center mt-2 ">
            <h1 class=" rounded-lg p-3 bg-black text-white w-fit">List All Product</h1>
        </div>
        <div class="relative overflow-x-auto mt-3 ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Decription
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th>
                            Other
                        </th>
                    </tr>
                </thead>
                @foreach ($data as $data)
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $data->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data->description }}
                            </td>
                            <td class="px-6 py-4">
                                <img class="h-28 w-28" src="product/{{ $data->image }}" alt="">
                            </td>
                            <td>
                                <div class='flex gap-2 text-lg'>
                                    <div class='text-green-600'>
                                        <form action="{{ url('/update_product/' . $data->id) }}" method="POST">
                                            @csrf
                                            @method('GET')
                                            <button for="tw-modal" class='cursor-pointer'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class='text-red-600'>
                                        <form action="{{ url('/delete_product/' . $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

    </div>
</body>

</html>
