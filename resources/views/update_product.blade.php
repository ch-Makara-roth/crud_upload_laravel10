<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class='container'>
        <div class="flex justify-center items-center">
            <form class="mt-6" action="{{ url('edit_product',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
{{-- @dd($product->image) --}}
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Update Product</h2>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                            <div class="mt-2">
                                <input name="title" id="title" value="{{$product->title}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 p-4"></input>
                            </div>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">Description</label>
                            <div class="mt-2">
                                <textarea id="description" name="description"
                                autocomplete="description"
                                class="p-4 block w-full rounded-md border-0 py-1.5 text-gray-900
                                shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400
                                focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{$product->description}}
                                </textarea>
                            </div>
                        </div>
                        {{-- old image --}}
                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                               <div>
                                    <img height="100px" width="100px" src="/product/{{$product->image}}" alt="cc">
                               </div>

                            </div>
                        </div>
                        <div class="col-span-full">
                            <label for="image" class="block text-sm font-medium leading-6 text-gray-900">Image</label>
                            <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                                <div class="text-center">
                                    <div class="mt-4 flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="image" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="flex justify-center "> --}}
                    <button class="bg-green-600 rounded-md p-4 mt-2" type="submit">Update</button>

                    {{-- </div> --}}
                </div>
            </form>
        </div>
    </div>
</body>
</html>
